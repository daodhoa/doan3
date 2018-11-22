<?php 
/**
 * 
 */
class Mkyhoc extends CI_Model
{
	public function getAll()
	{
		return $this->db->get('tbl_kyhoc')->result_array();
	}
}
?>