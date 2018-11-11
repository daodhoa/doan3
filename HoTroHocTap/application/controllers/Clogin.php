<?php
/**
 * 
 */
class Clogin extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['content'] = 'sinhvien/student/vlogin';
		$data['slide'] = 'sinhvien/student/student_title';
		$this->load->view('sinhvien/view_layout_sv', $data);
	}
}
?>