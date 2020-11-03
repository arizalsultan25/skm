<?php

namespace App\Controllers;

use App\Models\WebsiteModel;

class Website extends BaseController
{
    public function __construct()
    {
        $this->webisteModel = new WebsiteModel();
    }

    public function index($id = FALSE)
    {
        if ($id == FALSE) {
            $data = [
                'title' => 'Website',
                'website' => $this->webisteModel->getWebsite()
            ];
            return view('website', $data);
        }

        $data = [
            'title' => 'domain-survei > Layanan',
            'website' => $this->webisteModel->getWebsite($id)
        ];
        return view('domain-survei', $data);
    }
}
