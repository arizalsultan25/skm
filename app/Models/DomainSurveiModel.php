<?php

namespace App\Models;

use CodeIgniter\Model;

class DomainsurveiModel extends Model
{
    protected $table = 'domainsurvei';
    protected $allowedFields = ['website_id', 'layanan_id'];

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function getAllDomainsurvei()
    {
        $builder = $this->db->table('domainsurvei a');
        $builder->select('a.*, b.nama as nama_layanan, c.domain');
        $builder->join('layanan b', 'b.id = a.layanan_id');
        $builder->join('website c', 'c.id = a.website_id');
        $builder->orderBy('a.id', 'DESC');
        return $builder->get()->getResult();
    }

    public function getIdDomainsurvei($id)
    {
        $builder = $this->db->table('domainsurvei');
        return $builder->getWhere(['id' => $id])->getRow();
    }
}
