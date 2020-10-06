<?php

namespace App\Models;
use CodeIgniter\Model;

class Layanan extends Model{
    protected $table = "Layanan";

    // fungsi ambil seluruh data / data spesifik dengan id tertentu
    public function getAllData($id = false){
        if($id === false){
            return $this->table('layanan')
                        ->get()
                        ->getResultArray();
        } else {
            return $this->table('layanan')
                        ->where('id_layanan', $id)
                        ->get()
                        ->getRowArray();
        }
    }

    // fungsi delete data
    public function deleteById($id){
        return $this->table('layanan')
                    ->where('id_layanan', $id)
                    ->delete();
    }

    // fungsi create data
    public function createData($data){
        $simpan = $this->table('layanan')
                        ->insert($data);
        if($simpan){
            return redirect()->to(base_url());
        }
    }

    // fungsi update
    public function updateWhereID($data, $id){
        return $this->table('layanan')
                    ->update($data, ['id_layanan' => $id]);
    }
}