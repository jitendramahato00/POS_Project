@extends('layouts.store')

@section('content')

@php
  /** @var \App\Models\StoreSetting $s */
  $currency      = $s->currency_code ?? '$';
  $nlBtn         = __('messages.Subscribe');

  /** @var \Illuminate\Support\Collection $banners */
  $byPos         = collect($banners ?? [])->groupBy('position');
  $printedCenter = false;

  $renderBanners = function($list) {
      foreach ($list ?? collect() as $b) {
          $src  = $b->image_url ?? ($b->image ? asset($b->image) : asset('images/brands/no-image.png'));
          $href = $b->link ?: route('store.shop');
          echo '<a href="'.e($href).'" class="d-block"><img src="'.e($src).'" class="img-fluid rounded-4 shadow-sm w-100" alt="'.e($b->title ?? __('messages.Banner')).'"></a>';
      }
  };
@endphp

{{-- ===== TOP BANNERS ===== --}}
@if(($byPos['top_left'] ?? collect())->count() || ($byPos['top_right'] ?? collect())->count())
  <section class="py-4">
    <div class="container">
      <div class="row g-3">
        <div class="col-12 col-lg-6">{!! $renderBanners($byPos['top_left'] ?? collect()) !!}</div>
        <div class="col-12 col-lg-6">{!! $renderBanners($byPos['top_right'] ?? collect()) !!}</div>
      </div>
    </div>
  </section>
@endif

