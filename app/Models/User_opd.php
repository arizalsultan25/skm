<?php

namespace App\Models;
use CodeIgniter\Model;

class User_opd extends Model{
    protected $table = "User_opd";

    // fungsi ambil seluruh data / data spesifik dengan id tertentu
    public function getAllData($id = false){
        if($id === false){
            return $this->table('user_opd')
                        ->get()
                        ->getResultArray();
        } else {
            return $this->table('user_opd')
                        ->where('id_user_opd', $id)
                        ->get()
                        ->getRowArray();
        }
    }

    // fungsi delete data
    public function deleteById($id){
        return $this->table('user_opd')
                    ->where('id_user_opd', $id)
                    ->delete();
    }

    // fungsi create data
    public function createData($data){
        $simpan = $this->table('user_opd')
                        ->insert($data);
        if($simpan){
            return redirect()->to(base_url());
        }
    }

    // fungsi update
    public function updateWhereID($data, $id){
        return $this->table('user_opd')
                    ->update($data, ['id_user_opd' => $id]);
    }
}