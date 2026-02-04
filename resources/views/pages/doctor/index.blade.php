<x-layouts.app :settings="$settings">
  <section id="find-a-doctor" class="find-a-doctor section" style="padding-top: 150px;">
    <div class="container section-title" data-aos="fade-up">
      <h2>Daftar Dokter</h2>
      <p>Temukan dokter berpengalaman dan profesional sesuai kebutuhan kesehatan Anda</p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row justify-content-center mb-5 mt-5 pt-lg-2 search-row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-8 text-center">
          <div class="search-section">
            <h3 class="search-title">Temukan Dokter Anda</h3>
            <p class="search-subtitle mb-4">Cari melalui direktori lengkap profesional medis berpengalaman kami</p>
            <form class="search-form" action="{{ route('doctor.index') }}" method="GET">
              <div class="search-input-group">
                <div class="input-wrapper">
                  <i class="bi bi-person"></i>
                  <input type="text" class="form-control" name="search" placeholder="Cari nama dokter" value="{{ request('search') }}">
                </div>
                <div class="select-wrapper">
                  <i class="bi bi-heart-pulse"></i>
                  <select class="form-select" name="specialization" style="color: #2c3e50 !important; opacity: 1 !important; font-weight: 500 !important;">
                    <option value="">Semua Spesialisasi</option>
                    @php
                      $specializations = \App\Models\Doctor::distinct()->pluck('specialization')->filter();
                    @endphp
                    @foreach($specializations as $spec)
                      <option value="{{ $spec }}" {{ request('specialization') == $spec ? 'selected' : '' }}>{{ $spec }}</option>
                    @endforeach
                  </select>
                </div>
                <button type="submit" class="search-btn">
                  <i class="bi bi-search"></i>
                  Cari Dokter
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="row gy-4">
        @forelse($doctors as $doctor)
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
                <a href="{{ route('doctor.show', $doctor) }}" class="btn-detail-new">
                  <span>Lihat Detail</span>
                </a>
              </div>
            </div>
          </div>
        @empty
          <div class="col-12">
            <x-empty-state 
              icon="bi bi-person-heart" 
              title="Dokter tidak ditemukan" 
              subtitle="Maaf, kami tidak menemukan dokter yang Anda cari"
            />
          </div>
        @endforelse
      </div>

      <div class="mt-5 d-flex justify-content-center">
        {{ $doctors->links() }}
      </div>
    </div>
  </section>

  <style>
    /* Ensure the profile cards look good in a grid */
    /* Doctor Card Modern Vertical Redesign */
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
      gap: 6px; /* Tight gap as requested */
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

    @media (min-width: 768px) {
      .btn-schedule-new {
        width: auto;
        min-width: 200px;
      }
    }

    @media (max-width: 575px) {
      .doctor-card-body {
        flex-direction: row; /* Horizontal on mobile */
        gap: 15px;
        text-align: left;
      }
      .doctor-image-section {
        flex: 0 0 100px; /* Slightly smaller image for mobile horizontal */
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

    /* Doctor Card Horizontal Redesign */
    .doctor-card-horizontal {
      background: #fff;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
      transition: all 0.3s ease;
      border: 1px solid rgba(0,0,0,0.05);
      height: 100%;
      display: flex;
    }

    .doctor-card-horizontal:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
    }

    .doctor-img-container {
      height: 100%;
      padding: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      background: color-mix(in srgb, var(--accent-color), transparent 97%);
    }

    .doctor-img-container img {
      width: 100%;
      aspect-ratio: 1/1;
      object-fit: cover;
      border-radius: 15px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.08);
      transition: transform 0.5s ease;
    }

    .doctor-card-horizontal:hover .doctor-img-container img {
      transform: scale(1.05);
    }

    .doctor-content {
      padding: 30px;
      display: flex;
      flex-direction: column;
      height: 100%;
    }

    .specialty-badge {
      background: color-mix(in srgb, var(--accent-color), transparent 90%);
      color: var(--accent-color);
      padding: 6px 15px;
      border-radius: 50px;
      font-size: 0.85rem;
      font-weight: 600;
      display: inline-block;
    }

    .doctor-name {
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--heading-color);
      margin-bottom: 10px;
    }

    .doctor-bio {
      color: #666;
      font-size: 0.95rem;
      line-height: 1.6;
    }

    .btn-detail {
      color: var(--accent-color);
      font-weight: 600;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 5px;
      transition: all 0.3s ease;
      font-size: 1rem;
    }

    .btn-detail:hover {
      gap: 10px;
      color: color-mix(in srgb, var(--accent-color), black 20%);
    }

    .btn-schedule {
      background: var(--accent-color);
      color: #fff !important;
      padding: 10px 25px;
      border-radius: 50px;
      font-weight: 600;
      text-decoration: none;
      transition: all 0.3s ease;
      display: inline-flex;
      align-items: center;
      box-shadow: 0 4px 15px rgba(var(--accent-color-rgb), 0.3);
    }

    .btn-schedule:hover {
      background: color-mix(in srgb, var(--accent-color), black 10%);
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(var(--accent-color-rgb), 0.4);
    }

    @media (max-width: 767px) {
      .doctor-img-container {
        min-height: 300px;
      }
      .doctor-content {
        padding: 20px;
      }
      .doctor-name {
        font-size: 1.25rem;
      }
    }

    /* Search Section Improvements */
    .find-a-doctor .search-section .search-form .search-input-group {
      display: flex;
      background: #fff;
      border-radius: 60px;
      padding: 5px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.05);
      border: 1px solid #eee;
    }

    .find-a-doctor .search-section .search-form .input-wrapper,
    .find-a-doctor .search-section .search-form .select-wrapper {
      border-right: 1px solid #eee;
    }

    .find-a-doctor .search-section .search-form .form-control,
    .find-a-doctor .search-section .search-form .form-select {
      height: 55px;
      background: transparent !important;
      border: none !important;
      box-shadow: none !important;
      font-weight: 500;
      padding-left: 55px !important;
      line-height: 55px;
      padding-top: 0;
      padding-bottom: 0;
    }

    .find-a-doctor .search-section .search-form .form-select {
      line-height: normal;
      border-radius: 30px !important;
    }

    .find-a-doctor .search-section .search-form .input-wrapper i,
    .find-a-doctor .search-section .search-form .select-wrapper i {
      position: absolute;
      left: 20px;
      top: 50%;
      transform: translateY(-50%);
      color: #999;
      font-size: 1.1rem;
      z-index: 10;
      pointer-events: none;
    }

    @media (max-width: 768px) {
      .find-a-doctor .search-row {
        padding-top: 60px !important;
        margin-top: 0 !important;
      }
      .find-a-doctor .search-section {
        padding: 30px 20px !important;
        border-radius: 20px !important;
      }
      
      .find-a-doctor .search-title {
        margin-bottom: 15px !important;
      }

      .find-a-doctor .search-subtitle {
        margin-bottom: 30px !important;
        line-height: 1.6;
      }
      
      .find-a-doctor .search-section .search-form .search-input-group {
        flex-direction: column;
        background: transparent;
        border: none;
        box-shadow: none;
        gap: 15px !important; /* Larger gap between inputs */
        padding: 0;
      }

      .find-a-doctor .search-section .search-form .input-wrapper,
      .find-a-doctor .search-section .search-form .select-wrapper {
        border: 1px solid #e0e0e0;
        border-radius: 30px !important;
        background: #fff;
        width: 100%;
        overflow: hidden;
      }

      .find-a-doctor .search-section .search-form .form-control,
      .find-a-doctor .search-section .search-form .form-select {
        padding-left: 55px !important;
        text-align: left;
      }

      .find-a-doctor .search-section .search-form .search-btn {
        width: 100%;
        justify-content: center;
        height: 55px;
        border-radius: 50px;
        font-size: 1.1rem;
      }
      
      .find-a-doctor .search-section .search-form .input-wrapper i,
      .find-a-doctor .search-section .search-form .select-wrapper i {
        left: 20px;
        display: block !important;
      }
    }

    /* Fix select dropdown specifically */
    .find-a-doctor .search-section .search-form .select-wrapper select.form-select {
      color: #000000 !important;
      appearance: none;
      background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
      background-repeat: no-repeat;
      background-position: right 1.5rem center;
      background-size: 16px 12px;
    }
  </style>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Emergency fix: if value is selected but not matching visual, force update
      const selectElement = document.querySelector('.find-a-doctor select[name="specialization"]');
      if (selectElement) {
        // Ensure black color on load
        selectElement.style.setProperty('color', '#000000', 'important');
        selectElement.style.setProperty('background-color', '#ffffff', 'important');
      }
    });
  </script>
</x-layouts.app>
