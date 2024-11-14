<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class VidioTutorialSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_kategori_video' => '1',
                'judul_video' => 'Pembelajaran Ekspor Untuk Pemula',
                'video_url' => 'dQw4w9WgXcQ?si=bAqEJpndv3r54rgm',
                'thumbnail' => 'be1.jpg',
                'deskripsi_video' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'slug' => 'Pembelajara-Ekspor-Untuk-Pemula',
                'slug_en' => 'video-learning-export-for-beginners'
            ],
            [
                'id_kategori_video' => '1',
                'judul_video' => 'Langkah-langkah Membangun Bisnis Ekspor',
                'video_url' => 'dQw4w9WgXcQ?si=bAqEJpndv3r54rgm',
                'thumbnail' => 'be2.jpg',
                'deskripsi_video' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'slug' => 'Langkah-langkah-Membangun-Bisnis-Ekspor',
                'slug_en' => 'steps-to-build-export-business'
            ],
            [
                'id_kategori_video' => '2',
                'judul_video' => 'Cara Hitung Harga Jual',
                'video_url' => 'dQw4w9WgXcQ?si=bAqEJpndv3r54rgm',
                'thumbnail' => 'be5.jpeg',
                'deskripsi_video' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'slug' => 'Cara-Hitung-Harga-Jual',
                'slug_en' => 'how-to-calculate-selling-price'
            ],
            [
                'id_kategori_video' => '2',
                'judul_video' => 'Tutorial Cara Menghitung Biaya Eskpor Menggunakan Calculator Biaya Ekspor',
                'video_url' => 'dQw4w9WgXcQ?si=bAqEJpndv3r54rgm',
                'thumbnail' => 'be6.jpg',
                'deskripsi_video' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'slug' => 'Tutorial-Cara-Menghitung-Biaya-Eskpor-Menggunakan-Calculator-Biaya-Ekspor',
                'slug_en' => 'tutorial-how-to-calculate-export-cost-using-export-cost-calculator'
            ],
            [
                'id_kategori_video' => '2',
                'judul_video' => 'Cara Ekspor Barang dan Pengemasannya',
                'video_url' => 'dQw4w9WgXcQ?si=bAqEJpndv3r54rgm',
                'thumbnail' => 'be4.jpg',
                'deskripsi_video' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'slug' => 'Cara-Ekspor-Barang-dan-Pengemasannya',
                'slug_en' => 'how-to-export-goods-and-packaging'
            ],
            [
                'id_kategori_video' => '2',
                'judul_video' => 'Cara Mencari Buyers Ekspor',
                'video_url' => 'dQw4w9WgXcQ?si=bAqEJpndv3r54rgm',
                'thumbnail' => 'be3.jpg',
                'deskripsi_video' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'slug' => 'Cara-Mencari-Buyers-Ekspor',
                'slug_en' => 'how-to-find-export-buyers'
            ],
        ];

        $this->db->table('video_tutorial')->insertBatch($data);
    }
}
