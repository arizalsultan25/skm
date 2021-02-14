<?php

namespace App\Models;

use CodeIgniter\Model;

class SurveiunsurModel extends Model
{
    protected $table = 'surveiunsur';
    protected $allowedFields = ['referensiunsur_id', 'survei_id'];

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function get($id = FALSE)
    {
        $builder = $this->db->table('surveiunsur a');
        if ($id != FALSE) {
            $builder->where('a.id', $id);
            return $builder->get()->getRow();
        }
        $builder->select('a.id, b.nama as nama_referensiunsur, c.nama as nama_survei');
        $builder->join('referensiunsur b', 'b.id = a.referensiunsur_id');
        $builder->join('survei c', 'c.id = a.survei_id');
        $builder->orderBy('a.id', 'DESC');
        return $builder->get()->getResult();
    }
}
