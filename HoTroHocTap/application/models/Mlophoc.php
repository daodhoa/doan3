<?php
/**
 * 
 */
class Mlophoc extends CI_Model
{

	public function getLimitDethi($malop, $tongso)
	{
		$this->db->select('madethi, thoigianlambai, tbl_dethi.trangthai, thoigiantao');
		$this->db->from('tbl_dethi');
		$this->db->join('tbl_lophoc', 'tbl_dethi.mamon = tbl_lophoc.mamon','left');
		$this->db->where('malophoc', $malop);
		$this->db->order_by('thoigiantao','desc');
		$this->db->limit($tongso);
       	$query=$this->db->get();
       	return $query->result_array();
	}

	public function getDanhsachDethi($malop)
	{
		$this->db->select('tbl_dethi.*');
		$this->db->from('tbl_dethi');
		$this->db->join('tbl_lophoc', 'tbl_dethi.mamon = tbl_lophoc.mamon','left');
		$this->db->where('malophoc', $malop);
		$this->db->order_by('thoigiantao','desc');
		$query=$this->db->get();
       	return $query->result_array();
	}

	public function getDanhSachLopHoc()
	{
		$records = $this->db->get('tbl_lophoc');
		if(empty($records))
		{
			return FALSE;
		}
		return $records;
	}
	public function getDanhSachLopHoc1($mamonhoc,$makyhoc,$maquantri)
	{

		$this->db->select('tbl_lophoc.malophoc');
		$this->db->where('kyhoc', $makyhoc);
		$this->db->where('magiangvien', $maquantri);
		$this->db->where('mamon', $mamonhoc);
		$record = $this->db->get('tbl_lophoc');
		if(empty($record))
		{
			return FALSE;
		}
		return $record;
	}
	public function getDanhSachKyhoc()
	{
		$this->db->distinct();
		$this->db->select('kyhoc');
		$records = $this->db->get('tbl_lophoc');
		if(empty($records))
		{
			return FALSE;
		}
		return $records;
	}
	

}
?>