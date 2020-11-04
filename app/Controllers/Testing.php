<?php

namespace App\Controllers;

class Testing extends BaseController
{
    public function index()
    {
        return view('admin/index');
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
        return view('admin/unit_layanan');
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
        return view('admin/unsur_survei');
    }
    public function ref_unsur()
    {
        return view('admin/ref_unsur');
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
