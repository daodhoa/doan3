<?php
/**
 * 
 */
class Mcauhoi extends CI_Model
{
	public function getDanhSachCauHoi()
	{
		$this->db->select('*');
		$this->db->from('tbl_cauhoi a');
		$this->db->join('dm_mon b', 'a.mamon = b.mamon', 'left');
		$this->db->join('dm_nhomcauhoi c', 'a.manhom = c.manhom', 'left');
		$query = $this->db->get();
		if(empty($query))
		{
			return FALSE;
		}
		return $query;
	}
}
?>