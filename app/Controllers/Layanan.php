<?php

namespace App\Controllers;

use App\Models\LayananModel;

class Layanan extends BaseController
{
    public function __construct()
    {
        $this->LayananModel = new LayananModel();
    }

    public function index($id)
    {
        $data = [
            'title' => 'domainsurvei > Layanan',
            'website' => $this->LayananModel->getLayanan($id)
        ];
        return view('layanan', $data);
    }
}
