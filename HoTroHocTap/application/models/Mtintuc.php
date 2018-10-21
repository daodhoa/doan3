<?php
/**
 * 
 */
class Mtintuc extends CI_Model
{
	public function getDanhSachTinTuc($maquantri)
	{
		//lay het cac tin nguoi dung đăng, ghép theo môn học
		$this->db->select('*');
		$this->db->from('dm_tintuc');
		$this->db->join('dm_mon', 'dm_tintuc.mamonhoc = dm_mon.mamon');
		$this->db->where('manguoidang', $maquantri);
		$records = $this->db->get();
		// print("<pre>".print_r($records->result(),true)."</pre>");
		// die();
		if(empty($records))
		{
			return FALSE;
		}
		return $records;
	}
	public function getChiTietTinTuc($maTinTuc)
	{
		//lay het cac tin nguoi dung đăng, ghép theo môn học
		$this->db->select('*');
		$this->db->from('dm_tintuc');
		$this->db->join('dm_mon', 'dm_tintuc.mamonhoc = dm_mon.mamon');
		$this->db->where('maTinTuc', $maTinTuc);
		$record = $this->db->get()->row();
		// print("<pre>".print_r($record,true)."</pre>");
		// die();
		if(empty($record))
		{
			return FALSE;
		}
		return $record;
	}

	public function them($maquantri, $tieuDe, $maMonHoc, $noiDung)
	{
		$data = array(
        'mamonhoc' => $maMonHoc,
        'tieude' => $tieuDe,
        'noiDung' => $noiDung,
        'manguoidang' => $maquantri,
        'ngaydang' => date('Y-m-d H:i:s')
		);
		$this->db->insert('dm_tintuc', $data);
		return true;
	}
	public function xoa($maTinTuc)
	{
		$this->db->delete('dm_tintuc', array('matintuc' => $maTinTuc)); 
		return true;
	}
	public function sua($matintuc,$tieuDe, $noiDung)
	{
		$data = array(
        'tieuDe' => $tieuDe,
        'noiDung' => $noiDung
		);
		$this->db->where('matintuc', $matintuc);
		$this->db->update('dm_tintuc', $data);
		return true;
	}
}
?>