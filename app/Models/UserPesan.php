<?php

namespace App\Models;

use CodeIgniter\Model;

class UserPesan extends Model
{
    protected $table = 'pesan';
    protected $primaryKey = 'id_pesan';
    protected $createdField = 'tgl';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_bengkel', 'id', 'antrian', 'status'];

    public function getAntrian($slug)
    {
        return $this->db->table('pesan')
            ->join('bengkel', 'pesan.id_bengkel = bengkel.id_bengkel')
            ->join('users', 'pesan.id = users.id')
            ->where(['bengkel.slug' => $slug])
            ->get()->getResultArray();
    }

    public function cekAntrian($slug)
    {
        return $this->db->table('pesan')
            ->join('bengkel', 'pesan.id_bengkel = bengkel.id_bengkel')
            ->join('users', 'pesan.id = users.id')
            ->selectMax('antrian')
            ->where(['bengkel.slug' => $slug])
            ->get()->getResultArray();
    }

    public function updateStatus($newData, $id)
    {
        return $this->db->table($this->table)->update($newData, ['id_pesan' => $id]);
    }
}
