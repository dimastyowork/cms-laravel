<x-layouts.app :settings="$settings">
  <section class="section" style="padding-top: 150px;">
    <div class="container" data-aos="fade-up">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <article class="polyclinic-details mb-5">
            <style>
              .polyclinic-details .header-content .badge { padding: 8px 15px; border-radius: 50px; font-weight: 600; letter-spacing: 0.5px; }
              .polyclinic-details .post-img .image-wrapper { position: relative; border-radius: 24px; transition: transform 0.3s ease; box-shadow: 0 15px 30px rgba(0,0,0,0.1); }
              .polyclinic-details .content img { max-width: 100% !important; height: auto !important; border-radius: 16px; box-shadow: 0 10px 20px rgba(0,0,0,0.05); margin: 30px auto; display: block; }
              .polyclinic-details .content p { margin-bottom: 25px; line-height: 1.8; color: #444; font-size: 1.1rem; }
              
              .schedule-card { border: none; border-radius: 20px; transition: all 0.3s ease; }
              .schedule-card:hover { transform: translateY(-5px); }
              .day-badge { width: 100px; }
              
              .doctor-name-link { color: inherit; text-decoration: none; transition: color 0.2s; }
              .doctor-name-link:hover { color: var(--accent-color); }
            </style>

            <div class="header-content mb-5 text-center">
              <span class="badge bg-primary-subtle text-primary mb-3 text-uppercase shadow-sm px-4 py-2">Layanan Poliklinik</span>
              <h1 class="title fw-bold mb-4 display-4 text-dark">{{ $unit->name }}</h1>
              <div class="description-lead col-lg-8 mx-auto">
                <p class="text-muted fs-5">Layanan unggulan dengan tenaga medis profesional dan fasilitas modern untuk kenyamanan Anda.</p>
              </div>
            </div>

            @if($unit->image_url)
              <div class="post-img mb-5">
                <div class="image-wrapper overflow-hidden">
                  <img src="{{ $unit->image_url }}" alt="{{ $unit->name }}" class="img-fluid w-100" style="max-height: 500px; object-fit: cover; object-position: center;">
                </div>
              </div>
            @endif

            <div class="row gy-5">
              <div class="col-lg-7">
                <div class="card shadow-sm border-0 rounded-4 p-4 bg-white mb-4">
                  <h4 class="fw-bold mb-4 position-relative pb-2">
                    Tentang Poliklinik
                    <div style="position: absolute; bottom: 0; left: 0; width: 50px; height: 3px; background: var(--accent-color);"></div>
                  </h4>
                  <div class="content text-dark">
                    @if($unit->description)
                      <div class="mb-4">
                        {!! nl2br(e($unit->description)) !!}
                      </div>
                    @endif

                    @if($unit->content)
                      <div class="rich-content">
                        {!! $unit->content !!}
                      </div>
                    @endif

                    @if(!$unit->description && !$unit->content)
                      <p class="text-muted italic">Informasi lengkap mengenai poliklinik ini akan segera diperbarui. Kami berkomitmen untuk memberikan pelayanan kesehatan terbaik bagi Anda dan keluarga.</p>
                    @endif
                  </div>
                </div>
              </div>

              <div class="col-lg-5">
                <div class="card shadow-sm border-0 rounded-4 p-4 bg-white sticky-top" style="top: 100px; z-index: 1;">
                  <h4 class="fw-bold mb-4 position-relative pb-2">
                    Jadwal Praktik Dokter
                    <div style="position: absolute; bottom: 0; left: 0; width: 50px; height: 3px; background: var(--accent-color);"></div>
                  </h4>
                  
                  <div class="doctor-schedules">
                    @forelse($unit->schedules as $schedule)
                      <div class="doctor-item mb-4 pb-3 border-bottom last:border-0 last:pb-0">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                          <div class="d-flex align-items-center">
                            <img src="{{ $schedule->doctor->photo_url }}" alt="{{ $schedule->doctor->name }}" class="rounded-circle me-3" style="width: 50px; height: 50px; object-fit: cover;">
                            <div>
                              <h6 class="mb-0 fw-bold">
                                <a href="{{ route('doctor.show', $schedule->doctor) }}" class="doctor-name-link">
                                  {{ $schedule->doctor->name }}
                                </a>
                              </h6>
                              <small class="text-muted">{{ $schedule->doctor->specialization }}</small>
                            </div>
                          </div>
                          <a href="{{ route('doctor.show', $schedule->doctor) }}" class="btn btn-sm btn-outline-primary rounded-circle shadow-sm" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease;">
                            <i class="bi bi-arrow-right"></i>
                          </a>
                        </div>

                        <!-- <div class="schedule-slots">
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
                              <div class="d-flex justify-content-between align-items-center mb-1 small">
                                <span class="fw-medium text-secondary">{{ $dayMap[$slot['day']] ?? $slot['day'] }}</span>
                                <span class="text-primary">
                                  @if(isset($slot['slots']) && is_array($slot['slots']))
                                    @foreach($slot['slots'] as $time)
                                      {{ \Carbon\Carbon::parse($time['start'])->format('H:i') }} - {{ \Carbon\Carbon::parse($time['end'])->format('H:i') }}{{ !$loop->last ? ', ' : '' }}
                                    @endforeach
                                  @else
                                    -
                                  @endif
                                </span>
                              </div>
                            @endforeach
                          @else
                            <div class="text-muted small">Belum ada jadwal detail</div>
                          @endif
                        </div> -->
                      </div>
                    @empty
                      <div class="text-center py-4">
                        <i class="bi bi-calendar-x fs-1 text-muted opacity-25 mb-3 d-block"></i>
                        <p class="text-muted small">Belum ada jadwal dokter tersedia untuk poliklinik ini.</p>
                      </div>
                    @endforelse
                  </div>

                  <div class="d-grid mt-4">
                    <button class="btn btn-primary rounded-pill py-2">
                      <i class="bi bi-calendar-check me-2"></i> Buat Janji Temu
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <div class="mt-5 pt-4 border-top">
                <a href="{{ route('polyclinic.index') }}" class="btn btn-outline-primary rounded-pill px-4"><i class="bi bi-arrow-left me-2"></i> Kembali ke Poliklinik</a>
            </div>

          </article>
        </div>
      </div>
    </div>
  </section>
</x-layouts.app>
