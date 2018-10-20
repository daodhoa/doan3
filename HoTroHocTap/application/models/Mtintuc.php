<?php
/**
 * 
 */
class Mtintuc extends CI_Model
{
	public function getDanhSachTinTuc()
	{
		$records = $this->db->get('dm_tintuc');
		if(empty($records))
		{
			return FALSE;
		}
		return $records;
	}
}
?>