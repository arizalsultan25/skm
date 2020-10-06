<?php

namespace App\Models;
use CodeIgniter\Model;

class OPD extends Model{
    protected $table = "OPD";

    // fungsi ambil seluruh data / data spesifik dengan id tertentu
    public function getAllData($id = false){
        if($id === false){
            return $this->table('opd')
                        ->get()
                        ->getResultArray();
        } else {
            return $this->table('opd')
                        ->where('id_opd', $id)
                        ->get()
                        ->getRowArray();
        }
    }

    // fungsi delete data
    public function deleteById($id){
        return $this->table('opd')
                    ->where('id_opd', $id)
                    ->delete();
    }

    // fungsi create data
    public function createData($data){
        $simpan = $this->table('opd')
                        ->insert($data);
        if($simpan){
            return redirect()->to(base_url());
        }
    }

    // fungsi update
    public function updateWhereID($data, $id){
        return $this->table('opd')
                    ->update($data, ['id_opd' => $id]);
    }
}