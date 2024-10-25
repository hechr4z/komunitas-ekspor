<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateWebProfileTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_webprofile' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_web' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'nama_web_en' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'deskripsi_web' => [
                'type' => 'TEXT',
            ],
            'deskripsi_web_en' => [
                'type' => 'TEXT',
            ],
            'logo_web' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'lokasi_web' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'email_web' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'link_ig_web' => [
                'type' => 'TEXT',
            ],
            'link_yt_web' => [
                'type' => 'TEXT',
            ],
            'link_fb_web' => [
                'type' => 'TEXT',
            ],
            'footer_text' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);

        $this->forge->addKey('id_webprofile', true);
        $this->forge->createTable('webprofile');
    }

    public function down()
    {
        $this->forge->dropTable('webprofile');
    }
}
