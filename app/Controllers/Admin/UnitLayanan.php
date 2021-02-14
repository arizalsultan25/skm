<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UnitlayananModel;

class Unitlayanan extends BaseController
{
    public function __construct()
    {
        $this->UnitlayananModel = new UnitlayananModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Unit Layanan | Survei Batam',
            'unitlayanan' => $this->UnitlayananModel->getUnitlayanan(),
            'validation' => \Config\Services::validation()
        ];

        return view('admin/unitlayanan', $data);
    }

    public function create()
    {
        if (!$this->validate(
            ['nama' => 'required|is_unique[unitlayanan.nama]']
        )) {
            return redirect()->to('/admin/unitlayanan')->withInput();
        }
        $this->UnitlayananModel->save([
            'nama' => $this->request->getVar('nama')
        ]);
        session()->setFlashdata('pesan', 'Nama berhasil ditambahkan');
        return redirect()->to('/admin/unitlayanan');
    }

    public function update($id)
    {
        if (!isset($_POST['update'])) {
            $data = [
                'title' => 'Daftar Unit Layanan | Survei Batam',
                'unitlayanan' => $this->UnitlayananModel->getUnitlayanan(),
                'unitlayananId' => $this->UnitlayananModel->getUnitlayanan($id),
                'validation' => \Config\Services::validation()
            ];
            return view('admin/unitlayananUpdate', $data);
        } else {
            if (!$this->validate([
                'nama' => "required|is_unique[.nama,id,{$this->request->getVar('unitlayanan_id')}]"
            ])) {
                return redirect()->to('/admin/unitlayanan/update' . $id)->withInput();
            }

            $this->UnitlayananModel->save([
                'id' => $this->request->getVar('unitlayanan_id'),
                'nama' => $this->request->getVar('nama')
            ]);

            session()->setFlashdata('pesan', 'Unit Layanan berhasil Diubah');
            return redirect()->to('/admin/unitlayanan');
        }
    }

    public function delete($id)
    {
        $this->UnitlayananModel->delete($id);
        session()->setFlashdata('pesan', 'Unit Layanan berhasil dihapus!');
        return redirect()->to('/admin/unitlayanan');
    }

    //--------------------------------------------------------------------

}
