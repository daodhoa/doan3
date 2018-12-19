<?php 
/**
 * 
 */
class Ctintuc extends CI_Controller
{	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Mlophoc');
		$this->load->model('Mtintuc');
		$this->load->model('Mcomments');

	}
	public function dsthongbao($malop='')
	{
		
		$data['malop'] = $malop;
		$data['dsThongBaos'] = $this->Mtintuc->getDanhSachThongBao($malop);
		$data['content'] = 'sinhvien/thongbao/vDanhSachThongBao';
		$this->load->view('sinhvien/view_layout_sv', $data);
	}
	public function chiTietThongBao($maTinTuc='')
	{
		$data['tinTuc']		= $this->Mtintuc->getChiTietTinTuc($maTinTuc);
		$data['comments']	= $this->Mcomments->getDanhSachComments($maTinTuc);
		$data['content'] = 'sinhvien/thongbao/vChiTietThongBao';
// 				print("<pre>".print_r($data['comments']->result(),true)."</pre>");
// die();
		$this->load->view('sinhvien/view_layout_sv', $data);
	}
	
	public function dsHoiDap($malop='')
	{
		
		$data['malop'] = $malop;
		$data['dsCauHois'] = $this->Mtintuc->getDanhSachCauHoi($malop);
		$data['content'] = 'sinhvien/hoidap/vDanhSachCauHoi';
		$this->load->view('sinhvien/view_layout_sv', $data);
	}
	

	public function chiTietHoiDap($maTinTuc,$malop)
	{
		$data['malop']		= $malop;
		$data['cauHoi']		= $this->Mtintuc->getChiTietTinTuc($maTinTuc);
		$data['comments']	= $this->Mcomments->getDanhSachComments($maTinTuc);

		if ($data['cauHoi']->manguoidang == $this->session->userdata('masinhvien')) {
			$data['owner']	= 'true';
		}else{
			$data['owner']	= 'false';
		}
		// print("<pre>".print_r($data['owner'],true)."</pre>");
		// die();
		$data['content'] = 'sinhvien/hoidap/vChiTietHoiDap';

		$this->load->view('sinhvien/view_layout_sv', $data);
	}

	public function showViewThemCauHoi($malop)
	{
		$data 	= array();
		$data['malop'] = $malop;
		$data['content'] = 'sinhvien/hoidap/vThemCauHoi';
		$this->load->view('sinhvien/view_layout_sv', $data);
	}
	public function showViewSuaCauHoi($maTinTuc)
	{
		
		$data = array();
		$data['tinTuc']	= $this->Mtintuc->getChiTietTinTuc($maTinTuc);

		$data['content'] = 'sinhvien/hoidap/vSuaCauHoi';
		$this->load->view('sinhvien/view_layout_sv', $data);
	}
	
	public function themCauHoi()
	{
		#lay ma nguoi dung trong séssion vao ma quan tri
		if($this->input->post('submit'))
		{

			$maLopHoc 	= $this->input->post('malop');
			$id_LopHoc	= $this->Mlophoc->getIdLopphoc($maLopHoc);
			$tieuDe 	= $this->input->post('tieude');
			$noiDung 	= $this->input->post('noidung');
			$masinhvien	= $this->session->userdata('masinhvien');
			$theloai	= 'hoidap';

			$thong_bao_cho = $this->Mtintuc->notifyFor($masinhvien, $theloai, $id_LopHoc);

			$record 	= $this->Mtintuc->them($masinhvien, $tieuDe, $id_LopHoc, $noiDung, $theloai,$thong_bao_cho );

			if($record == true ){
				
				$this->dsHoiDap($maLopHoc);
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

	public function suaCauHoi($matintuc)
	{
		$maLopHoc 	= $this->input->post('malophoc');
		// $id_LopHoc	= $this->Mlophoc->getIdLopphoc($maLopHoc);
		
		if($this->input->post('submit'))
		{
			$tieuDe 	= $this->input->post('tieude');
			$noiDung 	= $this->input->post('noidung');
			$record 	= $this->Mtintuc->sua($matintuc,$tieuDe, $noiDung);
			
			if($record == true ){
				$this->chiTietHoiDap($matintuc,$maLopHoc);
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
	public function xoaCauHoi($maTinTuc,$maLopHoc)
	{

		$record = $this->Mtintuc->xoa($maTinTuc);
		if($record == true ){
			$this->dsHoiDap($maLopHoc);
			header('Location: '.base_url().'clophoc/index/'.$maLopHoc);
		}
		else
		{
			echo "xoa thất bại";
		}

	}
	
}
