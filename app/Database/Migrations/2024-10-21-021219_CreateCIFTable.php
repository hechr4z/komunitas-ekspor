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
            'id_member' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'komponen_cif' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);

        $this->forge->addKey('id_cif', true);
        $this->forge->addForeignKey('id_member', 'member', 'id_member', 'CASCADE', 'CASCADE');
        $this->forge->createTable('cif');
    }

    public function down()
    {
        // Drop the table
        $this->forge->dropTable('cif');
    }
}
