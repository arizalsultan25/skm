<?php

namespace App\Models;

use CodeIgniter\Model;

class UnitlayananModel extends Model
{
    protected $table = 'unitlayanan';
    protected $allowedFields = ['nama'];

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function getUnitlayanan($id = FALSE)
    {
        $builder = $this->db->table('unitlayanan');
        // Table Website
        if ($id == FALSE) {
            $builder->orderBy('id', 'DESC');
            return $builder->get()->getResult();
        }

        return $builder->getWhere(['id' => $id])->getRow();
    }
}
