<?php

namespace App\Models;
use CodeIgniter\Model;

class Jawab extends Model{
    protected $table = "Jawab";

    // fungsi ambil seluruh data / data spesifik dengan id tertentu
    public function getAllData($id = false){
        if($id === false){
            return $this->table('jawab')
                        ->get()
                        ->getResultArray();
        } else {
            return $this->table('jawab')
                        ->where('id_jawab', $id)
                        ->get()
                        ->getRowArray();
        }
    }

    // fungsi delete data
    public function deleteById($id){
        return $this->table('jawab')
                    ->where('id_jawab', $id)
                    ->delete();
    }

    // fungsi create data
    public function createData($data){
        $simpan = $this->table('jawab')
                        ->insert($data);
        if($simpan){
            return redirect()->to(base_url());
        }
    }

    // fungsi update
    public function updateWhereID($data, $id){
        return $this->table('jawab')
                    ->update($data, ['id_jawab' => $id]);
    }
}