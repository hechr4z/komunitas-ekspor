<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBuyersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_buyers' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            // maybe id member?
            'nama_perusahaan' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'email_perusahaan' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'website_perusahaan' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'hs_code' => [
                'type'       => 'TEXT',
            ],
            'negara_perusahaan' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'verif_date' => [
                'type' => 'DATETIME',
            ],
        ]);

        $this->forge->addKey('id_buyers', true);
        $this->forge->createTable('buyers');
    }

    public function down()
    {
        $this->forge->dropTable('buyers');
    }
}
