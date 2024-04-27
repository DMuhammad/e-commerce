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
        if (!is_dir(WRITEPATH . 'uploads/img-product')) {
            mkdir(WRITEPATH . 'uploads/img-product', 0777, TRUE);
        }

        foreach ($images as $image) {
            if ($image->isValid() && !$image->hasMoved()) {
                $imageName = $image->getRandomName();
                // Move the image to the 'writable/uploads/img-product' directory
                $image->move(WRITEPATH . 'uploads/img-product', $imageName);

                $this->productImages->insert([
                    'id' => Uuid::uuid4(),
                    'product_id' => $this->products->getInsertID(),
                    'image' => $imageName
                ]);
            }
    }
        return redirect()->back();
    }

    public function update($id)
    {
        $this->products->update($id, [
            'nama_produk' => $this->request->getPost('name'),
            'category_id' => $this->request->getPost('category'),
            'detail' => stripHtmlTags($this->request->getPost('detail')),
            'stok' => $this->request->getPost('stock'),
            'variant' => $this->request->getPost('variant'),
            'harga' => stripRpAndComma($this->request->getPost('price'))
        ]);

        $images = $this->request->getFileMultiple('images');

        // Check if the product folder exists, if not create it
        if (!is_dir(WRITEPATH . 'uploads/img-product')) {
            mkdir(WRITEPATH . 'uploads/img-product', 0777, TRUE);
        }
        

        return redirect()->back();
    }

    public function delete($id)
    {
        // Get the images where 'product_id' is the same as the id request
        $images = $this->productImages->where('product_id', $id)->findAll();

        foreach ($images as $imageproduct) {
            // Define the file path
            $filePath = WRITEPATH . 'uploads/img-product/' . $imageproduct->image;
            if (file_exists($filePath)) {
                try {
                    // Delete the file
                    unlink($filePath);
                } catch (Exception $e) {
                    log_message('error', 'Error deleting image file: ' . $e->getMessage());
                }
            }
        }

        // Delete the image records from the 'productImages' table
        $this->productImages->where('product_id', $id)->delete();
        
        // Delete the product
        $this->products->delete($id);

        return redirect()->back();
    }
}
