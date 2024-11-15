<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SliderSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_slider' => 1,
                'img_slider' => 'slider-1.jpg',
                'judul_slider' => 'Bangun Ekosistem Ekspor Bersama',
                'judul_slider_en' => 'Build an Export Ecosystem Together',
                'deskripsi_slider' => 'Komunitas Ekspor Indonesia berperan aktif dalam memperluas peluang ekspor.',
                'deskripsi_slider_en' => 'The Indonesian Export Community plays an active role in expanding export opportunities.',
            ],
            [
                'id_slider' => 2,
                'img_slider' => 'slider-2.jpg',
                'judul_slider' => 'Pelatihan & Pendampingan Ekspor',
                'judul_slider_en' => 'Export Training & Assistance',
                'deskripsi_slider' => 'Ikuti program pelatihan dan pendampingan ekspor untuk meningkatkan kapasitas usaha.',
                'deskripsi_slider_en' => 'Join export training and mentoring programs to increase business capacity.',
            ],
            [
                'id_slider' => 3,
                'img_slider' => 'slider-3.jpg',
                'judul_slider' => 'Kolaborasi & Networking Global',
                'judul_slider_en' => 'Global Collaboration & Networking',
                'deskripsi_slider' => 'Komunitas ini menghubungkan Anda dengan buyer dan pelaku ekspor dari negara.',
                'deskripsi_slider_en' => 'This community connects you with buyers and exporters from countries.',
            ],
        ];

        $this->db->table('slider')->insertBatch($data);
    }
}
