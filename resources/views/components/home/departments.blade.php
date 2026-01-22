    <!-- Featured Departments Section -->
    <section id="featured-departments" class="featured-departments section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Poliklinik</h2>
        <p>Melayani pemeriksaan dan konsultasi kesehatan dengan dokter berpengalaman dan fasilitas lengkap.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-5">
          @forelse($departments as $department)
          <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="specialty-card">
              <div class="specialty-content">
                <div class="specialty-meta">
                  <span class="specialty-label">Specialized Care</span>
                </div>
                <h3>{{ $department->name }}</h3>
                <p>{{ Str::limit($department->description, 100) }}</p>
                <div class="specialty-features">
                  <!-- Optional: features if added to model, or static for now -->
                  <!-- <span><i class="bi bi-check-circle-fill"></i>24/7 Emergency Cardiac Care</span> -->
                </div>
                <!-- Link to details if needed, for now just # or show -->
                <a href="#!" class="specialty-link">
                  Explore {{ $department->name }} <i class="bi bi-arrow-right"></i>
                </a>
              </div>
              <div class="specialty-visual">
                <img src="{{ $department->image ? asset('storage/' . $department->image) : asset('assets/img/health/cardiology-1.webp') }}" alt="{{ $department->name }}" class="img-fluid">
                <div class="visual-overlay">
                  <i class="bi bi-heart-pulse"></i>
                </div>
              </div>
            </div>
          </div><!-- End Specialty Card -->
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

    </section><!-- /Featured Departments Section -->
