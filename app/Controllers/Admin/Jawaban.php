<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\JawabanModel;
use App\Models\ReferensiunsurModel;
// use App\Models\Jawaban;
use App\Models\PertanyaanModel;

class Jawaban extends BaseController
{
    public function __construct()
    {
        $this->JawabanModel = new JawabanModel();
        $this->ReferensiunsurModel = new ReferensiunsurModel();
        $this->PertanyaanModel = new PertanyaanModel();
        // $this->Jawaban = new Jawaban();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Jawaban | Survei Batam',
            'jawaban' => $this->JawabanModel->getJawaban(),
            'referensiunsur' => $this->ReferensiunsurModel->getReferensiunsur(),
            'validation' => \Config\Services::validation(),
            'pertanyaan' => $this->PertanyaanModel->getAllPertanyaan()
        ];
        return view('admin/jawaban', $data);
    }

    public function create()
    {
        if (!$this->validate(
            [
                'referensiunsur_id' => 'required',
                'jawaban' => 'required',
                'bobot' => 'required',
            ]
        )) {
            return redirect()->to('/admin/jawaban')->withInput();
        }
        $data = [
            'pertanyaan_id' => $this->request->getVar('referensiunsur_id'),
            'jawaban' => $this->request->getVar('jawaban'),
            'nilai' => $this->request->getVar('bobot')
        ];

        $this->JawabanModel->save($data);       
        session()->setFlashdata('pesan', 'Jawaban berhasil ditambahkan');
        return redirect()->to('/admin/jawaban');
        var_dump($data);
        echo $this->request->getVar('referensiunsur_id').' '. $this->request->getVar('jawaban').' '.$this->request->getVar('bobot');
    }

    public function update($id)
    {
        if (!isset($_POST['update'])) {
            $data = [
                'title' => 'Daftar Jawaban | Survei Batam',
                'jawaban' => $this->JawabanModel->getJawaban($id),
                'referensiunsur' => $this->ReferensiunsurModel->getReferensiunsur(),
                'pertanyaanAll' => $this->PertanyaanModel->getAllPertanyaan(),
                'validation' => \Config\Services::validation()
            ];
            return view('admin/jawabanUpdate', $data);
        } else {
            if (!$this->validate([
                'referensiunsur_id' => 'required',
                'jawaban' => 'required',
                'nilai' => 'required'
            ])) {
                return redirect()->to('/admin/jawaban/update/' . $id)->withInput();
            }

            $this->JawabanModel->save([
                'id' => $this->request->getVar('id'),
                'pertanyaan_id' => $this->request->getVar('referensiunsur_id'),
                'jawaban' => $this->request->getVar('jawaban'),
                'nilai' => $this->request->getVar('nilai')
            ]);

            session()->setFlashdata('pesan', 'Jawaban berhasil Diubah');
            return redirect()->to('/admin/jawaban');
        }
    }

    public function delete($id)
    {
        $this->JawabanModel->delete($id);
        session()->setFlashdata('pesan', 'Jawaban berhasil dihapus!');
        return redirect()->to('/admin/jawaban');
    }


    //--------------------------------------------------------------------

}
