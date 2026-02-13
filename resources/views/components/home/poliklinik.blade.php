@props(['polikliniks', 'settings'])
    <section id="featured-departments" class="featured-departments section">

      <div class="container section-title" data-aos="fade-up">
        <h2>Poliklinik</h2>
        <p>Melayani pemeriksaan dan konsultasi kesehatan dengan dokter berpengalaman dan fasilitas lengkap.</p>
      </div>

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="departments-slider-wrapper">
          <div class="departments-carousel swiper" id="departmentsSwiper" data-aos="fade-up" data-aos-delay="200">
            <div class="swiper-wrapper">
              @php
                $polikliniksChunks = $polikliniks->chunk(2);
              @endphp
              @forelse($polikliniksChunks as $chunk)
              <div class="swiper-slide">
                <div class="slide-grid">
                  @foreach($chunk as $department)
                  <div class="specialty-card modern-card" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 + 100 }}">
                    <a href="{{ route('polyclinic.show', $department->slug) }}" class="specialty-visual">
                      <img src="{{ $department->image_url }}" alt="{{ $department->name }}" class="img-fluid">
                      <div class="visual-overlay">
                        <i class="bi bi-heart-pulse"></i>
                      </div>
                    </a>
                    <div class="specialty-content">
                      <h3>{{ $department->name }}</h3>
                      <p>{{ $department->getExcerpt(100) }}</p>
                      <div class="mt-auto">
                        <a href="{{ route('polyclinic.show', $department->slug) }}" class="specialty-link">
                          Explore {{ $department->name }} <i class="bi bi-arrow-right"></i>
                        </a>
                      </div>
                    </div>
                  </div>
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
            
            <div class="swiper-pagination"></div>
          </div>
          
          <!-- Navigation Buttons Outside Swiper -->
          <div class="swiper-button-next dep-next"></div>
          <div class="swiper-button-prev dep-prev"></div>
        </div>

        @if($polikliniks->count() > 0)
        <div class="text-center mt-4" data-aos="fade-up" data-aos-delay="700">
          <a href="{{ route('polyclinic.index') }}" class="btn-view-all">
            Lihat Semua Poliklinik
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>
        @endif

        @if(optional($settings)->emergency_phone)
        <div class="emergency-banner" data-aos="fade-up" data-aos-delay="400">
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
        @endif

      </div>

    </section>
