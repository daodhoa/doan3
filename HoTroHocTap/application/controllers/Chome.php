<?php 
/**
 * 
 */
class Chome extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['content'] = 'sinhvien/home/main_content';
		$data['slide'] = 'sinhvien/home/home_slider';
		$this->load->view('sinhvien/view_layout_sv', $data);
	}
}
?>