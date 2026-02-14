<x-layouts.app :settings="$settings">
  <section class="section" style="padding-top: 150px;">
    <div class="container" data-aos="fade-up">
      <div class="section-title mb-4">
        <h2>Hasil Pencarian</h2>
        @if($query)
          <p>Menampilkan hasil untuk: <strong>"{{ $query }}"</strong></p>
          <p class="text-muted">Ditemukan {{ $totalResults }} hasil</p>
        @else
          <p>Masukkan kata kunci untuk mencari dokter, poliklinik, berita, atau halaman</p>
        @endif
      </div>

      @if($query && $totalResults > 0)
        
        {{-- Dokter Section --}}
        @if($doctors->count() > 0)
          <div class="mb-5">
            <div class="d-flex align-items-center mb-4">
              <i class="bi bi-person-heart text-primary me-2" style="font-size: 1.5rem;"></i>
              <h4 class="mb-0 fw-bold">Dokter ({{ $doctors->count() }})</h4>
            </div>
            <div class="row gy-4">
              @foreach($doctors as $doctor)
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 2) * 100 }}">
                  <div class="doctor-card-modern h-100">
                    <div class="doctor-card-body">
                      <div class="doctor-image-section">
                        <div class="doctor-img-box">
                          <img src="{{ $doctor->photo_url }}" alt="{{ $doctor->name }}" class="img-fluid">
                        </div>
                      </div>
                      
                      <div class="doctor-info-section">
                        <div class="mb-3">
                          <span class="specialty-tag-new">{{ $doctor->specialization ?? 'Spesialis' }}</span>
                          <h3 class="doctor-name-new mt-2">{{ $doctor->name }}</h3>
                        </div>
                        
                        <div class="doctor-bio-new">
                          <p>{{ \Illuminate\Support\Str::limit($doctor->bio ?? 'Berpengalaman dalam memberikan layanan kesehatan terbaik untuk pasien dengan pendekatan yang ramah dan profesional.', 150) }}</p>
                        </div>
                      </div>
                    </div>

                    <div class="doctor-actions-new">
                      <a href="#!" class="btn-schedule-new">
                        <i class="bi bi-calendar-check-fill"></i><span>Pesan Jadwal</span>
                      </a>
                      <a href="{{ route('doctor.show', $doctor->id) }}" class="btn-detail-new">
                        <span>Lihat Detail</span>
                      </a>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        @endif

        {{-- Poliklinik Section --}}
        @if($polyclinics->count() > 0)
          <div class="mb-5">
            <div class="d-flex align-items-center mb-4">
              <i class="bi bi-hospital text-primary me-2" style="font-size: 1.5rem;"></i>
              <h4 class="mb-0 fw-bold">Poliklinik ({{ $polyclinics->count() }})</h4>
            </div>
            <div class="row gy-4">
              @foreach($polyclinics as $poliklinik)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 3) * 100 }}">
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
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        @endif

        {{-- Berita & Artikel Section --}}
        @if($posts->count() > 0)
          <div class="mb-5">
            <div class="d-flex align-items-center mb-4">
              <i class="bi bi-newspaper text-primary me-2" style="font-size: 1.5rem;"></i>
              <h4 class="mb-0 fw-bold">Berita & Artikel ({{ $posts->count() }})</h4>
            </div>
            <div class="row gy-4">
              @foreach($posts as $post)
                <div class="col-lg-4 col-md-6">
                  <div class="card h-100 shadow-sm border-0">
                    @if($post->image)
                      <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                      <span class="badge bg-primary mb-2">{{ $post->category ?? 'Berita' }}</span>
                      <h5 class="card-title fw-bold">
                        <a href="{{ route('post.show', $post->slug) }}" class="text-decoration-none text-dark">{{ $post->title }}</a>
                      </h5>
                      <p class="card-text text-muted small">{{ Str::limit(strip_tags($post->content), 100) }}</p>
                      <a href="{{ route('post.show', $post->slug) }}" class="btn btn-outline-primary btn-sm mt-2">Baca Selengkapnya</a>
                    </div>
                    <div class="card-footer bg-white border-0 text-muted small">
                      <i class="bi bi-calendar"></i> {{ $post->created_at->format('d M Y') }}
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        @endif

        {{-- Halaman Section --}}
        @if($pages->count() > 0)
          <div class="mb-5">
            <div class="d-flex align-items-center mb-4">
              <i class="bi bi-file-earmark-text text-primary me-2" style="font-size: 1.5rem;"></i>
              <h4 class="mb-0 fw-bold">Halaman ({{ $pages->count() }})</h4>
            </div>
            <div class="row gy-4">
              @foreach($pages as $page)
                <div class="col-lg-6">
                  <div class="card shadow-sm border-0">
                    <div class="card-body">
                      <h5 class="card-title fw-bold">
                        <a href="{{ route('page.show', $page->slug) }}" class="text-decoration-none text-dark">{{ $page->title }}</a>
                      </h5>
                      <p class="card-text text-muted">{{ Str::limit(strip_tags($page->content), 150) }}</p>
                      <a href="{{ route('page.show', $page->slug) }}" class="btn btn-outline-primary btn-sm">Lihat Halaman</a>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        @endif

      @elseif($query && $totalResults == 0)
        {{-- No Results --}}
        <div class="col-12 text-center py-5">
          <div class="empty-state mb-4">
            <i class="bi bi-search display-1 text-muted" style="font-size: 5rem; opacity: 0.2;"></i>
          </div>
          <h4 class="fw-bold text-secondary mb-2">Tidak Ada Hasil</h4>
          <p class="text-muted">Maaf, tidak ditemukan hasil untuk "<strong>{{ $query }}</strong>".<br>Coba gunakan kata kunci yang berbeda.</p>
        </div>
      @else
        {{-- Empty State --}}
        <div class="col-12 text-center py-5">
          <div class="empty-state mb-4">
            <i class="bi bi-search display-1 text-muted" style="font-size: 5rem; opacity: 0.2;"></i>
          </div>
          <h4 class="fw-bold text-secondary mb-2">Mulai Pencarian</h4>
          <p class="text-muted">Gunakan kolom pencarian di atas untuk menemukan dokter, poliklinik, berita, atau halaman.</p>
        </div>
      @endif

    </div>
  </section>

  <style>
    /* Doctor Card Styles - Same as doctor/index.blade.php */
    .doctor-card-modern {
      background: #fff;
      border-radius: 20px;
      padding: 25px;
      display: flex;
      flex-direction: column;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
      transition: all 0.3s ease;
      border: 1px solid rgba(0,0,0,0.05);
      position: relative;
    }

    .doctor-card-modern:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
    }

    .doctor-card-body {
      display: flex;
      gap: 25px;
      margin-bottom: 25px;
    }

    .doctor-image-section {
      flex: 0 0 140px;
    }

    .doctor-img-box {
      background: color-mix(in srgb, var(--accent-color), transparent 96%);
      padding: 12px;
      border-radius: 18px;
    }

    .doctor-img-box img {
      width: 100%;
      aspect-ratio: 1/1;
      object-fit: cover;
      border-radius: 12px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }

    .doctor-info-section {
      flex: 1;
    }

    .specialty-tag-new {
      background: color-mix(in srgb, var(--accent-color), transparent 92%);
      color: var(--accent-color);
      padding: 5px 12px;
      border-radius: 50px;
      font-size: 0.8rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .doctor-name-new {
      font-size: 1.25rem;
      font-weight: 700;
      color: var(--heading-color);
      line-height: 1.3;
    }

    .doctor-bio-new p {
      color: #6c757d;
      font-size: 0.9rem;
      line-height: 1.6;
      margin: 0;
    }

    .doctor-actions-new {
      margin-top: auto;
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: center;
      gap: 20px;
      padding-top: 20px;
      border-top: 1px solid rgba(0,0,0,0.05);
    }

    .btn-detail-new {
      background: color-mix(in srgb, var(--accent-color), transparent 95%);
      color: var(--accent-color) !important;
      padding: 10px 25px;
      border-radius: 50px;
      font-weight: 700;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s ease;
      font-size: 0.9rem;
      border: 1px solid color-mix(in srgb, var(--accent-color), transparent 80%);
    }

    .btn-detail-new:hover {
      background: var(--accent-color);
      color: #fff !important;
      transform: translateY(-2px);
    }

    .btn-schedule-new {
      background: var(--accent-color);
      color: #fff !important;
      padding: 10px 25px;
      border-radius: 50px;
      font-weight: 700;
      text-decoration: none;
      transition: all 0.3s ease;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      font-size: 0.9rem;
      box-shadow: 0 4px 12px rgba(var(--accent-color-rgb), 0.3);
      gap: 6px;
    }

    .btn-schedule-new i {
      font-size: 1.1rem;
      display: flex;
      align-items: center;
    }

    .btn-schedule-new:hover {
      background: color-mix(in srgb, var(--accent-color), black 10%);
      transform: translateY(-2px);
      box-shadow: 0 6px 15px rgba(var(--accent-color-rgb), 0.4);
    }

    @media (max-width: 575px) {
      .doctor-card-body {
        flex-direction: row;
        gap: 15px;
        text-align: left;
      }
      .doctor-image-section {
        flex: 0 0 100px;
      }
      .doctor-actions-new {
        flex-direction: row;
        justify-content: center;
        gap: 15px;
      }
      .btn-schedule-new {
        width: auto;
        padding: 8px 15px;
        font-size: 0.85rem;
      }
      .btn-detail-new {
        font-size: 0.85rem;
      }
    }

    /* Polyclinic Card Styles - Same as polyclinic/index.blade.php */
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

    .specialty-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1) !important;
    }
    
    .specialty-visual {
      display: block;
      width: 100% !important;
      height: 220px !important;
      overflow: hidden;
      position: relative;
    }

    .specialty-visual img {
      width: 100%;
      height: 100%;
      object-fit: cover !important;
      transition: transform 0.3s ease;
    }

    .specialty-card:hover .specialty-visual img {
      transform: scale(1.05);
    }

    .visual-overlay {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(0,0,0,0.3);
      display: flex;
      align-items: center;
      justify-content: center;
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .visual-overlay i {
      color: white;
      font-size: 3rem;
    }

    .specialty-card:hover .visual-overlay {
      opacity: 1;
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
      font-weight: 700;
      color: var(--heading-color);
    }

    .specialty-content p {
      font-size: 0.95rem;
      color: #666;
      margin-bottom: 20px;
      line-height: 1.6;
    }

    .specialty-link {
      color: var(--accent-color);
      font-weight: 600;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 5px;
      transition: all 0.3s ease;
    }

    .specialty-link:hover {
      gap: 10px;
      color: color-mix(in srgb, var(--accent-color), black 20%);
    }

    .section-title h2 {
      font-size: 2rem;
      font-weight: 700;
      color: var(--heading-color);
      margin-bottom: 10px;
    }
  </style>
</x-layouts.app>
