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
        $data['categories'] = $this->categories->findAll();
        $data['products'] = $this->products->getAll();

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

        for ($i = 0; $i < count($images); $i++) {
            $res = $this->request->getFile('images.' . $i)->store('product_image/');
            $this->productImages->insert([
                'id' => Uuid::uuid4(),
                'product_id' => $this->products->getInsertID(),
                'image' => $res
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
