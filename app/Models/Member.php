<?php

namespace App\Models;

use CodeIgniter\Model;

class Member extends Model
{
    protected $table            = 'member';
    protected $primaryKey       = 'id_member';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = [
        'username',
        'password',
        'kode_referral',
        'popular_point',
        'nama_perusahaan',
        'deskripsi_perusahaan',
        'deskripsi_perusahaan_en',
        'tipe_bisnis',
        'tipe_bisnis_en',
        'produk_utama',
        'produk_utama_en',
        'tahun_dibentuk',
        'skala_bisnis',
        'skala_bisnis_en',
        'email_perusahaan',
        'pic',
        'pic_phone',
        'tanggal_verifikasi',
        'kategori_produk',
        'kategori_produk_en',
        'sertifikat',
        'foto_produk',
        'nama_produk',
        'nama_produk_en',
        'deskripsi_produk',
        'deskripsi_produk_en',
        'hs_code',
        'minimum_order_qty',
        'kapasitas_produksi_bln',
        'latitude',
        'longitude'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
