<?php

namespace App\Models;

use CodeIgniter\Model;

class ReviewModel extends Model
{
    protected $table      = 'review';
    protected $primaryKey = 'id_riview';
    protected $useTimestamps = true;

    public function getRiview($slug = false)
    {
        return $this->db->table('review')
            ->join('pesan', 'review.id_pesan = pesan.id_pesan')
            ->join('bengkel', 'bengkel.id_bengkel = pesan.id_bengkel')
            ->join('users', 'users.id = pesan.id')
            ->where(['bengkel.slug' => $slug])
            ->get()->getResultArray();
    }
}
