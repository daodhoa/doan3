<?php
/**
 * 
 */
class Mcomments extends CI_Model
{
	public function getDanhSachComments($maTinTuc)
	{
		$this->db->select('ngaydang,anhdaidien,tbl_quantri.hoten as tengiaovien,tbl_sinhvien.hoten as tensinhvien,noidung');
		$this->db->from('tbl_comments');
		$this->db->join('tbl_sinhvien', 'tbl_comments.manguoidang = tbl_sinhvien.masinhvien' ,'left');
		$this->db->join('tbl_quantri', 'tbl_comments.manguoidang = tbl_quantri.maquantri','left');	
		$this->db->where('matintuc', $maTinTuc);
		$this->db->order_by("ngaydang", "ASC");
		$records =$this->db->get();

		return $records;
	}
	public function themCommentTinTuc($manguoidang, $matintuc, $noiDung)
	{
		$data = array(
        'matintuc' => $matintuc,
        'noidung' => $noiDung,
        'manguoidang' => $manguoidang,
        'ngaydang' => date('Y-m-d H:i:s')
		);
		$this->db->insert('tbl_comments', $data);
		return true;
	}
}
?>