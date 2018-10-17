<?php 
/**
 * 
 */
class Clogout_admin extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if($this->session->userdata('tentaikhoan') != '')
		{
			$array = array('tentaikhoan', 'maquyen' , 'hoten');
			$this->session->unset_userdata($array);
			redirect(base_url().'admin/clogin_admin');
		}
		else
		{
			echo "<strong>Page not Found!</strong>";
		}
	}
}
?>