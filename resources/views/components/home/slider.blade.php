<style>
  .hero.section {
    padding-top: 140px !important;
  }
  
  @media (max-width: 768px) {
    .hero.section {
      padding-top: 80px !important;
    }
  }
</style>

  <section id="hero" class="hero section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row align-items-center flex-column-reverse flex-lg-row">
          <div class="col-lg-6">
            <div class="hero-content">
              <div class="trust-badges mb-4" data-aos="fade-right" data-aos-delay="200">
                <div class="badge-item">
                  <i class="bi bi-shield-check"></i>
                  <span>Accredited</span>
                </div>
                <div class="badge-item">
                  <i class="bi bi-clock"></i>
                  <span>24/7 Emergency</span>
                </div>
              </div>

              @if($abouts && $abouts->count() > 0)
                <div class="hero-text-slider">
                  @foreach($abouts as $index => $heroItem)
                    <div class="hero-text-slide {{ $index === 0 ? 'active' : '' }}" data-slide="{{ $index }}">
                      <h1 data-aos="fade-right" data-aos-delay="300">
                        {!! str_replace($heroItem->title, '<span class="highlight">' . explode(' ', $heroItem->title)[0] . '</span> ' . implode(' ', array_slice(explode(' ', $heroItem->title), 1)), $heroItem->title) !!}
                      </h1>

                      <p class="hero-description" data-aos="fade-right" data-aos-delay="400">
                        {{ $heroItem->description }}
                      </p>
                    </div>
                  @endforeach
                </div>
              @else
                <h1 data-aos="fade-right" data-aos-delay="300">
                  Selamat Datang di <span class="highlight">RS Bunda</span>
                </h1>
                <p class="hero-description" data-aos="fade-right" data-aos-delay="400">
                  Kami berkomitmen untuk memberikan layanan kesehatan terbaik dengan sentuhan personal. Website kami sedang dalam pembaruan untuk memberikan informasi yang lebih lengkap.
                </p>
              @endif

              @if(optional($settings)->emergency_phone)
              <div class="emergency-contact" data-aos="fade-right" data-aos-delay="700">
                <div class="emergency-icon">
                  <i class="bi bi-telephone-fill"></i>
                </div>
                <div class="emergency-info">
                  <small>Emergency Hotline</small>
                  <strong><a href="tel:{{ optional($settings)->emergency_phone }}" class="text-dark">{{ optional($settings)->emergency_phone ?? '-' }}</a></strong>
                </div>
              </div>
              @endif

              @if($abouts && $abouts->count() > 1)
                <!-- Slider Controls -->
                <div class="hero-slider-controls" data-aos="fade-right" data-aos-delay="800">
                  <button class="slider-btn prev-btn" onclick="changeSlide(-1)">
                    <i class="bi bi-chevron-left"></i>
                  </button>
                  <div class="slider-dots">
                    @foreach($abouts as $index => $heroItem)
                      <span class="dot {{ $index === 0 ? 'active' : '' }}" onclick="goToSlide({{ $index }})"></span>
                    @endforeach
                  </div>
                  <button class="slider-btn next-btn" onclick="changeSlide(1)">
                    <i class="bi bi-chevron-right"></i>
                  </button>
                </div>
              @endif
            </div>
          </div>

          <div class="col-lg-6 mb-3 mb-lg-0">
            <div class="hero-visual" data-aos="fade-left" data-aos-delay="400">
              @if($abouts && $abouts->count() > 0)
                <div class="hero-image-slider">
                  @foreach($abouts as $index => $heroItem)
                    <div class="hero-image-slide {{ $index === 0 ? 'active' : '' }}" data-slide="{{ $index }}">
                      <div class="main-image">
                        <img src="{{ $heroItem->photo ? asset('storage/' . $heroItem->photo) : asset('assets/img/health/staff-10.webp') }}" 
                             alt="{{ $heroItem->title }}" 
                             class="img-fluid" style="border-radius: var(--border-radius-lg); box-shadow: var(--box-shadow-soft);">
                        <div class="floating-card appointment-card modern-card glass-effect">
                          <div class="card-icon">
                            <i class="bi bi-calendar-check"></i>
                          </div>
                          <div class="card-content">
                            <h6>Coming soon</h6>
                            <small>RS Asa Bunda</small>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              @else
                <div class="main-image">
                  <img src="{{ asset('assets/img/asabunda.jpeg') }}" alt="Modern Healthcare Facility" class="img-fluid" style="border-radius: var(--border-radius-lg); box-shadow: var(--box-shadow-soft);">
                  <div class="floating-card appointment-card modern-card glass-effect">
                    <div class="card-icon">
                      <i class="bi bi-calendar-check"></i>
                    </div>
                    <div class="card-content">
                      <h6>Coming soon</h6>
                      <small>RS Asa Bunda</small>
                    </div>
                  </div>
                </div>
              @endif
              
              <div class="background-elements">
                <div class="element element-1"></div>
                <div class="element element-2"></div>
                <div class="element element-3"></div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section>

    @if($abouts && $abouts->count() > 1)
    <style>
      /* Hero Slider Styles */
      .hero-text-slider,
      .hero-image-slider {
        position: relative;
      }

      .hero-text-slide,
      .hero-image-slide {
        display: none;
        opacity: 0;
        transition: opacity 0.5s ease-in-out;
      }

      .hero-text-slide.active,
      .hero-image-slide.active {
        display: block;
        opacity: 1;
      }

      .hero-slider-controls {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-top: {{ optional($settings)->emergency_phone ? '2rem' : '1rem' }};
      }

      .slider-btn {
        background: rgba(var(--accent-color-rgb), 0.1);
        border: 2px solid var(--accent-color);
        color: var(--accent-color);
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
      }

      .slider-btn:hover {
        background: var(--accent-color);
        color: white;
        transform: scale(1.1);
      }

      .slider-dots {
        display: flex;
        gap: 0.5rem;
        flex: 1;
        justify-content: center;
      }

      .dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: rgba(var(--accent-color-rgb), 0.3);
        cursor: pointer;
        transition: all 0.3s ease;
      }

      .dot.active {
        background: var(--accent-color);
        width: 30px;
        border-radius: 6px;
      }

      .dot:hover {
        background: rgba(var(--accent-color-rgb), 0.6);
      }

      /* Animation for slide transition */
      @keyframes slideIn {
        from {
          opacity: 0;
          transform: translateX(20px);
        }
        to {
          opacity: 1;
          transform: translateX(0);
        }
      }

      .hero-text-slide.active,
      .hero-image-slide.active {
        animation: slideIn 0.5s ease-in-out;
      }
    </style>

    <script>
      let currentSlide = 0;
      const totalSlides = {{ $abouts->count() }};
      let autoSlideInterval;

      function showSlide(n) {
        const textSlides = document.querySelectorAll('.hero-text-slide');
        const imageSlides = document.querySelectorAll('.hero-image-slide');
        const dots = document.querySelectorAll('.dot');

        if (n >= totalSlides) {
          currentSlide = 0;
        } else if (n < 0) {
          currentSlide = totalSlides - 1;
        } else {
          currentSlide = n;
        }

        textSlides.forEach(slide => {
          slide.classList.remove('active');
        });
        imageSlides.forEach(slide => {
          slide.classList.remove('active');
        });
        dots.forEach(dot => {
          dot.classList.remove('active');
        });

        textSlides[currentSlide].classList.add('active');
        imageSlides[currentSlide].classList.add('active');
        dots[currentSlide].classList.add('active');
      }

      function changeSlide(direction) {
        showSlide(currentSlide + direction);
        resetAutoSlide();
      }

      function goToSlide(n) {
        showSlide(n);
        resetAutoSlide();
      }

      function resetAutoSlide() {
        clearInterval(autoSlideInterval);
        startAutoSlide();
      }

      function startAutoSlide() {
        autoSlideInterval = setInterval(() => {
          changeSlide(1);
        }, 10000);
      }

      document.addEventListener('DOMContentLoaded', function() {
        startAutoSlide();
      });
      const heroSection = document.querySelector('.hero');
      if (heroSection) {
        heroSection.addEventListener('mouseenter', () => {
          clearInterval(autoSlideInterval);
        });
        heroSection.addEventListener('mouseleave', () => {
          startAutoSlide();
        });
      }
    </script>
    @endif

