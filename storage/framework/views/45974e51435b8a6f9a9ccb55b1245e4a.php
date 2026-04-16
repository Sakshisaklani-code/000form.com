<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover"/>
<title>000form — Form Backend Without the Backend</title>
<link rel="preconnect" href="https://fonts.googleapis.com"/>
<!-- Favicon -->
    <link rel="icon" href="<?php echo e(asset('images/favicon/000formFavicon-default.png')); ?>" type="image/svg+xml">
    <!-- Canonical Tag --> 
    <link rel="canonical" href="https://000form.com/" />
    <!-- Keywords --> 
    <meta name="keywords" content="form backend, HTML form endpoint, contact form API, Forms without backend, no-server contact form, serverless form handling, static site form backend, form submission API, form processing service, form endpoint for static sites, form handling without server, form backend for JAMstack, form submission endpoint, form backend for frontend developers, form handling API, form backend service, form submission handling, form backend solution" />
    <!-- FontsStyles -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600&family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="/css/app.css">
    <!-- Open Graph Tags --> 
    <meta property="og:title" content="000Forms - Smart Form Submissions" /> 
    <meta property="og:description" content="Easily create and manage forms with 000Forms, a Laravel-powered solution." /> 
    <meta property="og:type" content="website" /> 
    <meta property="og:url" content="https://000form.com/" /> 
    <meta property="og:image" content="<?php echo e(asset('images/og-image/og-image.jpg')); ?>" /> 
    <meta property="og:site_name" content="000Forms" />
    <!-- Index and follow for SEO -->
    <meta name="robots" content="index, follow">
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Google Analytics tag (gtag.js) --> 
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-TV3T8837GC"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-TV3T8837GC'); </script>
    <!-- Schema.org JSON-LD --> 
    <script type="application/ld+json"> 
        {
            "@context": "https://schema.org", 
            "@type": "Organization", 
            "name": "000Form", 
            "alternateName": "000Form", 
            "url": "https://000form.com/",
            "logo": "https://000form.com/images/logo/000formlogo.png" 
        }
    </script>
<style>
*{margin:0;padding:0;box-sizing:border-box;}
:root{
  --bg:#03030a;
  --surface:rgba(9,9,20,0.85);
  --surface-2:rgba(14,14,28,0.9);
  --surface-3:rgba(18,18,32,0.95);
  --border:rgba(255,255,255,0.06);
  --border-hi:rgba(255,255,255,0.1);
  --text:#f0f0f8;
  --muted:#8888aa;
  --dim:#44445a;
  --green:#00e87a;
  --green-mid:#00c46a;
  --green-dim:rgba(0,232,122,0.08);
  --green-glow:rgba(0,232,122,0.3);
  --green-glass:rgba(0,232,122,0.06);
  --blue:#4d9fff;
  --blue-mid:#3d8aef;
  --blue-dim:rgba(77,159,255,0.08);
  --blue-glow:rgba(77,159,255,0.3);
  --blue-glass:rgba(77,159,255,0.06);
  --r-sm:10px;
  --r-md:18px;
  --r-lg:24px;
  --r-xl:36px;
}
html{scroll-behavior:smooth;}
body{background:var(--bg);color:var(--text);line-height:1.6;overflow-x:hidden;font-family:'DM Sans',sans-serif;}
h1,h2,h3,h4,.brand,.btn,.tag-label,.step-num,.section-eyebrow{font-family:'Syne',sans-serif;}

/* ─── GRAIN OVERLAY ─── */
body::before{
  content:'';position:fixed;inset:0;
  background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.035'/%3E%3C/svg%3E");
  opacity:.5;pointer-events:none;z-index:0;
}

/* ─── GLOBAL AMBIENT GLOW ─── */
.ambient-left{
  position:fixed;top:0;left:-20%;width:60%;height:80%;
  background:radial-gradient(ellipse at top left,rgba(0,232,122,0.05) 0%,transparent 60%);
  pointer-events:none;z-index:0;
}
.ambient-right{
  position:fixed;top:20%;right:-20%;width:60%;height:80%;
  background:radial-gradient(ellipse at top right,rgba(77,159,255,0.05) 0%,transparent 60%);
  pointer-events:none;z-index:0;
}

/* ─── SCROLLBAR ─── */
::-webkit-scrollbar{width:4px;}
::-webkit-scrollbar-track{background:transparent;}
::-webkit-scrollbar-thumb{background:linear-gradient(var(--green),var(--blue));border-radius:99px;}

/* ─── HEADER ─── */
header{
  position:fixed;top:16px;left:50%;transform:translateX(-50%);z-index:300;
  width:calc(100% - 48px);max-width:1200px;
  height:64px;display:flex;align-items:center;justify-content:space-between;
  padding:2.6rem 24px;
  background:rgba(6,6,16,0.6);
  backdrop-filter:blur(32px) saturate(200%);
  border:1px solid rgba(255,255,255,0.07);
  border-radius:50px;
  box-shadow:0 8px 32px rgba(0,0,0,0.5),inset 0 1px 0 rgba(255,255,255,0.06),0 0 0 1px rgba(0,0,0,0.3);
  transition:all .3s;
}
.logo-wrap{display:flex;align-items:center;gap:10px;text-decoration:none;}
.logo-mark{
  width:36px;height:36px;border-radius:10px;
  background:linear-gradient(135deg,var(--green),var(--green-mid));
  display:flex;align-items:center;justify-content:center;
  font-family:'Syne',sans-serif;font-weight:800;font-size:11px;color:#010d06;
  letter-spacing:-1px;
  box-shadow:0 0 20px var(--green-glow),inset 0 1px 0 rgba(255,255,255,0.3);
}
.brand{font-weight:700;font-size:1.3rem;letter-spacing:-0.5px;color:var(--text);}

