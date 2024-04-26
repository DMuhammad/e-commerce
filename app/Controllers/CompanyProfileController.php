<?php

namespace App\Controllers;

class CompanyProfileController extends BaseController
{
    public function index()
    {
        $data = [
            'user' => session()->get('nama_lengkap'),
        ];

        return view('pages/dashboard/company-profile', $data);
    }
}
