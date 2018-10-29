<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cdsbaigiang extends My_Controller{
	function __construct(){
		parent::__construct();
        $this->load->model('Mthembaigiang');
	}
	function index(){
		$mes=0;
		
		if($this->_post('xoa'))
        {
            if($this->IUD('delete','tbl_baigiang','mabg',$this->_post('xoa'),'',''))
            {
                $mes=array(
                    'sobanghi'=>1,
                    'thongbao'=>'Xóa bài giảng thành công!',
                    'mau'=>'success'
                );
            }
        }
        $mamon = '';
		$temp['data']['dsmon'] = $this->Mthembaigiang->getmon();
		
		if($this->input->get('monhoc')){
			$mamon = $this->input->get('monhoc');
			$temp['data']['dsbaigiang'] = $this->Mthembaigiang->getBaigiang($mamon);
		}
		$temp['data']['dsbaigiang'] = $this->Mthembaigiang->getBaigiang($mamon);
		$temp['data']['mes'] = $mes;
		$temp['template'] = 'admin/baigiang/Vdsbg';
		$this->load->view('admin/layout',$temp);
	}
}