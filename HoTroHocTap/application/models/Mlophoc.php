<?php
/**
 * 
 */
class Mlophoc extends CI_Model
{
	public function getMon($mamon){
		$this->db->where('mamon',$mamon);
		$this->db->select('*');
		$kq=$this->db->get('dm_mon')->row_array();
		return $kq;
	}

	public function chitietlop($malophoc)
	{
		$this->db->where('malophoc', $malophoc);
		return $this->db->get('tbl_lophoc')->row_array();
	}

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
	public function getIdLopphoc($maLopHoc)
	{
		$this->db->select('tbl_lophoc.id_lophoc');
		$this->db->where('malophoc', $maLopHoc);
		$records = $this->db->get('tbl_lophoc')->row();
		if(empty($records))
		{
			return FALSE;
		}
		
		return $records->id_lophoc;
	}
	public function getDanhSachLopHoc1($mamonhoc,$makyhoc,$maquantri)
	{

		$this->db->select('*');
		$this->db->from('tbl_lophoc');
		$this->db->join('dm_mon', 'dm_mon.mamon = tbl_lophoc.mamon','left');
		$this->db->where('tbl_lophoc.kyhoc', $makyhoc);
		$this->db->where('dm_mon.manguoitao', $maquantri);
		$this->db->where('dm_mon.mamon', $mamonhoc);
		$record = $this->db->get();
// 		print("<pre>".print_r($record->result(),true)."</pre>");
// die();
		if(empty($record))
		{
			return FALSE;
		}
		return $record;
	}
	// public function getDanhSachKyhoc()
	// {
	// 	$this->db->distinct();
	// 	$this->db->select('kyhoc');
	// 	$records = $this->db->get('tbl_lophoc');
	// 	if(empty($records))
	// 	{
	// 		return FALSE;
	// 	}
	// 	return $records;
	// }
	

}
?>