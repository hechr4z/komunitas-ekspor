<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SatuanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_satuan' => 1,
                'satuan' => 'pcs',
            ]
        ];

        $this->db->table('satuan')->insertBatch($data);
    }
}
