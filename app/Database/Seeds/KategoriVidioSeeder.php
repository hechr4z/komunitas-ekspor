<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KategoriVidioSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_kategori_video' => 'Pembelajaran',
                'slug' => 'vidio-pembelajaran'
            ],
            [
                'nama_kategori_video' => 'Tutorial',
                'slug' => 'vidio-tutorial'
            ],
        ];

        $this->db->table('kategori_video')->insertBatch($data);
    }
}
