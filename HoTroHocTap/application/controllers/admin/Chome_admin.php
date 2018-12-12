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
		$data['content'] = 'admin/home/v_home';
		$this->load->view('admin/view_layout_admin', $data);
	}
}
?>