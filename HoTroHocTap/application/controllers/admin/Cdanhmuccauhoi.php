<?php 
/**
 * 
 */
class Cdanhmuccauhoi extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Mcauhoi');
	}
	public function index()
	{
		$records = $this->Mcauhoi->getDanhSachCauHoi();
		
		$data = array();
		$data['records'] = $records;
		$data['content'] = 'admin/cauhoi/view_cauhoi_admin';
		$this->load->view('admin/view_layout_admin', $data);
		
	}
}
?>