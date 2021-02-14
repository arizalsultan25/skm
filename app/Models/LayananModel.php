<?php

namespace App\Models;

use CodeIgniter\Model;

class LayananModel extends Model
{
    protected $table = 'layanan';
    protected $allowedFields = ['unitlayanan_id', 'nama'];

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function getIdLayanan($id)
    {
        $builder = $this->db->table('layanan');
        return $builder->getWhere(['id' => $id])->getRow();
    }

    public function getAllLayanan()
    {
        $builder = $this->db->table('layanan a');
        $builder->select('a.*, b.nama as nama_unitlayanan');
        $builder->join('unitlayanan b', 'b.id = a.unitlayanan_id');
        $builder->orderBy('a.id', 'DESC');
        return $builder->get()->getResult();
    }

    public function getLayanan($id)
    {
        $builder = $this->db->table('website a');
        // Table Domain Survei
        $builder->select('a.*, c.nama, d.id as survei_id');
        $builder->join('domainsurvei b', 'b.website_id = a.id');
        $builder->join('layanan c', 'c.id = b.layanan_id');
        $builder->join('survei d', 'd.layanan_id = c.id');
        $builder->where('a.id', $id);
        $query = $builder->get()->getResult();
        return $query;
    }
}
