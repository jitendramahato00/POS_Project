<!DOCTYPE html>
<html lang="hi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Premium Login Design</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      overflow: hidden;
    }

    /* 1. ADVANCED BACKGROUND (Exact Image Vibe) */
    .main-bg {
      background: radial-gradient(circle at 30% 30%, #ec4899 0%, #880e4f 50%, #e91e63 100%, #4a0424 100%);
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      overflow: hidden;
    }

    /* 2. ADVANCED SPHERES (Glass & Glow Effect) */
    .sphere {
      position: absolute;
      border-radius: 50%;
      /* कांच जैसा इफेक्ट देने के लिए multiple shadows और gradients */
      background: linear-gradient(135deg, rgba(255, 255, 255, 0.4) 0%, rgba(255, 255, 255, 0) 60%);
      box-shadow: 
        inset -15px -15px 30px rgba(0, 0, 0, 0.4), 
        inset 10px 10px 20px rgba(255, 255, 255, 0.3),
        0 20px 40px rgba(0, 0, 0, 0.4);
      backdrop-filter: blur(4px);
      z-index: 1;
      animation: float 12s infinite ease-in-out;
    }

    /* 3. SHOOTING LINES (Diagonal Shapes) */
    .line {
      position: absolute;
      width: 150px;
      height: 2px;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.6), transparent);
      transform: rotate(-45deg);
      z-index: 0;
      opacity: 0.4;
    }

    @keyframes float {
      0%, 100% { transform: translate(0, 0) scale(1); }
      50% { transform: translate(-20px, -30px) scale(1.08); }
    }

    /* 4. PREMIUM CARD DESIGN */
    .login-card {
      width: 400px;
      background: white;
      border-radius: 25px; /* थिक और स्मूथ कोटिंग */
      overflow: hidden;
      /* Heavy Shadow जैसा इमेज में है */
      box-shadow: 0 40px 100px -10px rgba(0, 0, 0, 0.6);
      z-index: 10;
      border: 1px solid rgba(255, 255, 255, 0.1);
    }

    /* 5. HEADER COLOR COLLECTION */
    .card-header {
      background: linear-gradient(180deg, #e60982 0%, #ad1457 100%);
      padding: 50px 25px;
      text-align: center;
      color: white;
      position: relative;
    }

    /* हेडर के अंदर हल्के गोले (Design Detail) */
    .card-header::before {
        content: '';
        position: absolute;
        top: -20px; right: -20px;
        width: 100px; height: 100px;
        background: rgba(255,255,255,0.05);
        border-radius: 50%;
    }

    .profile-img {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      border: 4px solid rgba(255, 255, 255, 0.2);
      margin: 0 auto 15px;
      object-fit: cover;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
      background: white;
    }

    /* 6. PILL INPUTS (Exact Magenta Style) */
    .pill-input {
      background: #e91e63 !important; /* थोड़ा गहरा पिंक जैसा इमेज में है */
      border-radius: 50px !important;
      color: white !important;
      border: none !important;
      padding-left: 55px !important;
      height: 50px;
      font-size: 14px;
      transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .pill-input::placeholder {
      color: rgba(255, 255, 255, 0.7);
      font-weight: 300;
    }

    .pill-input:focus {
        background: #e91e63 !important;
        box-shadow: 0 0 15px rgba(233, 30, 99, 0.4);
        transform: translateY(-1px);
    }

    .input-icon {
      position: absolute;
      left: 22px;
      top: 50%;
      transform: translateY(-50%);
      color: rgba(255, 255, 255, 0.9);
      font-size: 18px;
      z-index: 5;
    }

    /* 7. ADVANCED LOGIN BUTTON */
    .login-btn {
      background: linear-gradient(90deg, #e91e63, #d81b60);
      border-radius: 50px;
      padding: 12px 45px !important;
      transition: 0.4s all;
      text-transform: uppercase;
      font-weight: 700;
      letter-spacing: 1.5px;
      box-shadow: 0 8px 20px rgba(173, 20, 87, 0.3);
    }

    .login-btn:hover {
      background: linear-gradient(90deg, #880e4f, #ad1457);
      transform: scale(1.05) translateY(-2px);
      box-shadow: 0 12px 25px rgba(173, 20, 87, 0.4);
    }

    /* Links Style */
    .accent-pink-600 { accent-color: #d81b60; }
</style>
</head>

<body>

  <div class="main-bg">
    <!-- Background Decor -->
    <div class="sphere" style="width:150px; height:150px; top:10%; left:10%;"></div>
    <div class="sphere" style="width:80px; height:80px; bottom:15%; right:15%;"></div>
    <div class="sphere" style="width:50px; height:50px; top:40%; right:20%;"></div>
    <div class="sphere" style="width:120px; height:120px; bottom:25%; left:25%;"></div>
   

    <div class="line" style="top:20%; left:30%;"></div>
    <div class="line" style="bottom:30%; right:40%;"></div>
    <div class="line" style="top:50%; right:10%;"></div>
    <div class="line" style="bottom:10%; left:50%;"></div>

    <!-- Login Card -->
    <div class="login-card">
      <!-- Top Side (Pink Gradient) -->
      <div class="card-header">
        <img src="https://i.pravatar.cc/150?u=female" alt="User" class="profile-img">
        <h2 class="text-xl font-bold">Welcome to the website</h2>
        <p class="text-xs opacity-70 mt-2 px-4 leading-relaxed">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed diam nonummy nibh.
        </p>
      </div>

      <!-- Bottom Side (Pure White) -->
      <div class="p-8">
        <h3 class="text-center text-sm font-bold text-slate-500 uppercase tracking-widest mb-8">User Login</h3>

        <form action="<?php echo e(route('login')); ?>" method="POST" class="space-y-5">
          <?php echo csrf_field(); ?>

          <!-- Username Input -->
          <div class="relative">
            <span class="input-icon">👤</span>
            <input type="text" name="email" class="pill-input w-full py-3.5 outline-none" placeholder="Username">
          </div>

          <!-- Password Input -->
          <div class="relative">
            <span class="input-icon">🔒</span>
            <input type="password" name="password" class="pill-input w-full py-3.5 outline-none" placeholder="Password">
          </div>

          <!-- Options Section -->
          <div class="flex items-center justify-between text-[10px] text-gray-400 px-2">
            <label class="flex items-center cursor-pointer">
              <input type="checkbox" class="mr-1 accent-pink-600"> Remember me
            </label>

            <!-- Forgot Password with Arrow जैसा आपने माँगा था -->
            <a href="#" class="flex items-center hover:text-pink-600 transition">
              Forgot Password <span class="ml-1">➔</span>
            </a>
          </div>

          <!-- Login Button -->
          <div class="text-center pt-4">
            <button type="submit" class="login-btn px-10 py-2.5 text-white text-sm shadow-lg">
              Login
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>

</html>
















<!-- <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="/css/master.css">
    <link rel="icon" href="<?php echo e(asset('images/' . ($app_settings->favicon ?? 'favicon.ico'))); ?>">
    <title><?php echo e($app_settings->app_name ?? 'Stocky | Ultimate Inventory With POS'); ?></title>

    <style>
      :root {
        color-scheme: light;
        font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        --surface: #ffffff;
        --primary: #4c44ec;
        --primary-dark: #312fab;
        --primary-soft: rgba(76,68,236,0.12);
        --text: #1f2937;
        --text-muted: #6b7280;
        --border: #e5e7eb;
        --danger: #ef4444;
        --danger-soft: rgba(239,68,68,0.10);
        --danger-border: rgba(239,68,68,0.35);
        --success: #16a34a;
        --success-soft: rgba(22,163,74,0.10);
        --success-border: rgba(22,163,74,0.35);
      }

      *, *::before, *::after { box-sizing: border-box; }
      body {
        margin: 0;
        background: linear-gradient(120deg, #f2ebff 0%, #f3f3ff 40%, #f3e8ff 100%);
        color: var(--text);
        overflow-x: hidden;
      }

      /* MAIN GRID */
      .auth-page {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        min-height: 100dvh;
      }

      /* HERO SIDE */
      .auth-hero {
        background: linear-gradient(140deg, #7a4dff 0%, #6237ff 45%, #4f2bf8 100%);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        padding: 80px clamp(40px, 8vw, 100px);
      }

      .hero-content {
        max-width: 440px;
        display: grid;
        gap: 1rem;
        text-align: left;
      }

      .hero-title {
        font-size: clamp(1.8rem, 4vw, 2.8rem);
        font-weight: 700;
        margin: 0;
      }

      .hero-subtitle {
        font-size: clamp(0.9rem, 2vw, 1rem);
        color: rgba(255,255,255,0.85);
        line-height: 1.6;
      }

      /* PANEL SIDE */
      .auth-panel {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: clamp(2rem, 6vw, 5rem);
      }

      .auth-panel-inner {
        background: var(--surface);
        border-radius: 24px;
        width: 100%;
        max-width: 420px;
        padding: clamp(1.5rem, 4vw, 3rem);
        box-shadow: 0 18px 36px -12px rgba(0,0,0,0.1);
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
      }

      .panel-title {
        font-size: clamp(1.5rem, 5vw, 1.9rem);
        margin: 0;
      }

      .panel-subtitle {
        font-size: clamp(0.85rem, 3vw, 0.95rem);
        color: var(--text-muted);
        line-height: 1.6;
        margin: 0;
      }

      /* FORM FIELDS */
      form { display: grid; gap: 1rem; }
      .field { display: grid; gap: 0.5rem; }

      .input-shell {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        border: 1px solid var(--border);
        border-radius: 999px;
        padding: 0 1rem;
        background: #f9fafb;
      }

      .input-shell input {
        flex: 1;
        border: none;
        background: transparent;
        padding: 0.8rem 0;
        font-size: 1rem;
      }

      .input-shell input:focus {
        outline: none;
      }

      .toggle-password {
        border: none;
        background: none;
        color: var(--primary);
        font-size: 0.8rem;
        cursor: pointer;
      }

      .auth-btn {
        padding: 0.9rem;
        border-radius: 999px;
        border: none;
        background: linear-gradient(135deg, #7c3aed, #4f46e5);
        color: #fff;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
      }

      .auth-btn:hover { filter: brightness(1.05); }

      .auth-link {
        color: var(--primary);
        text-decoration: none;
        font-weight: 600;
      }

      .auth-link:hover { text-decoration: underline; }

      .form-meta {
        display: flex;
        justify-content: flex-end;
        flex-wrap: wrap;
        font-size: 0.85rem;
        gap: 0.5rem;
      }

      /* RESPONSIVE */
      @media (max-width: 1024px) {
        .auth-page {
          grid-template-columns: 1fr;
        }
        .auth-hero { display: none; }
      }

      @media (max-width: 768px) {
        .auth-panel { padding: 2rem; }
        .auth-panel-inner { padding: 1.5rem; border-radius: 20px; }
      }

      @media (max-width: 480px) {
        body { background: #f9f9ff; }
        .auth-panel { padding: 1.25rem; }
        .auth-panel-inner {
          max-width: 100%;
          border-radius: 18px;
          padding: 1.25rem;
          gap: 1.2rem;
        }
        .panel-title { font-size: 1.4rem; }
        .panel-subtitle { font-size: 0.8rem; }
        .input-shell input { font-size: 0.9rem; padding: 0.75rem 0; }
        .auth-btn { font-size: 0.95rem; padding: 0.8rem; }
      }

      @media (max-width: 360px) {
        .auth-panel-inner {
          padding: 1rem;
          border-radius: 14px;
          gap: 1rem;
        }
        .panel-title { font-size: 1.2rem; }
        .auth-btn { font-size: 0.9rem; width: 100%; }
      }

      /* Alerts */
    .auth-alert{
      padding: 0.875rem 1rem;
      border-radius: 12px;
      border: 1px solid var(--border);
      font-size: 0.95rem;
      line-height: 1.5;
      background: #fff;
      margin: 0.75rem 0;
    }
    .auth-alert ul{ margin: 0; padding-left: 1.1rem; }
    .auth-alert.error{
      background: var(--danger-soft);
      border-color: var(--danger-border);
      color: #991b1b; /* dark red text for contrast */
    }
    .auth-alert.success{
      background: var(--success-soft);
      border-color: var(--success-border);
      color: #065f46;
    }

    </style>
  </head>

  <body>
    <div class="auth-page">
      <section class="auth-hero">
        <div class="hero-content">
          <h1 class="hero-title"><?php echo e($app_settings->login_hero_title ?? 'Welcome back!'); ?></h1>
          <p class="hero-subtitle">
            <?php echo e($app_settings->login_hero_subtitle ?? 'Sign in to access your account and keep your operations in sync.'); ?>

          </p>
        </div>
      </section>

      <section class="auth-panel">
        <div class="auth-panel-inner">
          <header>
            <h2 class="panel-title"><?php echo e($app_settings->login_panel_title ?? 'Sign In'); ?></h2>
            <p class="panel-subtitle">
              <?php echo e($app_settings->login_panel_subtitle ?? 'Access your dashboard and manage everything from one place.'); ?>

            </p>
          </header>

          <?php if(session('status')): ?>
          <div class="auth-alert success"><?php echo e(session('status')); ?></div>
          <?php endif; ?>

          <?php if($errors->any()): ?>
          <div class="auth-alert error">
            <ul>
              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><?php echo e($error); ?></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          </div>
          <?php endif; ?>

          <form id="login_form" method="POST" action="<?php echo e(route('login')); ?>">
            <?php echo csrf_field(); ?>
            <div class="field">
              <label for="email">Email</label>
              <div class="input-shell">
                <span class="input-addon">@</span>
                <input id="email" type="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="you@company.com" required />
              </div>
            </div>

            <div class="field">
              <label for="password">Password</label>
              <div class="input-shell">
                <span class="input-addon">••</span>
                <input id="password" type="password" name="password" placeholder="Enter your password" required />
                <button type="button" class="toggle-password" data-target="password">Show</button>
              </div>
            </div>

            <div class="form-meta">
              <a class="auth-link" href="<?php echo e(route('password.request')); ?>">Forgot password?</a>
            </div>

            <button type="submit" class="auth-btn" id="login_submit_btn">
              <span class="btn-text">Sign In</span>
              <span class="btn-loading" style="display:none"><span class="spinner"></span>Verifying</span>
            </button>
          </form>
        </div>
      </section>
    </div>

    <script>
      (function() {
        const form = document.getElementById('login_form');
        const submitBtn = document.getElementById('login_submit_btn');
        const showButtons = document.querySelectorAll('.toggle-password');

        showButtons.forEach(btn => {
          btn.addEventListener('click', () => {
            const target = document.getElementById(btn.dataset.target);
            const isHidden = target.type === 'password';
            target.type = isHidden ? 'text' : 'password';
            btn.textContent = isHidden ? 'Hide' : 'Show';
          });
        });

        if (!form) return;
        let submitted = false;
        const btnText = submitBtn.querySelector('.btn-text');
        const btnLoading = submitBtn.querySelector('.btn-loading');
        form.addEventListener('submit', () => {
          if (submitted) return;
          submitted = true;
          submitBtn.disabled = true;
          btnText.style.display = 'none';
          btnLoading.style.display = 'inline-flex';
        });
      })();
    </script>
  </body>
</html> --><?php /**PATH C:\laragon\www\c\resources\views/auth/login.blade.php ENDPATH**/ ?>