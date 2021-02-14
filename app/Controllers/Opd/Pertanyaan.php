<?php

namespace App\Controllers\Opd;

use App\Controllers\BaseController;
use App\Models\PertanyaanModel;
use App\Models\ReferensiunsurModel;

class Pertanyaan extends BaseController
{
    public function __construct()
    {
        $this->PertanyaanModel = new PertanyaanModel();
        $this->ReferensiunsurModel = new ReferensiunsurModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Pertanyaan | Survei Batam',
            'pertanyaan' => $this->PertanyaanModel->get(),
            'referensiunsur' => $this->ReferensiunsurModel->getReferensiunsur(),
            'validation' => \Config\Services::validation()
        ];
        return view('opd/pertanyaan', $data);
    }

    public function create()
    {
        if (!$this->validate(
            [
                'referensiunsur_id' => 'required',
                'pertanyaan' => 'required',
            ]
        )) {
            return redirect()->to('/opd/pertanyaan')->withInput();
        }
        $this->PertanyaanModel->save([
            'referensiunsur_id' => $this->request->getVar('referensiunsur_id'),
            'pertanyaan' => $this->request->getVar('pertanyaan')
        ]);
        session()->setFlashdata('pesan', 'Pertanyaan berhasil ditambahkan');
        return redirect()->to('/opd/pertanyaan');
    }

    public function update($id)
    {
        if (!isset($_POST['update'])) {
            $data = [
                'title' => 'Daftar Pertanyaan | Survei Batam',
                'pertanyaan' => $this->PertanyaanModel->get($id),
                'referensiunsur' => $this->ReferensiunsurModel->getReferensiunsur(),
                'validation' => \Config\Services::validation()
            ];
            return view('opd/pertanyaanUpdate', $data);
        } else {
            if (!$this->validate([
                'referensiunsur_id' => 'required',
                'pertanyaan' => 'required',
            ])) {
                return redirect()->to('/opd/pertanyaan/update/' . $id)->withInput();
            }

            $this->PertanyaanModel->save([
                'id' => $this->request->getVar('id'),
                'referensiunsur_id' => $this->request->getVar('referensiunsur_id'),
                'pertanyaan' => $this->request->getVar('pertanyaan')
            ]);

            session()->setFlashdata('pesan', 'Pertanyaan berhasil Diubah');
            return redirect()->to('/opd/pertanyaan');
        }
    }

    public function delete($id)
    {
        $this->PertanyaanModel->delete($id);
        session()->setFlashdata('pesan', 'Pertanyaan berhasil dihapus!');
        return redirect()->to('/opd/pertanyaan');
    }

    //--------------------------------------------------------------------

}
