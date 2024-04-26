<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductImagesModel;
use App\Models\ProductModel;
use Ramsey\Uuid\Uuid;
use Exception;

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
            'products' => $products,
            'categories' => $this->categories->findAll(),
        ];
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
    // Delete the product
    $this->products->delete($id);

    // Get the images where 'product_id' is the same as the id request
    $images = $this->productImages->where('product_id', $id)->findAll();

    // Delete each image file using CodeIgniter's File helper
    $file = \Config\Services::file();

    foreach ($images as $imageproduct) {
        $filePath = ROOTPATH . 'public/img-product/' . $imageproduct->image;
        if (file_exists($filePath)) {
        try {
            // Attempt to delete the file using the File helper
            $file->delete($filePath);
        } catch (Exception $e) {
            // Log the error or handle it gracefully
            log_message('error', 'Error deleting image file: ' . $e->getMessage());
        }
        }
    }

    // Delete the image records from the 'productImages' table
    $this->productImages->where('product_id', $id)->delete();

    return redirect()->back();
    }
}
