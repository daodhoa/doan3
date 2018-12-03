<?php
/**
 * 
 */
class Csinhvien extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('MAdmin');
	}

	public function index()
	{
		$listSV = $this->MAdmin->getListSV();
		$data['listSV'] = $listSV;

		$data['content'] = 'admin/sinhvien/vsinhvien_admin';
		$this->load->view('admin/view_layout_admin', $data);
	}
}
?>