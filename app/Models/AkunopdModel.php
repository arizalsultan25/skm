<?php

namespace App\Models;

use CodeIgniter\Model;

class AkunopdModel extends Model
{
    protected $table = 'akunopd';
    protected $allowedFields = ['unitlayanan_id', 'nama'];

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function getAllAkunopd()
    {
        $builder = $this->db->table('akunopd a');
        $builder->select('a.*, b.nama as unitlayanan_nama');
        $builder->join('unitlayanan b', 'b.id = a.unitlayanan_id');
        $builder->orderBy('a.id', 'DESC');
        return $builder->get()->getResult();
    }

    public function getAkunOPDbyKode($kode)
    {
        $builder = $this->db->table('akunopd a');
        $builder->select('a.*, b.nama as unitlayanan_nama');
        $builder->join('unitlayanan b', 'b.id = a.unitlayanan_id');
        $builder->where('a.kode', $kode);
        $builder->orderBy('a.id', 'DESC');
        return $builder->get()->getResult();
    }
}
