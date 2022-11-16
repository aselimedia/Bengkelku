<?php

namespace App\Models;

use CodeIgniter\Model;

class BengkelUserModel extends Model
{
    protected $table            = 'bengkel';
    protected $primaryKey       = 'id_bengkel';
    protected $useTimestamps    = true;
    protected $allowedFields    = ['nama', 'no_telp', 'slug', 'buka', 'deskripsi', 'alamat', 'kota', 'gambar', 'gambar2', 'gambar3', 'gambar4', 'email', 'password', 'is_active', 'vkey'];
    protected $beforeInsert     = ['beforeInsert'];
    protected $beforeUpdate     = ['beforeUpdate'];


    protected function beforeInsert(array $data)
    {
        $data = $this->passwordHash($data);
        return $data;
    }

    protected function beforeUpdate(array $data)
    {
        $data = $this->passwordHash($data);
        return $data;
    }

    protected function passwordHash(array $data)
    {
        if (!isset(['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }

        return $data;
    }
}
