<?php
/**
 * 
 */
class Mtintuc extends CI_Model
{
	
	public function getDanhSachTinTuc($maMonHoc,$maKyHoc,$maquantri)
	{
		//lay het cac thong bao, cauhoi nguoi dung đăng, ghép theo môn học
		$this->db->select('matintuc , tieude, noidung, theloai, file, ngaydang, malophoc, tbl_sinhvien.hoten as tensinhvien, tbl_quantri.hoten as tengiaovien  ');
		$this->db->from('dm_tintuc');
		$this->db->join('tbl_lophoc', 'dm_tintuc.id_lophoc = tbl_lophoc.id_lophoc');
		$this->db->join('tbl_kyhoc', 'tbl_kyhoc.makyhoc = tbl_lophoc.kyhoc');
		$this->db->join('dm_mon', 'tbl_lophoc.mamon = dm_mon.mamon');
		$this->db->join('tbl_quantri', 'dm_tintuc.manguoidang = tbl_quantri.maquantri','left');
		$this->db->join('tbl_sinhvien', 'dm_tintuc.manguoidang = tbl_sinhvien.masinhvien','left');
		$this->db->where('tbl_lophoc.mamon', $maMonHoc);
		$this->db->where('tbl_kyhoc.makyhoc', $maKyHoc);
		$records = $this->db->get();
		
		if(empty($records))
		{
			return FALSE;
		}
		return $records;
	}
	public function getLimitDanhSachThongBao($malop,$tongso)
	{
		$this->db->select('matintuc, tieude, noidung, ngaydang, manguoidang, hoten, file');
		$this->db->from('dm_tintuc');
		$this->db->join('tbl_lophoc', 'dm_tintuc.id_lophoc = tbl_lophoc.id_lophoc','left');
		$this->db->join('tbl_quantri', 'dm_tintuc.manguoidang = tbl_quantri.maquantri','left');
		$this->db->where('malophoc', $malop);
		$this->db->where('theloai', 'thongbao');
		$this->db->order_by('ngaydang','desc');
		$this->db->limit($tongso);
       	$query=$this->db->get();
       	return $query->result_array();
	}
	
	public function getDanhSachThongBao($malop)
	{
		$this->db->select('matintuc, tieude, noidung, ngaydang, manguoidang, hoten');
		$this->db->from('dm_tintuc');
		$this->db->join('tbl_lophoc', 'dm_tintuc.id_lophoc = tbl_lophoc.id_lophoc','left');
		$this->db->join('tbl_quantri', 'dm_tintuc.manguoidang = tbl_quantri.maquantri','left');
		$this->db->where('malophoc', $malop);
		$this->db->order_by('ngaydang','desc');
       	$query=$this->db->get();
       	return $query->result_array();
	}
	
