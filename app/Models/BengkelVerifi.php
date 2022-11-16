<?php

namespace App\Models;

use CodeIgniter\Model;

class BengkelVerifi extends Model
{
    protected $table = 'bengkel';
    protected $allowedFields    = ['nama', 'no_telp', 'slug', 'buka', 'deskripsi', 'alamat', 'kota', 'gambar', 'gambar2', 'gambar3', 'gambar4', 'email', 'password', 'is_active', 'vkey'];

    public function getActive($vkey)
    {
        return $this->db->table('bengkel')->select('is_active', 'vkey')->where(['is_active' => 0] and ['vkey' => $vkey])->limit(1);
    }

    public function setActive($vkey)
    {
        return $this->db->table('bengkel')->update(['is_active' => 1], ['vkey' => $vkey]);
    }

    public function setForget($vkey, $email)
    {
        return $this->db->table('bengkel')->update(['vkey' => $vkey], ['email' => $email]);
    }

    public function getForget($vkey)
    {
        return $this->db->table('bengkel')->select('vkey', 'email')->where(['vkey' => $vkey], ['email']);
    }

    public function updateForget($password, $vkey)
    {
        return $this->db->table('bengkel')->update(['password' => $password], ['vkey' => $vkey]);
    }
}
