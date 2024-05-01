<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class Home extends BaseController
{
    protected $categories;

    public function __construct()
    {
        $this->categories = new CategoryModel();
    }

    public function index(): string
    {
        $data = [
            'user' => session()->get('nama_lengkap'),
            'role' => session()->get('role'),
            'categories' => $this->categories->findAll(),
        ];

        return view('pages/user/homepage', $data);
    }
}
