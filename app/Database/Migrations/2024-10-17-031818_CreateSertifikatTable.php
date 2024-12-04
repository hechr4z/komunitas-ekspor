<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSertifikatTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_sertifikat' => [
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
            'nama_sertifikat' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'nama_sertifikat_en' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'sertifikat' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);

        $this->forge->addKey('id_sertifikat', true);
        $this->forge->addForeignKey('id_member', 'member', 'id_member', 'CASCADE', 'CASCADE');
        $this->forge->createTable('sertifikat');
    }

    public function down()
    {
        $this->forge->dropTable('sertifikat');
    }
}