/* ─── NAVIGATION: BRIGHT TEXT LINKS (DEFAULT MUTED) ─── */
.nav-links{
  display:flex;
  gap:32px;
  align-items: center;
}
.nav-link{
  font-family:'Syne',sans-serif;
  font-weight:700;
  font-size:1.1rem;
  cursor:pointer;
  text-decoration:none;
  transition:all 0.3s cubic-bezier(0.2, 0.9, 0.4, 1.1);
  letter-spacing:-0.2px;
  position:relative;
  padding:8px 6px;
  background:transparent;
  border:none;
}
.nav-link-core{
  color:var(--muted);
}
.nav-link-express{
  color:var(--muted);
}
.nav-link-core:hover, .nav-link-core.active-link{
  color:var(--green);
  text-shadow:0 0 12px var(--green-glow), 0 0 4px var(--green);
}
.nav-link-express:hover, .nav-link-express.active-link{
  color:var(--blue);
  text-shadow:0 0 12px var(--blue-glow), 0 0 4px var(--blue);
}
.nav-link::after{
  content:'';
  position:absolute;
  bottom:0;
  left:50%;
  transform:translateX(-50%);
  width:0%;
  height:2px;
  background:currentColor;
  border-radius:99px;
  transition:width 0.3s ease;
}
.nav-link:hover::after, .nav-link.active-link::after{
  width:100%;
}
.nav-link-core.active-link::after{
  background:var(--green);
  box-shadow:0 0 8px var(--green);
}
.nav-link-express.active-link::after{
  background:var(--blue);
  box-shadow:0 0 8px var(--blue);
}

/* ─── HERO ─── */
.hero{
  display:flex;flex-direction:column;
  align-items:center;justify-content:center;
  padding:220px 6% 0px;text-align:center;position:relative;overflow:hidden;
}
.hero-orb-1{
  position:absolute;width:900px;height:900px;
  background:radial-gradient(circle,rgba(0,232,122,0.12) 0%,rgba(0,232,122,0.03) 40%,transparent 65%);
  top:50%;left:50%;transform:translate(-50%,-55%);
  filter:blur(40px);pointer-events:none;
  animation:breathe 9s ease-in-out infinite;
}
.hero-orb-2{
  position:absolute;width:600px;height:600px;
  background:radial-gradient(circle,rgba(77,159,255,0.1) 0%,transparent 65%);
  bottom:-10%;right:-5%;filter:blur(60px);pointer-events:none;
  animation:breathe 12s ease-in-out infinite reverse;
}
.hero-orb-3{
  position:absolute;width:400px;height:400px;
  background:radial-gradient(circle,rgba(0,232,122,0.06) 0%,transparent 65%);
  top:10%;left:-5%;filter:blur(50px);pointer-events:none;
  animation:breathe 7s ease-in-out infinite 3s;
}
@keyframes breathe{
  0%,100%{transform:translate(-50%,-55%) scale(1);}
  50%{transform:translate(-50%,-55%) scale(1.2);}
}

.grid-bg{
  position:absolute;inset:0;
  background-image:
    linear-gradient(rgba(255,255,255,0.02) 1px,transparent 1px),
    linear-gradient(90deg,rgba(255,255,255,0.02) 1px,transparent 1px);
  background-size:64px 64px;
  mask-image:radial-gradient(ellipse 80% 55% at 50% 42%,black 10%,transparent 75%);
  pointer-events:none;
}

.grid-dots{
  position:absolute;inset:0;pointer-events:none;
  background-image:radial-gradient(circle,rgba(255,255,255,0.12) 1px,transparent 1px);
  background-size:64px 64px;
  mask-image:radial-gradient(ellipse 70% 50% at 50% 42%,black 5%,transparent 70%);
}

.hero-badge{
  display:inline-flex;align-items:center;gap:10px;
  background:rgba(0,232,122,0.06);
  border:1px solid rgba(0,232,122,0.2);
  border-radius:99px;padding:7px 20px;font-size:12.5px;color:var(--green);
  font-weight:600;margin-bottom:32px;letter-spacing:.4px;
  backdrop-filter:blur(16px);
  box-shadow:0 0 30px rgba(0,232,122,0.1),inset 0 1px 0 rgba(255,255,255,0.08);
  animation:fadeUp .8s .1s both;
}
.pulse{
  width:6px;height:6px;background:var(--green);border-radius:50%;
  box-shadow:0 0 8px var(--green),0 0 16px rgba(0,232,122,0.5);
  animation:pulse 2s infinite;
}
@keyframes pulse{0%,100%{opacity:.5;transform:scale(.9);}50%{opacity:1;transform:scale(1.5);}}
@keyframes fadeUp{from{opacity:0;transform:translateY(28px);}to{opacity:1;transform:translateY(0);}}

