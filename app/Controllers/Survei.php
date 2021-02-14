<?php

namespace App\Controllers;

use App\Models\SurveiModel;
use App\Models\Pertanyaan;

class Survei extends BaseController
{
    public function __construct()
    {
        $this->SurveiModel = new SurveiModel();
        $this->Pertanyaan = new Pertanyaan();
    }

    public function index($opd = false, $slug = false)
    {
        
        if ($opd === false && $slug === false) {
            $data = [
                'title' => 'Daftar Survei tidak ada opd',
                'survei' => $this->SurveiModel->getActiveSurvei(),
            ];
            return view('survei', $data);
        } else if ($opd != false && $slug == false) {
            $data = [
                'title' => 'opd ada',
                'survei' => $this->SurveiModel->getSurveiByOpd($opd),
            ];
            return view('survei', $data);
        } else {
            $raw = $this->SurveiModel->getSurveiBySlug($slug);

            $data = [
                'title' => 'Daftar Survei ada opd & survei',
                'survei' => $raw,
            ];
            return view('survei', $data);
        }
    }
}
