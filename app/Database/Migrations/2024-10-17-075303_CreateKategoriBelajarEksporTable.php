<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKategoriBelajarEksporTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kategori_belajar_ekspor' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_kategori' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'nama_kategori_en' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'slug_en' => [
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
        ]);

        // Primary Key
        $this->forge->addKey('id_kategori_belajar_ekspor', true);

        // Create Table
        $this->forge->createTable('kategori_belajar_ekspor');
    }

    public function down()
    {
        // Drop Table
        $this->forge->dropTable('kategori_belajar_ekspor');
    }
}
