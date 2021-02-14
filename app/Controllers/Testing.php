<?php

namespace App\Controllers;

class Testing extends BaseController
{
    public function index()
    {
        $data['title'] = "Dashboard Admin";
        return view('admin/index', $data);
    }
    public function login()
    {
        return view('admin/login');
    }
    public function website()
    {
        return view('admin/website');
    }
    public function unit_layanan()
    {
        return view('admin/unitlayanan');
    }
    public function layanan()
    {
        return view('admin/layanan');
    }
    public function survei()
    {
        return view('admin/survei');
    }
    public function unsur_survei()
    {
        return view('admin/unsursurvei');
    }
    public function ref_unsur()
    {
        return view('admin/referensiunsur');
    }
    public function pertanyaan()
    {
        return view('admin/pertanyaan');
    }
    public function jawaban()
    {
        return view('admin/jawaban');
    }

    //--------------------------------------------------------------------

}
