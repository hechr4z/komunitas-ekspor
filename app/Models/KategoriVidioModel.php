<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriVidioModel extends Model
{
    protected $table            = 'kategori_video';
    protected $primaryKey       = 'id_kategori_video';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_kategori_video', 'slug', 'nama_kategori_video_en', 'slug_en'];

    // Method untuk mengambil semua kategori video
    public function getAllKategori()
    {
        return $this->findAll();
    }

    // Method untuk mengambil kategori berdasarkan slug
    public function getKategoriBySlug($slug)
    {
        return $this->where('slug', $slug)->first();
    }

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
