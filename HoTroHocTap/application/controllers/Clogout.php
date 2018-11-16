<?php
/**
 * 
 */
class Clogout extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Msinhvien');
		if($this->session->userdata('masinhvien') == '')
		{
			redirect(base_url());
		}
	}

	public function index()
	{
		if($this->session->userdata('masinhvien') != '')
		{
			$array = array('masinhvien','hoten');
			$this->session->unset_userdata($array);
			redirect(base_url());
		}
		else
		{
			echo "<strong>Page not Found!</strong>";
		}
	}
}
?>