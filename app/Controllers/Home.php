<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function artikel(): string
    {
        return view('artikel/artikel');
    }

    public function pendaftaran(): string
    {
        return view('pendaftaran/pendaftaran');
    }
}
