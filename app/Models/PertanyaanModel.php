<?php

namespace App\Models;

use CodeIgniter\Model;

class PertanyaanModel extends Model
{
    protected $table = 'pertanyaan';
    protected $allowedFields = ['referensiunsur_id', 'pertanyaan'];

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
            $builder->join('referensiunsur b', 'b.id = a.referensiunsur_id');
            $builder->orderBy('a.id', 'DESC');
            return $builder->get()->getResult();
        }

        $builder->where('a.id', $id);
        return $builder->get()->getRow();
    }

    public function getPertanyaan($id = FALSE)
    {
        $builder = $this->db->table('pertanyaan a');
        $builder->select("a.*, b.id as pertanyaan_id, b.pertanyaan, b.referensiunsur_id as referensiunsur_pertanyaan");
        $builder->join('pertanyaan b', 'b.referensiunsur_id = a.referensiunsur_id');
        $builder->where('a.id', $id);
        return $builder->get()->getResult();
    }

    public function getAllPertanyaan($id = FALSE)
    {
        $builder = $this->db->table('pertanyaan a');
        if ($id != FALSE) {
            $builder->where('a.id', $id);
            return $builder->get()->getRow();
        }
        $builder->select('a.*, b.nama');
        $builder->join('referensiunsur b', 'b.id = a.referensiunsur_id');
        $builder->orderBy('a.id', 'DESC');
        return $builder->get()->getResult();
    }

    public function getJawaban($id)
    {
        $builder = $this->db->table('surveiunsur a');
        $builder->select("a.*, b.jawaban, b.referensiunsur_id as referensiunsur_jawaban");
        $builder->join('jawaban b', 'b.referensiunsur_id = a.referensiunsur_id');
        $builder->where('a.survei_id', $id);
        return $builder->get()->getResult();
    }
}
