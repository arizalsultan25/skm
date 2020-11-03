<?php

namespace App\Models;

use CodeIgniter\Model;

class WebsiteModel extends Model
{
    protected $table = 'website';
    protected $allowedFields = ['domain'];

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function getWebsite($id = FALSE)
    {
        $builder = $this->db->table('website a');
        // Table Website
        if ($id == FALSE) {
            $builder->orderBy('id', 'ASC');
            return $builder->get()->getResult();
        }
        // Table Domain Survei
        $builder->select('a.*, c.nama, d.id as id_survei');
        $builder->join('domain-survei b', 'b.website_id = a.id');
        $builder->join('layanan c', 'c.id = b.layanan_id');
        $builder->join('survei d', 'd.layanan_id = c.id');
        $builder->where('a.id', $id);
        $query = $builder->get()->getResult();
        return $query;
    }
}
