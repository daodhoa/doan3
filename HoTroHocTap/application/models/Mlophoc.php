<?php
/**
 * 
 */
class Mlophoc extends CI_Model
{
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