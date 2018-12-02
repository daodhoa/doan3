<?php 
/**
 * 
 */
class Cchitietbg extends CI_Controller
{	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Mthembaigiang');
		if($this->session->userdata('masinhvien') == '')
		{	
			$this->session->set_flashdata('message','Bạn chưa đăng nhập');
			redirect(base_url());
		}
	}

	public function index()
	{
		$data['mabg']=$this->uri->segment(2);
		$data['bg'] = $this->Mthembaigiang->getbg($data['mabg']);
		$data['content'] = 'sinhvien/Vchitietbg';
		$this->load->view('sinhvien/view_layout_sv', $data);
	}

}