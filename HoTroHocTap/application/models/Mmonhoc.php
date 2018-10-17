<?php
/**
 * 
 */
class Mmonhoc extends CI_Model
{
	public function getDanhSachMonHoc()
	{
		$records = $this->db->get('dm_mon');
		if(empty($records))
		{
			return FALSE;
		}
		return $records;
	}
}
?>