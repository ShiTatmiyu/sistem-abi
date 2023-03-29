<?php

namespace App\Models;

use CodeIgniter\Model;

class WalimuridModel extends Model
{
    protected $table            = 'walimurid';
    protected $allowedFields    = ["id_walimurid","username_walimurid","password_walimurid","email_walimurid","nama_walimurid","nisn_murid","jenis_kelamin","foto_profile"];
}
