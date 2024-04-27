<?php

namespace App\Controllers;

class ChatController extends BaseController
{
    public function index()
    {
        $data = [
            'user' => session()->get('nama_lengkap'),
            'role' => session()->get('role'),
        ];

        return view('pages/dashboard/chat', $data);
    }
}
