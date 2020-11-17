<?php

namespace App\Models;

use CodeIgniter\Model;

class WebsiteModel extends Model
{
    protected $table = 'website';
    protected $useTimestamps = FALSE;
    protected $allowedFields = ['domain'];

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function getWebsite($id = FALSE)
    {
        $builder = $this->db->table('website');
        // Table Website
        if ($id == FALSE) {
            $builder->orderBy('id_website', 'DESC');
            return $builder->get()->getResult();
        }

        return $builder->getWhere(['id_website' => $id])->getRow();
    }
}
