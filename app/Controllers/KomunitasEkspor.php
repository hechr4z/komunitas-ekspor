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

    public function artikel(): string
    {
        return view('artikel/artikel');
    }

    public function pendaftaran(): string
    {
        return view('pendaftaran/pendaftaran');
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

        $whatsapp = "https://wa.me/$nomor_wa?text=" . urlencode($pesan);

        return redirect()->to($whatsapp);
    }

    public function data_member(): string
    {
        $model_member = new Member();

        $member = $model_member->findAll();

        $data['member'] = $member;

        return view('data-member/index', $data);
    }

    public function detail_member(): string
    {
        return view('data-member/detail');
    }
}
