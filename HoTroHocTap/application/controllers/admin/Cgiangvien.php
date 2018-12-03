<?php
/**
 * 
 */
class Cgiangvien extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('MAdmin');
	}

	public function index()
	{
		$listGV = $this->MAdmin->getListQTV('giaovien');
		$data['listGV'] = $listGV;

		$data['content'] = 'admin/giaovien/vgiaovien_admin';
		$this->load->view('admin/view_layout_admin', $data);
	}

	public function changeStatus($maquantri)
	{
		$result = $this->MAdmin->changeStatus($maquantri);
		
		$trangthai = $this->MAdmin->getstt($maquantri);
		echo $trangthai;

	}
}
?>