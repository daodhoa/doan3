<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cdsbaigiang extends My_Controller{
	function __construct(){
		parent::__construct();
        $this->load->model('Mthembaigiang');
	}

	public function index()
	{
		$manguoitao = $this->session->userdata('maquantri');
		if($this->input->post('xoa'))
        {
            if($this->IUD('delete','tbl_baigiang','mabg',$this->input->post('xoa'),'',''))
            {
                $this->session->set_flashdata('message','Xóa bài giảng thành công');
            }
        }

		$data = array();
		$mamon = '';
		$data['dsmon'] = $this->Mthembaigiang->getmon();
		if($this->input->get('monhoc'))
		{
			$mamon = $this->input->get('monhoc');
		}

		$data['dsbaigiang'] = $this->Mthembaigiang->getBaigiang($mamon,$manguoitao);

		$data['content'] = 'admin/baigiang/view_dsbaigiang';
		$this->load->view('admin/view_layout_admin', $data);
	}

}

?>