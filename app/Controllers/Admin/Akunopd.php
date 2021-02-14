<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AkunopdModel;
use App\Models\UnitlayananModel;

class Akunopd extends BaseController
{
    public function __construct()
    {
        $this->AkunopdModel = new AkunopdModel();
        $this->UnitlayananModel = new UnitlayananModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Akun OPD | Survei Batam',
            'unitlayanan' => $this->UnitlayananModel->getUnitlayanan(),
            'akunopd' => $this->AkunopdModel->getAllAkunopd(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/akunopd', $data);
    }

    public function create()
    {

        $session = \Config\Services::session();
        
        // validasi
        if (!$this->validate(
            ['unit_id' => 'required|is_unique[akunopd.unitlayanan_id]']
        )) {
            session()->setFlashdata('pesan', 'Data Akun OPD telah ada');
            return redirect()->to('/admin/akunopd')->withInput();
        }

        $kode = $this->generateRandomString();

        // insert into database
        $this->AkunopdModel->save([
            // 'kode' => $this->request->getVar('kode'),
            'kode' => 'jkh12guys917' ,
            'unitlayanan_id' => $this->request->getVar('unit_id')
        ]);
        session()->setFlashdata('pesan', 'Akun OPD berhasil ditambahkan');
        return redirect()->to('/admin/akunopd');

        
    }

    public function update($id)
    {
        if (!isset($_POST['update'])) {
            $data = [
                'title' => 'Daftar Akun OPD | Survei Batam',
                'unitlayanan' => $this->UnitlayananModel->getUnitlayanan(),
                'akunopdAll' => $this->AkunopdModel->getAllAkunopd(),
                'akunopdId' => $this->AkunopdModel->getIdAkunopd($id),
                'validation' => \Config\Services::validation()
            ];
            return view('admin/akunopdUpdate', $data);
        } else {
            if (!$this->validate([
                'kode' => "required|is_unique[akunopd.kode,id,{$this->request->getVar('akunopd_id')}]",
                'unit_id' => "required"
            ])) {
                return redirect()->to('/admin/akunopd/update' . $id)->withInput();
            }

            $this->AkunopdModel->save([
                'id' => $this->request->getVar('akunopd_id'),
                'kode' => $this->request->getVar('kode'),
                'unitlayanan_id' => $this->request->getVar('unitlayanan_id'),
            ]);

            session()->setFlashdata('pesan', 'Akun OPD berhasil Diubah');
            return redirect()->to('/admin/akunopd');
        }
    }

    public function delete($id)
    {
        $this->AkunopdModel->delete($id);
        session()->setFlashdata('pesan', 'Akun OPD berhasil dihapus!');
        return redirect()->to('/admin/akunopd');
    }

    //--------------------------------------------------------------------

    // Random String
    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
