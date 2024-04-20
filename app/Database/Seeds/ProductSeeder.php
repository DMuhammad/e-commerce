<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Ramsey\Uuid\Uuid;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => Uuid::uuid4(),
                'category_id' => '1',
                'nama_produk' => 'Vitamin C Serum',
                'harga' => '100000',
                'stok' => '10',
                'variant'=> '30ml',
                'detail' => 'Vitamin C Serum is a serum that contains vitamin C which is good for the skin.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => Uuid::uuid4(),
                'category_id' => '2',
                'nama_produk' => 'Moisturizer Cream',
                'harga' => '50000',
                'stok' => '20',
                'variant'=> '50ml',
                'detail' => 'Moisturizer Cream is a cream that is used to moisturize the skin.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => Uuid::uuid4(),
                'category_id' => '3',
                'nama_produk' => 'Sunscreen Lotion',
                'harga' => '75000',
                'stok' => '15',
                'variant'=> '100ml',
                'detail' => 'Sunscreen Lotion is a lotion that is used to protect the skin from the sun.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        foreach ($data as $product) {
            $this->db->table('products')->insert($product);
        }
    }
}