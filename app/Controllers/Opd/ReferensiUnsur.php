<?php

namespace App\Controllers\Opd;

use App\Controllers\BaseController;
use App\Models\ReferensiunsurModel;

class Referensiunsur extends BaseController
{
    public function __construct()
    {
        $this->ReferensiunsurModel = new ReferensiunsurModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Referensi | Survei Batam',
            'referensi' => $this->ReferensiunsurModel->getReferensiunsur(),
            'validation' => \Config\Services::validation()
        ];

        return view('opd/referensiunsur', $data);
    }

    public function create()
    {
        if (!$this->validate(
            ['nama' => 'required|is_unique[referensiunsur.nama]']
        )) {
            return redirect()->to('/opd/website')->withInput();
        }
        $this->ReferensiunsurModel->save([
            'nama' => $this->request->getVar('nama')
        ]);
        session()->setFlashdata('pesan', 'Nama Unsur berhasil ditambahkan');
        return redirect()->to('/opd/referensiunsur');
    }

    public function update($id)
    {
        if (!isset($_POST['update'])) {
            $data = [
                'title' => 'Daftar Referensi Unsur | Survei Batam',
                'referensiunsur' => $this->referensiModel->getReferensiunsur($id),
                'validation' => \Config\Services::validation()
            ];
            return view('opd/referensiunsurUpdate', $data);
        } else {
            if (!$this->validate([
                'nama' => "required|is_unique[referensiunsur.nama,id,{$this->request->getVar('referensiunsur_id')}]"
            ])) {
                return redirect()->to('/opd/referensiunsur/update' . $id)->withInput();
            }

            $this->ReferensiunsurModel->save([
                'id' => $this->request->getVar('referensiunsur_id'),
                'nama' => $this->request->getVar('nama')
            ]);

            session()->setFlashdata('pesan', 'Referensi Unsur berhasil Diubah');
            return redirect()->to('/opd/referensiunsur');
        }
    }

    public function delete($id)
    {
        $this->ReferensiunsurModel->delete($id);
        session()->setFlashdata('pesan', 'Referensi Unsur berhasil dihapus!');
        return redirect()->to('/opd/referensiunsur');
    }

    //--------------------------------------------------------------------

}
