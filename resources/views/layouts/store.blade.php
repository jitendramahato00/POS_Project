{{-- resources/views/layouts/store.blade.php --}}
@php
  use Illuminate\Support\Str;

  $primaryColor   = $s->primary_color   ?? '#e91e63'; 
  $secondaryColor = $s->secondary_color ?? '#1a1a1a'; 
  $storeName      = $s->store_name      ?? 'ONLINE SHOP';
  $currency       = $s->currency_code   ?? '$';

  $client      = Auth::guard('store')->user();
  $loginUrl    = url('/online_store/login');
  $registerUrl = url('/online_store/register');

  $cssBootstrap      = asset('store_files/css/bootstrap.min.css');
  $cssBootstrapIcons = asset('store_files/css/bootstrap-icons.css');
  $jsBootstrap       = asset('store_files/js/bootstrap.bundle.min.js');
@endphp

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>{{ $s->seo_meta_title ?? $storeName }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="currency" content="{{ $currency }}">
  
  <link href="{{ $cssBootstrap }}" rel="stylesheet">
  <link href="{{ $cssBootstrapIcons }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">

  <style>
    :root { 
      --brand-main: {{ $primaryColor }}; 
      --brand-top: {{ $secondaryColor }};
    }
    body { font-family: 'Poppins', sans-serif; background: #f8f9fa; margin: 0; padding: 0; }

    /* --- SMART HEADER ANIMATION --- */
    #main-header { position: relative; width: 100%; z-index: 1050; transition: transform 0.4s ease; }
    .header-up .header-top { margin-top: -85px; opacity: 0; visibility: hidden; }

    /* --- TOP HEADER FIX --- */
    .header-top { 
      background: linear-gradient(135deg, var(--brand-top) 0%, #333 100%);
      padding: 15px 0; border-bottom: 2px solid var(--brand-main); color: #fff;
      transition: all 0.3s ease;
    }
    .logo-container { display: flex; align-items: center; text-decoration: none; }
    .logo-online { background: var(--brand-main); color: #fff; padding: 4px 12px; font-weight: 800; font-size: 1.6rem; border-radius: 4px 0 0 4px; }
    .logo-shop { background: #fff; color: #000; padding: 4px 12px; font-weight: 800; font-size: 1.6rem; border-radius: 0 4px 4px 0; }

    /* Search Bar Fix */
    .search-wrapper { position: relative; width: 100%; max-width: 400px; }
    .search-wrapper .form-control { 
        border-radius: 50px; border: none; padding: 8px 20px; 
        background: rgba(255,255,255,0.15); color: #fff; font-size: 0.9rem;
    }
    .search-wrapper .form-control::placeholder { color: #ccc; }
    .search-wrapper button { 
        position: absolute; right: 4px; top: 4px; border-radius: 50px; 
        background: var(--brand-main); border: none; padding: 4px 15px; color: #fff; 
    }

    /* --- PINK NAVBAR (Height & Alignment Fix) --- */
    .header-bottom { 
      background: var(--brand-pink, var(--brand-main)); 
      padding: 5px 0; 
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      position: sticky; top: 0; z-index: 1040;
    }
    .nav-link-custom { 
        color: #fff !important; font-size: 0.95rem; font-weight: 700; 
        padding: 15px 20px !important; text-transform: uppercase; 
    }
    .nav-link-custom:hover { background: rgba(0,0,0,0.1); border-radius: 5px; }

    /* Cart Button Fix */
    .cart-btn { 
        background: #fff; border-radius: 50px; padding: 8px 22px; 
        color: #000; text-decoration: none; font-weight: 800; 
        display: flex; align-items: center; gap: 8px; transition: 0.3s;
    }
    .cart-btn:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(0,0,0,0.2); color: #000; }
    .cart-badge { background: var(--brand-main); color: white; padding: 3px 8px; font-size: 0.8rem; }

    /* Auth Links */
    .auth-area a { font-size: 0.85rem; letter-spacing: 0.5px; transition: 0.3s; }
    .auth-area a:hover { color: var(--brand-main) !important; }

    #page-loader { transition: opacity .3s ease; z-index: 9999; }
    #page-loader.hidden { opacity: 0; pointer-events: none; }

    @media (max-width: 991px) {
        .logo-online, .logo-shop { font-size: 1.2rem; }
        .search-wrapper { max-width: 100%; margin: 10px 0; }
        .header-top .container { flex-direction: column; gap: 10px; }
    }
  </style>
</head>
<body>

  <!-- Loader -->
  <div id="page-loader" class="d-flex justify-content-center align-items-center position-fixed top-0 start-0 w-100 h-100 bg-white">
      <div class="spinner-border text-danger" role="status"></div>
  </div>

  <header id="main-header">
    {{-- TOP SECTION --}}
    <div class="header-top">
      <div class="container d-flex align-items-center justify-content-between">
        <!-- Logo -->
        <a href="{{ route('store.index') }}" class="logo-container">
          <span class="logo-online">ONLINE</span>
          <span class="logo-shop">SHOP</span>
        </a>

<<<<<<< Updated upstream
        <!-- Search Bar (Centered) -->
        <div class="search-wrapper d-none d-lg-block">
          <form action="{{ route('store.shop') }}" method="GET">
            <input type="text" name="search" class="form-control" placeholder="Search for products...">
            <button type="submit"><i class="bi bi-search"></i></button>
          </form>
        </div>
=======
  {{-- Navbar --}}
  <nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top">
    <div class="container">
      <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ route('store.index') }}">
        @if(!empty($s->logo_path))
          <img src="{{ $assetPath($s->logo_path) }}" alt="{{ $s->store_name ?? __('messages.Store') }}" height="32" class="me-2">
        @endif
        <span class="text-primary">{{ $s->store_name ?? __('messages.Store') }}</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navMain">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('store.index') }}">{{ __('messages.Home') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('store.shop') }}">{{ __('messages.Shop') }}</a>
          </li>

          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="langDropdown" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            🌐 {{ strtoupper(app()->getLocale()) }}
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="langDropdown">
            <li><a class="dropdown-item" href="{{ route('lang.switch', 'en') }}">English</a></li>
          
          </ul>
        </li>

        </ul>

        {{-- Account (right side) --}}
        <div class="d-flex align-items-center gap-2 ms-lg-3 mt-3 mt-lg-0">
>>>>>>> Stashed changes

        <!-- Auth Links -->
        <div class="auth-area d-flex align-items-center gap-3">
          @if($client)
             <a href="{{ url('/online_store/account') }}" class="text-white text-decoration-none fw-bold small"><i class="bi bi-person-circle"></i> ACCOUNT</a>
          @else
            <a href="{{ $loginUrl }}" class="text-white text-decoration-none fw-bold small pe-2 border-end border-secondary">LOGIN</a>
            <a href="{{ $registerUrl }}" class="text-white text-decoration-none fw-bold small">REGISTER</a>
          @endif
        </div>
      </div>
    </div>

    {{-- BOTTOM SECTION (Pink Nav) --}}
    <nav class="navbar navbar-expand-lg header-bottom">
      <div class="container">
        <button class="navbar-toggler text-white border-white" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
          <i class="bi bi-list fs-1"></i>
        </button>

        <div class="collapse navbar-collapse" id="navMain">
          <ul class="navbar-nav me-auto">
            <li class="nav-item"><a class="nav-link nav-link-custom" href="{{ route('store.index') }}">HOME</a></li>
            
            @if(isset($categories))
              @foreach($categories as $category)
                <li class="nav-item dropdown">
                  <a class="nav-link nav-link-custom dropdown-toggle" href="#" data-bs-toggle="dropdown">{{ $category->name }}</a>
                  @if($category->subcategories)
                    <ul class="dropdown-menu shadow border-0">
                      @foreach($category->subcategories as $sub)
                        <li><a class="dropdown-item fw-bold" href="{{ route('store.shop', ['sub_category' => $sub->slug]) }}">{{ $sub->name }}</a></li>
                      @endforeach
                    </ul>
                  @endif
                </li>
              @endforeach
            @endif
          </ul>

          <!-- My Cart Button -->
          <div class="py-2 py-lg-0">
            <a href="javascript:void(0)" class="cart-btn shadow-sm" data-bs-toggle="offcanvas" data-bs-target="#miniCart">
              <i class="bi bi-cart3 fs-5"></i>
              <span class="small">MY CART</span>
              <span id="cart-badge" class="badge rounded-pill cart-badge">0</span>
            </a>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <main>
    @yield('content')
  </main>

  <script src="{{ $jsBootstrap }}"></script>
  <script>
    // Loader logic
    window.addEventListener("load", () => {
      const loader = document.getElementById("page-loader");
      if (loader) { loader.classList.add("hidden"); setTimeout(() => loader.style.display="none", 300); }
    });

    // Smart Scroll logic
    let lastScrollTop = 0;
    const header = document.getElementById('main-header');
    window.addEventListener('scroll', () => {
      let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
      if (scrollTop > 100) {
        if (scrollTop > lastScrollTop) header.classList.add('header-up');
        else header.classList.remove('header-up');
      } else { header.classList.remove('header-up'); }
      lastScrollTop = scrollTop;
    });
  </script>
</body>
</html>