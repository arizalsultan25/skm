<?php

namespace App\Models;

use CodeIgniter\Model;

class ReferensiunsurModel extends Model
{
    protected $table = 'referensiunsur';
    protected $allowedFields = ['nama'];

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function getReferensiunsur($id = FALSE)
    {
        $builder = $this->db->table('referensiunsur');
        if ($id == FALSE) {
            $builder->orderBy('id', 'ASC');
            return $builder->get()->getResult();
        }
        return $builder->getWhere(['id' => $id])->getRow();
    }
}
