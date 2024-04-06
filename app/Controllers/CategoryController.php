<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class CategoryController extends BaseController
{
    public function index(): string
    {
        return view('pages/dashboard/categories');
    }
}
