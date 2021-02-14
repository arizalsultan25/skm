<?php

namespace App\Models;
use CodeIgniter\Model;

class Survei extends Model{
    protected $table = "survei";

    // fungsi ambil seluruh data / data spesifik dengan id tertentu
    public function getAllData($id = false){
        if($id === false){
            return $this->table('survei')
                        ->get()
                        ->getResultArray();
        } else {
            return $this->table('survei')
                        ->where('survei_id', $id)
                        ->get()
                        ->getRowArray();
        }
    }

    // fungsi delete data
    public function deleteById($id){
        return $this->table('survei')
                    ->where('survei_id', $id)
                    ->delete();
    }

    // fungsi create data
    public function createData($data){
        $simpan = $this->table('survei')
                        ->insert($data);
        if($simpan){
            return redirect()->to(base_url());
        }
    }

    // fungsi update
    public function updateWhereID($data, $id){
        return $this->table('survei')
                    ->update($data, ['survei_id' => $id]);
    }
}