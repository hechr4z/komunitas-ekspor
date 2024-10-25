<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMPMTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_mpm' => [
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
            'tgl_kirim_email' => [
                'type' => 'DATETIME',
            ],
            'update_terakhir' => [
                'type' => 'DATETIME',
                'null' => TRUE,
            ],
            'nama_perusahaan' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'negara_perusahaan' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'status_progres' => [
                'type' => 'ENUM',
                'constraint' => ['Terkirim', 'Gagal'],
                'default' => 'Terkirim',
            ],
            'progres' => [
                'type'       => 'TEXT',
                'null' => TRUE,
            ],
        ]);

        $this->forge->addKey('id_mpm', true);
        $this->forge->addForeignKey('id_member', 'member', 'id_member', 'CASCADE', 'CASCADE');
        $this->forge->createTable('mpm');
    }

    public function down()
    {
        $this->forge->dropTable('mpm');
    }
}
