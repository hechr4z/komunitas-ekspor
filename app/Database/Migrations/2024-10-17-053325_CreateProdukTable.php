<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProdukTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_produk' => [
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
            'foto_produk' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'nama_produk' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'deskripsi_produk' => [
                'type'       => 'TEXT',
            ],
            'hs_code' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'minimum_order_qty' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 1,
            ],
            'kapasitas_produksi_bln' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 1,
            ],
        ]);

        $this->forge->addKey('id_produk', true);
        $this->forge->addForeignKey('id_member', 'member', 'id_member', 'CASCADE', 'CASCADE');
        $this->forge->createTable('produk');
    }

    public function down()
    {
        $this->forge->dropTable('produk');
    }
}
