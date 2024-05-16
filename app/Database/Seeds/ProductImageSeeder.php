<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'product_id' => '1',
                'image' => 'serum1.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '2',
                'product_id' => '2',
                'image' => 'moist1.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '3',
                'product_id' => '3',
                'image' => 'lotion1.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        foreach ($data as $productImage) {
            $this->db->table('productimages')->insert($productImage);
        }
    }
}