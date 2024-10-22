<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Buyers extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_buyers' => 1,
                'nama_perusahaan' => 'PT. Sukses Jaya',
                'email_perusahaan' => 'info@suksesjaya.co.id',
                'website_perusahaan' => 'www.suksesjaya.co.id',
                'hs_code' => '84713010',
                'negara_perusahaan' => 'Indonesia',
                'verif_date' => '2024-01-05 10:15:30',
            ],
            [
                'id_buyers' => 2,
                'nama_perusahaan' => 'Global Trade Ltd',
                'email_perusahaan' => 'contact@globaltrade.com',
                'website_perusahaan' => 'www.globaltrade.com',
                'hs_code' => '85423990',
                'negara_perusahaan' => 'United Kingdom',
                'verif_date' => '2023-12-20 08:30:00',
            ],
            [
                'id_buyers' => 3,
                'nama_perusahaan' => 'Tech Innovators LLC',
                'email_perusahaan' => 'info@techinnovators.com',
                'website_perusahaan' => 'www.techinnovators.com',
                'hs_code' => '84715000',
                'negara_perusahaan' => 'United States',
                'verif_date' => '2023-11-18 14:45:00',
            ],
            [
                'id_buyers' => 4,
                'nama_perusahaan' => 'Mundo Comercio S.A.',
                'email_perusahaan' => 'ventas@mundocomercio.com',
                'website_perusahaan' => 'www.mundocomercio.com',
                'hs_code' => '85258019',
                'negara_perusahaan' => 'Mexico',
                'verif_date' => '2023-10-15 16:20:00',
            ],
            [
                'id_buyers' => 5,
                'nama_perusahaan' => 'Tech Solutions GmbH',
                'email_perusahaan' => 'service@techsolutions.de',
                'website_perusahaan' => 'www.techsolutions.de',
                'hs_code' => '84733080',
                'negara_perusahaan' => 'Germany',
                'verif_date' => '2023-09-25 09:50:00',
            ],
            [
                'id_buyers' => 6,
                'nama_perusahaan' => 'Green Energy Ltd.',
                'email_perusahaan' => 'support@greenenergy.co.uk',
                'website_perusahaan' => 'www.greenenergy.co.uk',
                'hs_code' => '85023190',
                'negara_perusahaan' => 'United Kingdom',
                'verif_date' => '2023-08-12 13:05:00',
            ],
            [
                'id_buyers' => 7,
                'nama_perusahaan' => 'Kangaroo Imports Pty',
                'email_perusahaan' => 'info@kangarooimports.com.au',
                'website_perusahaan' => 'www.kangarooimports.com.au',
                'hs_code' => '84137091',
                'negara_perusahaan' => 'Australia',
                'verif_date' => '2023-07-19 17:30:00',
            ],
            [
                'id_buyers' => 8,
                'nama_perusahaan' => 'Shanghai Electronics Co.',
                'email_perusahaan' => 'sales@shanghaielectronics.cn',
                'website_perusahaan' => 'www.shanghaielectronics.cn',
                'hs_code' => '85437090',
                'negara_perusahaan' => 'China',
                'verif_date' => '2023-06-30 11:10:00',
            ],
        ];

        $this->db->table('buyers')->insertBatch($data);
    }
}
