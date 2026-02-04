@props(['doctors'])
    <section id="find-a-doctor" class="find-a-doctor section">

      <div class="container section-title" data-aos="fade-up">
        <h2>Cari Dokter</h2>
        <p>Temukan dokter berpengalaman dan profesional sesuai kebutuhan kesehatan Anda</p>
      </div>

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row justify-content-center mb-5 mt-5 pt-lg-5 search-row" data-aos="fade-up" data-aos-delay="200">
          <div class="col-lg-8 text-center">
            <div class="search-section">
              <h3 class="search-title">Temukan Dokter Anda</h3>
              <p class="search-subtitle mb-4">Cari melalui direktori lengkap profesional medis berpengalaman kami
              </p>
              <form class="search-form" action="{{ route('doctor.index') }}" method="GET">
                <div class="search-input-group">
                  <div class="input-wrapper">
                    <i class="bi bi-person"></i>
                    <input type="text" class="form-control" name="search" placeholder="Cari nama dokter" value="{{ request('search') }}">
                  </div>
                  <div class="select-wrapper">
                    <i class="bi bi-heart-pulse"></i>
                    <select class="form-select" name="specialization">
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

        <!-- <div class="doctors-grid-static" style="padding: 20px 0;">
          <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 gy-4">
            @forelse($doctors->take(6) as $doctor)
            <div class="col">
              <div class="doctor-profile h-100 mb-0 modern-card" data-aos="zoom-in" data-aos-delay="{{ ($loop->index % 3) * 100 + 100 }}">
                <div class="profile-header mb-2">
                  <div class="doctor-avatar">
                    <img src="{{ $doctor->photo_url }}" alt="{{ $doctor->name }}" class="img-fluid">
                  </div>
                  <div class="doctor-details">
                    <h4 class="text-break">{{ $doctor->name }}</h4>
                    <span class="specialty-tag text-break">{{ $doctor->specialization ?? 'Spesialis' }}</span>
                  </div>
                </div>
                <div class="action-buttons">
                  <a href="{{ route('doctor.show', $doctor) }}" class="btn-secondary">Lihat Detail</a>
                  <a href="#!" class="btn-primary">Pesan Jadwal</a>
                </div>
              </div>
            </div>
            @empty
              <div class="col-12 text-center py-5">
                <x-empty-state 
                  icon="bi bi-person-heart" 
                  title="Belum Ada Data Dokter" 
                  subtitle="Mohon maaf, saat ini kami sedang memperbarui daftar dokter kami. Silakan kembali lagi nanti."
                />
              </div>
            @endforelse
          </div>
        </div> -->

        <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="700">
          <a href="{{ route('doctor.index') }}" class="btn-view-all">
            Lihat Semua Dokter
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>

      </div>

    </section>

    <style>
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
        line-height: 55px; /* Center text vertically for inputs */
        padding-top: 0;
        padding-bottom: 0;
      }

      /* Select needs different vertical centering than input */
      .find-a-doctor .search-section .search-form .form-select {
        line-height: normal;
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
          overflow: hidden; /* Ensure rounded corners are respected */
        }

        .find-a-doctor .search-section .search-form .form-select {
          border-radius: 30px !important;
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
          display: block !important; /* Keep icons on mobile but positioned well */
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
        const selectElements = document.querySelectorAll('.find-a-doctor select[name="specialization"]');
        selectElements.forEach(selectElement => {
          if (selectElement) {
            // Ensure black color on load
            selectElement.style.setProperty('color', '#000000', 'important');
            selectElement.style.setProperty('background-color', '#ffffff', 'important');
          }
        });
      });
    </script>