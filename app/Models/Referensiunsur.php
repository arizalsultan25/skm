<?php

namespace App\Models;
use CodeIgniter\Model;

class Referensiunsur extends Model{
    protected $table = "referensiunsur";

    // fungsi ambil seluruh data / data spesifik dengan id tertentu
    public function getAllData($id = false){
        if($id === false){
            return $this->table('referensiunsur')
                        ->get()
                        ->getResultArray();
        } else {
            return $this->table('referensiunsur')
                        ->where('referensiunsur_id', $id)
                        ->get()
                        ->getRowArray();
        }
    }

    // fungsi delete data
    public function deleteById($id){
        return $this->table('referensiunsur')
                    ->where('referensiunsur_id', $id)
                    ->delete();
    }

    // fungsi create data
    public function createData($data){
        $simpan = $this->table('referensiunsur')
                        ->insert($data);
        if($simpan){
            return redirect()->to(base_url());
        }
    }

    // fungsi update
    public function updateWhereID($data, $id){
        return $this->table('referensiunsur')
                    ->update($data, ['referensiunsur_id' => $id]);
    }
}