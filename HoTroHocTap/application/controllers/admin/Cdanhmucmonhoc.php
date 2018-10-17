<?php
/**
 * 
 */
class Cdanhmucmonhoc extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Mmonhoc');
	}

	public function index()
	{
		$records = $this->Mmonhoc->getDanhSachMonHoc();
		$data = array();
		$data['records'] = $records;
		$data['content'] = 'admin/monhoc/view_monhoc_admin';
		$this->load->view('admin/view_layout_admin', $data);
	}
}
?>