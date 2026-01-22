@props(['doctors'])

<!-- Doctors Section -->
<section id="doctors" class="doctors section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Doctors</h2>
    <p>Find Our Expert Doctors</p>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="row gy-4">

      @forelse($doctors as $doctor)
      <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
        <div class="team-member">
          <div class="member-img">
            @if($doctor->photo)
              <img src="{{ asset('storage/' . $doctor->photo) }}" class="img-fluid" alt="{{ $doctor->name }}">
            @else
              <img src="{{ asset('assets/img/doctors/doctors-1.jpg') }}" class="img-fluid" alt="{{ $doctor->name }}">
            @endif
            <div class="social">
              @if($doctor->status === 'available')
                <span class="badge bg-success">Available</span>
              @elseif($doctor->status === 'busy')
                <span class="badge bg-warning">Busy</span>
              @else
                <span class="badge bg-danger">Offline</span>
              @endif
            </div>
          </div>
          <div class="member-info">
            <h4>{{ $doctor->name }}</h4>
            <span>{{ $doctor->specialization }}</span>
            @if($doctor->experience_years)
              <p class="text-muted small">{{ $doctor->experience_years }} years experience</p>
            @endif
            @if($doctor->rating)
              <div class="rating">
                @for($i = 1; $i <= 5; $i++)
                  @if($i <= $doctor->rating)
                    <i class="bi bi-star-fill text-warning"></i>
                  @else
                    <i class="bi bi-star text-warning"></i>
                  @endif
                @endfor
                <span class="text-muted small">({{ $doctor->reviews_count ?? 0 }} reviews)</span>
              </div>
            @endif
          </div>
        </div>
      </div><!-- End Team Member -->
      @empty
      <div class="col-12">
        <div class="alert alert-info text-center">
          <i class="bi bi-info-circle me-2"></i>No doctors found at the moment.
        </div>
      </div>
      @endforelse

    </div>

  </div>

</section><!-- /Doctors Section -->
