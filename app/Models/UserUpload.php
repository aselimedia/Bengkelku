<?php

namespace App\Models;

use CodeIgniter\Model;

class UserUpload extends Model
{
    protected $table = 'users';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_depan', 'nama_belakang', 'number', 'alamat', 'email', 'picture'];

    public function getUsers()
    {
        return $this->db->table('users')->get()->getResultArray();
    }

    public function getUser($id = false)
    {
        return $this->where(['id' => $id])->first();
    }

    public function getCountUs()
    {
        return $this->db->table('users')
            ->selectCount('id')
            ->get()->getResultArray();
    }
}
