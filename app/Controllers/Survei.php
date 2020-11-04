<?php

namespace App\Controllers;

use App\Models\SurveiModel;

class Survei extends BaseController
{
    public function __construct()
    {
        $this->surveiModel = new SurveiModel();
    }

    public function index($id)
    {
        $data = [
            'title' => 'Daftar Survei',
            'survei' => $this->surveiModel->getSurveiByIdLayanan($id)
        ];
        return view('survei', $data);
    }
}
