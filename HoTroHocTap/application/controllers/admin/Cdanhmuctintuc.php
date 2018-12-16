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
		$this->load->helper('date');
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
//     				print("<pre>".print_r($tinTucs->result(),true)."</pre>");
// die();
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
	public function getNotifyList()
	{
		
		$maquantri	= $this->session->userdata('maquantri');
		$cau_hoi_moi = $this->Mtintuc->getListCauHoiMoi($maquantri);
		$so_cau_hoi_moi= count($cau_hoi_moi);
		$now = time();
		$ngaydang= strtotime(reset($cau_hoi_moi)["ngaydang"]);
		$thoi_gian_hoi=timespan($ngaydang, $now) . ' ago';
		$data=array("so_cau_hoi_moi"=>$so_cau_hoi_moi,
					 "thoi_gian_hoi"=>$thoi_gian_hoi
					 );
		// print("<pre>".print_r(timespan($ngaydang, $now) . ' ago',true)."</pre>");
		// die();
		// $so_comment_moi = $this->Mtintuc->getSoCommentMoi($maquantri);
		echo json_encode($data);
		
	}
	public function getNewQuesList(){
		$maquantri	= $this->session->userdata('maquantri');
		$cau_hoi_moi = $this->Mtintuc->getListCauHoiMoi($maquantri);
		$now = time();
		foreach ($cau_hoi_moi as $key => $value) {
			# code...
			
			$ngaydang=strtotime($cau_hoi_moi[$key]["ngaydang"]);
			$cau_hoi_moi[$key]["ngaydang"]=timespan($ngaydang, $now) . ' ago';
			
		}
		
		$data['cau_hoi_moi']=$cau_hoi_moi;
		$data['content'] = 'admin/tintuc/view_danhsachcauhoimoi';
		$this->load->view('admin/view_layout_admin', $data);

	}
	public function seeNewQuest($maTinTuc){
		$maquantri	= $this->session->userdata('maquantri');
		$this->Mtintuc->updateDaXemTinTuc($maquantri,$maTinTuc);
		$this->showViewChiTiettintuc($maTinTuc);
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
			$theloai	= 'thongbao';
			$record 	= $this->Mtintuc->them($maquantri, $tieuDe, $id_LopHoc, $noiDung,$theloai);

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
	public function loadNotify()
	{
		var_dump("hello");
		die();
	}
}
?>