<?php
/**
 * 
 */
class Clogin_admin extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Madmin');
	}

	public function index()
	{

		$this->load->view('admin/view_login_admin');
	}

	public function login()
	{
		//this->load->helper('form');
		
		if($this->input->post('submit'))
		{
			$tentaikhoan = $this->input->post('tentaikhoan');
			$matkhau = $this->input->post('matkhau');
			$matkhau = $matkhau;

			//echo($tentaikhoan);

			$record = $this->Madmin->login($tentaikhoan, $matkhau);
			if($record == FALSE ){
				$this->session->set_userdata('error_login', 'Sai tài khoản hoặc mật khẩu.');
				redirect(base_url().'admin/Clogin_admin');
				//$this->load->view('admin/view_login_admin');
			}
			else
			{
				// var_dump($record["maquyen"]);
				$this->session->sest_userdata('maquantri', $record['maquantri']);
				$this->session->set_userdata('tentaikhoan', $record['tentaikhoan']);
				$this->session->set_userdata('maquyen', $record['maquyen']);
				$this->session->set_userdata('hoten', $record['hoten']);
				redirect(base_url().'admin/Chome_admin');
				var_dump($record["maquyen"]);
				if($record["maquyen"] == "giaovien"){
					redirect(base_url().'admin/Chome_admin');
				}
				// redirect(base_url().'admin/Chome_admin');
			}
		}
		else
		{
			echo "ERROR- 404";
		}

		//$this->load->view('admin/view_login_admin');
	}
}
?>