<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFOBTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_fob' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            // maybe id member?
            'komponen_fob' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);

        // Set primary key
        $this->forge->addKey('id_fob', true);

        // Create the table
        $this->forge->createTable('fob');
    }

    public function down()
    {
        // Drop the table
        $this->forge->dropTable('fob');
    }
}
