<?php
/**
 * 
 */
class Chome_admin extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data="";
		$temp['data'] = $data;
		$temp['template'] = 'admin/vhome';
		$this->load->view('admin/layout',$temp);
	}
}
?>