<?php

namespace App\Models;

use CodeIgniter\Model;

class CompanyProfileModel extends Model
{
    protected $table            = 'companyprofiles';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = false;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'nama', 'deskripsi', 'visi', 'misi', 'alamat', 'email', 'kontak', 'bank', 'no_rek'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
