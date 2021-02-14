<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SurveiunsurModel;
use App\Models\ReferensiunsurModel;
use App\Models\SurveiModel;

class Surveiunsur extends BaseController
{
    public function __construct()
    {
        $this->SurveiunsurModel = new SurveiunsurModel();
        $this->ReferensiunsurModel = new ReferensiunsurModel();
        $this->SurveiModel = new SurveiModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Unsur Survei | Survei Batam',
            'surveiunsur' => $this->SurveiunsurModel->get(),
            'referensiunsur' => $this->ReferensiunsurModel->getReferensiunsur(),
            'survei' => $this->SurveiModel->getSurvei(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/surveiunsur', $data);
    }

    public function create()
    {
        if (!$this->validate(
            [
                'referensiunsur_id' => 'required',
                'survei_id' => 'required',
            ]
        )) {
            return redirect()->to('/admin/surveiunsur')->withInput();
        }
        $this->SurveiunsurModel->save([
            'referensiunsur_id' => $this->request->getVar('referensiunsur_id'),
            'survei_id' => $this->request->getVar('survei_id')
        ]);
        session()->setFlashdata('pesan', 'Unsur Survei berhasil ditambahkan');
        return redirect()->to('/admin/surveiunsur');
    }

    public function update($id)
    {
        if (!isset($_POST['update'])) {
            $data = [
                'title' => 'Daftar Unsur Survei | Survei Batam',
                'surveiunsur' => $this->SurveiunsurModel->get($id),
                'referensiunsur' => $this->ReferensiunsurModel->getReferensiunsur(),
                'survei' => $this->SurveiModel->getSurvei(),
                'validation' => \Config\Services::validation()
            ];
            return view('admin/surveiunsurUpdate', $data);
        } else {
            if (!$this->validate([
                'referensiunsur_id' => 'required',
                'survei_id' => 'required',
            ])) {
                return redirect()->to('/admin/surveiunsur/update/' . $id)->withInput();
            }

            $this->SurveiunsurModel->save([
                'id' => $this->request->getVar('id'),
                'referensiunsur_id' => $this->request->getVar('referensiunsur_id'),
                'survei_id' => $this->request->getVar('survei_id')
            ]);

            session()->setFlashdata('pesan', 'Unsur Survei berhasil Diubah');
            return redirect()->to('/admin/surveiunsur');
        }
    }

    public function delete($id)
    {
        $this->SurveiunsurModel->delete($id);
        session()->setFlashdata('pesan', 'Unsur Survei berhasil dihapus!');
        return redirect()->to('/admin/surveiunsur');
    }


    //--------------------------------------------------------------------

}
