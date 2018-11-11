<?php 
class Mthembaigiang extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function insert($arr){
		$this->db->insert('tbl_baigiang', $arr);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
	}
	public function getbg($mabg)
	{
		$this->db->where('tbl_baigiang.mabg',$mabg);
		$this->db->select('tieude,tbl_baigiang.mamon,mabg,noidung,file');
		$this->db->from('tbl_baigiang');
		$query = $this->db->get();
		return $query->row_array();
	}
	public function getBaigiang($mamon)
	{
		if($mamon!=''){
			$this->db->where('tbl_baigiang.mamon',$mamon);
		}
		$this->db->select('tieude,tenmon,tbl_baigiang.mamon,mabg,file');
		$this->db->from('tbl_baigiang');
		$this->db->join('dm_mon','dm_mon.mamon = tbl_baigiang.mamon');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getmon()
	{
		$this->db->select('*');
		$this->db->from('dm_mon');
		$query = $this->db->get();
		return $query->result_array();
	}
}
?>