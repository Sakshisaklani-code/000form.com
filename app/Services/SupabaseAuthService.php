<?php

namespace App\Services;

use App\Models\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class SupabaseAuthService
{
    protected Client $client;
    protected string $url;
    protected string $key;
    protected string $serviceKey;
    protected string $jwtSecret;

    public function __construct()
    {
        $this->url = config('supabase.url');
        $this->key = config('supabase.key');
        $this->serviceKey = config('supabase.service_key');
        $this->jwtSecret = config('supabase.jwt_secret');

        $this->client = new Client([
            'base_uri' => $this->url,
            'timeout' => 30,
            'verify'   => false,
        ]);
    }

    public function updateLoggedInUserPassword(string $email, string $currentPassword, string $newPassword): array
    {
        // 1️⃣ Verify current password by signing in
        $login = $this->signIn($email, $currentPassword);

        if (!$login['success']) {
            return [
                'success' => false,
                'error' => 'Incorrect current password.'
            ];
        }

        // 2️⃣ Update password using Supabase access token
        $update = $this->updateUserPassword($login['data']['session']['access_token'], $newPassword);

        if (!$update['success']) {
            return [
                'success' => false,
                'error' => $update['error'] ?? 'Failed to update password.'
            ];
        }

        return ['success' => true];
    }

    /**
     * Sign up a new user with email and password.
     */
    public function signUp(string $email, string $password): array
    {
        try {
            $response = $this->client->post('/auth/v1/signup', [
                'headers' => [
                    'apikey' => $this->key,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'email' => $email,
                    'password' => $password,
                    'email_redirect_to' => 'https://000form.com/auth/confirm'
                ],
            ]);

            $data = json_decode($response->getBody()->getContents(), true);

            if (isset($data['user'])) {
                $this->syncUser($data['user']);
            }

            return [
                'success' => true,
                'data' => $data,
            ];
        } catch (GuzzleException $e) {
            Log::error('Supabase signup error: ' . $e->getMessage());

            $response = $e->getResponse();
            $body = $response ? json_decode($response->getBody()->getContents(), true) : null;

            return [
                'success' => false,
                'error' => $body['error_description'] ?? $body['msg'] ?? 'Signup failed',
            ];
        }
    }

    /**
     * Sign in a user with email and password.
     */
    public function signIn(string $email, string $password): array
    {
        try {
            $response = $this->client->post('/auth/v1/token?grant_type=password', [
                'headers' => [
                    'apikey' => $this->key,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'email' => $email,
                    'password' => $password,
                ],
            ]);

            $data = json_decode($response->getBody()->getContents(), true);

            if (isset($data['user'])) {
                $this->syncUser($data['user']);
            }

            return [
                'success' => true,
                'data' => $data,
            ];
        } catch (GuzzleException $e) {
            Log::error('Supabase signin error: ' . $e->getMessage());
            
            $response = $e->getResponse();
            $body = $response ? json_decode($response->getBody()->getContents(), true) : null;
            
            return [
                'success' => false,
                'error' => $body['error_description'] ?? $body['msg'] ?? 'Invalid credentials',
            ];
        }
    }

    /**
     * Get OAuth URL for social login.
     */
    public function getOAuthUrl(string $provider, string $redirectTo): string
    {
        $params = http_build_query([
            'provider' => $provider,
            'redirect_to' => $redirectTo,
        ]);

        return "{$this->url}/auth/v1/authorize?{$params}";
    }

    /**
     * Exchange OAuth code for session.
     */
    public function exchangeCodeForSession(string $code): array
    {
        try {
            $response = $this->client->post('/auth/v1/token?grant_type=pkce', [
                'headers' => [
                    'apikey' => $this->key,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'auth_code' => $code,
                ],
            ]);

            $data = json_decode($response->getBody()->getContents(), true);

            if (isset($data['user'])) {
                $this->syncUser($data['user']);
            }

            return [
                'success' => true,
                'data' => $data,
            ];
        } catch (GuzzleException $e) {
            Log::error('Supabase OAuth exchange error: ' . $e->getMessage());
            
            return [
                'success' => false,
                'error' => 'OAuth authentication failed',
            ];
        }
    }

    /**
     * Get user from access token.
     */
    public function getUser(string $accessToken): ?array
    {
        try {
            $response = $this->client->get('/auth/v1/user', [
                'headers' => [
                    'apikey' => $this->key,
                    'Authorization' => "Bearer {$accessToken}",
                ],
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            Log::error('Supabase get user error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Refresh access token.
     */
    public function refreshToken(string $refreshToken): array
    {
        try {
            $response = $this->client->post('/auth/v1/token?grant_type=refresh_token', [
                'headers' => [
                    'apikey' => $this->key,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'refresh_token' => $refreshToken,
                ],
            ]);

            return [
                'success' => true,
                'data' => json_decode($response->getBody()->getContents(), true),
            ];
        } catch (GuzzleException $e) {
            Log::error('Supabase refresh token error: ' . $e->getMessage());
            
            return [
                'success' => false,
                'error' => 'Token refresh failed',
            ];
        }
    }

    /**
     * Sign out user.
     */
    public function signOut(string $accessToken): bool
    {
        try {
            $this->client->post('/auth/v1/logout', [
                'headers' => [
                    'apikey' => $this->key,
                    'Authorization' => "Bearer {$accessToken}",
                ],
            ]);

            return true;
        } catch (GuzzleException $e) {
            Log::error('Supabase signout error: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Send password reset email.
     */
    public function confirmPasswordReset(Request $request, SupabaseAuthService $supabase)
    {
        $tokenHash = $request->query('token_hash');

        if (!$tokenHash) {
            return redirect('/forgot-password');
        }

        $result = $supabase->verifyEmailToken($tokenHash, 'recovery');

        if (!$result['success']) {
            return redirect('/forgot-password')->with('error', 'Reset link expired');
        }

        session(['reset_access_token' => $result['data']['access_token']]);

        return redirect('/auth/reset-password');
    }

    public function sendPasswordReset(string $email): array
    {
        try {
            $response = $this->client->post('/auth/v1/recover', [
                'headers' => [
                    'apikey' => $this->key,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'email' => $email,
                    'redirect_to' => url('/auth/reset-password-confirm-token'),
                ],
            ]);

            return [
                'success' => true
            ];

        } catch (\GuzzleHttp\Exception\GuzzleException $e) {

            Log::error('Supabase password reset error: ' . $e->getMessage());

            return [
                'success' => false,
                'error' => 'Password reset failed'
            ];
        }
    }

    /**
     * Handle password reset submission.
     */
    public function updateUserPassword(string $accessToken, string $newPassword): array
    {
        try {

            $response = Http::withHeaders([
                'apikey'        => $this->key,
                'Authorization' => 'Bearer ' . $accessToken,
                'Content-Type'  => 'application/json',
            ])->put($this->url . '/auth/v1/user', [
                'password' => $newPassword,
            ]);

            $data = $response->json();

            if ($response->failed()) {
                return ['success' => false, 'error' => $data['error'] ?? 'Password reset failed'];
            }

            return ['success' => true];

        } catch (\Exception $e) {

            Log::error('Password reset error: ' . $e->getMessage());

            return ['success' => false, 'error' => 'Password reset failed'];
        }
    }

    /**
     * Verify JWT token and return payload.
     */
    public function verifyToken(string $token): ?array
    {
        try {
            $decoded = JWT::decode($token, new Key($this->jwtSecret, 'HS256'));
            return (array) $decoded;
        } catch (\Exception $e) {
            Log::error('JWT verification error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Sync Supabase user to local database.
     */
    public function syncUser(array $supabaseUser): User
    {
        $provider = 'email';
        if (!empty($supabaseUser['app_metadata']['provider'])) {
            $provider = $supabaseUser['app_metadata']['provider'];
        }

        return User::updateOrCreate(
            ['id' => $supabaseUser['id']],
            [
                'email' => $supabaseUser['email'],
                'name' => $supabaseUser['user_metadata']['full_name'] 
                    ?? $supabaseUser['user_metadata']['name'] 
                    ?? null,
                'avatar_url' => $supabaseUser['user_metadata']['avatar_url'] 
                    ?? $supabaseUser['user_metadata']['picture'] 
                    ?? null,
                'provider' => $provider,
                'email_verified' => !empty($supabaseUser['email_confirmed_at']),
                'email_verified_at' => $supabaseUser['email_confirmed_at'] ?? null,
                'metadata' => $supabaseUser['user_metadata'] ?? [],
            ]
        );
    }

    public function verifyEmailToken(string $tokenHash, string $type): array
    {
        try {

            $response = $this->client->post('/auth/v1/verify', [
                'headers' => [
                    'apikey' => $this->key,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'token_hash' => $tokenHash,
                    'type' => $type
                ],
            ]);

            $data = json_decode($response->getBody()->getContents(), true);

            if (isset($data['user'])) {
                $this->syncUser($data['user']);
            }

            return [
                'success' => true,
                'data' => $data
            ];

        } catch (\Exception $e) {

            Log::error('Supabase email verify error: ' . $e->getMessage());

            return [
                'success' => false
            ];
        }
    }

}
