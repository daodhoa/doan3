<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cthembaigiang extends MY_Controller{
	function __construct(){
		parent::__construct();
        $this->load->model('Mthembaigiang');
	}
	function index(){
		$mes=array('sobanghi'=>0);
	    
        $data['khoiphuc']=array('mamon'=>'','tieude'=>'','noidung'=>'');

        if($this->input->post('luu'))
        {
            if($this->IUD('insert','tbl_baigiang','','',array('mamon'=>$this->input->post('monhoc'),'tieude'=>$this->input->post('tieude'),'noidung'=>$this->input->post('noidung')),''))
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
            $data['bg'] = $this->Mthembaigiang->getbg($mabg);
            if($this->input->post('sua')){
                $data['khoiphuc']=array('mamon'=>$this->input->post('monhoc'),'tieude'=>$this->input->post('tieude'),'noidung'=>$this->input->post('noidung'));
                if($this->IUD('update','tbl_baigiang','mabg',$this->input->get('bg'),$data['khoiphuc'],''))
                {
                    $mes=array(
                        'sobanghi'=>1,
                        'thongbao'=>'Sửa bài giảng thành công!',
                        'mau'=>'success'
                    );
                }
            }
        }
        
        $data['mes'] = $mes;
		$data['dsmon'] = $this->Mthembaigiang->getmon();
		$data['content'] = 'admin/baigiang/view_thembaigiang';
		$this->load->view('admin/view_layout_admin',$data);
	}
}
?>