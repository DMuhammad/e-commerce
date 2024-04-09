<?php

namespace App\Controllers;

class CompanyProfileController extends BaseController
{
    public function index()
    {
        return view('pages/dashboard/company-profile');
    }
}
