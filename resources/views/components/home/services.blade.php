<!-- @props(['services'])
    <section id="featured-services" class="featured-services section">

      <div class="container section-title" data-aos="fade-up">
        <h2>Featured Services</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div>

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-0">

          <div class="col-lg-8" data-aos="fade-right" data-aos-delay="200">
            <div class="featured-service-main">
              @if($featured = $services->where('is_featured', true)->first())
              <div class="service-image-wrapper">
                <img src="{{ $featured->image ? asset('storage/' . $featured->image) : asset('assets/img/health/consultation-4.webp') }}" alt="{{ $featured->title }}" class="img-fluid"
                  loading="lazy">
                <div class="service-overlay">
                  <div class="service-badge">
                    <i class="{{ $featured->icon ?? 'bi bi-heart-pulse' }}"></i>
                    <span>{{ $featured->title }}</span>
                  </div>
                </div>
              </div>
              <div class="service-details">
                <h2>{{ $featured->title }}</h2>
                <p>{{ $featured->description }}</p>
                <a href="{{ $featured->link ?? '#!' }}" class="main-cta">Explore Our Services</a>
              </div>
              @else
              <div class="service-details">
                <h2>Comprehensive Healthcare Excellence</h2>
                <p>We provide top-notch medical services.</p>
              </div>
              @endif
            </div>
          </div>

          <div class="col-lg-4" data-aos="fade-left" data-aos-delay="300">
            <div class="services-sidebar">
              @foreach($services->where('is_featured', false)->take(3) as $service)
              <div class="service-item" data-aos="fade-up" data-aos-delay="{{ 400 + ($loop->index * 100) }}">
                <div class="service-icon-wrapper">
                  <i class="{{ $service->icon ?? 'bi bi-capsule' }}"></i>
                </div>
                <div class="service-info">
                  <h4>{{ $service->title }}</h4>
                  <p>{{ Str::limit($service->description, 80) }}</p>
                  <a href="{{ $service->link ?? '#!' }}" class="service-link">Learn More</a>
                </div>
              </div>
              @endforeach
              @if($services->where('is_featured', false)->count() == 0)
                <div class="p-4"><p>More services coming soon.</p></div>
              @endif

            </div>
          </div>

        </div>

        <div class="specialties-grid" data-aos="fade-up" data-aos-delay="300">
          <div class="row align-items-center">
             @foreach($services->skip(4)->take(4) as $service)
            <div class="col-lg-3 col-md-6">
              <div class="specialty-card">
                <div class="specialty-image">
                  <img src="{{ $service->image ? asset('storage/' . $service->image) : asset('assets/img/health/maternal-2.webp') }}" alt="{{ $service->title }}" class="img-fluid" loading="lazy">
                </div>
                <div class="specialty-content">
                  <h5>{{ $service->title }}</h5>
                  <span>{{ Str::limit($service->description, 30) }}</span>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>

      </div>

    </section> -->
