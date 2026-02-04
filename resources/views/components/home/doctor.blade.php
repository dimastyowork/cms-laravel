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

        <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="700">
          <a href="{{ route('doctor.index') }}" class="btn-view-all">
            Lihat Semua Dokter
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>

      </div>

    </section>

    <style>
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
          display: block !important;
        }
      }

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
        const selectElements = document.querySelectorAll('.find-a-doctor select[name="specialization"]');
        selectElements.forEach(selectElement => {
          if (selectElement) {
            selectElement.style.setProperty('color', '#000000', 'important');
            selectElement.style.setProperty('background-color', '#ffffff', 'important');
          }
        });
      });
    </script>