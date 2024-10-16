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
