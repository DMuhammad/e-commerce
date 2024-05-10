<?php

namespace App\Controllers;

use App\Models\CompanyProfileModel;
use Ramsey\Uuid\Uuid;

class CompanyProfileController extends BaseController
{
    protected $companyProfile;

    function __construct()
    {
        $this->company = new CompanyProfileModel();
    }

    public function index()
    {
        $company = $this->company->first();
        $data = [
            'user' => session()->get('nama_lengkap'),
            'role' => session()->get('role'),
            'company' => $company
        ];

        return view('pages/dashboard/company-profile', $data);
    }

    public function update($id)
    {
        $this->company->update($id, [
            'nama' => $this->request->getPost('name'),
            'deskripsi' => $this->request->getPost('description'),
            'visi' => $this->request->getPost('vision'),
            'misi' => $this->request->getPost('mission'),
            'alamat' => $this->request->getPost('address'),
            'email' => $this->request->getPost('email'),
            'kontak' => $this->request->getPost('contact'),
            'bank' => $this->request->getPost('bank'),
            'no_rek' => $this->request->getPost('account_number')
        ]);

        return redirect()->back();
    }
}
