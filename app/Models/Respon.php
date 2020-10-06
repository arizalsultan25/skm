<?php

namespace App\Models;
use CodeIgniter\Model;

class Respon extends Model{
    protected $table = "Respon";

    // fungsi ambil seluruh data / data spesifik dengan id tertentu
    public function getAllData($id = false){
        if($id === false){
            return $this->table('respon')
                        ->get()
                        ->getResultArray();
        } else {
            return $this->table('respon')
                        ->where('id_respon', $id)
                        ->get()
                        ->getRowArray();
        }
    }

    // fungsi delete data
    public function deleteById($id){
        return $this->table('respon')
                    ->where('id_respon', $id)
                    ->delete();
    }

    // fungsi create data
    public function createData($data){
        $simpan = $this->table('respon')
                        ->insert($data);
        if($simpan){
            return redirect()->to(base_url());
        }
    }

    // fungsi update
    public function updateWhereID($data, $id){
        return $this->table('respon')
                    ->update($data, ['id_respon' => $id]);
    }
}