<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePengumumanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pengumuman' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'judul_pengumuman' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'poster_pengumuman' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'deskripsi_pengumuman' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'updated_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
        ]);

        $this->forge->addKey('id_pengumuman', true);
        $this->forge->createTable('pengumuman');
    }

    public function down()
    {
        $this->forge->dropTable('pengumuman');
    }
}
