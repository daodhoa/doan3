<?php
/**
  * 
  */
 class Madmin extends CI_Model
 {
 	
 	function __construct()
 	{
 		# code...
 	}

 	public function login($tentaikhoan, $matkhau)
 	{
 		$this->db->where('tentaikhoan', $tentaikhoan);
 		$this->db->where('matkhau', $matkhau);
 		$record = $this->db->get('tbl_quantri');
 		if(empty($record))
 		{
 			return FALSE;
 		}
 		else
 		{
 			return $record->row_array();
 		}
 	}
 } 
?>