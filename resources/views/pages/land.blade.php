{{-- resources/views/start.blade.php --}}
@extends('layouts.app') {{-- or whatever your bare layout is --}}

@section('content')
<div class="start-page">

  <div class="start-top-badge">
    <span class="start-dot"></span>
    000form · Choose your mode
  </div>

  <h1 class="start-headline">
    How do you want<br><em>to receive</em> submissions?
  </h1>
  <p class="start-sub">Two ways to connect your form. Pick the one that fits — you can always switch later.</p>

  <div class="start-cards">

    {{-- CORE --}}
    <a href="/" class="start-card start-card--core">
      <div class="start-card__pill">
        <span class="start-card__icon">
          <svg width="12" height="12" viewBox="0 0 18 18" fill="none">
            <path d="M9 1.5L15.5 5.25V12.75L9 16.5L2.5 12.75V5.25L9 1.5Z" stroke="#18ff85" stroke-width="1.6" fill="none"/>
            <circle cx="9" cy="9" r="2.2" fill="#18ff85"/>
          </svg>
        </span>
        Core
      </div>
      <div class="start-card__title">Full control.<br>Your dashboard.</div>
      <div class="start-card__tagline">For developers who want everything.</div>
      <p class="start-card__desc">Create an account, manage endpoints from a dashboard, configure webhooks, view submission history, and integrate with your stack exactly how you want.</p>
      <ul class="start-card__perks">
        <li><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg> Dashboard with submission history</li>
        <li><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg> Webhooks, integrations &amp; API access</li>
        <li><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg> Multiple endpoints &amp; team support</li>
        <li><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg> Advanced spam filtering &amp; rules</li>
      </ul>
      <span class="start-card__cta">
        Get started with Core
        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"/></svg>
      </span>
    </a>

    {{-- OR --}}
    <div class="start-or">
      <div class="start-or__line"></div>
      <div class="start-or__text">or</div>
      <div class="start-or__line"></div>
    </div>

    {{-- EXPRESS --}}
    <a href="{{ route('playground.index') }}" class="start-card start-card--express">
      <div class="start-card__pill">
        <span class="start-card__icon">
          <svg width="11" height="13" viewBox="0 0 12 14" fill="none">
            <path d="M7 1L2 7.5H6L5 13L10 6.5H6.5L7 1Z" fill="#6ea4ff" stroke="rgba(110,164,255,0.4)" stroke-width="0.5" stroke-linejoin="round"/>
          </svg>
        </span>
        Express
      </div>
      <div class="start-card__title">Zero setup.<br>Just email.</div>
      <div class="start-card__tagline">For anyone who wants it working now.</div>
      <p class="start-card__desc">No account, no dashboard, no configuration. Enter your email, verify once, and your form endpoint is live — submissions go straight to your inbox in seconds.</p>
      <ul class="start-card__perks">
        <li><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg> No account or login required</li>
        <li><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg> Verify email once — live in 60 seconds</li>
        <li><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg> Instant delivery, reply-to pre-set</li>
        <li><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg> Spam &amp; honeypot protection</li>
      </ul>
      <span class="start-card__cta">
        Get started with Express
        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"/></svg>
      </span>
    </a>

  </div>
