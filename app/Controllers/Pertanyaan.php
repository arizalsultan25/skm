<?php

namespace App\Controllers;

use App\Models\PertanyaanModel;

class Pertanyaan extends BaseController
{
    public function __construct()
    {
        $this->pertanyaanModel = new PertanyaanModel();
    }

    public function index($id = FALSE)
    {
        $data = [
            'title' => 'Pertanyaan',
            'survei' => $this->pertanyaanModel->getSurveiById($id),
            'pertanyaan' => $this->pertanyaanModel->getPertanyaan($id),
            'jawaban' => $this->pertanyaanModel->getJawaban($id)
        ];
        return view('pertanyaan', $data);
    }
}
