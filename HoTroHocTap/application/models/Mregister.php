<?php
class Mregister extends CI_Model
 {
 	
 	function __construct()
 	{
 		# code...
 	}

 	public function insertdata($maquantri, $tentaikhoan, $matkhau, $hoten, $trangthai, $maquyen)
 	{
		/*$insertdb = "insert into tbl_quantri values('','".$tentaikhoan."','".$matkhau."','".$hoten."','".$trangthai."','".$maquyen."')";
		$this->db->query($insertdb);*/
		$data = array(
			'maquantri' => $maquantri,
			'tentaikhoan' => $tentaikhoan,
			'matkhau' => md5($matkhau),
			'hoten' => $hoten,
			'trangthai' => $trangthai,
			'maquyen' => $maquyen
		);
		$this->db->insert('tbl_quantri', $data);
 	}
 	public function getdata($id_admin){
 		// $getdb = "select * from tbl_quantri where tentaikhoan='" .$tentaikhoan. "'";
 		$this->db->select('tbl_quantri', $id_admin);
 	}
} 
?>
	
