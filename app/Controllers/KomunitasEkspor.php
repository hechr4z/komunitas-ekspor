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

    public function artikel()
    {
        return view('artikel/artikel');
    }

    public function pendaftaran()
    {
        return view('pendaftaran/pendaftaran');
    }

    public function data_member()
    {
        $model_member = new Member();

        // Set pagination
        $perPage = 8; // Number of members per page
        $page = $this->request->getVar('page') ?? 1; // Get the current page number

        // Fetch members with pagination
        $data['member'] = $model_member->paginate($perPage);
        $data['pager'] = $model_member->pager; // Get the pager instance

        return view('data-member/index', $data);
    }

    public function detail_member()
    {
        return view('data-member/detail');
    }
}
