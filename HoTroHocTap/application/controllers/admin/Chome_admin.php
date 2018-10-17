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
		$this->load->view('admin/view_layout_admin');
	}
}
?>