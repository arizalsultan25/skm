<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SurveiUnsurModel;
use App\Models\ReferensiUnsurModel;
use App\Models\SurveiModel;

class SurveiUnsur extends BaseController
{
    public function __construct()
    {
        $this->surveiUnsur = new SurveiUnsurModel();
        $this->refUnsurModel = new ReferensiUnsurModel();
        $this->SurveiModel = new SurveiModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Unsur Survei | Survei Batam',
            'sUnsur' => $this->surveiUnsur->get(),
            'refUnsur' => $this->refUnsurModel->getReferensi(),
            'survei' => $this->SurveiModel->getSurvei(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/survei_unsur', $data);
    }

    public function create()
    {
        if (!$this->validate(
            [
                'ref_id' => 'required',
                'survei_id' => 'required',
            ]
        )) {
            return redirect()->to('/admin/survei_unsur')->withInput();
        }
        $this->surveiUnsur->save([
            'ref_id' => $this->request->getVar('ref_id'),
            'survei_id' => $this->request->getVar('survei_id')
        ]);
        session()->setFlashdata('pesan', 'Unsur Survei berhasil ditambahkan');
        return redirect()->to('/admin/survei_unsur');
    }

    public function update($id)
    {
        if (!isset($_POST['update'])) {
            $data = [
                'title' => 'Daftar Unsur Survei | Survei Batam',
                'sUnsur' => $this->surveiUnsur->get($id),
                'refUnsur' => $this->refUnsurModel->getReferensi(),
                'survei' => $this->SurveiModel->getSurvei(),
                'validation' => \Config\Services::validation()
            ];
            return view('admin/survei_unsurUpdate', $data);
        } else {
            if (!$this->validate([
                'ref_id' => 'required',
                'survei_id' => 'required',
            ])) {
                return redirect()->to('/admin/survei_unsur/update/' . $id)->withInput();
            }

            $this->surveiUnsur->save([
                'id' => $this->request->getVar('id'),
                'ref_id' => $this->request->getVar('ref_id'),
                'survei_id' => $this->request->getVar('survei_id')
            ]);

            session()->setFlashdata('pesan', 'Unsur Survei berhasil Diubah');
            return redirect()->to('/admin/survei_unsur');
        }
    }

    public function delete($id)
    {
        $this->surveiUnsur->delete($id);
        session()->setFlashdata('pesan', 'Unsur Survei berhasil dihapus!');
        return redirect()->to('/admin/survei_unsur');
    }


    //--------------------------------------------------------------------

}
