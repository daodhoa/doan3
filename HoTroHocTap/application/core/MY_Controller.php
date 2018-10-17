<?php
/**
 * 
 */
class MY_Controller extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$folder= $this->uri->segment(1);

		switch ($folder) {
			case 'admin':
				$this->check_login();
				break;
			
			default:
				# code...
				break;
		}
	}

	function check_login()
	{
		$crl = $this->uri->segment(2);
		$taikhoan = $this->session->userdata('tentaikhoan');

		if($taikhoan == '' && $crl != 'clogin_admin')
		{
			redirect(base_url().'admin/clogin_admin');
		}
		if($taikhoan != '' && $crl == 'clogin_admin')
		{
			redirect(base_url().'admin/chome_admin');
		}
	}

}
?>