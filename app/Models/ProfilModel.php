<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfilModel extends Model
{
    protected $table      = 'profil';
    protected $primaryKey = 'id_bengkel';
    protected $useTimestamps = true;

    public function getPesanan($nama_bengkel = false)
    {
        if ($nama_bengkel == false) {
            return $this->findall();
        }

        return $this->where(['nama_bengkel' => $nama_bengkel])->first();
    }
}
