<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use \CodeIgniter\I18n\Time;

class BelajarEkspor extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_kategori_belajar_ekspor' => 1,
                'judul_belajar_ekspor' => 'Panduan Lengkap Ekspor Dari Nol',
                'foto_belajar_ekspor' => 'be1.jpg',
                'deskripsi_belajar_ekspor' => 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
                'tags' => 'ekspor,internasional',
                'views' => 1200,
                'created_at' => Time::now(),
                'slug' => 'panduan-lengkap-ekspor-dari-nol'
            ],
            [
                'id_kategori_belajar_ekspor' => 1,
                'judul_belajar_ekspor' => 'Langkah-langkah Membangun Bisnis Ekspor',
                'foto_belajar_ekspor' => 'be2.jpg',
                'deskripsi_belajar_ekspor' => 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
                'tags' => 'ekspor,strategi',
                'views' => 800,
                'created_at' => Time::now(),
                'slug' => 'langkah-langkah-membangun-bisnis-ekspor'
            ],
            [
                'id_kategori_belajar_ekspor' => 2,
                'judul_belajar_ekspor' => 'Cara Mencari Buyers Ekspor',
                'foto_belajar_ekspor' => 'be3.jpg',
                'deskripsi_belajar_ekspor' => 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
                'tags' => 'ekspor,tips',
                'views' => 1500,
                'created_at' => Time::now(),
                'slug' => 'cara-mencari-buyers-ekspor'
            ],
            [
                'id_kategori_belajar_ekspor' => 2,
                'judul_belajar_ekspor' => 'Cara Ekspor Barang dan Pengemasannya',
                'foto_belajar_ekspor' => 'be4.jpg',
                'deskripsi_belajar_ekspor' => 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
                'tags' => 'ekspor,peluang',
                'views' => 1100,
                'created_at' => Time::now(),
                'slug' => 'cara-ekspor-barang-dan-pengemasannya'
            ],
            [
                'id_kategori_belajar_ekspor' => 2,
                'judul_belajar_ekspor' => 'Cara Hitung Harga Jual Ekspor',
                'foto_belajar_ekspor' => 'be5.jpeg',
                'deskripsi_belajar_ekspor' => 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
                'tags' => 'ekspor,luar negeri',
                'views' => 900,
                'created_at' => Time::now(),
                'slug' => 'cara-hitung-harga-jual-ekspor'
            ],
            [
                'id_kategori_belajar_ekspor' => 2,
                'judul_belajar_ekspor' => 'Cara Hitung Harga Ekspor dengan Strategi',
                'foto_belajar_ekspor' => 'be6.jpg',
                'deskripsi_belajar_ekspor' => 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
                'tags' => 'ekspor,luar negeri',
                'views' => 900,
                'created_at' => Time::now(),
                'slug' => 'cara-hitung-harga-ekspor-strategi'
            ],
        ];

        // Insert ke database
        $this->db->table('belajar_ekspor')->insertBatch($data);
    }
}
