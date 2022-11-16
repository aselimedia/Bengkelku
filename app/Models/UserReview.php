<?php

namespace App\Models;

use CodeIgniter\Model;

class UserReview extends Model
{
    protected $table            = 'review';
    protected $primaryKey       = 'id_review';
    protected $createdField     = 'tgl';
    protected $useTimestamps    = true;
    protected $allowedFields    = ['id_pesan', 'komentar', 'rating'];

    public function get_Review($slug)
    {
        return $this->db->table('review')
            ->join('pesan', 'review.id_pesan = pesan.id_pesan')
            ->join('bengkel', 'bengkel.id_bengkel = pesan.id_bengkel')
            ->join('users', 'users.id = pesan.id')
            ->where(['bengkel.slug' => $slug])
            ->get()->getResultArray();
    }

    public function getRating($slug = false)
    {
        return $this->db->table('review')
            ->join('pesan', 'review.id_pesan = pesan.id_pesan')
            ->join('bengkel', 'bengkel.id_bengkel = pesan.id_bengkel')
            ->join('users', 'users.id = pesan.id')
            ->selectAvg('rating')
            ->where(['bengkel.slug' => $slug])
            ->get()->getResultArray();
    }
}
