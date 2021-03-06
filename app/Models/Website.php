<?php

namespace App\Models;
use CodeIgniter\Model;

class Website extends Model{
    protected $table = "website";

    // fungsi ambil seluruh data / data spesifik dengan id tertentu
    public function getAllData($id = false){
        if($id === false){
            return $this->table('website')
                        ->get()
                        ->getResultArray();
        } else {
            return $this->table('website')
                        ->where('website_id', $id)
                        ->get()
                        ->getRowArray();
        }
    }

    // fungsi delete data
    public function deleteById($id){
        return $this->table('website')
                    ->where('website_id', $id)
                    ->delete();
    }

    // fungsi create data
    public function createData($data){
        $simpan = $this->table('website')
                        ->insert($data);
        if($simpan){
            return redirect()->to(base_url());
        }
    }

    // fungsi update
    public function updateWhereID($data, $id){
        return $this->table('website')
                    ->update($data, ['website_id' => $id]);
    }
}