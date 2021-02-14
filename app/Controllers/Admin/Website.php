<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\WebsiteModel;

class Website extends BaseController
{
    public function __construct()
    {
        $this->WebsiteModel = new WebsiteModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Website | Survei Batam',
            'website' => $this->WebsiteModel->getWebsite(),
            'validation' => \Config\Services::validation()
        ];

        return view('admin/website', $data);
    }

    public function create()
    {
        if (!$this->validate(
            ['domain' => 'required|is_unique[website.domain]']
        )) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/admin/website')->withInput()->with('validation', $validation);
            return redirect()->to('/admin/website')->withInput();
        }
        $this->WebsiteModel->save([
            'domain' => $this->request->getVar('domain')
        ]);
        session()->setFlashdata('pesan', 'Domain berhasil ditambahkan');
        return redirect()->to('/admin/website');
    }

    public function update($id)
    {
        if (!isset($_POST['update'])) {
            $data = [
                'title' => 'Daftar Website | Survei Batam',
                'website' => $this->WebsiteModel->getWebsite(),
                'websiteId' => $this->WebsiteModel->getWebsite($id),
                'validation' => \Config\Services::validation()
            ];
            return view('admin/websiteUpdate', $data);
        } else {
            if (!$this->validate([
                'domain' => "required|is_unique[website.domain,id,{$this->request->getVar('website_id')}]"
            ])) {
                return redirect()->to('/admin/website/update' . $id)->withInput();
            }

            $this->WebsiteModel->save([
                'id' => $this->request->getVar('website_id'),
                'domain' => $this->request->getVar('domain')
            ]);

            session()->setFlashdata('pesan', 'Website berhasil Diubah');
            return redirect()->to('/admin/website');
        }
    }

    public function delete($id)
    {
        $this->WebsiteModel->delete($id);
        session()->setFlashdata('pesan', 'Website berhasil dihapus!');
        return redirect()->to('/admin/website');
    }

    //--------------------------------------------------------------------

}
