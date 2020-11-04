<?php

namespace App\Models;

use CodeIgniter\Model;

class UnitLayananModel extends Model
{
    protected $table = 'unit-layanan';
    protected $allowedFields = ['nama'];

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function getUnitLayanan($id = FALSE)
    {
        $builder = $this->db->table('unit-layanan');
        // Table Website
        if ($id == FALSE) {
            $builder->orderBy('id', 'DESC');
            return $builder->get()->getResult();
        }

        return $builder->getWhere(['id' => $id])->getRow();
    }
}
