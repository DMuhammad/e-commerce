<?php

namespace App\Controllers;

use App\Models\ChatModel;
use App\Models\UserModel;
use Ramsey\Uuid\Uuid;

class ChatController extends BaseController
{
    protected $chats;
    protected $db;
    protected $users;

    function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->chats = new ChatModel();
        $this->users = new UserModel();
    }

    public function index()
    {
        $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
        $user_chat = $this->chats->orderBy('created_at', 'desc')->where('from !=', 'admin')->groupBy('from')->findAll();
        foreach ($user_chat as $uc) {
            $uc->from = $this->users->select('id, nama_lengkap')->find($uc->from);
        }
        $data = [
            'user' => session()->get('nama_lengkap'),
            'role' => session()->get('role'),
            'user_chat' => $user_chat,
            'chats' => $this->chats->orderBy('created_at', 'asc')->findAll()
        ];

        // return response()->setJSON($data);

        return view('pages/dashboard/chat', $data);
    }

    public function store()
    {
        $status = $this->chats->insert([
            'id' => Uuid::uuid4(),
            'pesan' => $this->request->getPost('message'),
            'from' => $this->request->getPost('from'),
            'to' => $this->request->getPost('to'),
            'status' => 'pending'
        ]);
        $data = [
            'id' => $status,
            'token' => csrf_hash(),
            'status' => 'success'
        ];
        return response()->setJSON($data);
    }

    public function chats()
    {
        $data = [
            'chats' => $this->chats->where('from', session()->get('id'))->orWhere('to', session()->get('id'))->orderBy('created_at', 'asc')->findAll(),
            'token' => csrf_hash()
        ];

        return response()->setJSON($data);
    }

    public function chatsByUser($id)
    {
        $data = [
            'chats' => $this->chats->where('from', $id)->orWhere('to', $id)->orderBy('created_at', 'asc')->findAll(),
            'token' => csrf_hash()
        ];

        return response()->setJSON($data);
    }
}
