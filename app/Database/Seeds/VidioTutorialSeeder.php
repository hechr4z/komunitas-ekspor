<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use \CodeIgniter\I18n\Time;

class VidioTutorialSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_kategori_video' => '1',
                'judul_video' => 'Pembelajaran Ekspor Untuk Pemula',
                'judul_video_en' => 'Export Learning for Beginners',
                'video_url' => 'dQw4w9WgXcQ?si=bAqEJpndv3r54rgm',
                'thumbnail' => 'be1.jpg',
                'deskripsi_video' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry...',
                'deskripsi_video_en' => 'This video provides an introduction to exporting...',
                'slug' => 'Pembelajara-Ekspor-Untuk-Pemula',
                'slug_en' => 'video-learning-export-for-beginners',
                'created_at' => Time::now(),
            ],
            [
                'id_kategori_video' => '1',
                'judul_video' => 'Langkah-langkah Membangun Bisnis Ekspor',
                'judul_video_en' => 'Steps to Build an Export Business',
                'video_url' => 'dQw4w9WgXcQ?si=bAqEJpndv3r54rgm',
                'thumbnail' => 'be2.jpg',
                'deskripsi_video' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry...',
                'deskripsi_video_en' => 'This tutorial covers the critical steps needed...',
                'slug' => 'Langkah-langkah-Membangun-Bisnis-Ekspor',
                'slug_en' => 'steps-to-build-export-business',
                'created_at' => Time::now()->subMonths(1),
            ],
            [
                'id_kategori_video' => '2',
                'judul_video' => 'Cara Hitung Harga Jual',
                'judul_video_en' => 'How to Calculate Selling Price',
                'video_url' => 'dQw4w9WgXcQ?si=bAqEJpndv3r54rgm',
                'thumbnail' => 'be5.jpeg',
                'deskripsi_video' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry...',
                'deskripsi_video_en' => 'In this video, we will walk you through...',
                'slug' => 'Cara-Hitung-Harga-Jual',
                'slug_en' => 'how-to-calculate-selling-price',
                'created_at' => Time::now()->subMonths(2),
            ],
            [
                'id_kategori_video' => '2',
                'judul_video' => 'Tutorial Cara Menghitung Biaya Ekspor Menggunakan Calculator Biaya Ekspor',
                'judul_video_en' => 'Tutorial on How to Calculate Export Costs Using Export Cost Calculator',
                'video_url' => 'dQw4w9WgXcQ?si=bAqEJpndv3r54rgm',
                'thumbnail' => 'be6.jpg',
                'deskripsi_video' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry...',
                'deskripsi_video_en' => 'This video tutorial teaches you how to calculate...',
                'slug' => 'Tutorial-Cara-Menghitung-Biaya-Eskpor-Menggunakan-Calculator-Biaya-Ekspor',
                'slug_en' => 'tutorial-how-to-calculate-export-cost-using-export-cost-calculator',
                'created_at' => Time::now()->subMonths(3),
            ],
            [
                'id_kategori_video' => '2',
                'judul_video' => 'Cara Ekspor Barang dan Pengemasannya',
                'judul_video_en' => 'How to Export Goods and Packaging',
                'video_url' => 'dQw4w9WgXcQ?si=bAqEJpndv3r54rgm',
                'thumbnail' => 'be4.jpg',
                'deskripsi_video' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry...',
                'deskripsi_video_en' => 'This video explains the process of exporting goods...',
                'slug' => 'Cara-Ekspor-Barang-dan-Pengemasannya',
                'slug_en' => 'how-to-export-goods-and-packaging',
                'created_at' => Time::now()->subMonths(4),
            ],
            [
                'id_kategori_video' => '2',
                'judul_video' => 'Cara Mencari Buyers Ekspor',
                'judul_video_en' => 'How to Find Export Buyers',
                'video_url' => 'dQw4w9WgXcQ?si=bAqEJpndv3r54rgm',
                'thumbnail' => 'be3.jpg',
                'deskripsi_video' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry...',
                'deskripsi_video_en' => 'In this video, we cover strategies for finding buyers...',
                'slug' => 'Cara-Mencari-Buyers-Ekspor',
                'slug_en' => 'how-to-find-export-buyers',
                'created_at' => Time::now()->subMonths(5),
            ],
            // Tambahan 4 data baru
            [
                'id_kategori_video' => '1',
                'judul_video' => 'Tips Sukses Ekspor Pertama',
                'judul_video_en' => 'Tips for a Successful First Export',
                'video_url' => 'dQw4w9WgXcQ?si=bAqEJpndv3r54rgm',
                'thumbnail' => 'be7.png',
                'deskripsi_video' => 'Berbagai tips praktis untuk memulai ekspor pertama kali...',
                'deskripsi_video_en' => 'Practical tips for successfully initiating your first export...',
                'slug' => 'Tips-Sukses-Ekspor-Pertama',
                'slug_en' => 'tips-successful-first-export',
                'created_at' => Time::now()->subMonths(6),
            ],
            [
                'id_kategori_video' => '1',
                'judul_video' => 'Panduan Dokumen Ekspor',
                'judul_video_en' => 'Guide to Export Documents',
                'video_url' => 'dQw4w9WgXcQ?si=bAqEJpndv3r54rgm',
                'thumbnail' => 'be8.jpg',
                'deskripsi_video' => 'Panduan lengkap untuk mempersiapkan dokumen ekspor...',
                'deskripsi_video_en' => 'A complete guide to preparing export documents...',
                'slug' => 'Panduan-Dokumen-Ekspor',
                'slug_en' => 'guide-to-export-documents',
                'created_at' => Time::now()->subMonths(7),
            ],
            [
                'id_kategori_video' => '2',
                'judul_video' => 'Cara Menemukan Pasar Internasional',
                'judul_video_en' => 'How to Identify International Markets',
                'video_url' => 'dQw4w9WgXcQ?si=bAqEJpndv3r54rgm',
                'thumbnail' => 'slider-2.jpg',
                'deskripsi_video' => 'Langkah-langkah untuk menargetkan pasar luar negeri...',
                'deskripsi_video_en' => 'Steps to effectively target international markets...',
                'slug' => 'Cara-Menemukan-Pasar-Internasional',
                'slug_en' => 'how-to-identify-international-markets',
                'created_at' => Time::now()->subMonths(8),
            ],
            [
                'id_kategori_video' => '2',
                'judul_video' => 'Strategi Marketing untuk Ekspor',
                'judul_video_en' => 'Marketing Strategies for Export',
                'video_url' => 'dQw4w9WgXcQ?si=bAqEJpndv3r54rgm',
                'thumbnail' => 'be9.jpg',
                'deskripsi_video' => 'Strategi efektif untuk memasarkan produk di pasar global...',
                'deskripsi_video_en' => 'Effective strategies to market products in the global arena...',
                'slug' => 'Strategi-Marketing-Untuk-Ekspor',
                'slug_en' => 'marketing-strategies-for-export',
                'created_at' => Time::now()->subMonths(9),
            ],
        ];

        $this->db->table('video_tutorial')->insertBatch($data);
    }
}
