<?php

namespace App\Models;

use CodeIgniter\Model;

class DomainSurveiModel extends Model
{
    protected $table = 'domain-survei';
    protected $allowedFields = ['website_id', 'layanan_id'];

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function getAllDomainSurvei()
    {
        $builder = $this->db->table('domain-survei a');
        $builder->select('a.*, b.nama as nama_layanan, c.domain');
        $builder->join('layanan b', 'b.id = a.layanan_id');
        $builder->join('website c', 'c.id = a.website_id');
        $builder->orderBy('a.id', 'DESC');
        return $builder->get()->getResult();
    }

    public function getIdDomainSurvei($id)
    {
        $builder = $this->db->table('domain-survei');
        return $builder->getWhere(['id' => $id])->getRow();
    }
}
