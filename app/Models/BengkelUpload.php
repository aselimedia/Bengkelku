<?php

namespace App\Models;

use CodeIgniter\Model;

class BengkelUpload extends Model
{
    protected $table            = 'bengkel';
    protected $primaryKey       = 'id_bengkel';
    protected $useTimestamps    = true;
    protected $allowedFields    = ['nama', 'no_telp', 'slug', 'buka', 'deskripsi', 'alamat', 'kota', 'gambar', 'gambar2', 'gambar3', 'gambar4', 'email', 'password', 'is_active', 'vkey'];
}
