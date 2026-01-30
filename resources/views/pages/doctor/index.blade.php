<x-layouts.app :settings="$settings">
  <section id="find-a-doctor" class="find-a-doctor section" style="padding-top: 150px;">
    <div class="container section-title" data-aos="fade-up">
      <h2>Daftar Dokter</h2>
      <p>Temukan dokter berpengalaman dan profesional sesuai kebutuhan kesehatan Anda</p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row justify-content-center mb-5" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-8 text-center">
          <div class="search-section">
            <h3 class="search-title">Temukan Dokter Anda</h3>
            <p class="search-subtitle">Cari melalui direktori lengkap profesional medis berpengalaman kami</p>
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
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 3) * 100 + 100 }}">
            <div class="doctor-profile h-100 mb-0 shadow-sm" style="max-width: 100%;">
              <div class="profile-header">
                <div class="doctor-avatar">
                  <img src="{{ $doctor->photo_url }}" alt="{{ $doctor->name }}" class="img-fluid">

                </div>
                <div class="doctor-details">
                  <h4 class="text-break">{{ $doctor->name }}</h4>
                  <span class="specialty-tag text-break">{{ $doctor->specialization ?? 'Spesialis' }}</span>
                  <!-- <div class="experience-info">
                    <i class="bi bi-award"></i>
                    <span>{{ $doctor->experience_years ?? 0 }} tahun pengalaman</span>
                  </div> -->
                </div>
              </div>
              <!-- <div class="rating-section">
                <div class="stars">
                  @php
                    $rating = $doctor->rating ?? 0;
                    $fullStars = floor($rating);
                    $hasHalfStar = ($rating - $fullStars) >= 0.5;
                  @endphp
                  @for($i = 1; $i <= 5; $i++)
                    @if($i <= $fullStars)
                      <i class="bi bi-star-fill"></i>
                    @elseif($i == $fullStars + 1 && $hasHalfStar)
                      <i class="bi bi-star-half"></i>
                    @else
                      <i class="bi bi-star"></i>
                    @endif
                  @endfor
                </div>
                <span class="rating-score">{{ $doctor->rating ?? 0 }}</span>
                <span class="review-count">({{ $doctor->reviews_count ?? 0 }} reviews)</span>
              </div> -->
              <div class="action-buttons mt-auto">
                <a href="{{ route('doctor.show', $doctor) }}" class="btn-secondary">Lihat Detail</a>
                <a href="#!" class="btn-primary">Pesan Jadwal</a>
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
    .doctor-profile {
      background: #fff;
      border-radius: 15px;
      padding: 24px;
      transition: all 0.3s ease;
      display: flex;
      flex-direction: column;
    }
    .doctor-profile:hover {
      transform: translateY(-5px);
    }

    /* Fix select dropdown styling - Simplified & Robust */
    .find-a-doctor .search-section .search-form .select-wrapper select.form-select {
      background-color: #ffffff !important; /* Force white background */
      color: #000000 !important; /* Force pure black text */
      font-size: 1rem !important;
      font-weight: 500 !important;
      padding: 15px 15px 15px 50px !important; /* Adjusted padding */
      border: 1px solid #e0e0e0 !important; /* Add slight border */
      border-radius: 50px !important; /* Match rounded style */
      cursor: pointer !important;
      opacity: 1 !important;
      min-height: 58px; /* Ensure height matches input */
      
      /* Reset appearance variables for Bootstrap/Browsers */
      -webkit-appearance: menulist !important; 
      -moz-appearance: menulist !important;
      appearance: menulist !important;
    }

    .find-a-doctor .search-section .search-form .select-wrapper select.form-select:focus {
      outline: none !important;
      border-color: #0d6efd !important;
      box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.15) !important;
      color: #000000 !important;
    }

    .find-a-doctor .search-section .search-form .select-wrapper select.form-select option {
      color: #000000 !important;
      background-color: #ffffff !important;
    }

    /* Adjust icon position */
    .find-a-doctor .search-section .search-form .select-wrapper i {
      z-index: 5;
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
