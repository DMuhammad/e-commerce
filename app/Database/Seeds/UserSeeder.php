<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Ramsey\Uuid\Uuid;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => Uuid::uuid4(),
                'nama_lengkap' => 'PT. Persada Jayaraya Abadi',
                'email' => 'persada@gmail.com',
                'password' => password_hash('admin', PASSWORD_DEFAULT),
                'role' => 'Admin',
                'alamat' => 'Kahuripan Avenue no 23 Sidoarjo, Jawa Timur, Indonesia',
                'no_telp' => '6281283635368',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => Uuid::uuid4(),
                'nama_lengkap' => 'User',
                'email' => 'user@gmail.com',
                'password' => password_hash('user', PASSWORD_DEFAULT),
                'role' => 'User',
                'alamat' => 'Jl. User No. 2',
                'no_telp' => '6281234567891',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => Uuid::uuid4(),
                'nama_lengkap' => 'Owner',
                'email' => 'owner@gmail.com',
                'password' => password_hash('owner', PASSWORD_DEFAULT),
                'role' => 'Owner',
                'alamat' => 'Jl. Owner No. 3',
                'no_telp' => '6281234567892',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        foreach ($data as $user) {
            $this->db->table('users')->insert($user);
        }
    }
}