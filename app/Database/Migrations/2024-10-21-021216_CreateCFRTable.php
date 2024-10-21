<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCFRTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_cfr' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'komponen_cfr' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);

        // Set primary key
        $this->forge->addKey('id_cfr', true);

        // Create the table
        $this->forge->createTable('cfr');
    }

    public function down()
    {
        // Drop the table
        $this->forge->dropTable('cfr');
    }
}
