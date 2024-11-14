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
                'nama_kategori_video_en' => 'Learning',
                'slug' => 'video-pembelajaran',
                'slug_en' => 'video-based-learning',
            ],
            [
                'nama_kategori_video' => 'Tutorial',
                'nama_kategori_video_en' => 'Tutorial',
                'slug' => 'videos-tutorial',
                'slug_en' => 'tutorial-videos',
            ],
        ];

        $this->db->table('kategori_video')->insertBatch($data);
    }
}
