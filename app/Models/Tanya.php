<?php

namespace App\Models;
use CodeIgniter\Model;

class Tanya extends Model{
    protected $table = "Tanya";

    // fungsi ambil seluruh data / data spesifik dengan id tertentu
    public function getAllData($id = false){
        if($id === false){
            return $this->table('tanya')
                        ->get()
                        ->getResultArray();
        } else {
            return $this->table('tanya')
                        ->where('id_tanya', $id)
                        ->get()
                        ->getRowArray();
        }
    }

    // fungsi delete data
    public function deleteById($id){
        return $this->table('tanya')
                    ->where('id_tanya', $id)
                    ->delete();
    }

    // fungsi create data
    public function createData($data){
        $simpan = $this->table('tanya')
                        ->insert($data);
        if($simpan){
            return redirect()->to(base_url());
        }
    }

    // fungsi update
    public function updateWhereID($data, $id){
        return $this->table('tanya')
                    ->update($data, ['id_tanya' => $id]);
    }
}