@props(['settings'])
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>RS ASA BUNDA</title>
  <meta name="description" content="{{ optional($settings)->description ?? '' }}">
  <meta name="keywords" content="">

  <link href="{{ asset('favicon.ico') }}" rel="icon">
  <link href="{{ asset('favicon.ico') }}" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
    rel="stylesheet">

  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('css/empty-states.css') }}" rel="stylesheet">
  <link href="{{ asset('css/doctors-carousel.css') }}" rel="stylesheet">
  <link href="{{ asset('css/departments-carousel.css') }}" rel="stylesheet">

  <style>
    @media (min-width: 1200px) {
      .container, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
        max-width: 1080px;
      }
    }
    @media (min-width: 1400px) {
      .container, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
        max-width: 1240px;
      }
    }

    .topbar-btn {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 4px 12px;
      border-radius: 50px;
      font-size: 13px;
      font-weight: 600;
      text-decoration: none;
      transition: all 0.3s ease;
      white-space: nowrap;
    }

    .rs-btn {
      background: rgba(255, 255, 255, 0.15);
      color: #fff !important;
      border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .rs-btn:hover {
      background: #fff;
      color: var(--accent-color) !important;
    }

    .igd-btn {
      background: #dc3545;
      color: #fff !important;
      border: 1px solid #dc3545;
      box-shadow: 0 2px 10px rgba(220, 53, 69, 0.3);
    }

    .igd-btn:hover {
      background: #bb2d3b;
      border-color: #b02a37;
      transform: translateY(-1px);
    }

    .wa-btn {
      background: #25D366;
      color: #fff !important;
      border: 1px solid #25D366;
      box-shadow: 0 2px 10px rgba(37, 211, 102, 0.3);
    }

    .wa-btn:hover {
      background: #20BD5A;
      border-color: #20BD5A;
      transform: translateY(-1px);
    }

    .topbar {
      height: 50px;
      transition: all 0.3s ease;
    }

    .scrolled .header {
      padding: 0 !important;
      margin: 0 !important;
      top: 0 !important;
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      box-shadow: 0 4px 30px rgba(0, 0, 0, 0.05);
    }

    .scrolled .topbar {
      display: none !important;
      height: 0 !important;
      padding: 0 !important;
      margin: 0 !important;
    }

    .scrolled .branding {
      min-height: unset !important;
      padding: 10px 0 !important;
    }

    .scrolled .header .logo img {
      max-height: 48px !important;
    }

    @media (max-width: 991px) {
      .scrolled .branding {
        padding: 5px 0 !important;
      }
      .scrolled .header .logo img {
        max-height: 40px !important;
      }
      .scrolled .mobile-nav-toggle {
        font-size: 28px !important;
      }
    }

    @media (max-width: 768px) {
      .topbar {
        height: auto !important;
        padding: 6px 0;
      }
      
      .container {
        padding-left: 20px !important;
        padding-right: 20px !important;
      }
      
      .topbar .container {
        padding-left: 20px !important;
        padding-right: 20px !important;
      }
      
      .contact-info {
        width: 100%;
        justify-content: center !important;
        flex-wrap: wrap;
        overflow-x: visible;
        white-space: normal;
        padding-bottom: 2px;
        gap: 5px !important;
      }
      
      .contact-info::-webkit-scrollbar {
        display: none;
      }

      .topbar-btn {
        padding: 4px 8px;
        font-size: 10px;
        flex-shrink: 0;
        margin-bottom: 2px;
      }
      
      /* Reset margins as we are wrapping */
      .contact-info > *:first-child {
        margin-left: 0; 
      }
      
      .contact-info > *:last-child {
        margin-right: 0;
      }
    }

    .scrolled .navmenu a {
      font-size: 14px;
      padding: 8px 15px;
    }

    .footer-social-links .social-link {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: rgba(var(--accent-color-rgb), 0.1);
      color: var(--accent-color);
      font-size: 18px;
      transition: all 0.3s ease;
    }

    .footer-social-links .social-link:hover {
      background: var(--accent-color);
      color: #fff;
      transform: translateY(-3px);
    }

    .text-accent {
      color: var(--accent-color) !important;
    }


    /* Footer Elegance */
    .footer-title, .nav-column h6 {
      font-weight: 700 !important;
      letter-spacing: 0.5px;
      text-transform: uppercase;
      font-size: 0.85rem !important;
      color: var(--heading-color);
      position: relative;
      margin-bottom: 25px;
    }

    .footer-title::after, .nav-column h6::after {
      content: '';
      position: absolute;
      left: 0;
      bottom: -8px;
      width: 30px;
      height: 2px;
      background: var(--accent-color);
      border-radius: 2px;
    }

    .footer-nav a {
      font-size: 0.95rem !important;
      padding: 5px 0;
      display: block;
      color: color-mix(in srgb, var(--default-color), transparent 20%);
      transition: all 0.3s ease;
    }

    .footer-nav a:hover {
      color: var(--accent-color);
      padding-left: 5px;
    }

    @media (max-width: 991px) {
      .footer-main .row > div {
        text-align: left;
      }
      .footer-title::after, .nav-column h6::after {
        left: 0;
        transform: none;
      }
      .brand-section, .contact-info, .footer-nav-wrapper {
        padding: 10px 0;
      }
      .footer-social-links {
        justify-content: flex-start;
      }
      .footer-social-links {
        margin-bottom: 20px;
      }
    }

    /* Mobile Bottom Tab Menu */
    .mobile-nav-tabs {
      display: none;
      position: fixed;
      bottom: 0;
      left: 0;
      right: 0;
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      box-shadow: 0 -2px 20px rgba(0, 0, 0, 0.1);
      z-index: 1000;
      padding: 10px 0;
      border-top: 1px solid rgba(0,0,0,0.05);
    }

    .mobile-nav-tabs .nav-tab {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      color: #6c757d;
      text-decoration: none;
      font-size: 11px;
      font-weight: 500;
      transition: all 0.3s ease;
      flex: 1;
    }

    .mobile-nav-tabs .nav-tab i {
      font-size: 20px;
      margin-bottom: 4px;
    }

    .mobile-nav-tabs .nav-tab.active {
      color: var(--accent-color);
    }

    .mobile-nav-tabs .nav-tab.active i {
      transform: translateY(-2px);
    }

    @media (max-width: 991px) {
      .mobile-nav-tabs {
        display: flex;
      }
      body {
        padding-bottom: 70px; 
      }
      .scroll-top {
        bottom: 85px !important; 
      }

      .mobile-nav-active .navmenu {
        background: rgba(255, 255, 255, 0.98) !important;
        backdrop-filter: blur(15px) !important;
        -webkit-backdrop-filter: blur(15px) !important;
        display: flex !important;
        align-items: center;
        justify-content: center;
        position: fixed !important;
        inset: 0 !important;
        z-index: 99999 !important;
      }

      .mobile-nav-active .navmenu > ul {
        background: transparent !important;
        border: none !important;
        box-shadow: none !important;
        position: static !important;
        width: 100%;
        padding: 40px 20px !important;
        text-align: center;
      }

      .mobile-nav-active .navmenu ul li {
        opacity: 0;
        transform: translateY(20px);
        animation: mobileNavFadeIn 0.4s forwards;
      }

      @keyframes mobileNavFadeIn {
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }

      .mobile-nav-active .navmenu ul li:nth-child(1) { animation-delay: 0.1s; }
      .mobile-nav-active .navmenu ul li:nth-child(2) { animation-delay: 0.15s; }
      .mobile-nav-active .navmenu ul li:nth-child(3) { animation-delay: 0.2s; }
      .mobile-nav-active .navmenu ul li:nth-child(4) { animation-delay: 0.25s; }
      .mobile-nav-active .navmenu ul li:nth-child(5) { animation-delay: 0.3s; }
      .mobile-nav-active .navmenu ul li:nth-child(6) { animation-delay: 0.35s; }
      .mobile-nav-active .navmenu ul li:nth-child(n+7) { animation-delay: 0.4s; }

      .mobile-nav-active .navmenu ul li a {
        color: #333 !important;
        font-size: 1.3rem !important;
        font-weight: 700 !important;
        padding: 15px 10px !important;
        border-bottom: 1px solid rgba(0,0,0,0.05);
        display: flex !important;
        align-items: center;
        justify-content: space-between !important;
        transition: all 0.3s ease;
        text-align: left;
      }

      .mobile-nav-active .navmenu ul li a i {
        font-size: 1.2rem !important;
        margin-left: 10px;
        color: #999;
      }

      .mobile-nav-active .navmenu ul li a.active {
        color: var(--accent-color) !important;
      }

      .mobile-nav-active .navmenu ul li a:hover {
        letter-spacing: 1px;
        color: var(--accent-color) !important;
      }

      .mobile-nav-active .mobile-nav-toggle {
        color: #333 !important;
        font-size: 36px !important;
        top: 25px !important;
        right: 25px !important;
      }
      
      .mobile-nav-active .topbar {
        display: none !important;
      }

      .mobile-nav-active .navmenu::before {
        content: '';
        position: absolute;
        top: 25px;
        left: 25px;
        width: 150px;
        height: 50px;
        background-image: url('{{ optional($settings)->logo ? asset("storage/" . $settings->logo) : asset("logo-header.svg") }}');
        background-size: contain;
        background-repeat: no-repeat;
        background-position: left center;
        z-index: 10000;
      }

      .mobile-nav-active, .mobile-nav-active #header {
        overflow: visible !important;
      }

      .mobile-nav-active #header {
        z-index: 99999 !important;
        height: 100vh !important;
        background: none !important;
        box-shadow: none !important;
        border: none !important;
      }

      .mobile-nav-active .header .branding,
      .mobile-nav-active .header .container {
        position: static !important;
      }
    }
  </style>
