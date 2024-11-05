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
                'path_d' => 'M16 10c-1.1 0-2 .9-2 2v4c0 1.1.9 2 2 2s2-.9 2-2v-4c0-1.1-.9-2-2-2zm0 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z',
                'judul_manfaat' => 'Peluang Bisnis',
                'judul_manfaat_en' => 'Business Opportunities',
                'deskripsi_manfaat' => 'Akses Jaringan Bisnis',
                'deskripsi_manfaat_en' => 'Access to Business Networks.<br>International Collaboration Opportunities',
            ],
            [
                'id_manfaatjoin' => 2,
                'path_d' => 'M22 15h-6V9h-4v6H10l6 6 6-6z',
                'judul_manfaat' => 'Pelatihan',
                'judul_manfaat_en' => 'Training and Workshops',
                'deskripsi_manfaat' => 'Akses Pelatihan Gratis',
                'deskripsi_manfaat_en' => 'Access to Free Training.<br>Export Skills Development',
            ],
            [
                'id_manfaatjoin' => 3,
                'path_d' => 'M12 18h-2l6 6 6-6h-2v-4h-8z',
                'judul_manfaat' => 'Sertifikat',
                'judul_manfaat_en' => 'Certificates',
                'deskripsi_manfaat' => 'Mendapatkan Sertifikat Resmi',
                'deskripsi_manfaat_en' => 'Receive Official Certificate.<br>Expand Your Network & Relationships',
            ],
        ];

        $this->db->table('manfaatjoin')->insertBatch($data);
    }
}
