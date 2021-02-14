<?php

namespace App\Models;
use CodeIgniter\Model;

class Surveiunsur extends Model{
    protected $table = "surveiunsur";

    // fungsi ambil seluruh data / data spesifik dengan id tertentu
    public function getAllData($id = false){
        if($id === false){
            return $this->table('surveiunsur')
                        ->get()
                        ->getResultArray();
        } else {
            return $this->table('surveiunsur')
                        ->where('surveiunsur_id', $id)
                        ->get()
                        ->getRowArray();
        }
    }

    // fungsi delete data
    public function deleteById($id){
        return $this->table('surveiunsur')
                    ->where('surveiunsur_id', $id)
                    ->delete();
    }

    // fungsi create data
    public function createData($data){
        $simpan = $this->table('surveiunsur')
                        ->insert($data);
        if($simpan){
            return redirect()->to(base_url());
        }
    }

    // fungsi update
    public function updateWhereID($data, $id){
        return $this->table('surveiunsur')
                    ->update($data, ['surveiunsur_id' => $id]);
    }
}