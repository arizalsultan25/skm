<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\JawabanModel;
use App\Models\ReferensiUnsurModel;

class Jawaban extends BaseController
{
    public function __construct()
    {
        $this->jawabanModel = new JawabanModel();
        $this->RefUnsurModel = new ReferensiUnsurModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Jawaban | Survei Batam',
            'jawaban' => $this->jawabanModel->getJawaban(),
            'refUnsur' => $this->RefUnsurModel->getReferensi(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/jawaban', $data);
    }

    public function create()
    {
        if (!$this->validate(
            [
                'ref_id' => 'required',
                'jawaban' => 'required',
                'bobot' => 'required',
            ]
        )) {
            return redirect()->to('/admin/jawaban')->withInput();
        }
        $this->jawabanModel->save([
            'ref_id' => $this->request->getVar('ref_id'),
            'jawaban' => $this->request->getVar('jawaban'),
            'bobot' => $this->request->getVar('bobot')
        ]);
        session()->setFlashdata('pesan', 'Jawaban berhasil ditambahkan');
        return redirect()->to('/admin/jawaban');
    }

    public function update($id)
    {
        if (!isset($_POST['update'])) {
            $data = [
                'title' => 'Daftar Jawaban | Survei Batam',
                'jawaban' => $this->jawabanModel->getJawaban($id),
                'refUnsur' => $this->RefUnsurModel->getReferensi(),
                'validation' => \Config\Services::validation()
            ];
            return view('admin/jawabanUpdate', $data);
        } else {
            if (!$this->validate([
                'ref_id' => 'required',
                'jawaban' => 'required',
                'bobot' => 'required'
            ])) {
                return redirect()->to('/admin/jawaban/update/' . $id)->withInput();
            }

            $this->jawabanModel->save([
                'id' => $this->request->getVar('id'),
                'ref_id' => $this->request->getVar('ref_id'),
                'jawaban' => $this->request->getVar('jawaban'),
                'bobot' => $this->request->getVar('bobot')
            ]);

            session()->setFlashdata('pesan', 'Jawaban berhasil Diubah');
            return redirect()->to('/admin/jawaban');
        }
    }

    public function delete($id)
    {
        $this->jawabanModel->delete($id);
        session()->setFlashdata('pesan', 'Jawaban berhasil dihapus!');
        return redirect()->to('/admin/jawaban');
    }


    //--------------------------------------------------------------------

}
