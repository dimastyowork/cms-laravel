<!-- Services Component -->
<section class="services-section" id="services">
    <div class="services-container">
        <h2>Layanan Kami</h2>
        <p class="section-subtitle">Kami menyediakan berbagai layanan kesehatan berkualitas tinggi</p>

        <div class="services-grid">
            @php
                $services = [
                    [
                        'icon' => '🏥',
                        'name' => 'Rawat Inap',
                        'description' => 'Fasilitas rawat inap dengan standar internasional dan tenaga medis berpengalaman.'
                    ],
                    [
                        'icon' => '🚑',
                        'name' => 'Gawat Darurat',
                        'description' => 'Layanan emergency 24/7 siap membantu dengan peralatan medis tercanggih.'
                    ],
                    [
                        'icon' => '👨‍⚕️',
                        'name' => 'Konsultasi Dokter',
                        'description' => 'Konsultasi dengan dokter spesialis dan umum berpengalaman di bidangnya.'
                    ],
                    [
                        'icon' => '🔬',
                        'name' => 'Laboratorium',
                        'description' => 'Layanan pemeriksaan laboratorium lengkap dengan hasil akurat dan cepat.'
                    ],
                    [
                        'icon' => '🖼️',
                        'name' => 'Radiologi',
                        'description' => 'Pemeriksaan radiologi dengan teknologi imaging terdepan untuk diagnosis akurat.'
                    ],
                    [
                        'icon' => '💉',
                        'name' => 'Imunisasi',
                        'description' => 'Program imunisasi lengkap untuk semua usia dengan vaksin berkualitas.'
                    ],
                ];
            @endphp

            @foreach($services as $service)
            <div class="service-card">
                <div class="service-icon">{{ $service['icon'] }}</div>
                <h3>{{ $service['name'] }}</h3>
                <p>{{ $service['description'] }}</p>
                <a href="#" class="service-link">Pelajari Lebih Lanjut →</a>
            </div>
            @endforeach
        </div>
    </div>
</section>
