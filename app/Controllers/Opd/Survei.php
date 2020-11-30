<?php

namespace App\Controllers\Opd;

use App\Controllers\BaseController;
use App\Models\SurveiModel;
use App\Models\LayananModel;

class Survei extends BaseController
{
    public function __construct()
    {
        $this->surveiModel = new SurveiModel();
        $this->layananModel = new LayananModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Survei | Survei Batam',
            'layanan' => $this->layananModel->getAllLayanan(),
            'survei' => $this->surveiModel->getSurvei(),
            'validation' => \Config\Services::validation()
        ];

        return view('Opd/survei', $data);
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
            return redirect()->to('/Opd/survei')->withInput();
        }
        $this->surveiModel->save([
            'layanan_id' => $this->request->getVar('layanan_id'),
            'nama' => $this->request->getVar('nama'),
            'start' => $this->request->getVar('start'),
            'end' => $this->request->getVar('end')
        ]);
        session()->setFlashdata('pesan', 'Survei berhasil ditambahkan');
        return redirect()->to('/Opd/survei');
    }

    public function update($id)
    {
        if (!isset($_POST['update'])) {
            $data = [
                'title' => 'Update Survei | Survei Batam',
                'layanan' => $this->layananModel->getAllLayanan(),
                'survei' => $this->surveiModel->getSurvei(),
                'surveiId' => $this->surveiModel->getIdSurvei($id),
                'validation' => \Config\Services::validation()
            ];
            return view('Opd/surveiUpdate', $data);
        } else {
            if (!$this->validate(
                [
                    'nama' => "required|is_unique[survei.nama,id,{$this->request->getVar('id_survei')}]",
                    'layanan_id' => "required",
                    'start' => "required",
                    'end' => "required",
                ]
            )) {
                return redirect()->to('/Opd/surveiUpdate/' . $id)->withInput();
            }
            $this->surveiModel->save([
                'id' => $this->request->getVar('survei_id'),
                'layanan_id' => $this->request->getVar('layanan_id'),
                'nama' => $this->request->getVar('nama'),
                'start' => $this->request->getVar('start'),
                'end' => $this->request->getVar('end')
            ]);
            session()->setFlashdata('pesan', 'Survei berhasil diubah');
            return redirect()->to('/Opd/survei');
        }
    }

    public function delete($id)
    {
        $this->surveiModel->delete($id);
        session()->setFlashdata('pesan', 'Survei berhasil dihapus!');
        return redirect()->to('/Opd/survei');
    }

    //--------------------------------------------------------------------

}
