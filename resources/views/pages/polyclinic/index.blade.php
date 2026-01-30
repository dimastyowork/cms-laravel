<x-layouts.app :settings="$settings">
  <section id="featured-departments" class="featured-departments section" style="padding-top: 150px;">
    <div class="container section-title" data-aos="fade-up">
      <h2>Daftar Poliklinik</h2>
      <p>Melayani pemeriksaan dan konsultasi kesehatan dengan dokter berpengalaman dan fasilitas lengkap.</p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row gy-4">
        @forelse($polikliniks as $poliklinik)
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 3) * 100 + 100 }}">
            <div class="specialty-card h-100 shadow-sm">
              <a href="{{ route('polyclinic.show', $poliklinik->slug) }}" class="specialty-visual">
                <img src="{{ $poliklinik->image_url }}" alt="{{ $poliklinik->name }}" class="img-fluid">
                <div class="visual-overlay">
                  <i class="bi bi-heart-pulse"></i>
                </div>
              </a>
              <div class="specialty-content">
                <h3>{{ $poliklinik->name }}</h3>
                <p>{{ Str::limit($poliklinik->description, 120) }}</p>
                <div class="mt-auto">
                  <a href="{{ route('polyclinic.show', $poliklinik->slug) }}" class="specialty-link">
                    Explore {{ $poliklinik->name }} <i class="bi bi-arrow-right"></i>
                  </a>
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
    .specialty-card {
      background: #fff;
      border-radius: 20px;
      overflow: hidden;
      display: flex;
      flex-direction: column !important;
      height: 100%;
      transition: all 0.3s ease;
      position: relative;
    }
    
    .specialty-visual {
      display: block;
      width: 100% !important;
      height: 220px !important;
      overflow: hidden;
    }

    .specialty-visual img {
      width: 100%;
      height: 100%;
      object-fit: cover !important;
    }

    .specialty-content {
      width: 100% !important;
      padding: 30px !important;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
    }

    .specialty-content h3 {
      font-size: 1.5rem;
      margin-bottom: 15px;
    }

    .specialty-content p {
      font-size: 0.95rem;
      color: #666;
      margin-bottom: 20px;
    }
  </style>
</x-layouts.app>
