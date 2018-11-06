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

	public function getThongTinMonHoc($mamon) 
	{
		$this->db->where('mamon', $mamon);
		$records = $this->db->get('dm_mon');
		return $records->row();
	}

	public function suaMonHoc($mamon, $data = array())
	{
		$this->db->where('mamon', $mamon);
		$result = $this->db->update('dm_mon', $data);
		return $result;
	}

	public function getListMonHoc($maquantri)
	{
		$this->db->where('manguoitao', $maquantri);
		$records = $this->db->get('dm_mon');
		return $records->result_array();
	}

	public function getListLopHoc($mamon)
	{
		$this->db->where('mamon', $mamon);
		$records = $this->db->get('tbl_lophoc');
		return $records->result_array();
	}
}
?>