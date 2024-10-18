<?php

namespace App\Models;

use CodeIgniter\Model;

class BelajarEksporModel extends Model
{
    protected $table            = 'belajar_ekspor';
    protected $primaryKey       = 'id_belajar_ekspor';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_kategori_belajar_ekspor', 'judul_belajar_ekspor', 'foto_belajar_ekspor', 'deskripsi_belajar_ekspor', 'tags', 'views', 'created_at', 'slug'];

    public function getAllWithCategory()
    {
        return $this->select('belajar_ekspor.*, kategori_belajar_ekspor.nama_kategori')
            ->join('kategori_belajar_ekspor', 'kategori_belajar_ekspor.id_kategori_belajar_ekspor = belajar_ekspor.id_kategori_belajar_ekspor')
            ->findAll();
    }

    public function getByCategory($id_kategori)
    {
        return $this->select('belajar_ekspor.*, kategori_belajar_ekspor.nama_kategori')
            ->join('kategori_belajar_ekspor', 'belajar_ekspor.id_kategori_belajar_ekspor = kategori_belajar_ekspor.id_kategori_belajar_ekspor')
            ->where('belajar_ekspor.id_kategori_belajar_ekspor', $id_kategori)
            ->findAll();
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
