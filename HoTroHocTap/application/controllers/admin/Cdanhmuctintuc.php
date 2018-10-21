<?php
/**
 * 
 */
class Cdanhmuctintuc extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Mtintuc');
		$this->load->model('Mmonhoc');
		$this->load->model('Mcomments');
	}

	public function index()
	{
		$this->load->view('admin/view_layout_admin');
	}

	public function danhsachtintuc()
	{
		#lay ma nguoi dung trong séssion vao ma quan tri
		$maquantri	= 2;
		$tinTucs 	= $this->Mtintuc->getDanhSachTinTuc($maquantri);
		$monHocs 	= $this->Mmonhoc->getDanhSachMonHoc();
		$data 		= array();
		$data['tinTucs'] = $tinTucs;
		$data['monHocs'] = $monHocs;
		$data['content'] = 'admin/tintuc/view_danhsachtintuc';
		$this->load->view('admin/view_layout_admin', $data);
	}
	public function showViewThemtintuc()
	{
		#lay ma nguoi dung trong séssion vao ma quan tri
		$maquantri	= 2;
		$monHocs 	= $this->Mmonhoc->getDanhSachMonHoc();
		$data 		= array();
		$data['monHocs'] = $monHocs;
		$data['content'] = 'admin/tintuc/view_themtintuc';
		$this->load->view('admin/view_layout_admin', $data);
	}
	public function showViewSuatintuc($maTinTuc)
	{
		
		$data = array();
		$data['tinTuc']		= $this->Mtintuc->getChiTietTinTuc($maTinTuc);
		$data['content']	= 'admin/tintuc/view_suatintuc';
		$this->load->view('admin/view_layout_admin', $data);
	}
	public function showViewChiTiettintuc($maTinTuc)
	{
		
		$data['tinTuc']		= $this->Mtintuc->getChiTietTinTuc($maTinTuc);
		$data['comments']	= $this->Mcomments->getDanhSachComments($maTinTuc);
		$data['content']	= 'admin/tintuc/view_xemtintuc';
		$this->load->view('admin/view_layout_admin', $data);
	}
	public function them()
	{
		#lay ma nguoi dung trong séssion vao ma quan tri
		if($this->input->post('submit'))
		{
			$maMonHoc 	= $this->input->post('monhoc');
			$tieuDe 	= $this->input->post('tieude');
			$noiDung 	= $this->input->post('noidung');
			#lay ma nguoi dung trong séssion vao ma quan tri
			$maquantri 	= 2;
			
        	
			$record 	= $this->Mtintuc->them($maquantri, $tieuDe, $maMonHoc, $noiDung);
			if($record == true ){
				$this->danhsachtintuc();
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

	public function sua($matintuc)
	{
		#lay ma nguoi dung trong séssion vao ma quan tri
		if($this->input->post('submit'))
		{
			$tieuDe 	= $this->input->post('tieude');
			$noiDung 	= $this->input->post('noidung');
			$record 	= $this->Mtintuc->sua($matintuc,$tieuDe, $noiDung);
			if($record == true ){
				$this->danhsachtintuc();
			}
			else
			{
				echo "sửa thất bại";
			}
			
		}else
		{
			echo "Loi";
		}
		
	}
	public function xoa($maTinTuc)
	{
		$record 	= $this->Mtintuc->xoa($maTinTuc);
		if($record == true ){
				$this->danhsachtintuc();
		}
		else
		{
			echo "xoa thất bại";
		}
		
	}
}
?>