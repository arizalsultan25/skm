<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PertanyaanModel;
use App\Models\ReferensiunsurModel;
use App\Models\Survei;

class Pertanyaan extends BaseController
{
    public function __construct()
    {
        $this->PertanyaanModel = new PertanyaanModel();
        $this->ReferensiunsurModel = new ReferensiunsurModel();
        $this->SurveiModel = new Survei();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Pertanyaan | Survei Batam',
            'pertanyaan' => $this->PertanyaanModel->get(),
            'survei' => $this->SurveiModel->getAllData(),
            'referensiunsur' => $this->ReferensiunsurModel->getReferensiunsur(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/pertanyaan', $data);
    }

    public function create()
    {
        if (!$this->validate(
            [
                'referensiunsur_id' => 'required',
                'pertanyaan' => 'required',
            ]
        )) {
            return redirect()->to('/admin/pertanyaan')->withInput();
        }
        $this->PertanyaanModel->save([
            'referensiunsur_id' => $this->request->getVar('referensiunsur_id'),
            'pertanyaan' => $this->request->getVar('pertanyaan')
        ]);
        session()->setFlashdata('pesan', 'Pertanyaan berhasil ditambahkan');
        return redirect()->to('/admin/pertanyaan');
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
            return view('admin/pertanyaanUpdate', $data);
        } else {
            if (!$this->validate([
                'referensiunsur_id' => 'required',
                'pertanyaan' => 'required',
            ])) {
                return redirect()->to('/admin/pertanyaan/update/' . $id)->withInput();
            }

            $this->PertanyaanModel->save([
                'id' => $this->request->getVar('id'),
                'referensiunsur_id' => $this->request->getVar('referensiunsur_id'),
                'pertanyaan' => $this->request->getVar('pertanyaan')
            ]);

            session()->setFlashdata('pesan', 'Pertanyaan berhasil Diubah');
            return redirect()->to('/admin/pertanyaan');
        }
    }

    public function delete($id)
    {
        $this->PertanyaanModel->delete($id);
        session()->setFlashdata('pesan', 'Pertanyaan berhasil dihapus!');
        return redirect()->to('/admin/pertanyaan');
    }

    //--------------------------------------------------------------------

}
