<?php

namespace App\Models;

use CodeIgniter\Model;

class SurveiUnsurModel extends Model
{
    protected $table = 'survei-unsur';
    protected $allowedFields = ['ref_id', 'survei_id'];

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function get($id = FALSE)
    {
        $builder = $this->db->table('survei-unsur a');
        if ($id != FALSE) {
            $builder->where('a.id', $id);
            return $builder->get()->getRow();
        }
        $builder->select('a.id, b.nama as nama_referensi, c.nama as nama_survei');
        $builder->join('ref-unsur b', 'b.id = a.ref_id');
        $builder->join('survei c', 'c.id = a.survei_id');
        $builder->orderBy('a.id', 'DESC');
        return $builder->get()->getResult();
    }
}
