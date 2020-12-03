<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UnitLayananModel;

class UnitLayanan extends BaseController
{
    public function __construct()
    {
        $this->unitLayanan = new UnitLayananModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Unit Layanan | Survei Batam',
            'units' => $this->unitLayanan->getUnitLayanan(),
            'validation' => \Config\Services::validation()
        ];

        return view('admin/unit_layanan', $data);
    }

    public function create()
    {
        if (!$this->validate(
            ['nama' => 'required|is_unique[unit-layanan.nama]']
        )) {
            return redirect()->to('/admin/unitlayanan')->withInput();
        }
        $this->unitLayanan->save([
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
                'units' => $this->unitLayanan->getUnitLayanan(),
                'unit' => $this->unitLayanan->getUnitLayanan($id),
                'validation' => \Config\Services::validation()
            ];
            return view('admin/unit_layananUpdate', $data);
        } else {
            if (!$this->validate([
                'nama' => "required|is_unique[.nama,id,{$this->request->getVar('id_unit')}]"
            ])) {
                return redirect()->to('/admin/unitlayanan/update' . $id)->withInput();
            }

            $this->unitLayanan->save([
                'id' => $this->request->getVar('id_unit'),
                'nama' => $this->request->getVar('nama')
            ]);

            session()->setFlashdata('pesan', 'Unit Layanan berhasil Diubah');
            return redirect()->to('/admin/unitlayanan');
        }
    }

    public function delete($id)
    {
        $this->unitLayanan->delete($id);
        session()->setFlashdata('pesan', 'Unit Layanan berhasil dihapus!');
        return redirect()->to('/admin/unitlayanan');
    }

    //--------------------------------------------------------------------

}
