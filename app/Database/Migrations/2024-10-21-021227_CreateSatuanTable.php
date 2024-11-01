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
            'id_member' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'satuan' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);

        $this->forge->addKey('id_satuan', true);
        $this->forge->addForeignKey('id_member', 'member', 'id_member', 'CASCADE', 'CASCADE');
        $this->forge->createTable('satuan');
    }

    public function down()
    {
        // Drop the table
        $this->forge->dropTable('satuan');
    }
}
