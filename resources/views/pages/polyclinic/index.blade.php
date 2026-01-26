<x-layouts.app :settings="$settings">
  <section id="featured-departments" class="featured-departments section" style="padding-top: 150px;">
    <div class="container section-title" data-aos="fade-up">
      <h2>Daftar Poliklinik</h2>
      <p>Melayani pemeriksaan dan konsultasi kesehatan dengan dokter berpengalaman dan fasilitas lengkap.</p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row gy-4">
        @forelse($polikliniks as $poliklinik)
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 2) * 100 + 100 }}">
            <div class="specialty-card h-100 shadow-sm">
              <div class="specialty-content">
                <div class="specialty-meta">
                  <span class="specialty-label">Specialized Care</span>
                </div>
                <h3>{{ $poliklinik->name }}</h3>
                <p>{{ Str::limit($poliklinik->description, 150) }}</p>
                <div class="specialty-features">
                </div>
                <a href="#!" class="specialty-link">
                  Explore {{ $poliklinik->name }} <i class="bi bi-arrow-right"></i>
                </a>
              </div>
              <div class="specialty-visual">
                <img src="{{ $poliklinik->image_url }}" alt="{{ $poliklinik->name }}" class="img-fluid">
                <div class="visual-overlay">
                  <i class="bi bi-heart-pulse"></i>
                </div>
              </div>
            </div><!-- End Specialty Card -->
          </div>
        @empty
          <div class="col-12">
            <x-empty-state 
              icon="bi bi-hospital" 
              title="Poliklinik belum tersedia" 
              subtitle="Informasi poliklinik akan ditampilkan segera"
            />
          </div>
        @endforelse
      </div>

      <div class="mt-5 d-flex justify-content-center">
        {{ $polikliniks->links() }}
      </div>
    </div>
  </section>

  <style>
    /* Ensure cards look good in a grid */
    .specialty-card {
      background: #fff;
      border-radius: 20px;
      overflow: hidden;
      display: flex;
      height: 100%;
      min-height: 250px;
      transition: all 0.3s ease;
      position: relative;
    }
    
    @media (max-width: 768px) {
      .specialty-card {
        flex-direction: column;
      }
      .specialty-visual {
        order: -1;
        width: 100% !important;
        height: 200px;
      }
    }
  </style>
</x-layouts.app>
