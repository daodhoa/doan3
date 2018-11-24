<?php
/**
 * 
 */
class Ccomment_tintuc extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Mcomments');
		$this->load->model('Mtintuc');
	}

	public function index()
	{
		$this->load->view('admin/view_layout_admin');
	}

	public function giaoVienBinhLuan($matintuc)
	{
		
		if($this->input->post('submit'))
		{
			$noiDung = $this->input->post('noidungcomment');
			$maquantri	= $this->session->userdata('maquantri');
			$record = $this->Mcomments->themCommentTinTuc($maquantri, $matintuc, $noiDung);
			if($record == true ){
				redirect('admin/cdanhmuctintuc/showViewChiTiettintuc/'.$matintuc);
			}
			else
			{
				echo "ghi thất bại";
			}
			
		}else
		{
			echo "Loi";
		}
	}
	
	public function sinhVienBinhLuan($matintuc)
	{
		
		if($this->input->post('submit'))
		{
			$noiDung = $this->input->post('noidungcomment');
			$masinhvien	= $this->session->userdata('masinhvien');
			$record = $this->Mcomments->themCommentTinTuc($masinhvien, $matintuc, $noiDung);
			if($record == true ){
				// redirect('admin/cdanhmuctintuc/showViewChiTiettintuc/'.$matintuc);
				header('Location: ' . $_SERVER['HTTP_REFERER']);
			}
			else
			{
				echo "ghi thất bại";
			}
			
		}else
		{
			echo "Loi";
		}
	}
}
?>