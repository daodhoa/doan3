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
			$matkhau = md5($matkhau);

			//echo($tentaikhoan);

			$record = $this->Madmin->login($tentaikhoan, $matkhau);
			if($record == FALSE ){
				echo "Đăng nhập thất bại";
			}
			else
			{

				$this->session->set_userdata('tentaikhoan', $record['tentaikhoan']);
				$this->session->set_userdata('maquyen', $record['maquyen']);
				$this->session->set_userdata('hoten', $record['hoten']);

				redirect(base_url().'admin/Chome_admin');
			}
		}
		else
		{
			echo "Loi";
		}

		//$this->load->view('admin/view_login_admin');
	}
}
?>