<?php

namespace App\Controllers;

class Testingg extends BaseController
{
    public function index()
    {
        $data['title'] = "Dashboard OPD";
        return view('opd/index', $data);
    }
    public function login()
    {
        return view('opd/login');
    }
    public function layanan()
    {
        return view('opd/layanan');
    }
    public function survei()
    {
        return view('opd/survei');
    }
    public function unsur_survei()
    {
        return view('opd/unsursurvei');
    }
    public function ref_unsur()
    {
        return view('opd/referensiunsur');
    }
    public function pertanyaan()
    {
        return view('opd/pertanyaan');
    }
    public function jawaban()
    {
        return view('opd/jawaban');
    }
    public function akunopd()
    {
        return view('opd/akunopd');
    }

    //--------------------------------------------------------------------

}
