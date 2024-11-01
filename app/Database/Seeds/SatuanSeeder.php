<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SatuanSeeder extends Seeder
{
    public function run()
    {
        // Ambil semua id_member dari tabel member
        $members = $this->db->table('member')->select('id_member')->get()->getResultArray();

        // Siapkan data yang akan dimasukkan ke tabel satuan
        $data = [];
        foreach ($members as $member) {
            $data[] = [
                'id_satuan' => null, // Jika id_satuan auto-increment, bisa diisi null atau dihilangkan
                'id_member' => $member['id_member'],
                'satuan' => 'pcs',
            ];
        }

        // Insert batch ke tabel satuan
        $this->db->table('satuan')->insertBatch($data);
    }
}
