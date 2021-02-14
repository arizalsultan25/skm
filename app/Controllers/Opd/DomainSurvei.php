<?php

namespace App\Controllers\Opd;

use App\Controllers\BaseController;
use App\Models\DomainsurveiModel;
use App\Models\WebsiteModel;
use App\Models\LayananModel;

class Domainsurvei extends BaseController
{
    public function __construct()
    {
        $this->Domainsurvei = new DomainsurveiModel();
        $this->WebsiteModel = new WebsiteModel();
        $this->LayananModel = new LayananModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Domain Survei | Survei Batam',
            'Domainsurvei' => $this->Domainsurvei->getAllDomainsurvei(),
            'websiteAll' => $this->WebsiteModel->getWebsite(),
            'layananAll' => $this->LayananModel->getAllLayanan(),
            'validation' => \Config\Services::validation()
        ];
        return view('opd/domainsurvei', $data);
    }

    public function create()
    {
        if (!$this->validate(
            [
                'website_id' => 'required',
                'layanan_id' => 'required'
            ]
        )) {
            return redirect()->to('/opd/domainsurvei')->withInput();
        }
        $this->Domainsurvei->save([
            'website_id' => $this->request->getVar('website_id'),
            'layanan_id' => $this->request->getVar('layanan_id')
        ]);
        session()->setFlashdata('pesan', 'Domain Survei berhasil ditambahkan');
        return redirect()->to('/opd/domainsurvei');
    }

    public function update($id)
    {
        if (!isset($_POST['update'])) {
            $data = [
                'title' => 'Daftar Domain Survei | Survei Batam',
                'domainsurvei' => $this->DomainsurveiModel->getIdDomainsurvei($id),
                'websiteAll' => $this->WebsiteModel->getWebsite(),
                'layananAll' => $this->LayananModel->getAllLayanan(),
                'validation' => \Config\Services::validation()
            ];
            return view('opd/domainsurveiUpdate', $data);
        } else {
            if (!$this->validate([
                'website_id' => 'required',
                'layanan_id' => 'required'
            ])) {
                return redirect()->to('/opd/domainsurvei/update/' . $id)->withInput();
            }

            $this->Domainsurvei->save([
                'id' => $this->request->getVar('domainsurvei_id'),
                'website_id' => $this->request->getVar('website_id'),
                'layanan_id' => $this->request->getVar('layanan_id')
            ]);

            session()->setFlashdata('pesan', 'Domain Survei berhasil Diubah');
            return redirect()->to('/opd/domainsurvei');
        }
    }

    public function delete($id)
    {
        $this->Domainsurvei->delete($id);
        session()->setFlashdata('pesan', 'Domain Survei berhasil dihapus!');
        return redirect()->to('/opd/domainsurvei');
    }


    //--------------------------------------------------------------------

}
