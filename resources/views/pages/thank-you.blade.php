<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Thank You - 000form</title>

<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<style>

:root{
--bg-primary:#121212;
--card-bg:#1a1a1a;
--text-primary:#ffffff;
--text-muted:#9ca3af;
--accent:#00ff88;
}

body{
margin:0;
font-family:'Outfit',sans-serif;
background:var(--bg-primary);
color:var(--text-primary);
display:flex;
justify-content:center;
align-items:center;
min-height:100vh;
}

.auth-container{
text-align:center;
max-width:520px;
width:90%;
padding:2.5rem 2rem;
background:var(--card-bg);
border-radius:14px;
box-shadow:0 20px 40px rgba(0,0,0,0.45);
}

.logo{
height:36px;
margin:0 auto 1.8rem auto;
}

.success-icon{
font-size:3.5rem;
margin-bottom:1rem;
}

.title{
font-size:1.8rem;
font-weight:700;
color:var(--accent);
margin-bottom:.5rem;
letter-spacing:-0.02em;
}

.message{
font-size:1.2rem;
font-weight:500;
margin-bottom:1.25rem;
line-height:1.5;
color:#e5e5e5;
}

.subtitle{
color:var(--text-muted);
margin-bottom:2rem;
}

.back-btn{
display:inline-flex;
align-items:center;
gap:.5rem;
background:var(--accent);
color:#000;
font-weight:600;
padding:.7rem 1.5rem;
border-radius:8px;
border:none;
font-size:.95rem;
cursor:pointer;
transition:all .2s;
}

.back-btn:hover{
transform:translateY(-1px);
box-shadow:0 6px 18px rgba(0,255,136,0.25);
}

.footer{
margin-top:2.5rem;
font-size:.8rem;
color:#888;
}

.footer a{
color:var(--accent);
text-decoration:none;
font-weight:500;
}

</style>
</head>

<body>

<div class="auth-container">

<img src="{{ asset('images/logo/000formlogo.png') }}" class="logo" alt="000form logo">

<div class="success-icon">✅</div>

<h1 class="title">Message Sent!</h1>

<h2 class="message">{{ $message }}</h2>

<p class="subtitle">Your submission has been received.</p>

<button
class="back-btn"
onclick="window.history.go({{ session('had_captcha') ? -2 : -1 }})">
← Go Back
</button>

<p class="footer">
Powered by <a href="/">000form</a>
</p>

</div>

</body>
</html>