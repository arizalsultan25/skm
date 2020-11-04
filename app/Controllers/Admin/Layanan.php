<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LayananModel;
use App\Models\UnitLayananModel;

class Layanan extends BaseController
{
    public function __construct()
    {
        $this->layananModel = new LayananModel();
        $this->unitLayanan = new UnitLayananModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Layanan | Survei Batam',
            'units' => $this->unitLayanan->getUnitLayanan(),
            'layanan' => $this->layananModel->getAllLayanan(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/layanan', $data);
    }

    public function create()
    {
        if (!$this->validate(
            ['nama' => 'required|is_unique[layanan.nama]']
        )) {
            return redirect()->to('/admin/layanan')->withInput();
        }
        $this->layananModel->save([
            'nama' => $this->request->getVar('nama'),
            'unit_id' => $this->request->getVar('unit_id')
        ]);
        session()->setFlashdata('pesan', 'Layanan berhasil ditambahkan');
        return redirect()->to('/admin/layanan');
    }

    public function update($id)
    {
        if (!isset($_POST['update'])) {
            $data = [
                'title' => 'Daftar Layanan | Survei Batam',
                'units' => $this->unitLayanan->getUnitLayanan(),
                'layananAll' => $this->layananModel->getAllLayanan(),
                'layanan' => $this->layananModel->getIdLayanan($id),
                'validation' => \Config\Services::validation()
            ];
            return view('admin/layananUpdate', $data);
        } else {
            if (!$this->validate([
                'nama' => "required|is_unique[layanan.nama,id,{$this->request->getVar('id_layanan')}]",
                'unit_id' => "required"
            ])) {
                return redirect()->to('/admin/layanan/update' . $id)->withInput();
            }

            $this->layananModel->save([
                'id' => $this->request->getVar('id_layanan'),
                'nama' => $this->request->getVar('nama'),
                'unit_id' => $this->request->getVar('unit_id'),
            ]);

            session()->setFlashdata('pesan', 'Layanan berhasil Diubah');
            return redirect()->to('/admin/layanan');
        }
    }

    public function delete($id)
    {
        $this->layananModel->delete($id);
        session()->setFlashdata('pesan', 'Layanan berhasil dihapus!');
        return redirect()->to('/admin/layanan');
    }

    //--------------------------------------------------------------------

}
