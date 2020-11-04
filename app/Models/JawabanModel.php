<?php

namespace App\Models;

use CodeIgniter\Model;

class JawabanModel extends Model
{
    protected $table = 'jawaban';
    protected $allowedFields = ['ref_id', 'jawaban', 'bobot'];

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function getJawaban($id = FALSE)
    {
        $builder = $this->db->table('jawaban a');
        if ($id != FALSE) {
            $builder->where('a.id', $id);
            return $builder->get()->getRow();
        }
        $builder->select('a.*, b.nama');
        $builder->join('ref-unsur b', 'b.id = a.ref_id');
        $builder->orderBy('a.id', 'DESC');
        return $builder->get()->getResult();
    }
}
