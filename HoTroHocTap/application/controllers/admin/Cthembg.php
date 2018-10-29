<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cthembg extends MY_Controller{
	function __construct(){
		parent::__construct();
        $this->load->model('Mthembaigiang');
	}
	function index(){
		$mes=0;
		$temp['data']['khoiphuc']=array('mamon'=>'','tieude'=>'','noidung'=>'');
        if($this->_post('luu'))
        {
            if($this->IUD('insert','tbl_baigiang','','',array('mamon'=>$this->_post('monhoc'),'tieude'=>$this->_post('tieude'),'noidung'=>$this->_post('noidung')),''))
            {
                $mes=array(
                    'sobanghi'=>1,
                    'thongbao'=>'Thêm bài giảng thành công!',
                    'mau'=>'success'
                );
            }
        }
        if($this->input->get('bg')){
            $mabg = $this->input->get('bg');
            $temp['data']['bg'] = $this->Mthembaigiang->getbg($mabg);
             if($this->_post('sua')){
                $temp['data']['khoiphuc']=array('mamon'=>$this->_post('monhoc'),'tieude'=>$this->_post('tieude'),'noidung'=>$this->_post('noidung'));
                if($this->IUD('update','tbl_baigiang','mabg',$this->input->get('bg'),$temp['data']['khoiphuc'],''))
                {
                    $mes=array(
                        'sobanghi'=>1,
                        'thongbao'=>'Sửa bài giảng thành công!',
                        'mau'=>'success'
                    );
                }
            }
        }
       
        // pr($temp['data']['dsmon']);
        //default
        $temp['data']['mes'] = $mes;
		$temp['data']['dsmon']=$this->Mthembaigiang->getmon();
		$temp['data']['title']='Thêm bài giảng';
		$temp['template'] = 'admin/baigiang/Vthembg';
		$this->load->view('admin/layout',$temp);
	}
}
?>