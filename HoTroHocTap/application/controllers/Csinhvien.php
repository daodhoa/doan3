<?php
/**
 * 
 */
class Csinhvien extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['content'] = 'sinhvien/student/profile';
		$this->load->view('sinhvien/view_layout_sv', $data);
	}
}
?>