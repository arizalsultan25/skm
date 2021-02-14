<?php

namespace App\Controllers\Opd;

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
        return view('opd/jawaban', $data);
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
            return redirect()->to('/opd/jawaban')->withInput();
        }
        $data = [
            'pertanyaan_id' => $this->request->getVar('referensiunsur_id'),
            'jawaban' => $this->request->getVar('jawaban'),
            'nilai' => $this->request->getVar('bobot')
        ];

        $this->JawabanModel->save($data);       
        session()->setFlashdata('pesan', 'Jawaban berhasil ditambahkan');
        return redirect()->to('/opd/jawaban');
        var_dump($data);
        echo $this->request->getVar('ref_id').' '. $this->request->getVar('jawaban').' '.$this->request->getVar('bobot');
    }

    public function update($id)
    {
        if (!isset($_POST['update'])) {
            $data = [
                'title' => 'Daftar Jawaban | Survei Batam',
                'jawaban' => $this->JawabanModel->getJawaban($id),
                'referensiunsur' => $this->ReferensiunsurModel->getReferensiunsur(),
                'pertanyaan' => $this->PertanyaanModel->getAllPertanyaan(),
                'validation' => \Config\Services::validation()
            ];
            return view('opd/jawabanUpdate', $data);
        } else {
            if (!$this->validate([
                'referensiunsur_id' => 'required',
                'jawaban' => 'required',
                'nilai' => 'required'
            ])) {
                return redirect()->to('/opd/jawaban/update/' . $id)->withInput();
            }

            $this->JawabanModel->save([
                'id' => $this->request->getVar('id'),
                'pertanyaan_id' => $this->request->getVar('referensiunsur_id'),
                'jawaban' => $this->request->getVar('jawaban'),
                'nilai' => $this->request->getVar('nilai')
            ]);

            session()->setFlashdata('pesan', 'Jawaban berhasil Diubah');
            return redirect()->to('/opd/jawaban');
        }
    }

    public function delete($id)
    {
        $this->JawabanModel->delete($id);
        session()->setFlashdata('pesan', 'Jawaban berhasil dihapus!');
        return redirect()->to('/opd/jawaban');
    }


    //--------------------------------------------------------------------

}
