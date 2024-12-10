<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMemberTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_member' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'role' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => 'user',
            ],
            'status_premium' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'foto_profil' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'kode_referral' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'popular_point' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0,
            ],
            'nama_perusahaan' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'deskripsi_perusahaan' => [
                'type' => 'TEXT',
            ],
            'deskripsi_perusahaan_en' => [
                'type' => 'TEXT',
            ],
            'tipe_bisnis' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'tipe_bisnis_en' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'produk_utama' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'produk_utama_en' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'tahun_dibentuk' => [
                'type' => 'YEAR',
            ],
            'skala_bisnis' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'skala_bisnis_en' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'pic' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'pic_phone' => [
                'type'       => 'VARCHAR',
                'constraint' => 15,
            ],
            'tanggal_verifikasi' => [
                'type'    => 'DATETIME',
            ],
            'kategori_produk' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'kategori_produk_en' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'latitude' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'longitude' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'link_landing_page' => [
                'type' => 'TEXT',
            ],
            'warna_utama' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'warna_sekunder' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'gambar_utama' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'gambar_perusahaan' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);

        $this->forge->addKey('id_member', true);
        $this->forge->addUniqueKey('username');
        $this->forge->createTable('member');
    }

    public function down()
    {
        $this->forge->dropTable('member');
    }
}
