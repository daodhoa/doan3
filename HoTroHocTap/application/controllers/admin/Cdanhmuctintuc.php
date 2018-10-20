<?php
/**
 * 
 */
class Cdanhmuctintuc extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Mtintuc');
	}

	public function index()
	{
		$records = $this->Mtintuc->getDanhSachTinTuc();
		$data = array();
		$data['records'] = $records;
		$data['content'] = 'admin/tintuc/view_danhsachtintuc';
		$this->load->view('admin/view_layout_admin', $data);
	}
}
?>