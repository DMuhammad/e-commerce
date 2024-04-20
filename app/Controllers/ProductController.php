<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductImagesModel;
use App\Models\ProductModel;
use Ramsey\Uuid\Uuid;

class ProductController extends BaseController
{
    protected $categories;
    protected $products;
    protected $productImages;
    protected $helpers;

    function __construct()
    {
        $this->categories = new CategoryModel();
        $this->products = new ProductModel();
        $this->productImages = new ProductImagesModel();
        $this->helpers = helper(['strip']);
    }

    public function index()
    {
        $data['products'] = $this->products->select('products.*, categories.nama_kategori')
        ->join('categories', 'categories.id = products.category_id')
        ->findAll();

        foreach ($data['products'] as $key => $product) {
            $data['products'][$key]->images = $this->productImages->select('image')
            ->where('product_id', $product->id)
            ->findAll();
        }

        $data['categories'] = $this->categories->findAll();

        return view('pages/dashboard/products', $data);
    }

    public function store()
    {
        $this->products->insert([
            'id' => Uuid::uuid4(),
            'nama_produk' => $this->request->getPost('name'),
            'category_id' => $this->request->getPost('category'),
            'detail' => stripHtmlTags($this->request->getPost('detail')),
            'stok' => $this->request->getPost('stock'),
            'variant' => $this->request->getPost('variant'),
            'harga' => stripRpAndComma($this->request->getPost('price'))
        ]);

        $images = $this->request->getFileMultiple('images');

        // Check if the product folder exists, if not create it
        if (!is_dir(ROOTPATH . 'public/img-product')) {
            mkdir(ROOTPATH . 'public/img-product', 0777, TRUE);
        }

        foreach ($images as $image) {
            $imageName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/img-product', $imageName);

            $this->productImages->insert([
                'id' => Uuid::uuid4(),
                'product_id' => $this->products->getInsertID(),
                'image' => $imageName
            ]);
        }

        return redirect()->back();
    }

    public function update($id)
    {

        return redirect()->back();
    }

    public function delete($id)
    {
        $this->products->delete($id);

        return redirect()->back();
    }
}
