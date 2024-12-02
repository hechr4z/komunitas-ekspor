<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Pengumuman extends Seeder
{
    public function run()
    {
        $data = [
            [
                'judul_pengumuman' => 'Pengumuman Event Ekspor Nasional',
                'poster_pengumuman' => 'slider-1.jpg',
                'deskripsi_pengumuman' => 'Kami mengundang seluruh anggota komunitas ekspor untuk hadir dalam acara tahunan Ekspor Nasional yang diselenggarakan untuk mempertemukan pelaku ekspor dan pemangku kepentingan di seluruh Indonesia. Acara ini akan diadakan selama tiga hari, dimulai dari 20 November 2024, dengan berbagai sesi yang mencakup workshop, pameran, dan networking untuk para pelaku ekspor. Jangan lewatkan kesempatan ini untuk memperluas jaringan dan meningkatkan kemampuan ekspor Anda!',
                'start_date' => '2024-11-20',
                'end_date' => '2024-11-22',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'slug' => url_title('Pengumuman Event Ekspor Nasional', '-', true),
            ],
            [
                'judul_pengumuman' => 'Perubahan Kebijakan Ekspor Produk Pertanian',
                'poster_pengumuman' => 'slider-2.jpg',
                'deskripsi_pengumuman' => 'Sehubungan dengan perubahan kebijakan ekspor produk pertanian yang mulai diberlakukan pada 1 Januari 2025, kami mendorong seluruh pelaku ekspor untuk memahami regulasi terbaru ini. Kebijakan ini mencakup persyaratan tambahan untuk sertifikasi produk dan inspeksi yang lebih ketat di pelabuhan. Mohon dipastikan bahwa produk Anda memenuhi semua persyaratan baru agar tidak terjadi hambatan dalam proses pengiriman.',
                'start_date' => '2024-12-01',
                'end_date' => '2025-01-31',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'slug' => url_title('Perubahan Kebijakan Ekspor Produk Pertanian', '-', true),
            ],
            [
                'judul_pengumuman' => 'Workshop Pelatihan Ekspor: Meningkatkan Pengetahuan Ekspor',
                'poster_pengumuman' => 'slider-3.jpg',
                'deskripsi_pengumuman' => 'Kami mengadakan workshop pelatihan untuk meningkatkan keterampilan dan pengetahuan tentang ekspor, terutama bagi UMKM. Workshop ini akan meliputi pelatihan praktik terbaik dalam ekspor, teknik negosiasi internasional, dan pengenalan terhadap peraturan ekspor yang berlaku. Acara ini akan diadakan di Jakarta, dan terbuka untuk semua anggota komunitas ekspor. Kami harapkan partisipasi aktif dari semua anggota yang ingin memperkuat kemampuan ekspor mereka.',
                'start_date' => '2024-12-15',
                'end_date' => '2024-12-17',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'slug' => url_title('Workshop Pelatihan Ekspor: Meningkatkan Pengetahuan Ekspor', '-', true),
            ],
            [
                'judul_pengumuman' => 'Laporan Tahunan Komunitas Ekspor Indonesia 2024',
                'poster_pengumuman' => 'slide-4.jpg',
                'deskripsi_pengumuman' => 'Dengan bangga kami mempersembahkan Laporan Tahunan Komunitas Ekspor Indonesia untuk tahun 2024. Laporan ini mencakup pencapaian utama, peningkatan jumlah anggota, serta proyek dan inisiatif yang telah kami lakukan sepanjang tahun untuk mendukung pertumbuhan ekspor nasional. Harap dibaca dan diambil manfaatnya untuk lebih memahami kemajuan dan tantangan yang dihadapi oleh komunitas kita.',
                'start_date' => '2024-12-01',
                'end_date' => '2025-12-31',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'slug' => url_title('Laporan Tahunan Komunitas Ekspor Indonesia 2024', '-', true),
            ],
        ];

        $this->db->table('pengumuman')->insertBatch($data);
    }
}
