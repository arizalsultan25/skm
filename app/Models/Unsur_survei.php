<?php

namespace App\Models;
use CodeIgniter\Model;

class Unsur_survei extends Model{
    protected $table = "Unsur_survei";

    // fungsi ambil seluruh data / data spesifik dengan id tertentu
    public function getAllData($id = false){
        if($id === false){
            return $this->table('unsur_survei')
                        ->get()
                        ->getResultArray();
        } else {
            return $this->table('unsur_survei')
                        ->where('id_unsur', $id)
                        ->get()
                        ->getRowArray();
        }
    }

    // fungsi delete data
    public function deleteById($id){
        return $this->table('unsur_survei')
                    ->where('id_unsur', $id)
                    ->delete();
    }

    // fungsi create data
    public function createData($data){
        $simpan = $this->table('unsur_survei')
                        ->insert($data);
        if($simpan){
            return redirect()->to(base_url());
        }
    }

    // fungsi update
    public function updateWhereID($data, $id){
        return $this->table('unsur_survei')
                    ->update($data, ['id_unsur' => $id]);
    }
}