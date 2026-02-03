<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            // Pelayanan Medis
            ['category' => 'Pelayanan Medis', 'title' => 'IGD (Instalasi Gawat Darurat)', 'description' => 'Pelayanan gawat darurat yang siap siaga 24 jam untuk menangani kondisi medis darurat secara cepat, tepat, dan terintegrasi dengan tenaga medis berpengalaman serta fasilitas penunjang yang memadai.', 'sort_order' => 1],
            ['category' => 'Pelayanan Medis', 'title' => 'Poliklinik Obstetri & Ginekologi (Obsgyn)', 'description' => 'Memberikan layanan kesehatan wanita secara menyeluruh, mulai dari konsultasi kehamilan, pemeriksaan kandungan, hingga penanganan masalah kesehatan reproduksi dengan pendekatan yang aman dan nyaman.', 'sort_order' => 2],
            ['category' => 'Pelayanan Medis', 'title' => 'Poliklinik Anak', 'description' => 'Pelayanan kesehatan khusus untuk bayi dan anak, meliputi pemeriksaan tumbuh kembang, pencegahan, serta penanganan berbagai penyakit anak dengan pendekatan yang ramah dan penuh perhatian.', 'sort_order' => 3],
            ['category' => 'Pelayanan Medis', 'title' => 'Poliklinik Bedah', 'description' => 'Menyediakan layanan konsultasi dan tindakan bedah yang ditangani oleh dokter spesialis bedah berkompeten, didukung fasilitas modern dan standar keselamatan pasien yang tinggi.', 'sort_order' => 4],
            ['category' => 'Pelayanan Medis', 'title' => 'Poliklinik Penyakit Dalam', 'description' => 'Pelayanan diagnosis dan pengobatan berbagai penyakit organ dalam, seperti gangguan metabolik, pencernaan, dan penyakit kronis, dengan pendekatan komprehensif dan berkelanjutan.', 'sort_order' => 5],

            // Pelayanan Klinik
            ['category' => 'Pelayanan Klinik', 'title' => 'Klinik Anti Aging', 'description' => 'Layanan kesehatan yang berfokus pada pencegahan penuaan dini dan peningkatan kualitas hidup melalui pendekatan medis yang aman dan terukur.', 'sort_order' => 1],
            ['category' => 'Pelayanan Klinik', 'title' => 'Klinik Fisioterapi', 'description' => 'Membantu pemulihan fungsi gerak tubuh akibat cedera, pasca operasi, atau gangguan muskuloskeletal melalui terapi fisik yang disesuaikan dengan kebutuhan pasien.', 'sort_order' => 2],
            ['category' => 'Pelayanan Klinik', 'title' => 'Klinik Tumbuh Kembang', 'description' => 'Pelayanan pemantauan dan stimulasi tumbuh kembang anak untuk memastikan perkembangan fisik, motorik, dan kognitif berjalan optimal sejak dini.', 'sort_order' => 3],
            ['category' => 'Pelayanan Klinik', 'title' => 'Klinik Psikologi', 'description' => 'Memberikan layanan konseling dan pendampingan psikologis untuk anak maupun dewasa dalam menghadapi berbagai permasalahan emosional, perilaku, dan kesehatan mental.', 'sort_order' => 4],
            ['category' => 'Pelayanan Klinik', 'title' => 'Klinik Imunisasi', 'description' => 'Menyediakan layanan imunisasi lengkap dan terjadwal sesuai rekomendasi medis untuk melindungi anak dan keluarga dari berbagai penyakit yang dapat dicegah dengan vaksin.', 'sort_order' => 5],
            ['category' => 'Pelayanan Klinik', 'title' => 'Klinik Laktasi', 'description' => 'Pendampingan bagi ibu menyusui melalui edukasi, konsultasi, dan solusi menyusui agar proses pemberian ASI berjalan lancar dan optimal.', 'sort_order' => 6],

            // Pelayanan Perawatan
            ['category' => 'Pelayanan Perawatan', 'title' => 'Kamar Bersalin', 'description' => 'Fasilitas persalinan yang aman, nyaman, dan bersih, didukung tenaga medis profesional untuk mendampingi ibu selama proses melahirkan dengan penuh perhatian.', 'sort_order' => 1],
            ['category' => 'Pelayanan Perawatan', 'title' => 'Kamar Operasi', 'description' => 'Ruang operasi dengan standar sterilisasi tinggi dan peralatan modern untuk mendukung tindakan bedah yang aman dan efektif.', 'sort_order' => 2],
            ['category' => 'Pelayanan Perawatan', 'title' => 'Rawat Inap', 'description' => 'Pelayanan perawatan pasien dengan fasilitas kamar yang nyaman serta pemantauan medis berkelanjutan untuk mendukung proses penyembuhan.', 'sort_order' => 3],
            ['category' => 'Pelayanan Perawatan', 'title' => 'ICU', 'description' => 'Perawatan intensif bagi pasien dengan kondisi kritis yang membutuhkan pemantauan ketat dan penanganan medis khusus selama 24 jam.', 'sort_order' => 4],
            ['category' => 'Pelayanan Perawatan', 'title' => 'NICU/PICU', 'description' => 'Pelayanan perawatan intensif khusus untuk bayi dan anak dengan kondisi kritis, didukung tenaga medis terlatih dan peralatan khusus sesuai kebutuhan pasien.', 'sort_order' => 5],

            // Pelayanan Penunjang Medis
            ['category' => 'Pelayanan Penunjang Medis', 'title' => 'Radiologi', 'description' => 'Layanan pemeriksaan penunjang berupa pencitraan medis untuk membantu diagnosis penyakit secara akurat dan cepat.', 'sort_order' => 1],
            ['category' => 'Pelayanan Penunjang Medis', 'title' => 'Laboratorium', 'description' => 'Menyediakan berbagai pemeriksaan laboratorium dengan hasil yang akurat dan terpercaya sebagai dasar penegakan diagnosis dan evaluasi kesehatan pasien.', 'sort_order' => 2],

            // Homecare
            ['category' => 'Homecare', 'title' => 'Homecare', 'description' => 'Layanan perawatan kesehatan di rumah bagi pasien yang membutuhkan pendampingan medis berkelanjutan, dilakukan oleh tenaga profesional dengan pendekatan yang aman dan personal.', 'sort_order' => 1],
        ];

        foreach ($services as $service) {
            \App\Models\Service::create($service);
        }
    }
}
