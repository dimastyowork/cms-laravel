@props(['services'])
    <section id="featured-services" class="featured-services section">

      <div class="container section-title" data-aos="fade-up">
        <h2>Layanan Unggulan</h2>
        <p>Layanan kesehatan terpadu dengan standar internasional dan tim profesional berpengalaman</p>
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
                <a href="{{ $featured->link ?? '#!' }}" class="main-cta">Pelajari Layanan Kami</a>
              </div>
              @else
              <div class="service-details empty-featured-service">
                <x-empty-state 
                  icon="bi bi-briefcase-medical" 
                  title="Layanan unggulan belum tersedia" 
                  subtitle="Informasi layanan akan segera ditampilkan di sini"
                />
              </div>
              @endif
            </div>
          </div>

          <div class="col-lg-4" data-aos="fade-left" data-aos-delay="300">
            <div class="services-sidebar">
              @forelse($services->where('is_featured', false)->take(3) as $service)
              <div class="service-item" data-aos="fade-up" data-aos-delay="{{ 400 + ($loop->index * 100) }}">
                <div class="service-icon-wrapper">
                  <i class="{{ $service->icon ?? 'bi bi-capsule' }}"></i>
                </div>
                <div class="service-info">
                  <h4>{{ $service->title }}</h4>
                  <p>{{ Str::limit($service->description, 80) }}</p>
                  <a href="{{ $service->link ?? '#!' }}" class="service-link">Selengkapnya</a>
                </div>
              </div>
              @empty
              <div class="services-empty">
                <x-empty-state 
                  icon="bi bi-list-check" 
                  title="Layanan lainnya belum tersedia" 
                  subtitle="Terus pantau untuk update terbaru"
                />
              </div>
              @endforelse
            </div>
          </div>

        </div>

        <div class="specialties-grid" data-aos="fade-up" data-aos-delay="300">
          <div class="row align-items-center">
             @forelse($services->skip(4)->take(4) as $service)
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
            @empty
            <div class="col-12">
              <x-empty-state 
                icon="bi bi-grid-3x3-gap" 
                title="Layanan tambahan belum tersedia" 
                subtitle="Daftar lengkap layanan kami akan ditampilkan segera"
              />
            </div>
            @endforelse
          </div>
        </div>

      </div>

    </section>

    <style>
      .empty-featured-service {
        min-height: 400px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f8f9fa;
        border-radius: 8px;
      }

      .services-empty {
        padding: 2rem;
      }
    </style>

