<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\TransactionModel;
use App\Models\UserModel;
use App\Models\DetailTransactionModel;

class DashboardController extends BaseController
{
    protected $categoryController;

    public function __construct()
    {
        $this->categories = new CategoryModel();
        $this->products = new ProductModel();
        $this->transactions = new TransactionModel();
        $this->detailTransactions = new DetailTransactionModel();
        $this->users = new UserModel();
    }

    public function index(): string
    {
        $transactions = $this->transactions->select('transactions.*, users.nama_lengkap')
            ->join('users', 'users.id = transactions.user_id')
            ->orderBy('transactions.created_at', 'DESC')
            ->limit(5)
            ->findAll();

        $topSales = $this->detailTransactions->select('products.nama_produk, SUM(detailtransactions.qty) as total_qty')
            ->join('products', 'products.id = detailtransactions.product_id')
            ->groupBy('product_id')
            ->orderBy('total_qty', 'DESC')
            ->limit(5)
            ->findAll();

        $salesPerMonth = $this->detailTransactions->select('MONTH(transactions.created_at) as month, YEAR(transactions.created_at) as year, SUM(detailtransactions.qty) as total_qty')
            ->join('transactions', 'transactions.id = detailtransactions.transaction_id')
            ->where('transactions.status', 'success')
            ->groupBy('month, year')
            ->orderBy('year', 'ASC')
            ->orderBy('month', 'ASC')
            ->findAll();

        $data = [
            'user' => session()->get('nama_lengkap'),
            'role' => session()->get('role'),
            'total_categories' => $this->categories->countAll(),
            'total_products' => $this->products->countAll(),
            'total_transactions' => $this->transactions->where('status', 'success')->countAllResults(),
            'total_users' => $this->users->where('role !=', 'Admin')->where('role !=', 'Owner')->countAllResults(),
            'transactions' => $transactions,
            'sales_per_month' => $salesPerMonth,
            'top_sales' => $topSales,
        ];

        return view('pages/dashboard/index', $data);
    }
}
