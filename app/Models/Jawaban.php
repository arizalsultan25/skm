<?php

namespace App\Models;
use CodeIgniter\Model;

class Jawaban extends Model{
    protected $table = "jawaban";

    // fungsi ambil seluruh data / data spesifik dengan id tertentu
    public function getAllData($id = false){
        if($id === false){
            return $this->table('jawaban')
                        ->get()
                        ->getResultArray();
        } else {
            return $this->table('jawaban')
                        ->where('jawaban_id', $id)
                        ->get()
                        ->getRowArray();
        }
    }

    // fungsi delete data
    public function deleteById($id){
        return $this->table('jawaban')
                    ->where('jawaban_id', $id)
                    ->delete();
    }

    // fungsi create data
    public function createData($data){
        $simpan = $this->table('jawaban')
                        ->insert($data);
        if($simpan){
            return redirect()->to(base_url());
        }
    }

    // fungsi update
    public function updateWhereID($data, $id){
        return $this->table('jawaban')
                    ->update($data, ['jawaban_id' => $id]);
    }

    // Filter data dari ID Pertanyaan
    public function getJawabanByPertanyaan($id)
    {
        return $this->table('jawaban')
        ->where('pertanyaan_id', $id)
        ->get()
        ->getResult();
    }
}