<?php

namespace App\Models;

use CodeIgniter\Model;

class UserVerifi extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['nama_depan', 'nama_belakang', 'number', 'alamat', 'email', 'password', 'vkey', 'is_active', 'updated_at'];

    public function getActive($vkey)
    {
        return $this->db->table('users')->select('is_active', 'vkey')->where(['is_active' => 0] and ['vkey' => $vkey])->limit(1);
    }

    public function setActive($vkey)
    {
        return $this->db->table('users')->update(['is_active' => 1], ['vkey' => $vkey]);
    }

    public function setForget($vkey, $email)
    {
        return $this->db->table('users')->update(['vkey' => $vkey], ['email' => $email]);
    }

    public function getForget($vkey)
    {
        return $this->db->table('users')->select('vkey', 'email')->where(['vkey' => $vkey], ['email']);
    }

    public function updateForget($password, $vkey)
    {
        return $this->db->table('users')->update(['password' => $password], ['vkey' => $vkey]);
    }
}
