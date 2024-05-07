<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\ProductImagesModel;

class Home extends BaseController
{
    protected $categories;
    protected $products;
    protected $productImages;
    protected $userModel;

    public function __construct()
    {
        $this->categories = new CategoryModel();
        $this->products = new ProductModel();
        $this->productImages = new ProductImagesModel();
        $this->userModel = new UserModel();
    }

    public function index(): string
    {
        $data = [
            'user' => session()->get('nama_lengkap'),
            'role' => session()->get('role'),
            'categories' => $this->categories->findAll(),
            'title' => 'Homepage',
        ];

        return view('pages/user/homepage', $data);
    }

    public function products(): string
    {
        $products = $this->products->select('products.*, categories.nama_kategori')
            ->join('categories', 'categories.id = products.category_id')
            ->findAll();

        foreach ($products as $key => $product) {
            $products[$key]->images = $this->productImages->select('image')
                ->where('product_id', $product->id)
                ->findAll();
        }

        $data = [
            'user' => session()->get('nama_lengkap'),
            'role' => session()->get('role'),
            'products' => $products,
            'categories' => $this->categories->findAll(),
            'title' => 'Products',
        ];

        return view('pages/user/products', $data);
    }

    public function aboutUs(): string
    {
        $data = [
            'user' => session()->get('nama_lengkap'),
            'role' => session()->get('role'),
            'title' => 'About Us',
        ];

        return view('pages/user/about-us', $data);
    }

    public function detailProduct(): string
    {
        $data = [
            'user' => session()->get('nama_lengkap'),
            'role' => session()->get('role'),
            'title' => 'Detail Product',
        ];

        return view('pages/user/detail-product', $data);
    }

    public function cart(): string
    {
        $data = [
            'user' => session()->get('nama_lengkap'),
            'role' => session()->get('role'),
            'title' => 'Cart',
        ];

        return view('pages/user/cart', $data);
    }

    public function checkout(): string
    {
        $data = [
            'user' => session()->get('nama_lengkap'),
            'role' => session()->get('role'),
            'title' => 'Checkout',
        ];

        return view('pages/user/checkout', $data);
    }

    public function payment(): string
    {
        $data = [
            'user' => session()->get('nama_lengkap'),
            'role' => session()->get('role'),
            'title' => 'Payment',
        ];

        return view('pages/user/payment', $data);
    }

    public function account()
    {
        $id = session()->get('id');
        $user = $this->userModel->where('id', $id)->first();

        $data = [
            'user'=> $user,
            'title' => 'Account',
        ];

        return view('pages/user/account', $data);
    }

    public function updateAccount()
    {
        $id = session()->get('id');
        $this->userModel->update($id, [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'email' => $this->request->getPost('email'),
            'no_telp' => $this->request->getPost('no_telp'),
        ]);

        return redirect()->to('/account');
    }

    public function detailTransactions(): string
    {
        $data = [
            'user' => session()->get('nama_lengkap'),
            'role' => session()->get('role'),
            'title' => 'Detail Transactions',
        ];

        return view('pages/user/detail-transactions', $data);
    }
}
