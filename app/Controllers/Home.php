<?php 

namespace App\Controllers;
use App\Models\OPD;

class Home extends BaseController
{
	protected $session;

	public function __construct()
	{
		$this->session = \Config\Services::session();
		$this->OPD = new OPD();
	}

	public function index()
	{
		$data['opd'] = $this->OPD->getAllData();
		return view('home', $data);
	}

	public function question()
	{
		# code...
		return view('question');
	}

	public function deleteopd($id){
		$delete = $this->OPD->deleteById($id);
		if($delete){
			echo "sukses";
			redirect()->to(base_url());
		}else{
			echo "gagal";
		}
	}
	//--------------------------------------------------------------------

}
