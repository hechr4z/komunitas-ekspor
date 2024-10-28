<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use \CodeIgniter\I18n\Time;

class KategoriBelajarEkspor extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_kategori_belajar_ekspor' => 1,
                'nama_kategori' => 'Tutorial',
                'nama_kategori_en' => 'Tutorial',
                'slug' => 'tutorial',
                'slug_en' => 'tutorial',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'id_kategori_belajar_ekspor' => 2,
                'nama_kategori' => 'Ekspor',
                'nama_kategori_en' => 'Export',
                'slug' => 'ekspor',
                'slug_en' => 'export',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
        ];

        // Insert batch data into the table
        $this->db->table('kategori_belajar_ekspor')->insertBatch($data);
    }
}
