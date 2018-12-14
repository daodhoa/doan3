<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cthembaigiang extends MY_Controller{
	function __construct(){
		parent::__construct();
        $this->load->model('Mthembaigiang');
	}
	function index(){
		$mes=array('sobanghi'=>0);
	    $data['ten'] = "Thêm bài giảng";
        $data['khoiphuc']=array('mamon'=>'','tieude'=>'','noidung'=>'');
        
        if($this->input->post('luu'))
        {
            $dem2 = 0;
            $tg=date("d/m/Y", time());
            // pr($_FILES);
            if(!empty($_FILES['bg']['name'])){
                $target_dir = "chitietbg/file/".$_FILES['bg']['name'];
                if(move_uploaded_file($_FILES["bg"]["tmp_name"], $target_dir)){
                 $dem2++;
                }
            }
            
            // pr($dem2);
            if($dem2 != 0){
                if($this->IUD('insert','tbl_baigiang','','',array('mamon'=>$this->input->post('monhoc'),'tieude'=>$this->input->post('tieude'),'noidung'=>$this->input->post('noidung'),'file'=>$_FILES['bg']['name'],'ngaydang'=>$tg),'')){
                    $mes=array(
                        'sobanghi'=>1,
                        'thongbao'=>'Thêm bài giảng thành công!',
                        'mau'=>'success'
                    );
                }
            }
        }

        if($this->input->get('bg')){
            $data['ten'] = "Sửa bài giảng";
            $mabg = $this->input->get('bg');
            $data['bg'] = $this->Mthembaigiang->getbg($mabg);
            if($this->input->post('sua')){
                $dem2 = 0;
                // pr($_FILES);
                if(!empty($_FILES['bg']['name'])){
                    $target_dir = "chitietbg/file/".$_FILES['bg']['name'];
                    if(move_uploaded_file($_FILES["bg"]["tmp_name"], $target_dir)){
                     $dem2++;
                    }
                }
                $data['khoiphuc']=array('mamon'=>$this->input->post('monhoc'),'tieude'=>$this->input->post('tieude'),'noidung'=>$this->input->post('noidung'),'file'=>$_FILES['bg']['name']);
                if($dem2 != 0){
                    if($this->IUD('update','tbl_baigiang','mabg',$this->input->get('bg'),$data['khoiphuc'],''))
                    {
                        $mes=array(
                            'sobanghi'=>1,
                            'thongbao'=>'Sửa bài giảng thành công!',
                            'mau'=>'success'
                        );
                    }
                }
                else{
                    $mes=array(
                            'sobanghi'=>0,
                            'thongbao'=>'Sửa bài giảng thất bại!',
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