@forelse($blocks as $block)
  @switch($block['type'])

    {{-- ===== UPDATED FULL SCREEN HERO SECTION ===== --}}
    @case('hero')
      @php
          $heroImg = $block['image'] ?? $s->hero_image_path;
          $localFallback = public_path('store_files/hero_image.jpg');
          $heroUrl = null;

          if ($heroImg && file_exists(public_path($heroImg))) {
              $heroUrl = asset($heroImg);
          } elseif (file_exists($localFallback)) {
              $heroUrl = asset('store_files/hero_image.jpg');
          } else {
              $heroUrl = 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?q=80&w=1920';
          }
      @endphp

      <section class="hero-full-screen" style="background-image: url('{{ $heroUrl }}');">
        <div class="hero-overlay"></div>
        <div class="container hero-content-wrapper">
          <div class="text-center hero-inner">
              <h1 class="display-3 fw-bold text-white mb-3 animate-up">{{ $block['title'] ?? $s->hero_title }}</h1>
              <p class="lead text-white-50 mb-5 fs-4 animate-up-delay">{{ $block['subtitle'] ?? $s->hero_subtitle }}</p>
              <div class="animate-up-delay-2">
                <a href="{{ route('store.shop') }}" class="btn btn-primary btn-lg px-5 py-3 rounded-pill fw-bold shadow-lg">
                  <i class="bi bi-lightning-charge"></i> {{ __('messages.ShopNow') }}
                </a>
              </div>
          </div>
        </div>
      </section>

      @if(!$printedCenter && ( ($byPos['center_left'] ?? collect())->count() || ($byPos['center_right'] ?? collect())->count() ))
        <section class="py-4">
          <div class="container">
            <div class="row g-3">
              <div class="col-12 col-lg-6">{!! $renderBanners($byPos['center_left'] ?? collect()) !!}</div>
              <div class="col-12 col-lg-6">{!! $renderBanners($byPos['center_right'] ?? collect()) !!}</div>
            </div>
          </div>
        </section>
        @php $printedCenter = true; @endphp
      @endif
      @break

    {{-- ===== COLLECTION GRID ===== --}}
    @case('collection')
      {{-- ... (Collection ka code same rahega jo aapne bheja hai) ... --}}
      @php
        $col   = $block['collection'];
        $prods = $block['products'] ?? collect();
        $title = $block['title'] ?? ($col->title ?? $col->name ?? __('messages.Collection'));
      @endphp

      @if($prods->count())
      <section class="py-5">
        <div class="container">
          <div class="d-flex align-items-center justify-content-between mb-3">
            <h3 class="mb-0">{{ $title }}</h3>
            <a class="btn btn-sm btn-outline-primary" href="{{ route('store.shop', ['collection' => $col->slug]) }}">
              {{ __('messages.ViewAll') }}
            </a>
          </div>
          <div class="row g-4">
            @foreach($prods as $p)
              {{-- Product Card rendering logic --}}
              <div class="col-12 col-sm-6 col-lg-3">
                {{-- (Product Card UI same as before) --}}
                @php
                  $imgUrl = $p->image ? asset('images/products/' . $p->image) : asset('images/products/no-image.png');
                  $minPrice = (float) ($p->display_price ?? ($p->price ?? 0));
                  $variants = collect($p->variants ?? []);
                  $variantPayload = $variants->map(function($v) use ($currency) {
                      $final = (float) ($v->display_price ?? ($v->price ?? 0));
                      return [
                          'id' => $v->id, 'name' => $v->name, 'price' => $final,
                          'display_price_formatted' => $currency . number_format($final, 2),
                          'image' => !empty($v->image) ? asset('images/products/' . $v->image) : null,
                      ];
                  });
                @endphp
                <div class="card product-card border-0 rounded-4 shadow-sm h-100">
                  <div class="product-media ratio ratio-1x1 rounded-top-4 overflow-hidden">
                    <img src="{{ $imgUrl }}" class="img-cover">
                  </div>
                  <div class="card-body p-3 text-center">
                    <h6 class="product-title text-truncate mb-1">{{ $p->name }}</h6>
                    <div class="product-price fw-bold text-primary">{{ $currency }}{{ number_format($minPrice, 2) }}</div>
                    <button class="btn btn-sm btn-dark w-100 mt-2 js-add-to-cart" data-id="{{ $p->id }}" data-name="{{ e($p->name) }}" data-price="{{ $minPrice }}" data-image="{{ $imgUrl }}">Add to Cart</button>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </section>
      @endif
      @break

    {{-- ===== NEWSLETTER ===== --}}
    @case('newsletter')
      {{-- Newsletter code same as before --}}
      <section class="py-5">
        <div class="container">
           <div class="p-5 border rounded-4 text-center" style="background: #f8f9fa;">
              <h3>{{ $s->newsletter_title ?? 'Subscribe to our Newsletter' }}</h3>
              <p class="text-muted">{{ $s->newsletter_subtitle ?? 'Get the latest updates directly in your inbox' }}</p>
              <form id="newsletterForm" class="d-flex gap-2 justify-content-center mt-4">
                  <input type="email" name="email" class="form-control w-50" placeholder="your@email.com" required>
                  <button class="btn btn-primary px-4" type="submit">{{ $nlBtn }}</button>
              </form>
           </div>
        </div>
      </section>
      @break

  @endswitch
@empty
    {{-- Fallback center banners if needed --}}
@endforelse

{{-- ===== CUSTOM STYLES FOR FULL SCREEN HERO ===== --}}
<style>
  .hero-full-screen {
    position: relative;
    width: 100%;
    height: 100vh; /* Full Viewport Height */
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: -100px; /* Layout navbar ki height ke hisaab se adjust karein */
    overflow: hidden;
  }

  .hero-overlay {
    position: absolute;
    top: 0; left: 0; width: 100%; height: 100%;
    background: rgba(0, 0, 0, 0.5); /* 50% dark overlay for readability */
    z-index: 1;
  }

  .hero-content-wrapper {
    position: relative;
    z-index: 2;
  }

  .hero-inner {
    max-width: 800px;
    margin: 0 auto;
  }

  /* Animations */
  .animate-up { animation: fadeInUp 0.8s ease-out; }
  .animate-up-delay { animation: fadeInUp 1s ease-out both; animation-delay: 0.2s; }
  .animate-up-delay-2 { animation: fadeInUp 1.2s ease-out both; animation-delay: 0.4s; }

  @keyframes fadeInUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
  }

  @media (max-width: 768px) {
    .hero-full-screen { height: 70vh; margin-top: 0; }
    .hero-full-screen h1 { font-size: 2.5rem; }
  }
</style>

@endsection