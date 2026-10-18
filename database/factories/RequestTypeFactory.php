<?php

namespace Database\Factories;

use App\Models\RequestType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<RequestType>
 */
class RequestTypeFactory extends Factory
{
    private static array $requestTypes = [
        'Cuti' => [
            'Cuti Tahunan',
            'Cuti Besar',
            'Cuti Sakit',
            'Cuti Melahirkan',
            'Cuti Alasan Penting',
            'Cuti di Luar Tanggungan',
            'Cuti karena Alasan Keluarga',
            'Cuti Menikah',
            'Cuti Khitan Anak',
            'Cuti Baptis Anak',
            'Cuti Ibadah',
            'Cuti Umrah',
            'Cuti Haji',
            'Cuti Kematian Keluarga',
            'Cuti Pendampingan Keluarga',
            'Cuti Pemulihan Kesehatan',
            'Cuti Pendidikan',
            'Cuti Akademik',
            'Cuti Khusus',
            'Cuti Tambahan',
            'Cuti Pengganti',
            'Cuti Bersama',
            'Cuti Persalinan',
            'Cuti Keguguran',
            'Cuti Adopsi Anak',
            'Cuti Perawatan Anak',
            'Cuti Pernikahan Anak',
            'Cuti Keperluan Keluarga',
            'Cuti Keadaan Darurat',
            'Cuti Lainnya',
        ],

        'Izin' => [
            'Izin Keperluan Keluarga',
            'Izin Keperluan Pribadi',
            'Izin Terlambat',
            'Izin Pulang Lebih Awal',
            'Izin Tidak Masuk Kerja',
            'Izin Pemeriksaan Kesehatan',
            'Izin Berobat',
            'Izin Mengantar Keluarga',
            'Izin Urusan Administrasi',
            'Izin Keperluan Akademik',
            'Izin Mengikuti Ujian',
            'Izin Mengikuti Seminar',
            'Izin Mengikuti Pelatihan',
            'Izin Kegiatan Kampus',
            'Izin Kegiatan Sosial',
            'Izin Keadaan Darurat',
            'Izin Menjalankan Ibadah',
            'Izin Menghadiri Pernikahan',
            'Izin Kedukaan',
            'Izin Mengurus Dokumen',
            'Izin Konsultasi',
            'Izin Kegiatan Organisasi',
            'Izin Penelitian',
            'Izin Bimbingan Akademik',
            'Izin Keperluan Penelitian',
            'Izin Keperluan Keluarga Inti',
            'Izin Keperluan Anak',
            'Izin Keperluan Orang Tua',
            'Izin Khusus',
            'Izin Lainnya',
        ],

        'Dinas' => [
            'Perjalanan Dinas Dalam Kota',
            'Perjalanan Dinas Luar Kota',
            'Dinas Luar Negeri',
            'Tugas Belajar',
            'Mengikuti Seminar',
            'Mengikuti Pelatihan',
            'Menghadiri Konferensi',
            'Kunjungan Kerja',
            'Rapat Koordinasi',
            'Rapat Eksternal',
            'Rapat Internal',
            'Pendampingan Kegiatan',
            'Kegiatan Penelitian',
            'Kegiatan Pengabdian',
            'Pengawasan Lapangan',
            'Monitoring Program',
            'Evaluasi Program',
            'Studi Banding',
            'Workshop Nasional',
            'Workshop Internasional',
            'Pelatihan Kompetensi',
            'Sertifikasi Profesi',
            'Kegiatan Akademik',
            'Kegiatan Kemahasiswaan',
            'Promosi Institusi',
            'Penerimaan Mahasiswa',
            'Penyusunan Kebijakan',
            'Audit Internal',
            'Kegiatan Kerja Sama',
            'Dinas Lainnya',
        ],
    ];

    public function definition(): array
    {
        $kind = fake()->randomElement(array_keys(self::$requestTypes));

        $name = fake()->randomElement(self::$requestTypes[$kind]);

        return [
            'kind' => $kind,

            'code' => fake()->unique()->bothify('REQ-######'),

            'name' => $name,

            'applies_to' => 'Pegawai',

            'annual_quota' => $name === 'Cuti Tahunan' ? 12 : 0,

            'requires_doctorate' => false,

            'period_type' => 'Tahunan',

            'description' => "Pengajuan {$name} untuk pengujian sistem.",

            'is_active' => true,
        ];
    }
}