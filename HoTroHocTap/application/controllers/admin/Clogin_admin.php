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
				$this->session->set_userdata('error_login', 'Sai tài khoản hoặc mật khẩu.');
				redirect(base_url().'admin/Clogin_admin');
				//$this->load->view('admin/view_login_admin');
			}
			else
			{
				if($record['trangthai'] == 0)
				{
					$this->session->set_userdata('error_login', 'Tài khoản đã bị khóa.');
					redirect(base_url().'admin/Clogin_admin');
				}
				
				$this->session->set_userdata('maquantri', $record['maquantri']);
				$this->session->set_userdata('tentaikhoan', $record['tentaikhoan']);
				$this->session->set_userdata('maquyen', $record['maquyen']);
				$this->session->set_userdata('Ahoten', $record['hoten']);
				redirect(base_url().'admin/Chome_admin');
				
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
