<?php

namespace App\Controllers;

use App\Models\SurveiModel;

class Survei extends BaseController
{
    public function __construct()
    {
        $this->surveiModel = new SurveiModel();
    }

    public function index($id = FALSE)
    {
        $data = [
            'title' => 'Survei',
            'survei' => $this->surveiModel->getsurvei($id)
        ];
        return view('survei', $data);
    }
}
