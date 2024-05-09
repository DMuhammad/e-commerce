<?php

namespace App\Controllers;

use Ramsey\Uuid\Uuid;
use App\Models\CartModel;
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
    protected $cart;

    public function __construct()
    {
        $this->categories = new CategoryModel();
        $this->products = new ProductModel();
        $this->productImages = new ProductImagesModel();
        $this->userModel = new UserModel();
        $this->cart = new CartModel();
    }

    public function index(): string
    {
        $productIds = $this->products->select('MIN(products.id) as product_id')
            ->groupBy('nama_produk') // Group by product name
            ->findAll();
    
        $productIds = array_column($productIds, 'product_id');
    
        $products = $this->products->select('products.*, categories.nama_kategori')
            ->whereIn('products.id', $productIds)
            ->join('categories', 'categories.id = products.category_id', 'left')
            ->findAll();
    
        foreach ($products as $key => $product) {
            $products[$key]->images = $this->productImages->select('image')
                ->where('product_id', $product->id)
                ->findAll();
        }
    
        $data = [
            'user' => session()->get('nama_lengkap'),
            'role' => session()->get('role'),
            'categories' => $this->categories->findAll(),
            'products' => $products,
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

    public function detailProduct($id): string
    {
        $product = $this->products->select('products.*, categories.nama_kategori')
            ->join('categories', 'categories.id = products.category_id')
            ->where('products.id', $id)
            ->first();

        $product->images = $this->productImages->select('image')
            ->where('product_id', $product->id)
            ->findAll();

        // Get all variants of the product with the same name
        $variants = $this->products->select('id, variant')
        ->where('nama_produk', $product->nama_produk)
        ->findAll();

        $data = [
            'user' => session()->get('nama_lengkap'),
            'role' => session()->get('role'),
            'product' => $product,
            'variants' => $variants,
            'title' => 'Detail Product',
        ];

        return view('pages/user/detail-product', $data);
    }

    public function addToCart()
    {
        // Get the POST data
        $variantId = $this->request->getPost('variant');
        $qty = $this->request->getPost('qty');
    
        // Get the variant details
        $variant = $this->products->find($variantId);
    
        // Calculate the total price
        $totalHarga = $variant->harga * $qty;
    
        // Get the user ID from the session
        $userId = session()->get('id');
    
        // Prepare the data to be inserted
        $data = [
            'id' => Uuid::uuid4(),
            'user_id' => $userId,
            'product_id' => $variantId,
            'qty' => $qty,
            'total_harga' => $totalHarga,
        ];
    
        // Insert the data into the cart table
        $this->cart->insert($data);
    
        // Set a flash message
        session()->setFlashdata('success', 'Product added to cart!');
    
        // Redirect the user back to the product detail page
        return redirect()->to('/detail-product/' . $variant->id);
    }

    public function cart(): string
    {
        $userId = session()->get('id');
        $carts = $this->cart->where('user_id', $userId)->findAll();
    
        // Retrieve product details for each cart item
        foreach ($carts as $cart) {
            $cart->product = $this->products->find($cart->product_id);
        }

        $subTotal = 0;
        foreach ($carts as $cart) {
            $subTotal += $cart->total_harga;
        }
        $tax = $subTotal * 0.2;
        $total = $subTotal + $tax;

        $data = [
            'user' => session()->get('nama_lengkap'),
            'role' => session()->get('role'),
            'title' => 'Cart',
            'carts' => $carts,
            'subTotal' => $subTotal,
            'tax' => $tax,
            'total' => $total,
        ];
    
        return view('pages/user/cart', $data);
    }

    public function updateCart($id)
    {
        $cartId = $id;
        $qty = $this->request->getPost('qty');
    
        $cart = $this->cart->find($cartId);
        $variant = $this->products->find($cart->product_id);
    
        $totalHarga = $variant->harga * $qty;
    
        $this->cart->update($cartId, [
            'qty' => $qty,
            'total_harga' => $totalHarga,
        ]);
    
        session()->setFlashdata('success', 'Product updated!');
    
        return redirect()->to('/cart');
    }

    public function deleteCart($id)
    {
        $this->cart->delete($id);
        
        session()->setFlashdata('success', 'Product deleted!');
        return redirect()->to('/cart');
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
        session()->setFlashdata('success', 'Data akun berhasil disimpan!');
        return redirect()->to('/account');
    }

    public function updatePassword()
    {
        $id = session()->get('id');
        $user = $this->userModel->where('id', $id)->first();

        if (password_verify((string)$this->request->getPost('old_password'), $user->password)) {
            $this->userModel->update($id, [
                'password' => password_hash((string)$this->request->getPost('new_password'), PASSWORD_DEFAULT),
            ]);
            session()->setFlashdata('success', 'Password berhasil diubah!');
            return redirect()->to('/account');
        } else {
            session()->setFlashdata('error', 'Password lama salah!');
            return redirect()->to('/account');
        }
    }

    public function updateAddress()
    {
        $id = session()->get('id');
        $this->userModel->update($id, [
            'alamat' => $this->request->getPost('alamat'),
        ]);
        session()->setFlashdata('success', 'Alamat berhasil disimpan!');
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
