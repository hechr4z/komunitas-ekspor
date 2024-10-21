<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSatuanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_satuan' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'satuan' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);

        // Set primary key
        $this->forge->addKey('id_satuan', true);

        // Create the table
        $this->forge->createTable('satuan');
    }

    public function down()
    {
        // Drop the table
        $this->forge->dropTable('satuan');
    }
}
