<?php

namespace App\Controllers;

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
            'title' => 'Website',
            'website' => $this->WebsiteModel->getWebsite()
        ];
        return view('website', $data);
    }
}
