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

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    public $register = [
        'username' => [
            'rules' => 'required|min_length[5]',
        ],
        'password' => [
            'rules' => 'required',
        ],
        'confirmPassword' => [
            'rules' => 'required|matches[password]',
        ],
    ];

    public $register_errors = [
        'username' => [
            'required' => 'Mohon isi username Anda',
            'min_length' => 'Isi username dengan minimal 5 karakter!',
        ],
        'password' => [
            'required' => 'Mohon isi password Anda',
        ],
        'confirmPassword' => [
            'required' => 'Mohon konfirmasi password Anda',
            'matches' => 'Password yang Anda masukkan tidak cocok',
        ],
    ];

    public $login = [
        'username' => [
            'rules' => 'required|min_length[5]',
        ],
        'password' => [
            'rules' => 'required',
        ],
    ];

    public $transaksi = [
        'id_barang' => [
            'rules' => 'required',
        ],
        'id_pembeli' => [
            'rules' => 'required',
        ],
        'jumlah' => [
            'rules' => 'required',
        ],
        'total_harga' => [
            'rules' => 'required',
        ],
        'alamat' => [
            'rules' => 'required',
        ],
        'ongkir' => [
            'rules' => 'required',
        ],
    ];

    public $login_errors = [
        'username' => [
            'required' => 'Mohon isi username Anda',
            'min_length' => 'Isi username dengan minimal 5 karakter!',
        ],
        'password' => [
            'required' => 'Mohon isi password Anda',
        ],
    ];

    public $barang = [
        'nama' => [
            'rules' => 'required|min_length[3]',
        ],
        'harga' => [
            'rules' => 'required|is_natural',
        ],
        'stok' => [
            'rules' => 'required|is_natural',
        ],
        'gambar' => [
            'rules' => 'uploaded[gambar]',
        ],
    ];

    public $barang_errors = [
        'nama' => [
            'required' => 'Mohon isi nama barang Anda',
            'min_length' => 'Masukkan dengan minimum 3 karakter',
        ],
        'harga' => [
            'required' => 'Mohon isi harga barang Anda',
            'is_natural' => 'Tidak boleh negatif',
        ],
        'stok' => [
            'required' => 'Mohon isi data barang Anda',
            'is_natural' => 'Tidak boleh negatif',
        ],
        'gambar' => [
            'uploaded' => 'Harus di-upload di semua sosmed',
         ],
    ];

    public $barangUpdate = [
        'nama' => [
            'rules' => 'required|min_length[3]',
        ],
        'harga' => [
            'rules' => 'required|is_natural',
        ],
        'stok' => [
            'rules' => 'required|is_natural',
        ],
    ];

    public $barangUpdate_errors = [
        'nama' => [
            'required' => 'Mohon isi nama barang Anda',
            'min_length' => 'Masukkan dengan minimum 3 karakter',
        ],
        'harga' => [
            'required' => 'Mohon isi harga barang Anda',
            'is_natural' => 'Tidak boleh negatif',
        ],
        'stok' => [
            'required' => 'Mohon isi data barang Anda',
            'is_natural' => 'Tidak boleh negatif',
        ],
    ];
}