<?php

namespace App\Models;
use CodeIgniter\Model;

class Ref_unsur extends Model{
    protected $table = "Ref_unsur";

    // fungsi ambil seluruh data / data spesifik dengan id tertentu
    public function getAllData($id = false){
        if($id === false){
            return $this->table('ref_unsur')
                        ->get()
                        ->getResultArray();
        } else {
            return $this->table('ref_unsur')
                        ->where('id_ref_unsur', $id)
                        ->get()
                        ->getRowArray();
        }
    }

    // fungsi delete data
    public function deleteById($id){
        return $this->table('ref_unsur')
                    ->where('id_ref_unsur', $id)
                    ->delete();
    }

    // fungsi create data
    public function createData($data){
        $simpan = $this->table('ref_unsur')
                        ->insert($data);
        if($simpan){
            return redirect()->to(base_url());
        }
    }

    // fungsi update
    public function updateWhereID($data, $id){
        return $this->table('ref_unsur')
                    ->update($data, ['id_ref_unsur' => $id]);
    }
}