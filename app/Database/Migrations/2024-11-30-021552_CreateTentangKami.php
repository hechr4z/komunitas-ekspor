<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTentangKami extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'gambar_perusahaan' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'deskripsi_perusahaan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'deskripsi_perusahaan_en' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'unique'     => true,
            ],
            'slug_en' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'unique'     => true,
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'updated_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('tentang_kami');
    }

    public function down()
    {
        $this->forge->dropTable('tentang_kami');
    }
}
