<?php

namespace App\Models;

use CodeIgniter\Model;

class SurveiModel extends Model
{
    protected $table = 'survei';
    protected $allowedFields = ['layanan_id', 'nama', 'start', 'end'];

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function getIdSurvei($id)
    {
        $builder = $this->db->table('survei');
        return $builder->getWhere(['id' => $id])->getRow();
    }

    public function getSurvei()
    {
        $builder = $this->db->table('survei a');
        $builder->select('a.*, b.nama as nama_layanan');
        $builder->join('layanan b', 'b.id = a.layanan_id');
        $builder->orderBy('id', 'DESC');
        return $builder->get()->getResult();
    }

    public function getSurveiByIdLayanan($id)
    {
        $builder = $this->db->table('survei');
        $builder->where('layanan_id', $id);
        return $builder->get()->getResult();
    }
}
