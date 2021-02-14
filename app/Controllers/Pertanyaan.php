<?php

namespace App\Controllers;

use App\Models\PertanyaanModel;

class Pertanyaan extends BaseController
{
    public function __construct()
    {
        $this->PertanyaanModel = new PertanyaanModel();
    }

    public function index($id = FALSE)
    {
        $data = [
            'title' => 'Pertanyaan',
            'survei' => $this->PertanyaanModel->getSurveiById($id),
            'pertanyaan' => $this->PertanyaanModel->getPertanyaan($id),
            'jawaban' => $this->PertanyaanModel->getJawaban($id)
        ];
        return view('pertanyaan', $data);
    }
}
