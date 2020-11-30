<?php

namespace App\Controllers\Opd;

use App\Controllers\BaseController;
use App\Models\PertanyaanModel;
use App\Models\ReferensiUnsurModel;

class Pertanyaan extends BaseController
{
    public function __construct()
    {
        $this->pertanyaanModel = new PertanyaanModel();
        $this->RefUnsurModel = new ReferensiUnsurModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Pertanyaan | Survei Batam',
            'pertanyaan' => $this->pertanyaanModel->get(),
            'refUnsur' => $this->RefUnsurModel->getReferensi(),
            'validation' => \Config\Services::validation()
        ];
        return view('Opd/pertanyaan', $data);
    }

    public function create()
    {
        if (!$this->validate(
            [
                'ref_id' => 'required',
                'pertanyaan' => 'required',
            ]
        )) {
            return redirect()->to('/Opd/pertanyaan')->withInput();
        }
        $this->pertanyaanModel->save([
            'ref_id' => $this->request->getVar('ref_id'),
            'pertanyaan' => $this->request->getVar('pertanyaan')
        ]);
        session()->setFlashdata('pesan', 'Pertanyaan berhasil ditambahkan');
        return redirect()->to('/Opd/pertanyaan');
    }

    public function update($id)
    {
        if (!isset($_POST['update'])) {
            $data = [
                'title' => 'Daftar Pertanyaan | Survei Batam',
                'pertanyaan' => $this->pertanyaanModel->get($id),
                'refUnsur' => $this->RefUnsurModel->getReferensi(),
                'validation' => \Config\Services::validation()
            ];
            return view('Opd/pertanyaanUpdate', $data);
        } else {
            if (!$this->validate([
                'ref_id' => 'required',
                'pertanyaan' => 'required',
            ])) {
                return redirect()->to('/Opd/pertanyaan/update/' . $id)->withInput();
            }

            $this->pertanyaanModel->save([
                'id' => $this->request->getVar('id'),
                'ref_id' => $this->request->getVar('ref_id'),
                'pertanyaan' => $this->request->getVar('pertanyaan')
            ]);

            session()->setFlashdata('pesan', 'Pertanyaan berhasil Diubah');
            return redirect()->to('/Opd/pertanyaan');
        }
    }

    public function delete($id)
    {
        $this->pertanyaanModel->delete($id);
        session()->setFlashdata('pesan', 'Pertanyaan berhasil dihapus!');
        return redirect()->to('/Opd/pertanyaan');
    }

    //--------------------------------------------------------------------

}
