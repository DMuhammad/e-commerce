<?php

namespace App\Controllers;

class ProductController extends BaseController
{
    public function index()
    {

        return view('pages/dashboard/products');
    }
}
