<?php
/**
 * 
 */
class Mkyhoc extends CI_Model
{
	public function getDanhSachTenKyhoc()
	{
		$this->db->distinct();
		$this->db->select('tenkyhoc');
		$records = $this->db->get('tbl_kyhoc');
		if(empty($records))
		{
			return FALSE;
		}
		return $records;
	}
	public function getMaKyhoc($tenky)
	{
		$this->db->select('makyhoc');
		$this->db->where('tenkyhoc', $tenky); 
		$records = $this->db->get('tbl_kyhoc')->row();
		if(empty($records))
		{
			return FALSE;
		}
		return $records->makyhoc;
	}
	public function getTenKyhoc($maKyHoc)
	{
		$this->db->select('tenkyhoc');
		$this->db->where('makyhoc', $maKyHoc); 
		$records = $this->db->get('tbl_kyhoc')->row();
		if(empty($records))
		{
			return FALSE;
		}
		return $records->tenkyhoc;
	}
	public function themCommentTinTuc($maquantri, $matintuc, $noiDung)
	{
		$data = array(
        'matintuc' => $matintuc,
        'noidung' => $noiDung,
        'manguoidang' => $maquantri,
        'ngaydang' => date('Y-m-d H:i:s')
		);
		$this->db->insert('tbl_comments', $data);
		return true;
	}
}
?>