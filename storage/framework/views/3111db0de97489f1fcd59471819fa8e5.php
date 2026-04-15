<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>000form - Form Backend Without Backend</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #121212;
      color: #fff;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 30px 40px;
      background-color: #1f1f1f;
    }

    header img {
      width: 120px;
    }

    header a {
      color: #ffffff;
      text-decoration: none;
      font-weight: 600;
      padding: 12px 24px;
      background-color: #3fffd7;
      border-radius: 6px;
      text-transform: uppercase;
      transition: background-color 0.3s ease;
    }

    header a:hover {
      background-color: #36d0b3;
    }

    /* Hero Section */
    .hero-section {
      text-align: center;
      padding: 100px 40px;
      background-color: #121212;
    }

    .hero-section h1 {
      font-size: 4rem;
      font-weight: 600;
      color: #3fffd7;
      margin-bottom: 20px;
    }

    .hero-section p {
      font-size: 1.3rem;
      color: #e4e4e4;
      margin-bottom: 40px;
    }

    .hero-section .button {
      padding: 14px 28px;
      background-color: #3fffd7;
      color: #121212;
      font-weight: 600;
      border: none;
      cursor: pointer;
      text-transform: uppercase;
      border-radius: 6px;
      transition: background-color 0.3s ease;
    }

    .hero-section .button:hover {
      background-color: #36d0b3;
    }

    /* Core Section */
    .core-section, .express-section {
      padding: 80px 40px;
      background-color: #1f1f1f;
      text-align: center;
    }

    .section-title {
      font-size: 3rem;
      font-weight: 600;
      color: #3fffd7;
      margin-bottom: 30px;
    }

    .section-description {
      font-size: 1.1rem;
      color: #e4e4e4;
      margin-bottom: 30px;
    }

    .steps {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 40px;
      margin-top: 40px;
    }

    .step {
      background-color: #121212;
      padding: 30px;
      border-radius: 10px;
      width: 280px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
      transition: transform 0.3s ease;
    }

    .step:hover {
      transform: translateY(-10px);
    }

    .step h3 {
      font-size: 1.5rem;
      color: #3fffd7;
      margin-bottom: 10px;
    }

    .step p {
      font-size: 1rem;
      color: #e4e4e4;
    }

    footer {
      background-color: #1f1f1f;
      padding: 40px;
      text-align: center;
      color: #e4e4e4;
    }

    footer p {
      font-size: 1rem;
    }

    /* Buttons */
    .button {
      padding: 12px 24px;
      background-color: #3fffd7;
      color: #121212;
      font-weight: 600;
      border: none;
      cursor: pointer;
      text-transform: uppercase;
      border-radius: 6px;
      transition: background-color 0.3s ease;
    }

    .button:hover {
      background-color: #36d0b3;
    }
  </style>
</head>
<body>

  <!-- Header -->
  <header>
    <img src="your-logo.png" alt="000form Logo">
    <a href="#core" class="button">Get Started</a>
  </header>

  <!-- Hero Section -->
  <section class="hero-section">
    <h1>Your Data. Your Dashboard.</h1>
    <p>Form backend made easy. No server. No deployment pipelines. Just a URL swap.</p>
    <a href="#core" class="button">Start Now</a>
  </section>

  <!-- Core Section -->
  <section id="core" class="core-section">
    <h2 class="section-title">Core</h2>
    <p class="section-description">
      Register for a free account, create unlimited form endpoints, and every submission lands in your personal dashboard — searchable, filterable, exportable, and always yours.
    </p>
    <div class="steps">
      <div class="step">
        <h3>Permanent Submission Storage</h3>
        <p>Access your submission data anytime, with full history and export options.</p>
      </div>
      <div class="step">
        <h3>Analytics & Trends</h3>
        <p>Analyze your form's data trends, and gain insights to optimize your workflows.</p>
      </div>
      <div class="step">
        <h3>Team Collaboration</h3>
        <p>Collaborate with your team on paid plans to streamline form submissions.</p>
      </div>
    </div>
    <a href="#" class="button">Create Free Account</a>
  </section>

  <!-- Express Section -->
  <section id="express" class="express-section">
    <h2 class="section-title">Express</h2>
    <p class="section-description">
      Zero setup. Just notifications. Get submissions directly in your inbox in under 60 seconds.
    </p>
    <div class="steps">
      <div class="step">
        <h3>Enter Your Email</h3>
        <p>No account needed. Just enter your email to get started.</p>
      </div>
      <div class="step">
        <h3>Verify Once</h3>
        <p>Click the link we send you, and you're ready to go.</p>
      </div>
      <div class="step">
        <h3>Start Getting Notifications</h3>
        <p>Receive submissions directly in your inbox — instantly.</p>
      </div>
    </div>
    <a href="#" class="button">Get Started</a>
  </section>

  <!-- Footer -->
  <footer>
    <p>&copy; 2026 000form. All rights reserved.</p>
  </footer>

</body>
</html><?php /**PATH C:\Git-folders\000form.com\resources\views/pages/ajax.blade.php ENDPATH**/ ?>