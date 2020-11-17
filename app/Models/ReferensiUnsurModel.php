<?php

namespace App\Models;

use CodeIgniter\Model;

class ReferensiUnsurModel extends Model
{
    protected $table = 'ref-unsur';
    protected $allowedFields = ['nama'];

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function getReferensi($id = FALSE)
    {
        $builder = $this->db->table('ref-unsur');
        if ($id == FALSE) {
            $builder->orderBy('id', 'ASC');
            return $builder->get()->getResult();
        }
        return $builder->getWhere(['id' => $id])->getRow();
    }
}
