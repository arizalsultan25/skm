<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SurveiModel;
use App\Models\LayananModel;

class Survei extends BaseController
{
    public function __construct()
    {
        $this->SurveiModel = new SurveiModel();
        $this->LayananModel = new LayananModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Survei | Survei Batam',
            'layanan' => $this->LayananModel->getAllLayanan(),
            'survei' => $this->SurveiModel->getSurvei(),
            'validation' => \Config\Services::validation()
        ];

        return view('admin/survei', $data);
    }

    public function create()
    {
        if (!$this->validate(
            [
                'nama' => 'required|is_unique[survei.nama]',
                'layanan_id' => 'required',
                'start' => 'required',
                'end' => 'required',
            ]
        )) {
            return redirect()->to('/admin/survei')->withInput();
        }
        $this->SurveiModel->save([
            'layanan_id' => $this->request->getVar('layanan_id'),
            'nama' => $this->request->getVar('nama'),
            'slug' => url_title($this->request->getVar('nama'), '_', TRUE),
            'opd' => 'Komunikasi',
            'start' => $this->request->getVar('start'),
            'end' => $this->request->getVar('end')
        ]);
        session()->setFlashdata('pesan', 'Survei berhasil ditambahkan');
        return redirect()->to('/admin/survei');
    }

    public function update($id)
    {
        if (!isset($_POST['update'])) {
            $data = [
                'title' => 'Update Survei | Survei Batam',
                'layananAll' => $this->layananModel->getAllLayanan(),
                'survei' => $this->surveiModel->getSurvei(),
                'surveiId' => $this->surveiModel->getIdSurvei($id),
                'validation' => \Config\Services::validation()
            ];
            return view('admin/surveiUpdate', $data);
        } else {
            if (!$this->validate(
                [
                    'nama' => "required|is_unique[survei.nama,id,{$this->request->getVar('survei_id')}]",
                    'layanan_id' => "required",
                    'start' => "required",
                    'end' => "required",
                ]
            )) {
                return redirect()->to('/admin/surveiUpdate/' . $id)->withInput();
            }
            $this->SurveiModel->save([
                'id' => $this->request->getVar('survei_id'),
                'layanan_id' => $this->request->getVar('layanan_id'),
                'nama' => $this->request->getVar('nama'),
                'start' => $this->request->getVar('start'),
                'end' => $this->request->getVar('end')
            ]);
            session()->setFlashdata('pesan', 'Survei berhasil diubah');
            return redirect()->to('/admin/survei');
        }
    }

    public function delete($id)
    {
        $this->SurveiModel->delete($id);
        session()->setFlashdata('pesan', 'Survei berhasil dihapus!');
        return redirect()->to('/admin/survei');
    }

    //--------------------------------------------------------------------

}
