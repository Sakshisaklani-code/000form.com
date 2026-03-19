<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Message Sent! - 000form</title>

    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <style>

        :root{
        --bg-primary:#121212;
        --card-bg:#1a1a1a;
        --text-primary:#ffffff;
        --text-secondary:#a1a1aa;
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
        font-size:1.6rem;
        font-weight:700;
        color:var(--text-primary);
        letter-spacing:-0.02em;
        margin-bottom:.75rem;
        }

        .subtitle{
        color:var(--text-secondary);
        font-size:.95rem;
        line-height:1.6;
        margin-bottom:2rem;
        }

        .back-btn{
        display:inline-flex;
        align-items:center;
        gap:.5rem;
        background:var(--accent);
        color:#000;
        font-weight:600;
        padding:.75rem 1.5rem;
        border-radius:8px;
        border:none;
        font-size:.95rem;
        cursor:pointer;
        transition:all .2s;
        }

        .back-btn:hover{
        transform:translateY(-1px);
        box-shadow:0 8px 20px rgba(0,255,136,0.25);
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

    <img src="/images/logo/000formlogo.png" class="logo" alt="000form logo">

    <div class="success-icon">✅</div>

    <h1 class="title">
    Message Sent!
    </h1>

    <p class="subtitle">
    Your form submission was received successfully. The owner of this form will be in touch soon.
    </p>

    <?php if(session('form_referrer')): ?>
        <a href="<?php echo e(session('form_referrer')); ?>" class="back-btn">← Go Back</a>
    <?php else: ?>
        <button class="back-btn" onclick="window.history.go(-1)">← Go Back</button>
    <?php endif; ?>

    <p class="footer">
    Powered by <a href="/">000form</a>
    </p>

</div>

</body>
</html><?php /**PATH C:\Git-folders\000form.com\resources\views\pages\form-submitted.blade.php ENDPATH**/ ?>