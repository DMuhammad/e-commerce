<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = false;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_lengkap', 'email', 'password', 'role', 'alamat', 'no_telp'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function register($data)
    {
        $this->save($data);

        return $this->getInsertID();
    }

    public function login($data)
    {
        $user = $this->where('email', $data['email'])->first();

        if ($user && password_verify($data['password'], $user->password)) {
            return [$user->nama_lengkap, $user->id, $user->role];
        } else {
            return false;
        }
    }

    public function updateUser($data)
    {
        $user = $this->find($data['id']);

        if ($user) {
            $this->update($user->id, $data);
            return true;
        } else {
            return false;
        }
    }
}