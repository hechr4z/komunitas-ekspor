<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateVidioTutorialTables extends Migration
{
    public function up()
    {
        // Membuat tabel video_tutorial
        $this->forge->addField([
            'id_video' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_kategori_video' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'judul_video' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'judul_video_en' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'video_url' => [
                'type'       => 'TEXT',
            ],
            'thumbnail' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'deskripsi_video' => [
                'type'       => 'TEXT',
            ],
            'deskripsi_video_en' => [
                'type'       => 'TEXT',
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'slug_en' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
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

        // Set primary key
        $this->forge->addKey('id_video', true);

        // Set foreign key ke tabel kategori_video
        $this->forge->addForeignKey('id_kategori_video', 'kategori_video', 'id_kategori_video', 'CASCADE', 'CASCADE');

        // Buat tabel
        $this->forge->createTable('video_tutorial');
    }

    public function down()
    {
        // Hapus tabel
        $this->forge->dropTable('video_tutorial');
    }
}
