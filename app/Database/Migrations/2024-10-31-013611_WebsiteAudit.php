<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class WebsiteAudit extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_webaudit' => [
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
            'link_website' => [
                'type'       => 'TEXT',
                'null' => TRUE,
            ],
            'status_verifikasi' => [
                'type' => 'ENUM',
                'constraint' => ['true', 'false', 'waiting'],
                'default' => 'waiting',
            ],
            'catatan_fitur' => [
                'type'       => 'TEXT',
                'null' => TRUE,
            ],
            'catatan_bahasa' => [
                'type'       => 'TEXT',
                'null' => TRUE,
            ],
            'catatan_seo' => [
                'type'       => 'TEXT',
                'null' => TRUE,
            ],
        ]);

        $this->forge->addKey('id_webaudit', true);
        $this->forge->addForeignKey('id_member', 'member', 'id_member', 'CASCADE', 'CASCADE');
        $this->forge->createTable('website_audit');
    }

    public function down()
    {
        $this->forge->dropTable('website_audit');
    }
}
