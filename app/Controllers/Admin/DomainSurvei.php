<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DomainsurveiModel;
use App\Models\WebsiteModel;
use App\Models\LayananModel;

class Domainsurvei extends BaseController
{
    public function __construct()
    {
        $this->DomainsurveiModel = new DomainsurveiModel();
        $this->WebsiteModel = new WebsiteModel();
        $this->LayananModel = new LayananModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Domain Survei | Survei Batam',
            'Domainsurvei' => $this->DomainsurveiModel->getAllDomainsurvei(),
            'WebsiteAll' => $this->WebsiteModel->getWebsite(),
            'LayananAll' => $this->LayananModel->getAllLayanan(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/domainsurvei', $data);
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
        $this->DomainsurveiModel->save([
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
                'domainsurveiId' => $this->DomainsurveiModel->getIdDomainsurvei($id),
                'website' => $this->WebisteModel->getWebsite(),
                'layananAll' => $this->LayananModel->getAllLayanan(),
                'validation' => \Config\Services::validation()
            ];
            return view('admin/domainsurveiUpdate', $data);
        } else {
            if (!$this->validate([
                'website_id' => 'required',
                'layanan_id' => 'required'
            ])) {
                return redirect()->to('/admin/domainsurvei/update/' . $id)->withInput();
            }

            $this->DomainsurveiModel->save([
                'id' => $this->request->getVar('domainsurvei_id'),
                'website_id' => $this->request->getVar('website_id'),
                'layanan_id' => $this->request->getVar('layanan_id')
            ]);

            session()->setFlashdata('pesan', 'Domain Survei berhasil Diubah');
            return redirect()->to('/admin/domainsurvei');
        }
    }

    public function delete($id)
    {
        $this->DomainsurveiModel->delete($id);
        session()->setFlashdata('pesan', 'Domain Survei berhasil dihapus!');
        return redirect()->to('/admin/domainsurvei');
    }


    //--------------------------------------------------------------------

}
