<?php 

namespace App\Controllers\Opd;
use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = "Dashboard Admin OPD";
        return view('Opd/index', $data);
    }
}