.hero h1{
  font-size:clamp(3.2rem,8.5vw,7rem);font-weight:800;
  letter-spacing:-4px;line-height:1.0;
  margin-bottom:24px;animation:fadeUp .8s .2s both;
  position:relative;
}
.hero h1 .line1{
  display:block;
  background:linear-gradient(170deg,#ffffff 0%,rgba(255,255,255,0.85) 100%);
  -webkit-background-clip:text;background-clip:text;color:transparent;
}
.hero h1 .line2{
  display:block;
  background:linear-gradient(135deg,var(--green) 0%,#7fffbb 50%,var(--blue) 100%);
  -webkit-background-clip:text;background-clip:text;color:transparent;
}

.hero-desc{
  font-size:1.1rem;color:var(--muted);max-width:480px;
  margin:0 auto 40px;font-weight:300;line-height:1.75;
  animation:fadeUp .8s .3s both;
}

.cta-row{
  display:flex;align-items:center;gap:14px;justify-content:center;
  flex-wrap:wrap;margin-bottom:48px;animation:fadeUp .8s .4s both;
}
.btn{
  display:inline-flex;align-items:center;gap:10px;
  padding:13px 30px;border-radius:14px;font-weight:700;
  font-size:16.5px;cursor:pointer;border:none;text-decoration:none;
  transition:all .3s;letter-spacing:-.1px;position:relative;overflow:hidden;
}
.btn::after{
  content:'';position:absolute;inset:0;
  background:linear-gradient(135deg,rgba(255,255,255,0.1),transparent);
  pointer-events:none;
}
.btn-primary{
  background:linear-gradient(135deg,var(--green),var(--green-mid));
  color:#010d06;
  box-shadow:0 4px 24px var(--green-glow),0 1px 0 rgba(255,255,255,0.2) inset;
}
.btn-primary:hover{transform:translateY(-3px) scale(1.02);box-shadow:0 16px 36px rgba(0,232,122,.45);}
.btn-express-cta{
  background:linear-gradient(135deg,#5daeff,var(--blue-mid));
  color:#fff;
  box-shadow:0 4px 24px var(--blue-glow),0 1px 0 rgba(255,255,255,0.2) inset;
}
.btn-express-cta:hover{transform:translateY(-3px) scale(1.02);box-shadow:0 16px 36px rgba(77,159,255,.45);}
.btn-secondary{
  background:rgba(255,255,255,0.05);color:var(--text);
  border:1px solid rgba(255,255,255,0.1);
  backdrop-filter:blur(16px);
  box-shadow:inset 0 1px 0 rgba(255,255,255,0.07);
}
.btn-secondary:hover{border-color:rgba(77,159,255,.4);color:var(--blue);transform:translateY(-3px);}
.cta-divider{color:var(--dim);font-size:13px;}

.hero-note{font-size:16px;color:var(--dim);margin-bottom:56px;animation:fadeUp .8s .5s both;letter-spacing:.2px;}

/* ─── SECTION ─── */
.section{padding:120px 6%;position:relative;}
.section-inner{max-width:1100px;margin:0 auto;}

/* ─── OVERVIEW CARDS ─── */
.overview-header{text-align:center;margin-bottom:64px;}
.overview-header h2{
  font-size:clamp(2rem,4vw,3.2rem);font-weight:800;
  letter-spacing:-2px;margin-bottom:16px;
  background:linear-gradient(135deg,#fff,rgba(255,255,255,0.6));
  -webkit-background-clip:text;background-clip:text;color:transparent;
}
.overview-header p{font-size:15px;color:var(--muted);}

.ov-grid{
  display:grid;grid-template-columns:repeat(2,1fr);gap:3rem;
}
.ov-card{
  position:relative;overflow:hidden;
  background:rgba(255,255,255,0.03);
  border:1px solid rgba(255,255,255,0.07);
  border-radius:20px;padding:32px 28px;
  backdrop-filter:blur(20px);
  transition:all .4s;
  box-shadow:inset 0 1px 0 rgba(255,255,255,0.06);
}
.ov-card::before{
  content:'';position:absolute;inset:0;border-radius:20px;
  background:linear-gradient(135deg,rgba(255,255,255,0.04) 0%,transparent 60%);
  pointer-events:none;
}
.ov-card:hover{
  transform:translateY(-6px);
  border-color:rgba(255,255,255,0.14);
  box-shadow:0 24px 48px rgba(0,0,0,0.4),inset 0 1px 0 rgba(255,255,255,0.1);
}
.ov-card-green:hover{box-shadow:0 24px 48px rgba(0,232,122,0.12),0 0 0 1px rgba(0,232,122,0.2),inset 0 1px 0 rgba(255,255,255,0.1);}
.ov-card-blue:hover{box-shadow:0 24px 48px rgba(77,159,255,0.12),0 0 0 1px rgba(77,159,255,0.2),inset 0 1px 0 rgba(255,255,255,0.1);}

.ov-icon{
  width:48px;height:48px;border-radius:14px;
  display:flex;align-items:center;justify-content:center;
  font-size:20px;margin-bottom:20px;position:relative;
}
.ov-icon-green{
  background:linear-gradient(135deg,rgba(0,232,122,0.15),rgba(0,232,122,0.05));
  border:1px solid rgba(0,232,122,0.2);
  box-shadow:0 0 20px rgba(0,232,122,0.1),inset 0 1px 0 rgba(255,255,255,0.1);
}
.ov-icon-blue{
  background:linear-gradient(135deg,rgba(77,159,255,0.15),rgba(77,159,255,0.05));
  border:1px solid rgba(77,159,255,0.2);
  box-shadow:0 0 20px rgba(77,159,255,0.1),inset 0 1px 0 rgba(255,255,255,0.1);
}
.ov-icon-white{
  background:linear-gradient(135deg,rgba(255,255,255,0.1),rgba(255,255,255,0.04));
  border:1px solid rgba(255,255,255,0.12);
  box-shadow:inset 0 1px 0 rgba(255,255,255,0.1);
}
.ov-card h3{font-size:1.05rem;font-weight:700;margin-bottom:10px;letter-spacing:-.3px;}
.ov-card p{font-size:18px;color:var(--muted);line-height:1.7;}

/* ─── BACKGROUND ZONES ─── */
.zone-green{
  position:relative;
}
.zone-green::before{
  content:'';position:absolute;inset:0;pointer-events:none;
  background:radial-gradient(ellipse 80% 60% at 15% 50%,rgba(0,232,122,0.04) 0%,transparent 65%);
}
.zone-blue{
  position:relative;
}
.zone-blue::before{
  content:'';position:absolute;inset:0;pointer-events:none;
  background:radial-gradient(ellipse 80% 60% at 85% 50%,rgba(77,159,255,0.04) 0%,transparent 65%);
}

/* ─── MODE SECTIONS ─── */
.mode-layout{display:grid;grid-template-columns:1fr 1fr;gap:72px;align-items:center;}
.mode-layout-rtl{direction:rtl;}
.mode-layout-rtl > *{direction:ltr;}

.tag-label{
  display:inline-flex;align-items:center;gap:8px;
  padding:6px 16px;border-radius:99px;font-size:11px;font-weight:700;
  letter-spacing:1.2px;text-transform:uppercase;margin-bottom:20px;
  backdrop-filter:blur(16px);
}
.tag-core{
  color:var(--green);
  background:rgba(0,232,122,0.08);
  border:1px solid rgba(0,232,122,0.2);
  box-shadow:0 0 20px rgba(0,232,122,0.1);
}
.tag-express{
  color:var(--blue);
  background:rgba(77,159,255,0.08);
  border:1px solid rgba(77,159,255,0.2);
  box-shadow:0 0 20px rgba(77,159,255,0.1);
}

.mode-title{
  font-size:clamp(2.2rem,4.5vw,3.4rem);font-weight:800;
  letter-spacing:-2.5px;line-height:1.05;margin-bottom:18px;
}
.mode-desc{font-size:15px;color:var(--muted);line-height:1.75;margin-bottom:32px;max-width:420px;}

.features-list{display:flex;flex-direction:column;gap:8px;margin-bottom:36px;}
.feat-item{
  display:flex;align-items:center;gap:14px;
  background:rgba(255,255,255,0.03);
  border:1px solid rgba(255,255,255,0.07);
  border-radius:16px;padding:16px 18px;font-size:14px;
  backdrop-filter:blur(10px);
  transition:all .25s;
  box-shadow:inset 0 1px 0 rgba(255,255,255,0.05);
}
.feat-item:hover{border-color:rgba(255,255,255,0.12);transform:translateX(4px);}
.feat-item-green:hover{border-color:rgba(0,232,122,0.2);}
.feat-item-blue:hover{border-color:rgba(77,159,255,0.2);}
.feat-check{
  width:22px;height:22px;border-radius:7px;flex-shrink:0;
  display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:700;
}
.check-green{background:rgba(0,232,122,0.12);color:var(--green);border:1px solid rgba(0,232,122,0.2);}
.check-blue{background:rgba(77,159,255,0.12);color:var(--blue);border:1px solid rgba(77,159,255,0.2);}

/* ─── STEPS PANEL ─── */
.steps-panel{
  background:rgba(255,255,255,0.03);
  border:1px solid rgba(255,255,255,0.08);
  border-radius:24px;padding:32px;
  position:relative;overflow:hidden;
  backdrop-filter:blur(24px);
  box-shadow:0 32px 64px rgba(0,0,0,0.4),inset 0 1px 0 rgba(255,255,255,0.08);
}
.steps-panel::before{
  content:'';position:absolute;top:0;right:0;
  width:250px;height:250px;border-radius:50%;
  filter:blur(70px);pointer-events:none;opacity:.35;
}
.steps-panel-green::before{background:radial-gradient(circle,rgba(0,232,122,0.5),transparent);}
.steps-panel-blue::before{background:radial-gradient(circle,rgba(77,159,255,0.5),transparent);}
.steps-panel::after{
  content:'';position:absolute;top:0;left:0;right:0;height:1px;
  background:linear-gradient(90deg,transparent,rgba(255,255,255,0.12),transparent);
}
.steps-panel-header{margin-bottom:28px;display:flex;align-items:center;justify-content:space-between;}
.steps-panel-title{font-family:'Syne',sans-serif;font-size:13px;font-weight:700;color:var(--muted);letter-spacing:1px;text-transform:uppercase;}
.step-row{display:flex;gap:18px;padding:20px 0;position:relative;}
.step-row:not(:last-child){border-bottom:1px solid rgba(255,255,255,0.05);}
.step-num{
  width:42px;height:42px;border-radius:16px;flex-shrink:0;
  display:flex;align-items:center;justify-content:center;
  font-family:'Syne',sans-serif;font-weight:700;font-size:1rem;
}
.step-num-green{
  background:linear-gradient(135deg,rgba(0,232,122,0.15),rgba(0,232,122,0.06));
  color:var(--green);border:1px solid rgba(0,232,122,0.25);
  box-shadow:0 0 16px rgba(0,232,122,0.1),inset 0 1px 0 rgba(255,255,255,0.1);
}
.step-num-blue{
  background:linear-gradient(135deg,rgba(77,159,255,0.15),rgba(77,159,255,0.06));
  color:var(--blue);border:1px solid rgba(77,159,255,0.25);
  box-shadow:0 0 16px rgba(77,159,255,0.1),inset 0 1px 0 rgba(255,255,255,0.1);
}
.step-content h4{font-size:15px;font-weight:600;margin-bottom:5px;letter-spacing:-.2px;}
.step-content p{font-size:13px;color:var(--muted);line-height:1.65;}
.step-content code{
  background:rgba(255,255,255,0.07);padding:2px 8px;border-radius:6px;
  font-family:'JetBrains Mono',monospace;font-size:11.5px;
  border:1px solid rgba(255,255,255,0.08);
}
.step-content code.c-green{color:var(--green);}
.step-content code.c-blue{color:var(--blue);}

/* ─── COMPARISON ─── */
.compare-wrap{
  display:grid;grid-template-columns:1.5fr 1.5fr;gap:3rem;
  max-width:960px;margin:0 auto;
}
.compare-card{
  background:rgba(255,255,255,0.03);
  border:1px solid rgba(255,255,255,0.07);
  border-radius:20px;padding:28px 26px;
  backdrop-filter:blur(20px);
  position:relative;overflow:hidden;
  box-shadow:inset 0 1px 0 rgba(255,255,255,0.07);
  transition:all .3s;
}
.compare-card::before{
  content:'';position:absolute;top:0;left:0;right:0;height:2px;
  border-radius:99px 99px 0 0;
}
.compare-card-green::before{background:linear-gradient(90deg,transparent,var(--green),transparent);}
.compare-card-blue::before{background:linear-gradient(90deg,transparent,var(--blue),transparent);}
.compare-card:hover{transform:translateY(-4px);border-color:rgba(255,255,255,0.12);}
.compare-card h3{font-size:16px;font-weight:700;margin-bottom:20px;display:flex;align-items:center;gap:10px;}
.compare-row{
  display:flex;justify-content:space-between;align-items:center;
  padding:9px 0;border-bottom:1px solid rgba(255,255,255,0.04);
  font-size:16px;color:var(--muted);
}
.compare-row:last-child{border-bottom:none;padding-bottom:0;}
.compare-row span:last-child{font-weight:600;font-size:16px;border-radius:6px;padding:2px 10px;}
.yes-green{color:var(--green);background:rgba(0,232,122,0.08);}
.yes-blue{color:var(--blue);background:rgba(77,159,255,0.08);}
.no{color:var(--dim);background:rgba(255,255,255,0.04);}

/* ─── BOTTOM CTA ─── */
.cta-card{
  background:rgba(255,255,255,0.03);
  border:1px solid rgba(255,255,255,0.08);
  border-radius:32px;padding:72px 48px;
  position:relative;overflow:hidden;text-align:center;
  backdrop-filter:blur(24px);
  box-shadow:inset 0 1px 0 rgba(255,255,255,0.08);
}
.cta-card::before{
  content:'';position:absolute;inset:0;
  background:radial-gradient(ellipse 70% 50% at 50% 0%,rgba(0,232,122,0.06),transparent 55%);
  pointer-events:none;
}
.cta-card h2{
  font-size:clamp(2rem,4.5vw,3.4rem);font-weight:800;
  letter-spacing:-2px;line-height:1.1;margin-bottom:18px;
}
.cta-card p{font-size:15px;color:var(--muted);margin-bottom:40px;max-width:460px;margin-left:auto;margin-right:auto;}
.cta-btns{display:flex;gap:14px;justify-content:center;flex-wrap:wrap;}

/* ─── FOOTER ─── */
footer{
  padding:48px 6%;
  background:rgba(255,255,255,0.02);
  border-top:1px solid rgba(255,255,255,0.06);
  position:relative;
}
footer::before{
  content:'';position:absolute;top:0;left:20%;right:20%;height:1px;
  background:linear-gradient(90deg,transparent,rgba(255,255,255,0.08),transparent);
}
.footer-inner{max-width:1300px;margin:0 auto;}
.footer-top{display:flex;align-items:center;justify-content:space-between;margin-bottom:32px;flex-wrap:wrap;gap:20px;}
.footer-bottom{
  display:flex;align-items:center;justify-content:space-between;
  padding-top:24px;border-top:1px solid rgba(255,255,255,0.05);flex-wrap:wrap;gap:16px;
}
.footer-copy{font-size:13px;color:var(--dim);}
.footer-badges{display:flex;gap:8px;}
.fbadge{
  padding:4px 14px;border-radius:99px;font-size:11px;font-weight:700;letter-spacing:.5px;
}
.fbadge-green{background:rgba(0,232,122,0.08);color:var(--green);border:1px solid rgba(0,232,122,0.2);}
.fbadge-blue{background:rgba(77,159,255,0.08);color:var(--blue);border:1px solid rgba(77,159,255,0.2);}

/* ─── SECTION LABELS ─── */
.section-label{
  display:inline-flex;align-items:center;gap:8px;
  font-size:14px;font-weight:700;letter-spacing:2px;text-transform:uppercase;
  color:var(--dim);margin-bottom:20px;
}
.label-dot{width:4px;height:4px;border-radius:50%;}

/* ─── REVEAL ─── */
.reveal{opacity:0;transform:translateY(24px);transition:opacity .75s ease,transform .65s ease;}
.reveal.in{opacity:1;transform:none;}

/* ─── RESPONSIVE ─── */
@media(max-width:920px){
  .mode-layout,.mode-layout-rtl{grid-template-columns:1fr;gap:40px;}
  .ov-grid{grid-template-columns:1fr;}
  .compare-wrap{grid-template-columns:1fr;}
  header{width:calc(100% - 24px);padding:0 16px;}
  .nav-links{gap:20px;}
  .nav-link{font-size:0.95rem;}
}
@media(max-width:600px){
  .hero h1{letter-spacing:-2.5px;}
  .cta-card{padding:48px 24px;}
  .section{padding:80px 5%;}
  .nav-links{gap:14px;}
}
</style>
</head>
<body>
<div class="ambient-left"></div>
<div class="ambient-right"></div>

<!-- ─── HEADER WITH BRIGHT TEXT LINKS (BOTH DEFAULT MUTED) ─── -->
<header>
  <a href="#" class="logo-wrap">
    <img src="<?php echo e(asset('images/logo/000formlogo-default.png')); ?>" alt="000form Logo" style="width:auto;height:45px;"/>
  </a>
  <div class="nav-links">
    <button class="nav-link nav-link-core" id="navCore">◆ Core</button>
    <button class="nav-link nav-link-express" id="navExpress">⚡ Express</button>
  </div>
</header>

<!-- ─── HERO SECTION (NO ACTIVE HIGHLIGHT) ─── -->
<section class="hero">
  <div class="grid-bg"></div>
  <div class="grid-dots"></div>
  <div class="hero-orb-1"></div>
  <div class="hero-orb-2"></div>
  <div class="hero-orb-3"></div>

  <div class="hero-badge">
    <span class="pulse"></span>
    Form backend without the backend
  </div>

  <h1>
    <span class="line1">Submit forms.</span>
    <span class="line2">Skip the server.</span>
  </h1>
  <p class="hero-desc">One URL change and your form just works. No server setup, no deployment, no headaches — choose Core for full control or Express for instant delivery.</p>

  <div class="cta-row">
    <a href="/core" class="btn btn-primary">Get Core </a>
    <span class="cta-divider">or</span>
    <a href="/express" class="btn btn-express-cta">Try Express</a>
  </div>

  <p class="hero-note">No credit card &nbsp;·&nbsp; Unlimited forms &nbsp;·&nbsp; 50 free submissions/mo</p>
</section>

<!-- ─── OVERVIEW ─── -->
<section class="section">
  <div class="section-inner">
    <div class="overview-header reveal">
      <div class="section-label"><span class="label-dot" style="background:var(--muted);"></span> What is 000form</div>
      <h2>Two ways to handle<br>your form submissions</h2>
      <p>Pick the workflow that fits — full-featured dashboard or zero-setup email delivery.</p>
    </div>
    <div class="ov-grid">
      <div class="ov-card ov-card-green reveal">
        <div class="ov-icon ov-icon-green">◆</div>
        <h3>Core — Your Dashboard</h3>
        <p>Register once, manage unlimited endpoints from a dashboard. Full submission history, search, CSV export, spam filtering, and per-form notifications.</p>
      </div>
      <div class="ov-card ov-card-blue reveal">
        <div class="ov-icon ov-icon-blue">⚡</div>
        <h3>Express — Just Notifications</h3>
        <p>No account needed. Verify your email in 10 seconds and get a unique endpoint. Form submissions land straight in your inbox, nothing else needed.</p>
      </div>
    </div>
  </div>
</section>

<!-- ─── CORE SECTION ─── -->
<section class="section zone-green" id="core">
  <div class="section-inner">
    <div class="mode-layout">
      <div>
        <div class="tag-label tag-core reveal">◆ Core</div>
        <h2 class="mode-title reveal" style="background:linear-gradient(140deg,#fff 30%,var(--green) 100%);-webkit-background-clip:text;background-clip:text;color:transparent;">
          Your data.<br>Your dashboard.
        </h2>
        <p class="mode-desc reveal">Register once, create unlimited endpoints, and every submission lands in your personal dashboard — searchable, filterable, and always yours.</p>
        <div class="features-list reveal">
          <div class="feat-item feat-item-green"><div class="feat-check check-green">✓</div>Permanent submission storage &amp; full history</div>
          <div class="feat-item feat-item-green"><div class="feat-check check-green">✓</div>Spam filtering, CSV export &amp; file uploads</div>
          <div class="feat-item feat-item-green"><div class="feat-check check-green">✓</div>Team collaboration on paid plans</div>
        </div>
        <div class="reveal">
          <a href="/core" class="btn btn-primary">Create free account →</a>
          <p style="font-size:16px;color:var(--dim);margin-top:16px;">No credit card &nbsp;·&nbsp; 50 free submissions/mo</p>
        </div>
      </div>
      <div class="steps-panel steps-panel-green reveal">
        <div class="steps-panel-header">
          <span class="steps-panel-title">How it works</span>
          <span class="tag-label tag-core" style="font-size:10px;margin-bottom:0;padding:4px 16px;">3 steps</span>
        </div>
        <div class="step-row"><div class="step-num step-num-green">1</div><div class="step-content"><h4>Create your free account</h4><p>Sign up — you get a full dashboard, endpoint management, and complete submission history.</p></div></div>
        <div class="step-row"><div class="step-num step-num-green">2</div><div class="step-content"><h4>Create a form endpoint</h4><p>Name your form, copy the unique URL, and configure notification preferences in seconds.</p></div></div>
        <div class="step-row"><div class="step-num step-num-green">3</div><div class="step-content"><h4>Point your HTML form at it</h4><p>Set the <code class="c-green">action</code> attribute to your endpoint. Done — submissions flow in instantly.</p></div></div>
      </div>
    </div>
  </div>
</section>

<!-- ─── EXPRESS SECTION ─── -->
<section class="section zone-blue" id="express">
  <div class="section-inner">
    <div class="mode-layout mode-layout-rtl">
      <div>
        <div class="tag-label tag-express reveal">⚡ Express</div>
        <h2 class="mode-title reveal" style="background:linear-gradient(140deg,#fff 30%,var(--blue) 100%);-webkit-background-clip:text;background-clip:text;color:transparent;">
          Zero setup.<br>Just notifications.
        </h2>
        <p class="mode-desc reveal">No account, no login, no dashboard. Verify your email once, paste the URL. Form submissions hit your inbox in seconds, every time.</p>
        <div class="features-list reveal">
          <div class="feat-item feat-item-blue"><div class="feat-check check-blue">✓</div>No registration required — just your email</div>
          <div class="feat-item feat-item-blue"><div class="feat-check check-blue">✓</div>Instant email delivery, reply-to configured</div>
          <div class="feat-item feat-item-blue"><div class="feat-check check-blue">✓</div>CAPTCHA protection via hidden field</div>
        </div>
        <div class="reveal"><a href="/express" class="btn btn-express-cta">Get started — no account needed →</a></div>
      </div>
      <div class="steps-panel steps-panel-blue reveal">
        <div class="steps-panel-header"><span class="steps-panel-title">How it works</span><span class="tag-label tag-express" style="font-size:10px;margin-bottom:0;padding:4px 16px;">3 steps</span></div>
        <div class="step-row"><div class="step-num step-num-blue">1</div><div class="step-content"><h4>Enter your email</h4><p>Just your email address — no password, no signup form, no overhead.</p></div></div>
        <div class="step-row"><div class="step-num step-num-blue">2</div><div class="step-content"><h4>Click the confirmation link</h4><p>One-click verification to confirm your address. Takes about 10 seconds.</p></div></div>
        <div class="step-row"><div class="step-num step-num-blue">3</div><div class="step-content"><h4>Start receiving submissions</h4><p>Paste the endpoint URL in your form's <code class="c-blue">action</code>. Notifications arrive instantly.</p></div></div>
      </div>
    </div>
  </div>
</section>

<!-- ─── COMPARISON ─── -->
<section class="section">
  <div class="section-inner">
    <div style="text-align:center;margin-bottom:56px;" class="reveal">
      <div class="section-label" style="justify-content:center;"><span class="label-dot" style="background:var(--muted);"></span> Compare plans</div>
      <h2 style="font-size:clamp(1.8rem,3.5vw,2.8rem);font-weight:800;letter-spacing:-1.5px;background:linear-gradient(135deg,#fff,rgba(255,255,255,0.6));-webkit-background-clip:text;background-clip:text;color:transparent;">Which one do you need?</h2>
    </div>
    <div class="compare-wrap reveal">
      <div class="compare-card compare-card-green"><h3><span style="color:var(--green);">◆</span> Core</h3><div class="compare-row"><span>Account required</span><span class="yes-green">Yes</span></div><div class="compare-row"><span>Submission storage</span><span class="yes-green">Permanent</span></div><div class="compare-row"><span>Dashboard &amp; search</span><span class="yes-green">Full</span></div><div class="compare-row"><span>CSV export</span><span class="yes-green">✓</span></div><div class="compare-row"><span>Analytics</span><span class="yes-green">✓</span></div><div class="compare-row"><span>File uploads</span><span class="yes-green">✓</span></div><div class="compare-row"><span>Email notifications</span><span class="yes-green">✓</span></div><div class="compare-row"><span>Time to setup</span><span class="yes-green">~2 min</span></div></div>
      <div class="compare-card compare-card-blue"><h3><span style="color:var(--blue);">⚡</span> Express</h3><div class="compare-row"><span>Account required</span><span class="no">No</span></div><div class="compare-row"><span>Submission storage</span><span class="no">None</span></div><div class="compare-row"><span>Dashboard &amp; search</span><span class="no">None</span></div><div class="compare-row"><span>CSV export</span><span class="no">—</span></div><div class="compare-row"><span>Analytics</span><span class="no">—</span></div><div class="compare-row"><span>File uploads</span><span class="no">—</span></div><div class="compare-row"><span>Email notifications</span><span class="yes-blue">✓</span></div><div class="compare-row"><span>Time to setup</span><span class="yes-blue">&lt;60s</span></div></div>
    </div>
  </div>
</section>

<!-- ─── BOTTOM CTA ─── -->
<section class="section" style="padding-bottom:140px;">
  <div class="section-inner">
    <div class="cta-card reveal">
      <h2>Start collecting<br><span style="background:linear-gradient(135deg,var(--green),#7fffbb,var(--blue));-webkit-background-clip:text;background-clip:text;color:transparent;">form submissions today</span></h2>
      <p>Pick the workflow that fits your project — full-featured dashboard or zero-setup notifications.</p>
      <div class="cta-btns"><a href="/core" class="btn btn-primary">Create free Core account</a><a href="/express" class="btn btn-express-cta">Try Express instantly</a></div>
    </div>
  </div>
</section>

<!-- ─── FOOTER ─── -->
<footer>
  <div class="footer-inner">
    <div class="footer-top">
      <div class="logo-wrap" style="text-decoration:none;">
        <img src="<?php echo e(asset('images/logo/000formlogo-default.png')); ?>" alt="000form Logo" style="width:auto;height:45px;"/>
      </div>
      <p style="font-size:13.5px;color:var(--muted);max-width:380px;">Form backend made so easy — just change your action URL.</p>
    </div>
    <div class="footer-bottom">
      <span class="footer-copy">© 2026 000form. A product of <a href="https://172tech.com/" target="_blank" rel="noopener noreferrer" style="color:var(--muted);text-decoration:none;"><b>172 Tech</b></a> &nbsp;·&nbsp; Designed by <a href="https://530.expert/" target="_blank" rel="noopener noreferrer" style="color:var(--muted);text-decoration:none;"><b>530 Expert</b></a> &nbsp;·&nbsp; Developed by <a href="https://essenn.associates/" target="_blank" rel="noopener noreferrer" style="color:var(--muted);text-decoration:none;"><b>ESS ENN Associates</b></a></span>
      <div class="footer-badges">
        <span class="fbadge fbadge-green">◆ Core</span>
        <span class="fbadge fbadge-blue">⚡ Express</span>
      </div>
    </div>
  </div>
</footer>

<script>
  // Bright text link navigation — redirects to section + active highlight
  // Both nav buttons stay muted (default) when in hero section or bottom sections
  const coreLink = document.getElementById('navCore');
  const expressLink = document.getElementById('navExpress');
  const coreSection = document.getElementById('core');
  const expressSection = document.getElementById('express');
  const heroSection = document.querySelector('.hero');
  
  // Get bottom sections (comparison and CTA)
  const comparisonSection = document.querySelector('.compare-wrap')?.closest('.section');
  const ctaSection = document.querySelector('.cta-card')?.closest('.section');
  const footerSection = document.querySelector('footer');

  function setActiveLink(activeIsCore) {
    if (activeIsCore) {
      coreLink.classList.add('active-link');
      expressLink.classList.remove('active-link');
    } else if (activeIsCore === false) {
      expressLink.classList.add('active-link');
      coreLink.classList.remove('active-link');
    }
  }

  function resetBothToDefault() {
    coreLink.classList.remove('active-link');
    expressLink.classList.remove('active-link');
  }

  function updateActiveFromScroll() {
    const scrollY = window.scrollY;
    const viewportHeight = window.innerHeight;
    const heroBottom = heroSection.offsetTop + heroSection.offsetHeight;
    const coreTop = coreSection.offsetTop;
    const coreBottom = coreTop + coreSection.offsetHeight;
    const expressTop = expressSection.offsetTop;
    const expressBottom = expressTop + expressSection.offsetHeight;
    
    // Get bottom sections positions
    const comparisonTop = comparisonSection ? comparisonSection.offsetTop : Infinity;
    const ctaTop = ctaSection ? ctaSection.offsetTop : Infinity;
    const footerTop = footerSection ? footerSection.offsetTop : Infinity;
    
    // The viewport center point for detection
    const viewportCenter = scrollY + viewportHeight * 0.4;
    
    // CASE 1: Hero section (top) - both default
    if (scrollY + 100 < heroBottom) {
      resetBothToDefault();
      return;
    }
    
    // CASE 2: Core section is active
    if (viewportCenter >= coreTop && viewportCenter < coreBottom) {
      setActiveLink(true);
      return;
    }
    
    // CASE 3: Express section is active (ONLY when within express bounds)
    if (viewportCenter >= expressTop && viewportCenter < expressBottom) {
      setActiveLink(false);
      return;
    }
    
    // CASE 4: Below Express section (comparison, CTA, footer) - BOTH DEFAULT (no active)
    if (viewportCenter >= expressBottom) {
      resetBothToDefault();
      return;
    }
    
    // CASE 5: Between Core bottom and Express top (overview section) - both default
    if (viewportCenter >= coreBottom && viewportCenter < expressTop) {
      resetBothToDefault();
      return;
    }
    
    // CASE 6: Default fallback - both default
    resetBothToDefault();
  }

  // Click handlers: smooth scroll + immediate visual feedback
  coreLink.addEventListener('click', (e) => {
    e.preventDefault();
    coreSection.scrollIntoView({ behavior: 'smooth' });
    setActiveLink(true);
    // Let scroll handler refine after animation completes
    setTimeout(() => updateActiveFromScroll(), 300);
    setTimeout(() => updateActiveFromScroll(), 600);
  });

  expressLink.addEventListener('click', (e) => {
    e.preventDefault();
    expressSection.scrollIntoView({ behavior: 'smooth' });
    setActiveLink(false);
    setTimeout(() => updateActiveFromScroll(), 300);
    setTimeout(() => updateActiveFromScroll(), 600);
  });

  // Throttled scroll handler for performance
  let ticking = false;
  window.addEventListener('scroll', () => {
    if (!ticking) {
      requestAnimationFrame(() => {
        updateActiveFromScroll();
        ticking = false;
      });
      ticking = true;
    }
  });
  
  window.addEventListener('resize', () => {
    updateActiveFromScroll();
  });
  
  // Initial call: both buttons default (no active)
  resetBothToDefault();
  
  // Multiple timeouts to handle any layout shifts or image loading
  setTimeout(() => updateActiveFromScroll(), 100);
  setTimeout(() => updateActiveFromScroll(), 300);
  setTimeout(() => updateActiveFromScroll(), 600);
  setTimeout(() => updateActiveFromScroll(), 1000);

  // Reveal animations
  const obs = new IntersectionObserver(entries => {
    entries.forEach(entry => { 
      if (entry.isIntersecting) entry.target.classList.add('in'); 
    });
  }, { threshold: 0.06, rootMargin: '0px 0px -30px 0px' });
  document.querySelectorAll('.reveal').forEach(el => obs.observe(el));
</script>
</body>
</html><?php /**PATH /var/www/html/000form/resources/views/pages/home.blade.php ENDPATH**/ ?>