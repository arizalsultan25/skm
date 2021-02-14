<?php

namespace App\Controllers;
use App\Models\AkunopdModel;

class Home extends BaseController
{

	public function __construct()
    {
		\Config\Services::session();
		$this->AkunopdModel = new AkunopdModel();
    }


	public function index()
	{
		return view('admin/login');
	}

	public function LoginProcess()
	{
		$email = $_POST['email'];
		$pass  = $_POST['password'];

		if($email == "admin@kominfo.co.id" && $pass == "admin"){
			
			return redirect()->to('/testing');
			
		} else if ($email == "admin@opd.co.id" && $pass == "admin_opd"){
			
			return redirect()->to('/testingg');
		}else{
			session()->setFlashdata('error', 'Email atau Password tidak cocok');
			return redirect()->to('/');			
		}
	}

	public function loginOPD()
	{
		return view('opd/login');
	}

	public function ProcessLoginOPD()
	{
		$kode = $_POST['kode'];

		$data = $this->AkunopdModel->getAkunOPDbyKode($kode);

		if($data[0]->unitlayanan_nama !== null){
			session()->set('nama', $data[0]->unitlayanan_nama );
			session()->set('id_opd', $data[0]->unitlayanan_id );
			return redirect()->to('/testingg');
		}else{
			session()->setFlashdata('erroropd', 'Kode tidak cocok');
			return redirect()->to('/home/loginopd');			
		}

		
		print_r($data);
	}
	//--------------------------------------------------------------------

}
