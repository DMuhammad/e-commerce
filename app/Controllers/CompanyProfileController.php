<?php

namespace App\Controllers;

use App\Models\CompanyProfileModel;
use App\Models\UserModel;
use Ramsey\Uuid\Uuid;

class CompanyProfileController extends BaseController
{
    protected $company;
    protected $admin;

    function __construct()
    {
        $this->company = new CompanyProfileModel();
        $this->admin = new UserModel();
    }

    public function index()
    {
        $company = $this->company->first();
        $data = [
            'user' => session()->get('nama_lengkap'),
            'role' => session()->get('role'),
            'admin' => $this->admin->where('nama_lengkap', session()->get('nama_lengkap'))->first(),
            'company' => $company
        ];

        return view('pages/dashboard/company-profile', $data);
    }

    public function update($id)
    {
        $this->company->update($id, [
            'deskripsi' => $this->request->getPost('description'),
            'visi' => $this->request->getPost('vision'),
            'misi' => $this->request->getPost('mission'),
            'bank' => $this->request->getPost('bank'),
            'no_rek' => $this->request->getPost('account_number')
        ]);

        $this->admin->update($this->request->getPost('admin'), [
            'nama_lengkap' => $this->request->getPost('name'),
            'alamat' => $this->request->getPost('address'),
            'email' => $this->request->getPost('email'),
            'no_telp' =>  $this->request->getPost('contact')
        ]);

        return redirect()->back();
    }
}
