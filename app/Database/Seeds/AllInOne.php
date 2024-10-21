<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AllInOne extends Seeder
{
    public function run()
    {
        $this->call(KategoriBelajarEkspor::class);
        $this->call(BelajarEkspor::class);
        $this->call(MemberSeeder::class);
    }
}
