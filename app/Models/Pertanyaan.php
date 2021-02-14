<?php

namespace App\Models;
use CodeIgniter\Model;

class Pertanyaan extends Model{
    protected $table = "pertanyaan";


    // fungsi ambil seluruh data / data spesifik dengan id tertentu
    public function getAllData($id = false){
        if($id === false){
            return $this->table('pertanyaan')
                        ->get()
                        ->getResultArray();
        } else {
            return $this->table('pertanyaan')
                        ->where('pertanyaan_id', $id)
                        ->get()
                        ->getRowArray();
        }
    }

    // fungsi delete data
    public function deleteById($id){
        return $this->table('pertanyaan')
                    ->where('pertanyaan', $id)
                    ->delete();
    }

    // fungsi create data
    public function createData($data){
        $simpan = $this->table('pertanyaan')
                        ->insert($data);
        if($simpan){
            return redirect()->to(base_url());
        }
    }

    // fungsi update
    public function updateWhereID($data, $id){
        return $this->table('pertanyaan')
                    ->update($data, ['pertanyaan_id' => $id]);
    }

    // Get by Id Survei
    public function getPertanyaanBySurvei($id)
    {
        return $this->table('pertanyaan')
        ->where('id_survei', $id)
        ->get()
        ->getResult();
    }
}