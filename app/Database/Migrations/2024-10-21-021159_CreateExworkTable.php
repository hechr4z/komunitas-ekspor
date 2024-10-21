<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateExworkTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_exwork' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'komponen_exwork' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);

        // Set primary key
        $this->forge->addKey('id_exwork', true);

        // Create the table
        $this->forge->createTable('exwork');
    }

    public function down()
    {
        // Drop the table
        $this->forge->dropTable('exwork');
    }
}
