<?php

namespace App\Models;

use CodeIgniter\Model;

class SurveiModel extends Model
{
    protected $table = 'survei';
    protected $allowedFields = ['nama', 'start', 'end'];

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function getSurvei($id)
    {
        $builder = $this->db->table('survei');
        // Table Survei
        $builder->where('id', $id);
        return $builder->get()->getRow();
    }
}
