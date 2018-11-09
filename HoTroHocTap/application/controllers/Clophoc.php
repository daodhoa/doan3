<?php 
/**
 * 
 */
class Clophoc extends CI_Controller
{	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Mlophoc');
	}

	public function index($malop='')
	{
		$ds3dethi = $this->Mlophoc->getLimitDethi($malop,3);
		

		$data['ds3dethi']= $ds3dethi;
		$data['content'] = 'sinhvien/lophoc/vlophoc';
		$data['slide'] = 'sinhvien/lophoc/lophoc_title';
		$this->load->view('sinhvien/view_layout_sv', $data);
	}

	public function dethi($made='')
	{
		$data['content'] = 'sinhvien/lophoc/vdethi';
		$this->load->view('sinhvien/view_layout_sv', $data);
	}
}
?>