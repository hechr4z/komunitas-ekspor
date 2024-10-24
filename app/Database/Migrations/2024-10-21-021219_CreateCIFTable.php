<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCIFTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_cif' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            // maybe id member?
            'komponen_cif' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);

        // Set primary key
        $this->forge->addKey('id_cif', true);

        // Create the table
        $this->forge->createTable('cif');
    }

    public function down()
    {
        // Drop the table
        $this->forge->dropTable('cif');
    }
}
