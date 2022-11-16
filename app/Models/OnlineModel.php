<?php

namespace App\Models;

use CodeIgniter\Model;

class OnlineModel extends Model
{
    protected $table      = 'pesan';
    protected $primaryKey = 'id_pesan';
    protected $useTimestamps = true;

    public function getOnline($id = false)
    {
        if ($id == false) {
            return $this->findall();
        }

        return $this->where(['id_pesan' => $id])->first();
    }

    public function getUser($id)
    {
        return $this->db->table('pesan')
            ->join('users', 'pesan.id = users.id')
            ->selectMax('antrian')
            ->where(['users.id' => $id])
            ->get()->getResultArray();
    }
}
