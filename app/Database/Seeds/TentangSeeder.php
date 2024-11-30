<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TentangSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'gambar_perusahaan'       => 'logokeiwarna.png',
            'deskripsi_perusahaan'    => 'Komunitas Ekspor Indonesia adalah wadah yang dibentuk untuk mendukung dan mengembangkan bisnis ekspor di Indonesia. Kami berkomitmen untuk menghubungkan para pelaku usaha, baik UMKM maupun perusahaan besar, dengan peluang pasar internasional. Melalui edukasi, kolaborasi, dan akses informasi, kami berusaha meningkatkan daya saing produk Indonesia di pasar global. Komunitas ini menjadi tempat bagi para pelaku ekspor untuk berbagi pengalaman, pengetahuan, serta membangun jaringan yang dapat mendukung kesuksesan ekspor mereka.',
            'deskripsi_perusahaan_en' => 'The Indonesian Export Community is a forum formed to support and develop export businesses in Indonesia. We are committed to connecting business actors, both MSMEs and large companies, with international market opportunities. Through education, collaboration, and access to information, we strive to increase the competitiveness of Indonesian products in the global market. This community is a place for export actors to share experiences, knowledge, and build networks that can support their export success.',
            'slug'                    => 'tentang-kami',
            'slug_en'                 => 'about-us',
            'created_at'              => date('Y-m-d H:i:s'),
            'updated_at'              => date('Y-m-d H:i:s'),
        ];
        $this->db->table('tentang_kami')->insertBatch($data);
    }
}
