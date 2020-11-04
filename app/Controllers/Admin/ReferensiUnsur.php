<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ReferensiUnsurModel;

class ReferensiUnsur extends BaseController
{
    public function __construct()
    {
        $this->referensiModel = new ReferensiUnsurModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Referensi | Survei Batam',
            'referensi' => $this->referensiModel->getReferensi(),
            'validation' => \Config\Services::validation()
        ];

        return view('admin/referensi_unsur', $data);
    }

    public function create()
    {
        if (!$this->validate(
            ['nama' => 'required|is_unique[ref-unsur.nama]']
        )) {
            return redirect()->to('/admin/website')->withInput();
        }
        $this->referensiModel->save([
            'nama' => $this->request->getVar('nama')
        ]);
        session()->setFlashdata('pesan', 'Nama Unsur berhasil ditambahkan');
        return redirect()->to('/admin/referensi-unsur');
    }

    public function update($id)
    {
        if (!isset($_POST['update'])) {
            $data = [
                'title' => 'Daftar Referensi Unsur | Survei Batam',
                'ref' => $this->referensiModel->getReferensi($id),
                'validation' => \Config\Services::validation()
            ];
            return view('admin/referensi_unsurUpdate', $data);
        } else {
            if (!$this->validate([
                'nama' => "required|is_unique[ref-unsur.nama,id,{$this->request->getVar('id_referensi')}]"
            ])) {
                return redirect()->to('/admin/referensi/update' . $id)->withInput();
            }

            $this->referensiModel->save([
                'id' => $this->request->getVar('id_referensi'),
                'nama' => $this->request->getVar('nama')
            ]);

            session()->setFlashdata('pesan', 'Referensi Unsur berhasil Diubah');
            return redirect()->to('/admin/referensi-unsur');
        }
    }

    public function delete($id)
    {
        $this->referensiModel->delete($id);
        session()->setFlashdata('pesan', 'Referensi Unsur berhasil dihapus!');
        return redirect()->to('/admin/referensi-unsur');
    }

    //--------------------------------------------------------------------

}