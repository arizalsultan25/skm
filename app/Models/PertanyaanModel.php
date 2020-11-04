<?php

namespace App\Models;

use CodeIgniter\Model;

class PertanyaanModel extends Model
{
    protected $table = 'pertanyaan';
    protected $allowedFields = ['ref_id', 'pertanyaan'];

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function getSurveiById($id)
    {
        $builder = $this->db->table('survei');
        // Table Survei
        $builder->where('id', $id);
        return $builder->get()->getRow();
    }

    public function get($id = FALSE)
    {
        $builder = $this->db->table('pertanyaan a');
        if ($id == FALSE) {
            $builder->select('a.*, b.nama');
            $builder->join('ref-unsur b', 'b.id = a.ref_id');
            $builder->orderBy('a.id', 'DESC');
            return $builder->get()->getResult();
        }

        $builder->where('a.id', $id);
        return $builder->get()->getRow();
    }

    public function getPertanyaan($id)
    {
        $builder = $this->db->table('survei-unsur a');
        $builder->select("a.*, b.id as id_pertanyaan, b.pertanyaan, b.ref_id as ref_pertanyaan");
        $builder->join('pertanyaan b', 'b.ref_id = a.ref_id');
        $builder->where('a.survei_id', $id);
        return $builder->get()->getResult();
    }

    public function getJawaban($id)
    {
        $builder = $this->db->table('survei-unsur a');
        $builder->select("a.*, b.jawaban, b.ref_id as ref_jawaban");
        $builder->join('jawaban b', 'b.ref_id = a.ref_id');
        $builder->where('a.survei_id', $id);
        return $builder->get()->getResult();
    }
}
