<?php

namespace App\Models;

use CodeIgniter\Model;

class VidioTutorialModel extends Model
{
    protected $table            = 'video_tutorial';
    protected $primaryKey       = 'id_video';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['judul_video', 'video_url', 'thumbnail', 'deskripsi_video', 'id_kategori_video', 'slug'];

    // Method untuk mengambil semua video tutorial dan join dengan kategori video
    public function getAllVideos()
    {
        return $this->select('video_tutorial.*, kategori_video.nama_kategori_video')
            ->join('kategori_video', 'video_tutorial.id_kategori_video = kategori_video.id_kategori_video')
            ->findAll();
    }

    // Method untuk mengambil video berdasarkan slug
    public function getVideoBySlug($slug)
    {
        return $this->select('video_tutorial.*, kategori_video.nama_kategori_video, kategori_video.nama_kategori_video_en')
            ->join('kategori_video', 'video_tutorial.id_kategori_video = kategori_video.id_kategori_video')
            ->where('video_tutorial.slug', $slug)
            ->orwhere('video_tutorial.slug_en', $slug)
            ->first();
    }

    // Method untuk mengambil video berdasarkan kategori
    public function getVideosByKategori($kategoriSlug)
    {
        return $this->select('video_tutorial.*, kategori_video.nama_kategori_video')
            ->join('kategori_video', 'video_tutorial.id_kategori_video = kategori_video.id_kategori_video')
            ->where('kategori_video.slug', $kategoriSlug)
            ->orwhere('kategori_video.slug_en', $kategoriSlug)
            ->findAll();
    }

    public function getRelatedVideos($id_kategori_video, $id_video)
    {
        return $this->where('id_kategori_video', $id_kategori_video)
            ->where('id_video !=', $id_video) // Kecuali video yang sedang dilihat
            ->limit(5) // Limit untuk jumlah video terkait
            ->findAll();
    }

    // Method untuk mengambil video berdasarkan kategori dengan batas tertentu
    public function getLimitedVideosByKategori($kategoriSlug, $limit = 3)
    {
        return $this->select('video_tutorial.*, kategori_video.nama_kategori_video')
            ->join('kategori_video', 'video_tutorial.id_kategori_video = kategori_video.id_kategori_video')
            ->where('kategori_video.slug', $kategoriSlug)
            ->limit($limit) // Membatasi jumlah data yang diambil
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
