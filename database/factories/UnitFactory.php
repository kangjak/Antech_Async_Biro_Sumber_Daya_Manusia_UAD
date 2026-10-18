<?php

namespace Database\Factories;

use App\Models\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Unit>
 */
class UnitFactory extends Factory
{
    /**
     * Indeks untuk menentukan nama unit berikutnya.
     */
    private static int $nextIndex = 0;

    /**
     * Daftar nama unit.
     */
    private static array $unitNames = [
        'Biro Sumber Daya Manusia',
        'Biro Akademik',
        'Biro Keuangan',
        'Biro Administrasi Umum',
        'Biro Kemahasiswaan',
        'Biro Kerja Sama',
        'Biro Perencanaan dan Pengembangan',
        'Biro Humas dan Protokol',
        'Biro Teknologi Informasi',
        'Biro Administrasi Akademik',
        'Biro Administrasi Keuangan',
        'Biro Administrasi Kemahasiswaan',
        'Biro Administrasi Umum dan Rumah Tangga',
        'Biro Penerimaan Mahasiswa Baru',
        'Biro Alumni dan Karier',
        'Biro Pengembangan Sumber Daya Manusia',
        'Biro Pengelolaan Aset',
        'Biro Pengadaan Barang dan Jasa',
        'Biro Hukum dan Tata Laksana',
        'Biro Kesekretariatan',
        'Biro Publikasi dan Informasi',
        'Biro Perencanaan Strategis',
        'Biro Penjaminan Mutu',
        'Biro Pengembangan Institusi',
        'Biro Inkubasi Bisnis',
        'Biro Layanan Mahasiswa',
        'Biro Kesejahteraan Mahasiswa',
        'Biro Beasiswa dan Pendanaan',
        'Biro Organisasi dan Tata Kelola',
        'Biro Keselamatan dan Kesehatan Kerja',
        'Biro Pengelolaan Gedung',
        'Biro Transportasi dan Logistik',
        'Biro Arsip dan Dokumentasi',
        'Biro Data dan Statistik',
        'Biro Transformasi Digital',
        'Biro Keamanan Informasi',
        'Biro Pengembangan Karier',
        'Biro Hubungan Internasional',
        'Biro Kerja Sama Industri',
        'Biro Pengembangan Kurikulum',
        'Biro Evaluasi Akademik',
        'Biro Layanan Perpustakaan',
        'Biro Laboratorium',
        'Biro Penelitian dan Inovasi',
        'Biro Pengabdian kepada Masyarakat',
        'Biro Etika dan Integritas',
        'Biro Pengembangan Organisasi',
        'Biro Manajemen Risiko',
        'Biro Audit Internal',
        'Biro Kepatuhan dan Regulasi',
        'Direktorat Akademik',
        'Direktorat Keuangan',
        'Direktorat Kemahasiswaan',
        'Direktorat Sumber Daya Manusia',
        'Direktorat Teknologi Informasi',
        'Direktorat Kerja Sama',
        'Direktorat Penelitian dan Pengabdian',
        'Direktorat Pengembangan Institusi',
        'Direktorat Pengelolaan Aset',
        'Direktorat Perencanaan Strategis',
        'Pusat Pengembangan Karier',
        'Pusat Bahasa',
        'Pusat Data dan Informasi',
        'Pusat Studi Lingkungan',
        'Pusat Pengembangan Pembelajaran',
        'Pusat Layanan Konseling',
        'Pusat Inovasi dan Kewirausahaan',
        'Pusat Pengembangan Teknologi',
        'Pusat Sertifikasi Profesi',
        'Pusat Kajian Kebijakan',
        'Pusat Pengembangan Alumni',
        'Pusat Penjaminan Mutu',
        'Pusat Studi Islam',
        'Pusat Studi Ekonomi',
        'Pusat Studi Kesehatan',
        'Pusat Studi Pendidikan',
        'Pusat Studi Sosial dan Humaniora',
        'Pusat Studi Energi Terbarukan',
        'Pusat Pengelolaan Jurnal Ilmiah',
        'Pusat Hak Kekayaan Intelektual',
        'Pusat Pengembangan Karakter',
        'Pusat Layanan Disabilitas',
        'Pusat Pengelolaan Laboratorium',
        'Pusat Pengembangan Bahasa Asing',
        'Pusat Pengelolaan Data Penelitian',
        'Pusat Kewirausahaan Mahasiswa',
        'Pusat Pengembangan Media Pembelajaran',
        'Pusat Layanan Teknologi Informasi',
        'Pusat Pengembangan Sistem Informasi',
        'Pusat Keamanan Siber',
        'Pusat Pengelolaan Infrastruktur Digital',
        'Pusat Pengembangan Bisnis',
        'Pusat Pelatihan dan Sertifikasi',
        'Pusat Pengelolaan Arsip',
        'Pusat Pengembangan Kerja Sama',
        'Pusat Kajian Strategis',
        'Pusat Pengelolaan Lingkungan Kampus',
        'Pusat Layanan Kesehatan',
        'Pusat Pengembangan Prestasi Mahasiswa',
    ];

    /**
     * Membuat data unit.
     */
    public function definition(): array
    {
        $index = self::$nextIndex++;

        $name = self::$unitNames[$index]
            ?? 'Unit Tambahan ' . ($index + 1);

        if (str_starts_with($name, 'Direktorat')) {
            $unitType = 'Direktorat';
        } elseif (str_starts_with($name, 'Pusat')) {
            $unitType = 'Pusat';
        } else {
            $unitType = 'Biro';
        }

        return [
            'name' => $name,
            'unit_type' => $unitType,
            'is_active' => true,
        ];
    }
}