<?php
/**
 * 
 */
class Mtintuc extends CI_Model
{
	public function getDanhSachTinTuc($maMonHoc,$kyHoc,$maquantri)
	{
		//lay het cac tin nguoi dung đăng, ghép theo môn học
		$this->db->select('*');
		$this->db->from('dm_tintuc');
		$this->db->join('tbl_lophoc', 'dm_tintuc.malophoc = tbl_lophoc.malophoc');
		$this->db->join('dm_mon', 'tbl_lophoc.mamon = dm_mon.mamon');
		$this->db->where('manguoidang', $maquantri);
		$this->db->where('tbl_lophoc.mamon', $maMonHoc);
		$this->db->where('tbl_lophoc.kyhoc', $kyHoc);
		$records = $this->db->get();
		// print("<pre>".print_r($records->result(),true)."</pre>");
		// die();
		if(empty($records))
		{
			return FALSE;
		}
		return $records;
	}
	public function getChiTietTinTuc($maTinTuc)
	{
		//lay het cac tin nguoi dung đăng, ghép theo môn học
		$this->db->select('*');
		$this->db->from('dm_tintuc');
		$this->db->join('tbl_lophoc', 'dm_tintuc.malophoc = tbl_lophoc.malophoc');
		$this->db->join('dm_mon', 'tbl_lophoc.mamon = dm_mon.mamon');
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
		$this->db->join('tbl_lophoc', 'dm_tintuc.malophoc = tbl_lophoc.malophoc');
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
		$this->db->join('tbl_lophoc', 'dm_tintuc.malophoc = tbl_lophoc.malophoc');
		$this->db->join('dm_mon', 'tbl_lophoc.mamon = dm_mon.mamon');
		$this->db->where('maTinTuc', $maTinTuc);
		$record = $this->db->get()->row()->kyhoc;
		if(empty($record))
		{
			return FALSE;
		}
		return $record;
	}
	public function them($maquantri, $tieuDe, $maLopHoc, $noiDung)
	{

		$data = array(
        'malophoc' => $maLopHoc,
        'tieude' => $tieuDe,
        'noiDung' => $noiDung,
        'manguoidang' => $maquantri,
        'ngaydang' => date('Y-m-d H:i:s')
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
}
?>