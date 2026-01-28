@props(['about'])
    <section id="home-about" class="home-about section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row align-items-center">
          <!-- <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right" data-aos-delay="200">
            <div class="about-content">
              
              @if($about && $about->vision)
                <div class="vision-section mb-4">
                  <h4 class="fw-bold text-primary">Visi</h4>
                  <div class="vision-text">
                    {!! $about->vision !!}
                  </div>
                </div>
              @elseif(!($about))
              @endif

              @if($about && $about->mission)
                <div class="mission-section mb-4">
                  <h4 class="fw-bold text-primary">Misi</h4>
                  <div class="mission-text">
                    {!! $about->mission !!}
                  </div>
                </div>
              @elseif(!($about))
                <x-empty-state 
                  icon="bi bi-info-circle" 
                  title="Informasi Tentang Kami Belum Tersedia" 
                  subtitle="Profil lengkap rumah sakit sedang kami susun untuk Anda."
                />
              @endif

              <div class="cta-section">
              </div>
            </div>
          </div> -->

          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
            <div class="about-visual">
              <!-- <div class="main-image">
                <img src="{{ $about && $about->photo ? asset('storage/' . $about->photo) : asset('assets/img/health/facilities-9.webp') }}" alt="{{ $about->title ?? 'Modern medical facility' }}" class="img-fluid">
              </div> -->
              <!-- <div class="floating-card">
                <div class="card-content">
                  <div class="icon">
                    <i class="bi bi-heart-pulse"></i>
                  </div>
                  <div class="card-text">
                    <h4>24/7 Emergency Care</h4>
                    <p>Always here when you need us most</p>
                  </div>
                </div>
              </div> -->
              <!-- <div class="experience-badge">
                <div class="badge-content">
                  <span class="years">25+</span>
                  <span class="text">Years of Trusted Care</span>
                </div>
              </div> -->
            </div>
          </div>
        </div>

      </div>

    </section>
