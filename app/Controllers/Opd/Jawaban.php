<?php

namespace App\Controllers\Opd;

use App\Controllers\BaseController;
use App\Models\JawabanModel;
use App\Models\ReferensiUnsurModel;
use App\Models\Jawab;
use App\Models\PertanyaanModel;

class Jawaban extends BaseController
{
    public function __construct()
    {
        $this->jawabanModel = new JawabanModel();
        $this->RefUnsurModel = new ReferensiUnsurModel();
        $this->pertanyaanModel = new PertanyaanModel();
        $this->Jawab = new Jawab();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Jawaban | Survei Batam',
            'jawaban' => $this->jawabanModel->getJawaban(),
            'refUnsur' => $this->RefUnsurModel->getReferensi(),
            'validation' => \Config\Services::validation(),
            'pertanyaan' => $this->pertanyaanModel->getAllPertanyaan()
        ];
        return view('Opd/jawaban', $data);
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
            return redirect()->to('/Opd/jawaban')->withInput();
        }
        $data = [
            'pertanyaan_id' => $this->request->getVar('ref_id'),
            'jawaban' => $this->request->getVar('jawaban'),
            'nilai' => $this->request->getVar('bobot')
        ];

        $this->jawabanModel->save($data);       
        session()->setFlashdata('pesan', 'Jawaban berhasil ditambahkan');
        return redirect()->to('/Opd/jawaban');
        var_dump($data);
        echo $this->request->getVar('ref_id').' '. $this->request->getVar('jawaban').' '.$this->request->getVar('bobot');
    }

    public function update($id)
    {
        if (!isset($_POST['update'])) {
            $data = [
                'title' => 'Daftar Jawaban | Survei Batam',
                'jawaban' => $this->jawabanModel->getJawaban($id),
                'refUnsur' => $this->RefUnsurModel->getReferensi(),
                'pertanyaan' => $this->pertanyaanModel->getAllPertanyaan(),
                'validation' => \Config\Services::validation()
            ];
            return view('Opd/jawabanUpdate', $data);
        } else {
            if (!$this->validate([
                'ref_id' => 'required',
                'jawaban' => 'required',
                'nilai' => 'required'
            ])) {
                return redirect()->to('/Opd/jawaban/update/' . $id)->withInput();
            }

            $this->jawabanModel->save([
                'id' => $this->request->getVar('id'),
                'pertanyaan_id' => $this->request->getVar('ref_id'),
                'jawaban' => $this->request->getVar('jawaban'),
                'nilai' => $this->request->getVar('nilai')
            ]);

            session()->setFlashdata('pesan', 'Jawaban berhasil Diubah');
            return redirect()->to('/Opd/jawaban');
        }
    }

    public function delete($id)
    {
        $this->jawabanModel->delete($id);
        session()->setFlashdata('pesan', 'Jawaban berhasil dihapus!');
        return redirect()->to('/Opd/jawaban');
    }


    //--------------------------------------------------------------------

}
