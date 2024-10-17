<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Member;
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
        $reveral = $this->request->getPost('reveral');
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

    public function data_member()
    {
        $model_member = new Member();

        // Set pagination
        $perPage = 8; // Number of members per page
        $page = $this->request->getVar('page') ?? 1; // Get the current page number

        // Fetch members with pagination
        $data['member'] = $model_member
            ->orderBy('popular_point', 'DESC')
            ->paginate($perPage);
        $data['pager'] = $model_member->pager; // Get the pager instance

        return view('data-member/index', $data);
    }

    public function detail_member()
    {
        return view('data-member/detail');
    }
}
