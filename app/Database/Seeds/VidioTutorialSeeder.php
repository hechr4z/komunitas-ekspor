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
                'deskripsi_video' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'deskripsi_video_en' => 'This video provides an introduction to exporting, specifically tailored for beginners. It covers the essential concepts of international trade and guides viewers through the basics of the export process, including how to get started and key terms to know.',
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
                'deskripsi_video' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'deskripsi_video_en' => 'This tutorial covers the critical steps needed to establish a successful export business. It includes planning, market research, and the necessary tools and strategies to effectively reach international markets.',
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
                'deskripsi_video' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'deskripsi_video_en' => 'In this video, we will walk you through the process of calculating the selling price of your export products. Learn how to account for costs, profits, and market considerations to set an appropriate price.',
                'slug' => 'Cara-Hitung-Harga-Jual',
                'slug_en' => 'how-to-calculate-selling-price',
                'created_at' => Time::now()->subMonths(2),
            ],
            [
                'id_kategori_video' => '2',
                'judul_video' => 'Tutorial Cara Menghitung Biaya Eskpor Menggunakan Calculator Biaya Ekspor',
                'judul_video_en' => 'Tutorial on How to Calculate Export Costs Using Export Cost Calculator',
                'video_url' => 'dQw4w9WgXcQ?si=bAqEJpndv3r54rgm',
                'thumbnail' => 'be6.jpg',
                'deskripsi_video' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'deskripsi_video_en' => 'This video tutorial teaches you how to calculate the cost of exporting goods using an export cost calculator. It helps you understand how to input data and accurately estimate the expenses involved in the export process.',
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
                'deskripsi_video' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'deskripsi_video_en' => 'This video explains the process of exporting goods and their packaging. Learn about the best practices for preparing products for international shipment, including packaging requirements and logistics considerations.',
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
                'deskripsi_video' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'deskripsi_video_en' => 'In this video, we cover strategies for finding buyers in the export market. Learn how to identify potential buyers, reach out to them, and build relationships that can help grow your export business.',
                'slug' => 'Cara-Mencari-Buyers-Ekspor',
                'slug_en' => 'how-to-find-export-buyers',
                'created_at' => Time::now()->subMonths(5),
            ],
        ];

        $this->db->table('video_tutorial')->insertBatch($data);
    }
}
