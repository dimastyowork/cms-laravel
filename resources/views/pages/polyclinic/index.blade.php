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
                <p>{{ $poliklinik->getExcerpt(120) }}</p>
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

      <div class="emergency-banner mt-5" data-aos="fade-up" data-aos-delay="400">
        <div class="row align-items-center">
          <div class="col-lg-8">
            <div class="emergency-content">
              <h3>Layanan Darurat 24 Jam</h3>
              <p>
                Instalasi gawat darurat kami dilengkapi dengan teknologi modern dan didukung
                oleh dokter spesialis yang siap memberikan pelayanan medis dengan cepat dan profesional.
              </p>
            </div>
          </div>
          <div class="col-lg-4 text-lg-end">
            <a href="tel:{{ optional($settings)->emergency_phone }}" class="emergency-btn">
              <i class="bi bi-telephone-fill"></i>
              Call Emergency: {{ optional($settings)->emergency_phone ?? '-' }}
            </a>
          </div>
        </div>
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
