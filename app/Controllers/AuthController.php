<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel; // Correct namespace for User model

class AuthController extends BaseController
{
    protected $session;
    protected $userModel;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->userModel = new UserModel(); // Instantiate User model
    }

    public function index()
    {
        return view('pages/auth/login');
    }

    public function authenticate()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $this->userModel->login([
            'email' => $email,
            'password' => $password,
        ]);

        if ($user) {
            $this->session->set('nama_lengkap', $user[0]);
            $this->session->set('id', $user[1]);
            $this->session->set('role', $user[2]);

            if ($user[2] == 'User') {
                return redirect()->to('/');
            }

            return redirect()->to('/dashboard');
        } else {
            $this->session->setFlashdata('error', 'Email atau password salah');
            return redirect()->back()->withInput();
        }
    }
    
    public function register()
    {
        return view('pages/auth/register');
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/login');
    }
}
