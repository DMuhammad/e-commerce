<?php

namespace App\Database\Seeds;

use Ramsey\Uuid\Uuid;
use CodeIgniter\Database\Seeder;

class CompanyProfileSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => Uuid::uuid4(),
                'deskripsi' => 'PT. Persada Jayaraya Abadi adalah perusahaan bidang packaging yang berdiri sejak tahun 2000.',
                'visi' => 'Menjadi perusahaan packaging terbaik di Indonesia.',
                'misi' => 'Menyediakan produk packaging berkualitas tinggi dengan harga terjangkau.',
                'bank' => 'BSI',
                'no_rek' => '6012 1234 5678 9012',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        foreach ($data as $profile) {
            $this->db->table('companyprofiles')->insert($profile);
        }
    }
}
