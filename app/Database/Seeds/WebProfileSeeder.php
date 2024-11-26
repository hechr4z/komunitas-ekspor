<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class WebProfileSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_webprofile' => 1,
                'nama_web' => 'Komunitas Ekspor Indonesia',
                'nama_web_en' => 'Indonesian Export Community',
                'deskripsi_web' => 'Kami adalah perusahaan yang berkomitmen untuk memberikan layanan terbaik kepada pelanggan kami. Dengan pengalaman bertahun-tahun, kami selalu berupaya menciptakan inovasi baru untuk memenuhi kebutuhan Anda. Visi kami adalah menjadi yang terdepan dalam industri ini, sementara misi kami adalah memberikan solusi terbaik, menjaga kepuasan pelanggan, dan berkontribusi pada komunitas.',
                'deskripsi_web_en' => 'We are a company committed to providing the best service to our customers. With years of experience, we always strive to create new innovations to meet your needs. Our vision is to be at the forefront of the industry, while our mission is to provide the best solutions, maintain customer satisfaction, and contribute to the community.',
                'logo_web' => 'logokei.png',
                'lokasi_web' => 'Malang, Jawa Timur, Indonesia',
                'email_web' => 'komunitaseksporid@gmail.com',
                'link_ig_web' => 'www.instagram.com',
                'link_yt_web' => 'www.youtube.com',
                'link_fb_web' => 'www.facebook.com',
                'footer_text' => '&copy; 2024 Komunitas Ekspor Indonesia 24. All rights reserved.'
            ]
        ];

        $this->db->table('webprofile')->insertBatch($data);
    }
}
