<?php

namespace App\Controllers;

class DashboardController extends BaseController
{
    public function index(): string
    {
        $data = [
            'user' => session()->get('nama_lengkap'),
        ];

        return view('pages/dashboard/index', $data);
    }
}
