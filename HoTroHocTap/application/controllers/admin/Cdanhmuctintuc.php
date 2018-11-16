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
		$this->load->model('Mlophoc');
		$this->load->model('Mcomments');
		$this->load->model('Mkyhoc');
	}

	public function index()
	{
		$this->load->view('admin/view_layout_admin');
	}

	public function danhsachtintuc($mamonhoc,$kyhoc)
	{
		#lay ma nguoi dung trong séssion vao ma quan tri
		$maquantri	= $this->session->userdata('maquantri');
		$makyhoc 	= $this->Mkyhoc->getMaKyhoc($kyhoc);
		$data 		= array();
		$monHocs 		= $this->Mmonhoc->getDanhSachMonHoc();
		$kyHocs 		= $this->Mkyhoc->getDanhSachTenKyhoc();
		$data['mamonSelected']	= $mamonhoc;
		$data['kyhocSelected']	= $kyhoc;
		$data['monHocs'] = $monHocs;
		$data['kyHocs'] = $kyHocs;

		if ($mamonhoc!=0 && $kyhoc!=0) {
			$lopHocs 	= $this->Mlophoc->getDanhSachLopHoc1($mamonhoc,$makyhoc,$maquantri);
			$data['lopHocs'] = $lopHocs;
			
    		$tinTucs	= $this->Mtintuc->getDanhSachTinTuc($mamonhoc,$makyhoc,$maquantri);
    		$data['tinTucs'] = $tinTucs;
		} 
		$data['content'] = 'admin/tintuc/view_danhsachtintuc';
		$this->load->view('admin/view_layout_admin', $data);
	}
	public function getDanhSachTin()
	{
		if($this->input->post('submit'))
		{
			$maMonHoc 	= $this->input->post('monhoc');
			$kyHoc 		= $this->input->post('kyhoc');
			$maquantri	= $this->session->userdata('maquantri');
			$this->danhsachtintuc($maMonHoc,$kyHoc);
			
			
		}else
		{
			$maMonHoc 	= $this->input->get('monhoc');
			$kyHoc 		= $this->input->get('kyhoc');

			$maquantri	= $this->session->userdata('maquantri');
			$this->danhsachtintuc($maMonHoc,$kyHoc);

			// $this->danhsachtintuc(0,0);
		}
	}
	public function showViewThemtintuc($mamonhoc,$kyhoc)
	{
		#lay ma nguoi dung trong séssion vao ma quan tri
		$maquantri	= $this->session->userdata('maquantri');
		$tenkyhoc 	= $kyhoc;
		$makyhoc 	= $this->Mkyhoc->getMaKyhoc($tenkyhoc);
		$lopHocs 	= $this->Mlophoc->getDanhSachLopHoc1($mamonhoc,$makyhoc,$maquantri);
		$data 		= array();
		$data['mamonhoc'] = $mamonhoc;
		$data['tenkyhoc'] = $tenkyhoc;
		$data['lopHocs'] = $lopHocs;
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

			$maLopHoc 	= $this->input->post('lophoc');
			$id_LopHoc	= $this->Mlophoc->getIdLopphoc($maLopHoc);
			$maMonHoc 	= $this->input->post('mamonhoc');
			$kyHoc 		= $this->input->post('tenkyhoc');
			$tieuDe 	= $this->input->post('tieude');
			$noiDung 	= $this->input->post('noidung');
			$maquantri	= $this->session->userdata('maquantri');
			
			$record 	= $this->Mtintuc->them($maquantri, $tieuDe, $id_LopHoc, $noiDung);

			if($record == true ){
				
				$this->danhsachtintuc($maMonHoc,$kyHoc);
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
		$maMonHoc=$this->Mtintuc->getMaMonHoc($matintuc);
		
		$maKyHoc=$this->Mtintuc->getMaKyHoc($matintuc);
		$kyHoc  =$this->Mkyhoc->getTenKyHoc($maKyHoc);
		if($this->input->post('submit'))
		{
			$tieuDe 	= $this->input->post('tieude');
			$noiDung 	= $this->input->post('noidung');
			$record 	= $this->Mtintuc->sua($matintuc,$tieuDe, $noiDung);
			
			if($record == true ){
				$this->danhsachtintuc($maMonHoc,$kyHoc);
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
		$maMonHoc=$this->Mtintuc->getMaMonHoc($maTinTuc);
		$makyHoc=$this->Mtintuc->getMaKyHoc($maTinTuc);
		$kyHoc  = $this->Mkyhoc->getTenKyHoc($makyHoc);
		$record = $this->Mtintuc->xoa($maTinTuc);
		if($record == true ){
			
			$this->danhsachtintuc($maMonHoc,$kyHoc);
		}
		else
		{
			echo "xoa thất bại";
		}
		
	}
}
?>