</div>
<style>
    .start-page {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 40px 24px;
    position: relative;
    background: #06090f;
    overflow: hidden;
    }
    .start-page::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image:
        linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px);
    background-size: 52px 52px;
    pointer-events: none;
    }
    .start-top-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 6px 18px;
    border-radius: 999px;
    border: 1px solid rgba(255,255,255,0.1);
    background: rgba(255,255,255,0.04);
    font-size: 12px;
    font-weight: 500;
    color: rgba(255,255,255,0.4);
    letter-spacing: 0.06em;
    text-transform: uppercase;
    margin-bottom: 32px;
    }
    .start-dot {
    width: 6px; height: 6px;
    border-radius: 50%;
    background: #18ff85;
    box-shadow: 0 0 6px #18ff85;
    display: inline-block;
    }
    .start-headline {
    font-family: 'Syne', sans-serif;
    font-size: clamp(28px, 5vw, 54px);
    font-weight: 800;
    color: #fff;
    text-align: center;
    line-height: 1.07;
    letter-spacing: -0.025em;
    margin-bottom: 14px;
    }
    .start-headline em { font-style: normal; color: rgba(255,255,255,0.3); }
    .start-sub {
    font-size: 16px;
    line-height: 1.65;
    color: rgba(255,255,255,0.4);
    text-align: center;
    max-width: 480px;
    margin-bottom: 52px;
    }
    .start-cards {
    display: grid;
    grid-template-columns: 1fr auto 1fr;
    align-items: stretch;
    width: 100%;
    max-width: 860px;
    }
    .start-or {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 12px;
    padding: 0 24px;
    }
    .start-or__line {
    width: 1px; flex: 1;
    background: linear-gradient(to bottom, transparent, rgba(255,255,255,0.1), transparent);
    }
    .start-or__text {
    font-family: 'Syne', sans-serif;
    font-size: 11px;
    font-weight: 700;
    color: rgba(255,255,255,0.2);
    letter-spacing: 0.12em;
    text-transform: uppercase;
    }
    .start-card {
    border-radius: 20px;
    padding: 36px 32px 32px;
    display: flex;
    flex-direction: column;
    position: relative;
    overflow: hidden;
    cursor: pointer;
    text-decoration: none;
    transition: transform 0.28s cubic-bezier(.4,0,.2,1);
    }
    .start-card:hover { transform: translateY(-4px); }

    .start-card--core {
    background: rgba(8,22,14,0.9);
    border: 1px solid rgba(24,200,90,0.2);
    box-shadow: 0 0 48px rgba(18,180,80,0.1), inset 0 1px 0 rgba(24,255,133,0.06);
    }
    .start-card--core::before {
    content: '';
    position: absolute;
    top: -60px; right: -60px;
    width: 180px; height: 180px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(18,200,80,0.18), transparent 70%);
    pointer-events: none;
    }
    .start-card--core:hover {
    border-color: rgba(24,200,90,0.4);
    box-shadow: 0 0 64px rgba(18,180,80,0.2), inset 0 1px 0 rgba(24,255,133,0.1);
    }
    .start-card--express {
    background: rgba(8,14,30,0.9);
    border: 1px solid rgba(50,110,255,0.2);
    box-shadow: 0 0 48px rgba(40,90,255,0.1), inset 0 1px 0 rgba(80,140,255,0.06);
    }
    .start-card--express::before {
    content: '';
    position: absolute;
    top: -60px; left: -60px;
    width: 180px; height: 180px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(40,90,255,0.18), transparent 70%);
    pointer-events: none;
    }
    .start-card--express:hover {
    border-color: rgba(50,110,255,0.4);
    box-shadow: 0 0 64px rgba(40,90,255,0.2), inset 0 1px 0 rgba(80,140,255,0.1);
    }
    .start-card__pill {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 7px 14px;
    border-radius: 999px;
    font-family: 'Syne', sans-serif;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    margin-bottom: 24px;
    align-self: flex-start;
    }
    .start-card--core .start-card__pill { background: rgba(18,200,80,0.12); border: 1px solid rgba(24,200,90,0.3); color: #18ff85; }
    .start-card--express .start-card__pill { background: rgba(50,110,255,0.12); border: 1px solid rgba(60,120,255,0.3); color: #6ea4ff; }
    .start-card__icon {
    width: 24px; height: 24px;
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    }
    .start-card--core .start-card__icon { background: rgba(18,200,80,0.2); box-shadow: 0 0 8px rgba(18,220,80,0.4); }
    .start-card--express .start-card__icon { background: rgba(50,110,255,0.25); box-shadow: 0 0 8px rgba(60,140,255,0.5); }
    .start-card__title {
    font-family: 'Syne', sans-serif;
    font-size: 26px; font-weight: 800;
    line-height: 1.1; letter-spacing: -0.02em;
    color: #fff; margin-bottom: 8px;
    }
    .start-card__tagline {
    font-size: 13px; font-weight: 500;
    margin-bottom: 16px;
    }
    .start-card--core .start-card__tagline { color: rgba(24,255,133,0.6); }
    .start-card--express .start-card__tagline { color: rgba(100,160,255,0.6); }
    .start-card__desc {
    font-size: 14px; line-height: 1.65;
    color: rgba(255,255,255,0.4);
    margin-bottom: 24px; flex: 1;
    }
    .start-card__perks { list-style: none; display: flex; flex-direction: column; gap: 8px; margin-bottom: 32px; }
    .start-card__perks li { display: flex; align-items: center; gap: 9px; font-size: 13px; color: rgba(255,255,255,0.6); }
    .start-card--core .start-card__perks li svg { color: #18ff85; }
    .start-card--express .start-card__perks li svg { color: #6ea4ff; }
    .start-card__cta {
    display: flex; align-items: center; justify-content: center; gap: 8px;
    padding: 13px 0; border-radius: 12px;
    font-family: 'Syne', sans-serif; font-size: 14px; font-weight: 700;
    transition: box-shadow 0.25s;
    }
    .start-card--core .start-card__cta {
    background: linear-gradient(135deg, #0a3d22, #0f6035);
    color: #18ff85;
    border: 1px solid rgba(24,200,90,0.3);
    box-shadow: 0 0 20px rgba(18,180,80,0.25);
    }
    .start-card--core:hover .start-card__cta { box-shadow: 0 0 32px rgba(18,180,80,0.4); }
    .start-card--express .start-card__cta {
    background: linear-gradient(135deg, #1a3a9f, #2255dd);
    color: #fff;
    border: 1px solid rgba(60,120,255,0.3);
    box-shadow: 0 0 20px rgba(40,100,255,0.3);
    }
    .start-card--express:hover .start-card__cta { box-shadow: 0 0 32px rgba(40,100,255,0.5); }

    @media (max-width: 700px) {
    .start-cards { grid-template-columns: 1fr; }
    .start-or { flex-direction: row; padding: 16px 0; }
    .start-or__line { width: auto; height: 1px; flex: 1; background: linear-gradient(to right, transparent, rgba(255,255,255,0.1), transparent); }
    }
</style>
@endsection