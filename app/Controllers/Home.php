<?php

namespace App\Controllers;

use Ramsey\Uuid\Uuid;
use App\Models\CartModel;
use App\Models\UserModel;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\TransactionModel;
use App\Models\ProductImagesModel;
use App\Models\DetailTransactionModel;
use App\Models\CompanyProfileModel;

class Home extends BaseController
{
    protected $categories;
    protected $products;
    protected $productImages;
    protected $userModel;
    protected $cart;
    protected $transaction;
    protected $detailTransaction;
    protected $company;
    protected $companyImages;

    public function __construct()
    {
        $this->categories = new CategoryModel();
        $this->products = new ProductModel();
        $this->productImages = new ProductImagesModel();
        $this->userModel = new UserModel();
        $this->cart = new CartModel();
        $this->transaction = new TransactionModel();
        $this->detailTransaction = new DetailTransactionModel();
        $this->company = new CompanyProfileModel();
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
        $company = $this->company->first();

        $data = [
            'user' => session()->get('nama_lengkap'),
            'role' => session()->get('role'),
            'title' => 'About Us',
            'company' => $company,
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

    public function checkCart()
    {
        $userId = session()->get('id');
        $carts = $this->cart->where('user_id', $userId)->findAll();

        if (empty($carts)) {
            session()->setFlashdata('error', 'Cart is empty!');
            return redirect()->to('/cart');
        } else {
            return redirect()->to('/checkout');
        }
    }

    public function checkout(): string
    {
        $userId = session()->get('id');
        $user = $this->userModel->where('id', $userId)->first();
        $carts = $this->cart->where('user_id', $userId)->findAll();

        // Retrieve product details for each cart item
        foreach ($carts as $cart) {
            $cart->product = $this->products->find($cart->product_id);
        }

        $subtotal = 0;
        $tax = 0;
        foreach ($carts as $cart) {
            $subtotal += $cart->total_harga;
            $tax = $subtotal * 0.2;
        }
        $total = $subtotal + $tax;

        $data = [
            'user' => session()->get('nama_lengkap'),
            'role' => session()->get('role'),
            'title' => 'Checkout',
            'carts' => $carts,
            'user' => $user,
            'subtotal' => $subtotal,
            'tax' => $tax,
            'total' => $total,
        ];
        return view('pages/user/checkout', $data);
    }

    public function checkTransaction()
    {
        $userId = session()->get('id');
        $carts = $this->cart->where('user_id', $userId)->findAll();

        if (empty($carts)) {
            session()->setFlashdata('error', 'Cart is empty!');
            return redirect()->to('/cart');
        } else {
            return redirect()->to('/transaction');
        }
    }

    public function storeTransaction()
    {
        $userId = session()->get('id');
        $user = $this->userModel->where('id', $userId)->first();

        if ($user->alamat == null && $user->no_telp == null) {
            session()->setFlashdata('error', 'Address and phone number must be filled!');
            return redirect()->to('/account');
        }

        $carts = $this->cart->where('user_id', $userId)->findAll();
        $note = $this->request->getPost('note');

        $subtotal = 0;
        $tax = 0;

        foreach ($carts as $cart) {
            $subtotal += $cart->total_harga;
            $tax = $subtotal * 0.2;
        }
        $total = $subtotal + $tax;

        $data = [
            'id' => Uuid::uuid4(),
            'user_id' => $userId,
            'kode_transaksi' => 'INV/' . date('Ymd') . '/' . date('his') . '/' . rand(100, 999),
            'note' => $note,
            'total_bayar' => $total,
            'status' => 'pending',
        ];

        $this->transaction->insert($data);

        foreach ($carts as $cart) {
            $this->detailTransaction->insert([
                'id' => Uuid::uuid4(),
                'transaction_id' => $data['id'],
                'product_id' => $cart->product_id,
                'qty' => $cart->qty,
            ]);
        }

        foreach ($carts as $cart) {
            $this->cart->delete($cart->id);
        }

        session()->setFlashdata('success', 'Please pay your order!');
        return redirect()->to('/payment');
    }

    public function payment(): string
    {
        $admin = $this->userModel->where('role', 'admin')->first();
        $userId = session()->get('id');
        $user = $this->userModel->where('id', $userId)->first();
        $transaction = $this->transaction->where('user_id', $userId)->orderBy('created_at', 'DESC')->first();
        $detail = $this->detailTransaction->where('transaction_id', $transaction->id)->findAll();

        foreach ($detail as $item) {
            $item->product = $this->products->find($item->product_id);
        }

        $tax = 0;
        foreach ($detail as $item) {
            $tax += $item->product->harga * $item->qty * 0.2;
        }

        $data = [
            'user' => session()->get('nama_lengkap'),
            'role' => session()->get('role'),
            'title' => 'Payment',
            'transaction' => $transaction,
            'details' => $detail,
            'admin' => $admin,
            'user' => $user,
            'tax' => $tax,
        ];

        return view('pages/user/payment', $data);
    }

    public function cancelPayment($id)
    {
        $this->transaction->update($id, [
            'status' => 'canceled',
        ]);
        return redirect()->to('/payment');
    }

    public function account()
    {
        $id = session()->get('id');
        $user = $this->userModel->where('id', $id)->first();

        $transactions = $this->transaction->where('user_id', $id)->findAll();

        $data = [
            'user' => $user,
            'transactions' => $transactions,
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

    public function detailTransactions($id)
    {
        $userId = session()->get('id');
        $user = $this->userModel->where('id', $userId)->first();
        $admin = $this->userModel->where('role', 'admin')->first();
        $transaction = $this->transaction->where('id', $id)->first();
        $details = $this->detailTransaction->where('transaction_id', $transaction->id)->findAll();

        foreach ($details as $detail) {
            $detail->product = $this->products->find($detail->product_id);
        }

        $tax = 0;
        foreach ($details as $detail) {
            $tax += $detail->product->harga * $detail->qty * 0.2;
        }

        $data = [
            'user' => session()->get('nama_lengkap'),
            'role' => session()->get('role'),
            'title' => 'Detail Transactions',
            'transaction' => $transaction,
            'details' => $details,
            'admin' => $admin,
            'user' => $user,
            'tax' => $tax,
        ];

        return view('pages/user/detail-transactions', $data);
    }

    public function verifyWhatsapp()
    {
        // Get the user ID from the session
        $userId = session()->get('id');

        $user = $this->userModel->find($userId);
        $admin = $this->userModel->where('role', 'admin')->first();

        $transac = $this->transaction->where('user_id', $userId)->orderBy('created_at', 'DESC')->first();

        // Prepare the message
        $message = "Halo Admin,\n\nPesanan $transac->kode_transaksi atas nama $user->nama_lengkap sudah melakukan pembayaran. Mohon dicek dan diproses.\n\nTerima kasih.";

        // URL encode the message
        $message = urlencode($message);

        // Prepare the phone number
        $phoneNumber = $admin->no_telp; // Replace with the actual phone number

        // Generate the WhatsApp URL
        $whatsappUrl = "https://wa.me/$phoneNumber?text=$message";

        // Redirect to the WhatsApp URL
        return redirect()->to($whatsappUrl);
    }
}
