<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('admin/login');
	}

	public function LoginProcess()
	{
		# code...
		$email = $_POST['email'];
		$pass  = $_POST['password'];

		if($email == "admin@kominfo.co.id" && $pass == "admin"){
			
			return redirect()->to('/testing');
			
		} else if ($email == "admin@opd.co.id" && $pass == "admin_opd"){
			
			return redirect()->to('/Opd/');
		}else{
			
			return redirect()->to('/');			
		}
	}

	//--------------------------------------------------------------------

}
