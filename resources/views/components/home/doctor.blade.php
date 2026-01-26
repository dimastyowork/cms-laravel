@props(['doctors'])
    <section id="find-a-doctor" class="find-a-doctor section">

      <div class="container section-title" data-aos="fade-up">
        <h2>Cari Dokter</h2>
        <p>Temukan dokter berpengalaman dan profesional sesuai kebutuhan kesehatan Anda</p>
      </div>

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row justify-content-center mb-5" data-aos="fade-up" data-aos-delay="200">
          <div class="col-lg-8 text-center">
            <div class="search-section">
              <h3 class="search-title">Temukan Dokter Anda</h3>
              <p class="search-subtitle">Cari melalui direktori lengkap profesional medis berpengalaman kami
              </p>
              <form class="search-form" action="#!" method="GET">
                <div class="search-input-group">
                  <div class="input-wrapper">
                    <i class="bi bi-person"></i>
                    <input type="text" class="form-control" name="search" placeholder="Cari nama dokter">
                  </div>
                  <div class="select-wrapper">
                    <i class="bi bi-heart-pulse"></i>
                    <select class="form-select" name="specialization">
                      <option value="">Semua Spesialisasi</option>
                      @php
                        $specializations = \App\Models\Doctor::distinct()->pluck('specialization')->filter();
                      @endphp
                      @foreach($specializations as $spec)
                        <option value="{{ $spec }}">{{ $spec }}</option>
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

        <div class="doctors-grid swiper" id="doctorsSwiper" data-aos="fade-up" data-aos-delay="300">
          <div class="swiper-wrapper">
            @php
              $doctorChunks = $doctors->chunk(6);
            @endphp
            @forelse($doctorChunks as $chunk)
            <div class="swiper-slide">
              <div class="slide-content">
                @foreach($chunk as $doctor)
                <div class="doctor-profile" data-aos="zoom-in" data-aos-delay="{{ ($loop->index % 6) * 100 + 100 }}">
                  <div class="profile-header">
                    <div class="doctor-avatar">
                      <img src="{{ $doctor->photo_url }}" alt="{{ $doctor->name }}" class="img-fluid">
                      <div class="status-indicator {{ $doctor->status ?? 'offline' }}"></div>
                    </div>
                    <div class="doctor-details">
                      <h4>{{ $doctor->name }}</h4>
                      <span class="specialty-tag">{{ $doctor->specialization ?? 'Spesialis' }}</span>
                      <div class="experience-info">
                        <i class="bi bi-award"></i>
                        <span>{{ $doctor->experience_years ?? 0 }} tahun pengalaman</span>
                      </div>
                    </div>
                  </div>
                  <div class="rating-section">
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
                  </div>
                  <div class="action-buttons">
                    <a href="#!" class="btn-secondary">Lihat Detail</a>
                    <a href="#!" class="btn-primary">Pesan Jadwal</a>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
            @empty
            <div class="swiper-slide">
              <div class="col-12">
                <x-empty-state 
                  icon="bi bi-person-heart" 
                  title="Belum Ada Data Dokter" 
                  subtitle="Mohon maaf, saat ini kami sedang memperbarui daftar dokter kami. Silakan kembali lagi nanti."
                />
              </div>
            </div>
            @endforelse
          </div>

          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-pagination"></div>
        </div>

        <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="700">
          <a href="{{ route('doctor.index') }}" class="btn-view-all">
            Lihat Semua Dokter
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>

      </div>

    </section>