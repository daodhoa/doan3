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
 		$maquantri = $this->session->userdata('maquantri');
 		$records = $this->Mmonhoc->getListMonHoc($maquantri);
		
		$data = array();
		$data['records'] = $records;
		$data['content'] = 'admin/monhoc/view_monhoc_admin';
		$this->load->view('admin/view_layout_admin', $data);
 	}

 	public function themmonhoc()
 	{
 		# code..
 	}

 	public function sua()
 	{
 		# code...
 	}

 	public function xemdslop()
 	{
 		$mamon = $this->input->get('mamon');
 		$records = $this->Mmonhoc->getListLopHoc($mamon);
 		$data = array();
		$data['records'] = $records;
		$data['content'] = 'admin/monhoc/view_dslop_admin';
		$this->load->view('admin/view_layout_admin', $data);
 	}
 } 
?>