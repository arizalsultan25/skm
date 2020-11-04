<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DomainSurveiModel;
use App\Models\WebsiteModel;
use App\Models\LayananModel;

class DomainSurvei extends BaseController
{
    public function __construct()
    {
        $this->DomainSurvei = new DomainSurveiModel();
        $this->webisteModel = new WebsiteModel();
        $this->LayananModel = new LayananModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Domain Survei | Survei Batam',
            'DomainSurvei' => $this->DomainSurvei->getAllDomainSurvei(),
            'WebsiteAll' => $this->webisteModel->getWebsite(),
            'LayananAll' => $this->LayananModel->getAllLayanan(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/domain_survei', $data);
    }

    public function create()
    {
        if (!$this->validate(
            [
                'website_id' => 'required',
                'layanan_id' => 'required'
            ]
        )) {
            return redirect()->to('/admin/domainsurvei')->withInput();
        }
        $this->DomainSurvei->save([
            'website_id' => $this->request->getVar('website_id'),
            'layanan_id' => $this->request->getVar('layanan_id')
        ]);
        session()->setFlashdata('pesan', 'Domain Survei berhasil ditambahkan');
        return redirect()->to('/admin/domainsurvei');
    }

    public function update($id)
    {
        if (!isset($_POST['update'])) {
            $data = [
                'title' => 'Daftar Domain Survei | Survei Batam',
                'domainsurvei' => $this->DomainSurvei->getIdDomainSurvei($id),
                'WebsiteAll' => $this->webisteModel->getWebsite(),
                'LayananAll' => $this->LayananModel->getAllLayanan(),
                'validation' => \Config\Services::validation()
            ];
            return view('admin/domain_surveiUpdate', $data);
        } else {
            if (!$this->validate([
                'website_id' => 'required',
                'layanan_id' => 'required'
            ])) {
                return redirect()->to('/admin/domainsurvei/update/' . $id)->withInput();
            }

            $this->DomainSurvei->save([
                'id' => $this->request->getVar('id_domainsurvei'),
                'website_id' => $this->request->getVar('website_id'),
                'layanan_id' => $this->request->getVar('layanan_id')
            ]);

            session()->setFlashdata('pesan', 'Domain Survei berhasil Diubah');
            return redirect()->to('/admin/domainsurvei');
        }
    }

    public function delete($id)
    {
        $this->DomainSurvei->delete($id);
        session()->setFlashdata('pesan', 'Domain Survei berhasil dihapus!');
        return redirect()->to('/admin/domainsurvei');
    }


    //--------------------------------------------------------------------

}
