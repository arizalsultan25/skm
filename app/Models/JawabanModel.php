<?php

namespace App\Models;

use CodeIgniter\Model;

class JawabanModel extends Model
{
    protected $table = 'jawaban';
    protected $allowedFields = ['pertanyaan_id', 'jawaban', 'nilai'];

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function getJawaban($id = FALSE)
    {
        $builder = $this->db->table('jawaban a');
        if ($id != FALSE) {
            $builder->where('a.id', $id);
            return $builder->get()->getRow();
        }
        $builder->select('a.*, b.nama');
        $builder->join('ref-unsur b', 'b.id = a.pertanyaan_id');
        $builder->orderBy('a.id', 'DESC');
        return $builder->get()->getResult();
    }

    // fungsi create data
    public function createData($data){
        // $simpan = $this->table('jawaban')
        //                 ->insert($data);
        // if($simpan){
        //     return redirect()->to(base_url());
        // }
        $q =    "insert into jawaban (id, pertanyaan_id, jawaban, nilai) values ". 
                "(2, '" . $data['pertanyaan_id'] . "','" . $data['jawaban'] . "','" . $data['nilai'] . "')"; 
    
            $save = $this->db->query($q);
    }
}
