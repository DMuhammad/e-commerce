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
                'category_id' => (new \App\Models\CategoryModel())->where('nama_kategori', 'Bottle')->first()->id,
                'nama_produk' => 'Aireless Bottle',
                'harga' => '100000',
                'stok' => '20',
                'variant'=> '30ml',
                'detail' => 'Aireless Bottle is a bottle that is used to store liquid products such as toner, essence, or serum.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => Uuid::uuid4(),
                'category_id' => (new \App\Models\CategoryModel())->where('nama_kategori', 'Bottle')->first()->id,
                'nama_produk' => 'Aireless Bottle',
                'harga' => '100000',
                'stok' => '15',
                'variant'=> '50ml',
                'detail' => 'Aireless Bottle is a bottle that is used to store liquid products such as toner, essence, or serum.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => Uuid::uuid4(),
                'category_id' => (new \App\Models\CategoryModel())->where('nama_kategori', 'Bottle')->first()->id,
                'nama_produk' => 'Botol Spray',
                'harga' => '50000',
                'stok' => '10',
                'variant'=> '100ml',
                'detail' => 'Botol Spray is a bottle that is used to store liquid products such as toner, essence, or serum.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => Uuid::uuid4(),
                'category_id' => (new \App\Models\CategoryModel())->where('nama_kategori', 'Bottle')->first()->id,
                'nama_produk' => 'Botol Spray',
                'harga' => '50000',
                'stok' => '5',
                'variant'=> '60ml',
                'detail' => 'Botol Spray is a bottle that is used to store liquid products such as toner, essence, or serum.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => Uuid::uuid4(),
                'category_id' => (new \App\Models\CategoryModel())->where('nama_kategori', 'Box')->first()->id,
                'nama_produk' => 'Box Gelang',
                'harga' => '75000',
                'stok' => '15',
                'variant'=> 'All',
                'detail' => 'Box Gelang is a box that is used to store bracelets or other jewelry items.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        foreach ($data as $product) {
            $this->db->table('products')->insert($product);
        }
    }
}