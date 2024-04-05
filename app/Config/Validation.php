<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    public array $signup = [
        'nama_lengkap' => [
            'rules' => 'required|alpha|min_length[3]|max_length[40]',
            'errors' => [
                'required' => 'Nama lengkap harus diisi.',
                'alpha' => 'Nama lengkap hanya boleh berisi huruf.',
                'min_length' => 'Nama lengkap minimal terdiri dari 3 huruf.',
                'max_length' => 'Nama lengkap maksimal terdiri dari 40 huruf.'
            ]
        ],
        'email' => [
            'rules' => 'required|valid_email|is_unique[users.email]',
            'errors' => [
                'required' => 'Email harus diisi.',
                'valid_email' => 'Harap masukkan alamat email yang benar.',
                'is_unique' => 'Alamat email sudah digunakan'
            ]
        ],
        'password' => [
            'rules' => 'required|min_length[8]|',
            'errors' => [
                'required' => 'Password harus diisi',
                'min_length' => 'Password minimal 8 karakter.',
            ]
        ],
        'confirmation_password' => [
            'rules' => 'required_with[password]|matches[password]',
            'errors' => [
                'required_with' => 'Password harus diisi terlebih dahulu.',
                'matches' => 'Password tidak sesuai'
            ]
        ],
    ];

    public array $signin = [
        'email' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Email harus diisi.'
            ]
        ],
        'password' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Password harus diisi.'
            ]
        ]
    ];

    public array $companyprofile = [
        'deskripsi' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Deskripsi harus diisi',
            ]
        ],
        'image' => [
            'rules' => 'is_image[image]',
            'errors' => [
                'is_image' => 'File yang diupload harus berupa gambar.'
            ]
        ],
        'alamat' => [
            'rules' => 'required|',
            'errors' => [
                'required' => 'Alamat harus diisi.',
            ]
        ],
        'kontak' => [
            'rules' => 'required|max_length[13]|min_length[10]|numeric',
            'errors' => [
                'required' => 'Kontak harus diisi.',
                'max_length' => 'Nomor Kontak tidak boleh lebih dari 13 digit.',
                'min_length' => 'Nomor Kontak tidak boleh kurang dari 10 digit.',
                'numeric' => 'Kontak harus berupa angka.'
            ]
        ]
    ];
    public array $chat = [
        'pesan' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Pesan harus diisi.'
            ]
        ],
        'status' => [
            'rules' => 'required|in_list[pending, read]',
            'errors' => [
                'required' => 'Status harus diisi.',
                'in_list' => 'Nilai status tidak ada dalam daftar.'
            ]
        ]
    ];
    public array $category = [
        'nama' => [
            'rules' => 'required|is_unique[categories.nama]|alpha',
            'errors' => [
                'required' => 'Nama kategori harus diisi.',
                'is_unique' => 'Kategori sudah ada.',
                'alpha' => 'Nama kategori harus berupa huruf'
            ]
        ]
    ];
    public array $product = [
        'nama' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama product harus diisi.'
            ]
        ],
        'category_id' => [
            'rules' => 'required|exact_length[32]',
            'errors' => [
                'required' => 'Kategori tidak ditemukan.',
                'exact_length' => 'Harus berisi 32 karakter.'
            ]
        ],
        'detail' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Detail product harus diisi.',
            ]
        ],
        'variant' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Variant product harus diisi.'
            ]
        ],
        'harga' => [
            'rules' => 'required|greater_than[0]|',
            'errors' => [
                'required' => 'Harga harus diisi.',
                'greater_than' => 'Harus bernilai lebih dari 0 dan berupa angka.'
            ]
        ]
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
}
