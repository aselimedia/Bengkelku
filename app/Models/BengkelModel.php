<?php

namespace App\Models;

use CodeIgniter\Model;

class BengkelModel extends Model
{
    protected $table            = 'bengkel';
    protected $primaryKey       = 'id_bengkel';
    protected $useTimestamps    = true;
    protected $allowedFields    = ['id_bengkel', 'nama', 'no_telp', 'slug', 'alamat', 'kota'];

    public function getBengkel($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }

    public function search($keyword)
    {
        return $this->table('bengkel')->like('nama', $keyword);
    }

    public function getCount()
    {
        return $this->db->table('bengkel')
            ->selectCount('nama')
            ->get()->getResultArray();
    }
}
