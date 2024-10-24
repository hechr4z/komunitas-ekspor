<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSliderTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_slider' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'img_slider' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'judul_slider' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'judul_slider_en' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'deskripsi_slider' => [
                'type' => 'TEXT',
            ],
            'deskripsi_slider_en' => [
                'type' => 'TEXT',
            ],
        ]);

        $this->forge->addKey('id_slider', true);
        $this->forge->createTable('slider');
    }

    public function down()
    {
        $this->forge->dropTable('slider');
    }
}
