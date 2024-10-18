<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Member;
use App\Models\Sertifikat;
use App\Models\Produk;
use CodeIgniter\HTTP\ResponseInterface;

class KomunitasEkspor extends BaseController
{
    public function index()
    {
        //
    }

    public function belajar_ekspor()
    {
        return view('belajar-ekspor/belajar_ekspor');
    }

    public function belajar_ekspor_detail()
    {
        return view('belajar-ekspor/belajar_ekspor_detail');
    }

    public function pendaftaran()
    {
        return view('pendaftaran/pendaftaran');
    }

    public function video_tutorial()
    {
        return view('video-tutorial/video_tutorial');
    }

    public function video_tutorial_detail()
    {
        return view('video-tutorial/video_tutorial_detail');
    }

    public function registrasiMember()
    {
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email_member');
        $password = $this->request->getPost('password');
        $reveral = $this->request->getPost('referral');
        $nama_perusahaan = $this->request->getPost('nama_perusahaan');
        $pic = $this->request->getPost('pic');
        $nomor_pic = $this->request->getPost('nomor_pic');

        // pesan Wa
        $pesan = "Pendaftaran Member Komunitas Ekspor Indonesia Baru:\n\n" .
            "Username: $username\n" .
            "Email: $email\n" .
            "Password: $password\n" .
            "Nama Perusahaan: $nama_perusahaan\n" .
            "Nama PIC: $pic\n" .
            "Nomor PIC: $nomor_pic\n" .
            ($reveral ? "Kode Reveral: $reveral\n" : "");

        // Nomor tujuan WA, Tambahkan Kode negeara seperi (+62) tanpa tanda +
        $nomor_wa = '62';
        // $nomor_wa = '6283153270334'; // Nomor Tio

        $whatsapp = "https://wa.me/$nomor_wa?text=" . urlencode($pesan);

        return redirect()->to($whatsapp);
    }

    // public function data_member()
    // {
    //     $model_member = new Member();

    //     // Set pagination
    //     $perPage = 12; // Number of members per page
    //     $page = $this->request->getVar('page') ?? 1; // Get the current page number

    //     // Fetch members with pagination
    //     $members = $model_member
    //         ->orderBy('popular_point', 'DESC')
    //         ->paginate($perPage);

    //     // Modify members to add slug
    //     foreach ($members as &$item) {
    //         $item['slug'] = url_title($item['username'], '-', true);
    //     }

    //     $data['member'] = $members;
    //     $data['pager'] = $model_member->pager; // Get the pager instance

    //     return view('data-member/index', $data);
    // }

    public function data_member_visitor()
    {
        $model_member = new Member();

        $top4_member = $model_member
            ->orderBy('popular_point', 'DESC')
            ->limit(4)
            ->findAll();

        $blur_member = $model_member
            ->orderBy('popular_point', 'DESC')
            ->limit(4, 4)
            ->findAll();

        $data['top4_member'] = $top4_member;
        $data['blur_member'] = $blur_member;

        return view('data-member/index', $data);
    }

    public function detail_member($slug)
    {
        $model_member = new Member();
        $model_sertifikat = new Sertifikat();
        $model_produk = new Produk();

        // Cari member berdasarkan username, karena slug dibuat dari username
        $member = $model_member->where('username', url_title($slug, '-', true))->first();

        // Jika member ditemukan
        if ($member) {
            // Iterasi setiap field dalam array member
            foreach ($member as $key => $value) {
                // Cek jika field kosong atau null
                if (empty($value)) {
                    $member[$key] = '-';
                }
            }
        } else {
            // Jika member tidak ditemukan, lemparkan 404
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Member tidak ditemukan: ' . $slug);
        }

        // Top 3 popular members
        $members = $model_member
            ->orderBy('popular_point', 'DESC')
            ->findAll(); // Tambahkan findAll() untuk mengambil data

        $top3_members = [];
        foreach ($members as $key => $item) {
            if ($item['id_member'] != $member['id_member']) {
                // Buat slug dari judul_artikel dan tanggal
                $item['slug'] = url_title($item['username'], '-', true);
                $top3_members[] = $item;
            }
        }

        $top3_members = array_slice($top3_members, 0, 3);

        $member_id = $member['id_member'];

        // Mengambil data sertifikat dan produk berdasarkan id_member
        $sertifikat = $model_sertifikat->where('id_member', $member_id)->findAll();
        $produk = $model_produk->where('id_member', $member_id)->findAll();

        // Kirimkan data ke view
        $data['member'] = $member;
        $data['members'] = $top3_members;
        $data['sertifikat'] = $sertifikat;
        $data['produk'] = $produk;

        return view('data-member/detail', $data);
    }

    public function data_buyer()
    {
        return view('data-buyer/index');
    }
}
