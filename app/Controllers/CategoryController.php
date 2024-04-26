<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use Ramsey\Uuid\Uuid;

class CategoryController extends BaseController
{
    protected $categories;

    function __construct()
    {
        $this->categories = new CategoryModel();
    }

    public function index(): string
    {
        $data = [
            'categories' => $this->categories->findAll(),
            'user' => session()->get('nama_lengkap'),
        ];
        return view('pages/dashboard/categories', $data);
    }

    public function store()
    {
        $this->categories->insert([
            'id' => Uuid::uuid4(),
            'nama_kategori' => $this->request->getPost('name')
        ]);

        return redirect()->back();
    }

    public function update($id)
    {
        $this->categories->update($id, [
            'nama_kategori' => $this->request->getPost('name')
        ]);

        return redirect()->back();
    }

    public function delete($id)
    {
        $this->categories->delete($id);

        return redirect()->back();
    }
}
