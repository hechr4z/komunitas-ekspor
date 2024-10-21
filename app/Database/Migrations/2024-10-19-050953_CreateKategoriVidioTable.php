<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKategoriVidioTable extends Migration
{
    public function up()
    {
        // Membuat tabel kategori_video
        $this->forge->addField([
            'id_kategori_video' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_kategori_video' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);

        // Set primary key
        $this->forge->addKey('id_kategori_video', true);

        // Buat tabel
        $this->forge->createTable('kategori_video');
    }

    public function down()
    {
        // Hapus tabel
        $this->forge->dropTable('kategori_video');
    }
}
