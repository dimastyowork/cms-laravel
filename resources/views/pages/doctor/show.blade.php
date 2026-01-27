<x-layouts.app :settings="$settings">
  <section class="doctor-details-section section" style="padding-top: 150px;">
    <div class="container" data-aos="fade-up">
      <div class="row">
        <!-- Profile Sidebar -->
        <div class="col-lg-4 mb-4 mb-lg-0">
          <div class="doctor-profile-card shadow-sm rounded-4 p-4 text-center bg-white h-100">
            <div class="doctor-avatar-large mb-4 mx-auto position-relative" style="width: 200px; height: 200px;">
              <img src="{{ $doctor->photo_url }}" alt="{{ $doctor->name }}" class="img-fluid rounded-circle w-100 h-100 object-fit-cover">
            </div>
            
            <h2 class="mb-2 fw-bold text-break">{{ $doctor->name }}</h2>
            <span class="badge bg-primary-subtle text-primary mb-3 fs-6 px-3 py-2 rounded-pill text-break">
              {{ $doctor->specialization ?? 'Spesialis' }}
            </span>
            
            <div class="d-flex justify-content-center gap-4 mb-4 text-muted">
              <div class="text-center">
                <i class="bi bi-briefcase fs-4 d-block mb-1 text-primary"></i>
                <small>{{ $doctor->experience_years ?? 0 }} Tahun</small>
              </div>
              <div class="text-center">
                <i class="bi bi-star-fill fs-4 d-block mb-1 text-warning"></i>
                <small>{{ $doctor->rating ?? 0 }} ({{ $doctor->reviews_count ?? 0 }})</small>
              </div>
            </div>

            <div class="d-grid gap-2">
              <button class="btn btn-primary py-2 rounded-pill">
                <i class="bi bi-calendar-check me-2"></i> Buat Janji Temu
              </button>
            </div>
          </div>
        </div>

        <!-- Details Content -->
        <div class="col-lg-8">
          <div class="card shadow-sm border-0 rounded-4 p-4 bg-white mb-4">
            <h4 class="fw-bold mb-4 position-relative pb-2 border-bottom">Tentang Dokter</h4>
            <div class="doctor-bio text-muted lh-lg">
              <p>
                {{ $doctor->bio ?? 'Tidak ada informasi biografi untuk dokter ini.' }}
              </p>
            </div>
          </div>

          <div class="card shadow-sm border-0 rounded-4 p-4 bg-white">
            <h4 class="fw-bold mb-4 position-relative pb-2 border-bottom">Jadwal Praktik</h4>
            
            @forelse($doctor->schedules as $schedule)
              <div class="unit-schedule mb-4 last:mb-0">
                <div class="d-flex align-items-center mb-3">
                    <div class="bg-primary-subtle p-2 rounded-3 me-3 text-primary">
                        <i class="bi bi-hospital fs-4"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-0">{{ $schedule->unit->name ?? 'Unit Umum' }}</h5>
                        <small class="text-muted">{{ $schedule->note ?? '' }}</small>
                    </div>
                </div>

                <div class="table-responsive">
                  <table class="table table-hover align-middle border rounded-3 overflow-hidden">
                    <thead class="table-light">
                      <tr>
                        <th class="ps-4 py-3" style="width: 40%">Hari</th>
                        <th class="py-3">Jam Praktik</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                        $dayMap = [
                          'Monday' => 'Senin',
                          'Tuesday' => 'Selasa',
                          'Wednesday' => 'Rabu',
                          'Thursday' => 'Kamis',
                          'Friday' => 'Jumat',
                          'Saturday' => 'Sabtu',
                          'Sunday' => 'Minggu',
                        ];
                      @endphp
                      @if(is_array($schedule->time_slots))
                        @foreach($schedule->time_slots as $slot)
                          <tr>
                            <td class="ps-4 fw-medium text-muted">
                              {{ $dayMap[$slot['day']] ?? $slot['day'] }}
                            </td>
                            <td class="text-primary fw-medium">
                              @if(isset($slot['slots']) && is_array($slot['slots']))
                                <ul class="list-unstyled mb-0">
                                @foreach($slot['slots'] as $time)
                                    <li>
                                        {{ \Carbon\Carbon::parse($time['start'])->format('H:i') }} - 
                                        {{ \Carbon\Carbon::parse($time['end'])->format('H:i') }}
                                    </li>
                                @endforeach
                                </ul>
                              @else
                                -
                              @endif
                            </td>
                          </tr>
                        @endforeach
                      @else
                        <tr>
                            <td colspan="2" class="text-center py-3 text-muted">Belum ada jadwal detail</td>
                        </tr>
                      @endif
                    </tbody>
                  </table>
                </div>
              </div>
            @empty
              <div class="text-center py-5">
                <i class="bi bi-calendar-x fs-1 text-muted opacity-50 mb-3 d-block"></i>
                <p class="text-muted">Belum ada jadwal tersedia untuk dokter ini.</p>
              </div>
            @endforelse
          </div>
        </div>
      </div>
    </div>
  </section>
</x-layouts.app>
