@props(['settings'])
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>RS ASA BUNDA</title>
  <meta name="description" content="{{ optional($settings)->description ?? '' }}">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('favicon.ico') }}" rel="icon">
  <link href="{{ asset('favicon.ico') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
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
  </style>

  <!-- =======================================================
  * Template Name: Clinic
  * Template URL: https://bootstrapmade.com/clinic-bootstrap-template/
  * Updated: Jul 23 2025 with Bootstrap v5.3.7
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header fixed-top">

    <div class="topbar d-flex align-items-center dark-background">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
          <i class="bi bi-envelope d-flex align-items-center"><a
              href="mailto:{{ optional($settings)->email ?? '-' }}">{{ optional($settings)->email ?? '-' }}</a></i>
          <i class="bi bi-phone d-flex align-items-center ms-4"><span>{{ optional($settings)->phone ?? '-' }}</span></i>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
          @if(optional($settings)->twitter)<a href="{{ $settings->twitter }}" class="twitter"><i class="bi bi-twitter-x"></i></a>@endif
          @if(optional($settings)->facebook)<a href="{{ $settings->facebook }}" class="facebook"><i class="bi bi-facebook"></i></a>@endif
          @if(optional($settings)->instagram)<a href="{{ $settings->instagram }}" class="instagram"><i class="bi bi-instagram"></i></a>@endif
        </div>
      </div>
    </div><!-- End Top Bar -->

    <div class="branding d-flex align-items-cente">

      <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="{{ route('home') }}" class="logo d-flex align-items-center">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <!-- <img src="assets/img/logo.webp" alt=""> -->
          <!-- <h1 class="sitename">Clinic</h1> -->
          <img src="{{ optional($settings)->logo ? asset('storage/' . $settings->logo) : asset('logo-header.svg') }}" alt="Modern Healthcare Facility" class="img-fluid">
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a></li>
            <li><a href="{{ route('doctor.index') }}" class="{{ request()->routeIs('doctor.*') ? 'active' : '' }}">Dokter</a></li>
            <li><a href="{{ route('polyclinic.index') }}" class="{{ request()->routeIs('polyclinic.*') ? 'active' : '' }}">Poliklinik</a></li>
            
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
        <div class="row align-items-start">

          <div class="col-lg-5">
            <div class="brand-section">
              <a href="{{ route('home') }}" class="logo d-flex align-items-center mb-4">
                  <img 
                      src="{{ optional($settings)->logo ? asset('storage/' . $settings->logo) : asset('logo-header.svg') }}"
                      alt="Modern Healthcare Facility"
                      class="img-fluid"
                      style="height: 48px; width: auto;"
                  >
              </a>

              <p class="brand-description">{{ optional($settings)->description ?? '' }}</p>

              <div class="contact-info mt-5">
                <div class="contact-item">
                  <i class="bi bi-geo-alt"></i>
                  <span>{{ optional($settings)->address ?? '-' }}</span>
                </div>
                <div class="contact-item">
                  <i class="bi bi-telephone"></i>
                  <span>{{ optional($settings)->phone ?? '-' }}</span>
                </div>
                <div class="contact-item">
                  <i class="bi bi-envelope"></i>
                  <span>{{ optional($settings)->email ?? '-' }}</span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-7">
            <div class="footer-nav-wrapper">
              <div class="row">

                @if(optional($settings)->footer_columns)
                  @foreach($settings->footer_columns as $column)
                  <div class="col-6 col-lg-3">
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
                <!-- ... other default columns ... -->
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

  <!-- Scroll Top -->
  <a href="#!" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

  <!-- Doctors Carousel Script -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Initialize Doctors Carousel Swiper
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

      // Initialize Departments Carousel Swiper
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
          nextEl: '#departmentsSwiper .swiper-button-next',
          prevEl: '#departmentsSwiper .swiper-button-prev',
        }
      });
    });
  </script>

</body>

</html>
