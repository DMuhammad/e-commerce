<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table            = 'products';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = false;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'nama_produk', 'category_id', 'detail', 'stok', 'variant', 'harga'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    function getAll()
    {
        $builder = $this->db->table('products');
        $builder->select('products.*, categories.nama_kategori');
        $builder->join('categories', 'categories.id = products.category_id');
        $query = $builder->get();

        return $query->getResult();
    }
}
