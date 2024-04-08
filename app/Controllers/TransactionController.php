<?php

namespace App\Controllers;

class TransactionController extends BaseController
{
    public function index()
    {

        return view('pages/dashboard/transactions');
    }
}
