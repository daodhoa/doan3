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

	public function getListLopHoc($mamon, $makyhoc)
	{
		$this->db->select('tbl_lophoc.*, tenmon, mahocphan');
		$this->db->from('tbl_lophoc');
		$this->db->join('dm_mon', 'tbl_lophoc.mamon = dm_mon.mamon', 'left');
		$this->db->where('tbl_lophoc.mamon', $mamon);
		$this->db->where('kyhoc', $makyhoc);
		$records = $this->db->get();
		return $records->result_array();
	}

	public function getLimitMonhoc($tongso, $batdau)
	{
		$this->db->select('mamon, tenmon, mahocphan, hoten');
		$this->db->from('dm_mon');
		$this->db->join('tbl_quantri', 'dm_mon.manguoitao = tbl_quantri.maquantri');
		$this->db->limit($tongso, $batdau);
       	$query=$this->db->get();
       	return $query->result_array();
	}

	public function countAll()
	{
		return $this->db->count_all('dm_mon');
	}

	public function getdskyhoc()
	{
		return $this->db->get('tbl_kyhoc')->result_array();
	}

	
}
?>