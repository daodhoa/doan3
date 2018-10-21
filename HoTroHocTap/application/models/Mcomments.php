<?php
/**
 * 
 */
class Mcomments extends CI_Model
{
	public function getDanhSachComments($maTinTuc)
	{
		$this->db->select('*');
		$this->db->from('tbl_comments');
		$this->db->join('tbl_quantri', 'tbl_comments.manguoidang = tbl_quantri.maquantri');
		$this->db->where('matintuc', $maTinTuc);
		$this->db->order_by("ngaydang", "ASC");
		$records =$this->db->get();
		return $records;
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