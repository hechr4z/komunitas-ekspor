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
                'deskripsi_web' => 'KSI music + Noradrenaline + Stillwater + Mango + Jonkler Laugh + Talk Tuah + Jamaican Smile + German Stare+ English or Spanish + Winter Arc + Lunchly+ Anger issues= 💀💀💀',
                'deskripsi_web_en' => 'ACUMALAKA 🐸 MMHAHAHAHAHA 😂',
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
