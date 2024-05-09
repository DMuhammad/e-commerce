<?php

namespace App\Controllers;
use App\Models\TransactionModel;

class TransactionController extends BaseController
{
    protected $transaction;

    public function __construct()
    {
        $this->transaction = new TransactionModel();
    }

    public function index()
    {
        $transact = $this->transaction->findAll();
        foreach ($transact as $key => $transaction) {
            $transact[$key]->user = $this->transaction->select('nama_lengkap')
                ->join('users', 'users.id = transactions.user_id')
                ->where('user_id', $transaction->user_id)
                ->first();
        }
        $status = ['pending', 'success', 'canceled'];

        $data = [
            'user' => session()->get('nama_lengkap'),
            'role' => session()->get('role'),
            'transactions' => $transact,
            'statuses' => $status
        ];

        return view('pages/dashboard/transactions', $data);
    }

    public function update($id)
    {
        $status = $this->request->getPost('status');
        $this->transaction->update($id, ['status' => $status]);

        // set flashdata
        session()->setFlashdata('success', 'Transaction status has been updated');

        return redirect()->back();
    }

    public function delete($id)
    {
        $this->transaction->delete($id);

        // set flashdata
        session()->setFlashdata('success', 'Transaction has been deleted');

        return redirect()->back();
    }
}
