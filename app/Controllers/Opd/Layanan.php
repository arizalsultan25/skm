<?php

namespace App\Controllers\Opd;

use App\Controllers\BaseController;
use App\Models\LayananModel;
use App\Models\UnitlayananModel;

class Layanan extends BaseController
{
    public function __construct()
    {
        $this->LayananModel = new LayananModel();
        $this->UnitlayananModel = new UnitlayananModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Layanan | Survei Batam',
            'unitlayanan' => $this->UnitlayananModel->getUnitlayanan(),
            'layanan' => $this->LayananModel->getAllLayanan(),
            'validation' => \Config\Services::validation()
        ];
        return view('opd/layanan', $data);
    }

    public function create()
    {
        if (!$this->validate(
            ['nama' => 'required|is_unique[layanan.nama]']
        )) {
            return redirect()->to('/opd/layanan')->withInput();
        }
        $this->LayananModel->save([
            'nama' => $this->request->getVar('nama'),
            'unitlayanan_id' => $this->request->getVar('unitlayanan_id')
        ]);
        session()->setFlashdata('pesan', 'Layanan berhasil ditambahkan');
        return redirect()->to('/opd/layanan');
    }

    public function update($id)
    {
        if (!isset($_POST['update'])) {
            $data = [
                'title' => 'Daftar Layanan | Survei Batam',
                'unitlayanan' => $this->UnitlayananModel->getUnitlayanan(),
                'layananAll' => $this->LayananModel->getAllLayanan(),
                'layanan' => $this->LayananModel->getIdLayanan($id),
                'validation' => \Config\Services::validation()
            ];
            return view('opd/layananUpdate', $data);
        } else {
            if (!$this->validate([
                'nama' => "required|is_unique[layanan.nama,id,{$this->request->getVar('layanan_id')}]",
                'unitlayanan_id' => "required"
            ])) {
                return redirect()->to('/opd/layanan/update' . $id)->withInput();
            }

            $this->LayananModel->save([
                'id' => $this->request->getVar('id_layanan'),
                'nama' => $this->request->getVar('nama'),
                'unitlayanan_id' => $this->request->getVar('unitlayanan_id'),
            ]);

            session()->setFlashdata('pesan', 'Layanan berhasil Diubah');
            return redirect()->to('/opd/layanan');
        }
    }

    public function delete($id)
    {
        $this->LayananModel->delete($id);
        session()->setFlashdata('pesan', 'Layanan berhasil dihapus!');
        return redirect()->to('/opd/layanan');
    }

    //--------------------------------------------------------------------

}