</head>

<body class="index-page">

  <header id="header" class="header fixed-top">

    <div class="topbar d-flex align-items-center dark-background">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center gap-2 gap-md-3">
          <i class="bi bi-envelope d-none d-lg-flex align-items-center"><a
              href="mailto:{{ optional($settings)->email ?? '-' }}">{{ optional($settings)->email ?? '-' }}</a></i>
          
          <a href="tel:{{ optional($settings)->phone }}" class="topbar-btn rs-btn">
            <i class="bi bi-telephone-fill"></i>
            <span>{{ optional($settings)->phone ?? '-' }}</span>
          </a>

          @if(optional($settings)->whatsapp)
          <a href="https://wa.me/{{ preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $settings->whatsapp)) }}" class="topbar-btn wa-btn" target="_blank">
            <i class="bi bi-whatsapp"></i>
            <span>{{ $settings->whatsapp }}</span>
          </a>
          @endif

          <a href="tel:{{ optional($settings)->emergency_phone }}" class="topbar-btn igd-btn">
            <i class="bi bi-exclamation-triangle-fill"></i>
            <span>IGD: {{ optional($settings)->emergency_phone ?? '-' }}</span>
          </a>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
          @if(optional($settings)->twitter)<a href="{{ $settings->twitter }}" class="twitter"><i class="bi bi-twitter-x"></i></a>@endif
          @if(optional($settings)->facebook)<a href="{{ $settings->facebook }}" class="facebook"><i class="bi bi-facebook"></i></a>@endif
          @if(optional($settings)->instagram)<a href="{{ $settings->instagram }}" class="instagram"><i class="bi bi-instagram"></i></a>@endif
        </div>
      </div>
    </div>

    <div class="branding d-flex align-items-center">

      <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="{{ route('home') }}" class="logo d-flex align-items-center">
          <img src="{{ optional($settings)->logo ? asset('storage/' . $settings->logo) : asset('logo-header.svg') }}" alt="Modern Healthcare Facility" class="img-fluid">
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a></li>
            <li><a href="{{ route('doctor.index') }}" class="{{ request()->routeIs('doctor.*') ? 'active' : '' }}">Dokter</a></li>
            <li><a href="{{ route('polyclinic.index') }}" class="{{ request()->routeIs('polyclinic.*') ? 'active' : '' }}">Poliklinik</a></li>
            <li><a href="{{ route('post.index') }}" class="{{ request()->routeIs('post.*') ? 'active' : '' }}">Berita & Artikel</a></li>
            
            @foreach($menus as $menu)
              @if($menu->children->count() > 0)
                <li class="dropdown">
                  <a href="{{ $menu->link }}"><span>{{ $menu->title }}</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                  <ul>
                    @foreach($menu->children as $child)
                       @if($child->children->count() > 0)
                         <li class="dropdown">
                            <a href="{{ $child->link }}"><span>{{ $child->title }}</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                              @foreach($child->children as $grandchild)
                                <li><a href="{{ $grandchild->link }}">{{ $grandchild->title }}</a></li>
                              @endforeach
                            </ul>
                         </li>
                       @else
                         <li><a href="{{ $child->link }}">{{ $child->title }}</a></li>
                       @endif
                    @endforeach
                  </ul>
                </li>
              @else
                <li><a href="{{ $menu->link }}">{{ $menu->title }}</a></li>
              @endif
            @endforeach
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>


      </div>

    </div>

  </header>

  <main class="main">
    {{ $slot }}
  </main>

  <footer id="footer" class="footer-16 footer position-relative">

    <div class="container">

      <div class="footer-main" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-5 gy-lg-0 align-items-start">

          <div class="col-lg-3">
            <div class="brand-section">
              <a href="{{ route('home') }}" class="logo d-flex align-items-center mb-4 justify-content-center justify-content-lg-start">
                  <img 
                      src="{{ optional($settings)->logo ? asset('storage/' . $settings->logo) : asset('logo-header.svg') }}"
                      alt="Modern Healthcare Facility"
                      class="img-fluid"
                      style="height: 80px; width: auto;"
                  >
              </a>

              <div class="footer-social-links d-flex gap-3 mt-4">
                @if(optional($settings)->facebook)<a href="{{ $settings->facebook }}" class="social-link" target="_blank" rel="noopener noreferrer"><i class="bi bi-facebook"></i></a>@endif
                @if(optional($settings)->instagram)<a href="{{ $settings->instagram }}" class="social-link" target="_blank" rel="noopener noreferrer"><i class="bi bi-instagram"></i></a>@endif
                @if(optional($settings)->twitter)<a href="{{ $settings->twitter }}" class="social-link" target="_blank" rel="noopener noreferrer"><i class="bi bi-twitter-x"></i></a>@endif
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="contact-info">
              <h6 class="footer-title">Kontak Kami</h6>
              <div class="contact-item mb-3">
                <i class="bi bi-geo-alt text-accent me-2"></i>
                <span>{{ optional($settings)->address ?? 'Jl. Ovensari Raya No. 30, Kadilangu, Baki, Sukoharjo.' }}</span>
              </div>
              <div class="contact-item mb-2">
                <i class="bi bi-telephone text-accent me-2"></i>
                <span>RS: <a href="tel:{{ optional($settings)->phone }}">{{ optional($settings)->phone ?? '0271 6007000' }}</a></span>
              </div>
              <div class="contact-item text-danger mb-2">
                <i class="bi bi-exclamation-triangle me-2"></i>
                <span>IGD: <a href="tel:{{ optional($settings)->emergency_phone }}" class="text-danger">{{ optional($settings)->emergency_phone ?? '-' }}</a></span>
              </div>
              <div class="contact-item">
                <i class="bi bi-envelope text-accent me-2"></i>
                <span>{{ optional($settings)->email ?? 'rsasabunda@gmail.com' }}</span>
              </div>
            </div>
          </div>

          <div class="col-lg-5">
            <div class="footer-nav-wrapper">
              <div class="row">

                @if(optional($settings)->footer_columns)
                  @foreach($settings->footer_columns as $column)
                  <div class="col-6">
                    <div class="nav-column">
                      <h6>{{ $column['title'] }}</h6>
                      <nav class="footer-nav">
                        @foreach($column['links'] as $link)
                        <a href="{{ $link['url'] }}">{{ $link['label'] }}</a>
                        @endforeach
                      </nav>
                    </div>
                  </div>
                  @endforeach
                @endif

              </div>
            </div>
          </div>

        </div>
      </div>

    </div>

    <div class="footer-bottom">
      <div class="container">
        <div class="bottom-content">
          <div class="row align-items-center">

            <div class="col-lg-6">
              <div class="copyright">
                <p>{{ optional($settings)->copyright_text ?: '© RS ASA BUNDA. All rights reserved.' }}</p>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

  </footer>

  <a href="#!" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <script src="{{ asset('assets/js/main.js') }}"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const doctorsSwiper = new Swiper('#doctorsSwiper', {
        slidesPerView: 1,
        spaceBetween: 0,
        speed: 1000, 
        autoplay: {
          delay: 10000,
          disableOnInteraction: false,
        },
        pagination: {
          el: '#doctorsSwiper .swiper-pagination',
          clickable: true,
        },
        navigation: {
          nextEl: '#doctorsSwiper .swiper-button-next',
          prevEl: '#doctorsSwiper .swiper-button-prev',
        }
      });

      const departmentsSwiper = new Swiper('#departmentsSwiper', {
        slidesPerView: 1,
        spaceBetween: 0,
        speed: 1000,
        autoplay: {
          delay: 8000,
          disableOnInteraction: false,
        },
        pagination: {
          el: '#departmentsSwiper .swiper-pagination',
          clickable: true,
        },
        navigation: {
          nextEl: '.dep-next',
          prevEl: '.dep-prev',
        }
      });
    });
  </script>

  <div class="mobile-nav-tabs">
    <a href="{{ route('home') }}" class="nav-tab {{ request()->routeIs('home') ? 'active' : '' }}">
      <i class="bi bi-house-door{{ request()->routeIs('home') ? '-fill' : '' }}"></i>
      <span>Beranda</span>
    </a>
    <a href="{{ route('doctor.index') }}" class="nav-tab {{ request()->routeIs('doctor.*') ? 'active' : '' }}">
      <i class="bi bi-person-heart"></i>
      <span>Dokter</span>
    </a>
    <a href="{{ route('polyclinic.index') }}" class="nav-tab {{ request()->routeIs('polyclinic.*') ? 'active' : '' }}">
      <i class="bi bi-hospital"></i>
      <span>Poli</span>
    </a>
    <a href="{{ route('post.index') }}" class="nav-tab {{ request()->routeIs('post.*') ? 'active' : '' }}">
      <i class="bi bi-newspaper"></i>
      <span>Berita</span>
    </a>
  </div>

</body>

</html>
