<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductImagesModel;
use App\Models\ProductModel;

class Home extends BaseController
{
    protected $categories;
    protected $products;
    protected $productImages;

    public function __construct()
    {
        $this->categories = new CategoryModel();
        $this->products = new ProductModel();
        $this->productImages = new ProductImagesModel();
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
}
