<?php

namespace App\Controllers;

use App\Models\LayananModel;

class Layanan extends BaseController
{
    public function __construct()
    {
        $this->layananModel = new LayananModel();
    }

    public function index($id)
    {
        $data = [
            'title' => 'domain-survei > Layanan',
            'website' => $this->layananModel->getLayanan($id)
        ];
        return view('layanan', $data);
    }
}
