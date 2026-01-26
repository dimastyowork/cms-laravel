@props(['polikliniks'])
    <section id="featured-departments" class="featured-departments section">

      <div class="container section-title" data-aos="fade-up">
        <h2>Poliklinik</h2>
        <p>Melayani pemeriksaan dan konsultasi kesehatan dengan dokter berpengalaman dan fasilitas lengkap.</p>
      </div>

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="departments-carousel swiper" id="departmentsSwiper" data-aos="fade-up" data-aos-delay="200">
          <div class="swiper-wrapper">
            @php
              $polikliniksChunks = $polikliniks->chunk(2);
            @endphp
            @forelse($polikliniksChunks as $chunk)
            <div class="swiper-slide">
              <div class="slide-grid">
                @foreach($chunk as $department)
                <div class="specialty-card" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 + 100 }}">
                  <div class="specialty-content">
                    <div class="specialty-meta">
                      <span class="specialty-label">Specialized Care</span>
                    </div>
                    <h3>{{ $department->name }}</h3>
                    <p>{{ Str::limit($department->description, 100) }}</p>
                    <div class="specialty-features">
                    </div>
                    <a href="#!" class="specialty-link">
                      Explore {{ $department->name }} <i class="bi bi-arrow-right"></i>
                    </a>
                  </div>
                  <div class="specialty-visual">
                    <img src="{{ $department->image_url }}" alt="{{ $department->name }}" class="img-fluid">
                    <div class="visual-overlay">
                      <i class="bi bi-heart-pulse"></i>
                    </div>
                  </div>
                </div><!-- End Specialty Card -->
                @endforeach
              </div>
            </div>
            @empty
            <div class="swiper-slide">
              <div class="col-12">
                <x-empty-state 
                  icon="bi bi-hospital" 
                  title="Layanan Poliklinik Belum Tersedia" 
                  subtitle="Kami sedang menyiapkan informasi layanan terbaik untuk Anda. Terima kasih atas kesabaran Anda."
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
          <a href="{{ route('polyclinic.index') }}" class="btn-view-all">
            Lihat Semua Poliklinik
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>

        <div class="emergency-banner" data-aos="fade-up" data-aos-delay="400">
          <div class="row align-items-center">
            <div class="col-lg-8">
              <div class="emergency-content">
                <h3>Emergency Services Available 24/7</h3>
                <p>Our emergency department is equipped with state-of-the-art technology and staffed by board-certified
                  emergency physicians ready to provide immediate care.</p>
              </div>
            </div>
            <div class="col-lg-4 text-lg-end">
              <a href="tel:+15551234567" class="emergency-btn">
                <i class="bi bi-telephone-fill"></i>
                Call Emergency: -
              </a>
            </div>
          </div>
        </div>

      </div>

    </section>
