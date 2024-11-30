<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ManfaatJoinSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_manfaatjoin' => 1,
                'gambar' => 'presentation.png',
                'judul_manfaat' => 'Peluang Bisnis',
                'judul_manfaat_en' => 'Business Opportunities',
                'deskripsi_manfaat' => 'Akses Jaringan Bisnis',
                'deskripsi_manfaat_en' => 'Access to Business Networks.<br>International Collaboration Opportunities',
            ],
            [
                'id_manfaatjoin' => 2,
                'gambar' => 'configuration.png',
                'judul_manfaat' => 'Pelatihan',
                'judul_manfaat_en' => 'Training and Workshops',
                'deskripsi_manfaat' => 'Akses Pelatihan Gratis',
                'deskripsi_manfaat_en' => 'Access to Free Training.<br>Export Skills Development',
            ],
            [
                'id_manfaatjoin' => 3,
                'gambar' => 'certificate.png',
                'judul_manfaat' => 'Sertifikat',
                'judul_manfaat_en' => 'Certificates',
                'deskripsi_manfaat' => 'Mendapatkan Sertifikat Resmi',
                'deskripsi_manfaat_en' => 'Receive Official Certificate.<br>Expand Your Network & Relationships',
            ],
        ];

        $this->db->table('manfaatjoin')->insertBatch($data);
    }
}
