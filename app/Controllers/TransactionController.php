<?php

namespace App\Controllers;

class TransactionController extends BaseController
{
    public function index()
    {
        $data = [
            'user' => session()->get('nama_lengkap'),
            'role' => session()->get('role'),
        ];

        return view('pages/dashboard/transactions', $data);
    }
}
