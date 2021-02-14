<?php

namespace App\Models;
use CodeIgniter\Model;

class Akunopd extends Model{
    protected $table = "akunopd";

    // fungsi ambil seluruh data / data spesifik dengan id tertentu
    public function getAllData($id = false){
        if($id === false){
            return $this->table('akunopd')
                        ->get()
                        ->getResultArray();
        } else {
            return $this->table('akunopd')
                        ->where('akunopd_id', $id)
                        ->get()
                        ->getRowArray();
        }
    }

    // fungsi delete data
    public function deleteById($id){
        return $this->table('akunopd')
                    ->where('akunopd_id', $id)
                    ->delete();
    }

    // fungsi create data
    public function createData($data){
        $simpan = $this->table('akunopd')
                        ->insert($data);
        if($simpan){
            return redirect()->to(base_url());
        }
    }

    // fungsi update
    public function updateWhereID($data, $id){
        return $this->table('akunopd')
                    ->update($data, ['akunopd_id' => $id]);
    }
}