<?php

namespace App\Controllers;

use App\Models\WebsiteModel;

class Website extends BaseController
{
    public function __construct()
    {
        $this->webisteModel = new WebsiteModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Website',
            'website' => $this->webisteModel->getWebsite()
        ];
        return view('website', $data);
    }
}
