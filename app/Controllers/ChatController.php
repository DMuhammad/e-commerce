<?php

namespace App\Controllers;

class ChatController extends BaseController
{
    public function index()
    {
        return view('pages/dashboard/chat');
    }
}