	public function getLimitDanhSachCauHoi($malop,$tongso)
	{
		$this->db->select('matintuc, tieude, noidung, ngaydang, manguoidang, hoten');
		$this->db->from('dm_tintuc');
		$this->db->join('tbl_lophoc', 'dm_tintuc.id_lophoc = tbl_lophoc.id_lophoc');
		$this->db->join('tbl_sinhvien', 'dm_tintuc.manguoidang = tbl_sinhvien.masinhvien');
		$this->db->where('malophoc', $malop);
		$this->db->where('theloai', 'hoidap');
		$this->db->order_by('ngaydang','desc');
		$this->db->limit($tongso);
       	$query=$this->db->get();
       	return $query->result_array();
	}
	public function getDanhSachCauHoi($malop)
	{
		$this->db->select('matintuc, tieude, noidung, ngaydang, manguoidang, hoten');
		$this->db->from('dm_tintuc');
		$this->db->join('tbl_lophoc', 'dm_tintuc.id_lophoc = tbl_lophoc.id_lophoc','left');
		$this->db->join('tbl_sinhvien', 'dm_tintuc.manguoidang = tbl_sinhvien.masinhvien');
		$this->db->where('malophoc', $malop);
		$this->db->where('theloai', 'hoidap');
		$this->db->order_by('ngaydang','desc');
       	$query=$this->db->get();
       	return $query->result_array();
	}
	public function getChiTietTinTuc($maTinTuc)
	{
		//lay het cac tin nguoi dung đăng, ghép theo môn học
		$this->db->select('matintuc , manguoidang, tieude, noidung, theloai, file, ngaydang, malophoc, tbl_sinhvien.hoten as tensinhvien, tbl_quantri.hoten as tengiaovien ');
		$this->db->from('dm_tintuc');
		$this->db->join('tbl_lophoc', 'dm_tintuc.id_lophoc = tbl_lophoc.id_lophoc');
		$this->db->join('dm_mon', 'tbl_lophoc.mamon = dm_mon.mamon');
		$this->db->join('tbl_quantri', 'dm_tintuc.manguoidang = tbl_quantri.maquantri','left');
		$this->db->join('tbl_sinhvien', 'dm_tintuc.manguoidang = tbl_sinhvien.masinhvien','left');
		$this->db->where('maTinTuc', $maTinTuc);
		$record = $this->db->get()->row();
		// print("<pre>".print_r($record,true)."</pre>");
		// die();
		if(empty($record))
		{
			return FALSE;
		}
		return $record;
	}
	public function getMaMonHoc($maTinTuc)
	{
		$this->db->select('tbl_lophoc.mamon');
		$this->db->from('dm_tintuc');
		$this->db->join('tbl_lophoc', 'dm_tintuc.id_lophoc = tbl_lophoc.id_lophoc');
		$this->db->join('dm_mon', 'tbl_lophoc.mamon = dm_mon.mamon');
		$this->db->where('maTinTuc', $maTinTuc);
		$record = $this->db->get()->row()->mamon;
		if(empty($record))
		{
			return FALSE;
		}
		return $record;
		// print("<pre>".print_r($record->mamon,true)."</pre>");
		// die();
	}
	public function getMaKyHoc($maTinTuc)
	{
		$this->db->select('tbl_lophoc.kyhoc');
		$this->db->from('dm_tintuc');
		$this->db->join('tbl_lophoc', 'dm_tintuc.id_lophoc = tbl_lophoc.id_lophoc');
		$this->db->join('dm_mon', 'tbl_lophoc.mamon = dm_mon.mamon');
		$this->db->where('maTinTuc', $maTinTuc);
		$record = $this->db->get()->row()->kyhoc;
		if(empty($record))
		{
			return FALSE;
		}
		return $record;
	}
	public function them($maquantri, $tieuDe, $id_LopHoc, $noiDung, $theloai,$thong_bao_cho)
	{

		$data = array(
        'id_LopHoc' => $id_LopHoc,
        'tieude' => $tieuDe,
        'noiDung' => $noiDung,
        'manguoidang' => $maquantri,
        'thong_bao_cho'=> $thong_bao_cho,
        'ngaydang' => date('Y-m-d H:i:s'),
        'theloai' => $theloai
		);
		$record = $this->db->insert('dm_tintuc', $data);
		return $record;
	}
	public function xoa($maTinTuc)
	{

		$this->db->delete('dm_tintuc', array('matintuc' => $maTinTuc)); 
		return true;
	}
	public function sua($matintuc,$tieuDe, $noiDung)
	{
		$data = array(
        'tieuDe' => $tieuDe,
        'noiDung' => $noiDung
		);
		$this->db->where('matintuc', $matintuc);
		$this->db->update('dm_tintuc', $data);
		return true;
	}
	public function notifyFor($manguoidang, $theloai, $id_LopHoc){
		//danh sach notify gom co tat ca thanh vien trong lop cung voi giao vien lop do. tru nguoi dang
		//tra ve 1 array da duoc serialize

		$this->db->select('dm_mon.manguoitao');
		$this->db->from('dm_tintuc');
		$this->db->join('tbl_lophoc', 'dm_tintuc.id_lophoc = tbl_lophoc.id_lophoc');
		$this->db->join('dm_mon', 'tbl_lophoc.mamon = dm_mon.mamon');
		
		$magiangvien = $this->db->get()->row()->manguoitao;
		// print("<pre>".print_r($record1,true)."</pre>");
		// die();
		// lay danh sach sv lop:
		$this->db->distinct();
		$this->db->select('tbl_sinhvien_lophoc.masinhvien');
		$this->db->from('dm_tintuc');
		$this->db->join('tbl_sinhvien_lophoc', 'tbl_sinhvien_lophoc.id_lophoc = dm_tintuc.id_lophoc');
		$dsSinhvien = $this->db->get()->result_array();
		$dsSinhvien = array_map (function($value){
    		return $value['masinhvien'];
		} , $dsSinhvien);
		// array_diff( $dsSinhvien[0], array($manguoidang));
		// $notifyFor= $dsSinhvien;
		
		foreach ($dsSinhvien as $key => $value) {
			if($manguoidang==$value)
			unset($dsSinhvien[$key]);
			# code...
		}
		array_push($dsSinhvien,$magiangvien);
		$notifyFor=serialize($dsSinhvien);
		// $notifyFor=unserialize($notifyFor);
		return $notifyFor;


	}
	public function getListCauHoiMoi($magiangvien){
		
		$this->db->select('tenmon,dm_tintuc.matintuc,dm_tintuc.thong_bao_cho,dm_tintuc.da_thong_bao_cho,dm_tintuc.id_lophoc,dm_tintuc.ngaydang,dm_tintuc.tieude,tbl_sinhvien.hoten');
		$this->db->from('dm_tintuc');
		$this->db->join('tbl_lophoc', 'tbl_lophoc.id_lophoc = dm_tintuc.id_lophoc');
		$this->db->join('tbl_sinhvien', 'dm_tintuc.manguoidang = tbl_sinhvien.masinhvien');
		$this->db->join('dm_mon', 'tbl_lophoc.mamon = dm_mon.mamon');
		$this->db->where('manguoitao', $magiangvien);
		$this->db->where('theloai', 'hoidap');
		$this->db->order_by("dm_tintuc.ngaydang", "desc");
		$result = $this->db->get()->result_array();
		
		foreach ($result as $key => $row) {
			if(!empty($row['thong_bao_cho'])) {
				if(in_array($magiangvien,unserialize($row['thong_bao_cho']))){
					
					if(!empty($row['da_thong_bao_cho'])){
						if(!in_array($magiangvien,unserialize($row['da_thong_bao_cho']))){
							//giang vien phai nam trong danh sach thong bao cua tin. dong thoi khong nam trong danh sach da xem
						}else{
							unset($result[$key]);
						}
					}
					
				}else{
					unset($result[$key]);
				}
			}else{
				unset($result[$key]);
			}
		}
		// print("<pre>".print_r($result,true)."</pre>");
		// die();
		return $result;
		
		
	}
	public function updateDaXemTinTuc($manguoixem,$matintuc){
		$this->db->select('dm_tintuc.da_thong_bao_cho');
		$this->db->from('dm_tintuc');
		$this->db->where('matintuc', $matintuc);
		$record=$this->db->get()->row()->da_thong_bao_cho;
		if(empty($record)) {
			$dsDaThongBao=[];
		}else{
			$dsDaThongBao=unserialize($record);
		}
		array_push($dsDaThongBao,$manguoixem);
		
		$data = array(
        'da_thong_bao_cho' => serialize($dsDaThongBao)
		);
		// print("<pre>".print_r(unserialize($record),true)."</pre>");
		// die();
		$this->db->where('matintuc', $matintuc);
		$this->db->update('dm_tintuc', $data);
		return true;
	}
}
?>