<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBelajarEksporTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_belajar_ekspor' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_kategori_belajar_ekspor' => [
                'type'     => 'INT',
                'unsigned' => true,
            ],
            'judul_belajar_ekspor' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'judul_belajar_ekspor_en' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'foto_belajar_ekspor' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'deskripsi_belajar_ekspor' => [
                'type' => 'TEXT',
            ],
            'deskripsi_belajar_ekspor_en' => [
                'type' => 'TEXT',
            ],
            'meta_title' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'meta_title_en' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'meta_deskripsi' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'meta_deskripsi_en' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
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
                'constraint' => '255',
            ],
            'slug_en' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);

        // Primary Key
        $this->forge->addKey('id_belajar_ekspor', true);

        // Foreign Key for kategori_belajar_ekspor
        $this->forge->addForeignKey('id_kategori_belajar_ekspor', 'kategori_belajar_ekspor', 'id_kategori_belajar_ekspor', 'CASCADE', 'CASCADE');

        // Create Table
        $this->forge->createTable('belajar_ekspor');
    }

    public function down()
    {
        // Drop Table
        $this->forge->dropTable('belajar_ekspor');
    }
}
