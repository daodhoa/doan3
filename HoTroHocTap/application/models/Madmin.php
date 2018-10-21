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

 	function capma($truongmuonlay,$bangmuonlay)
		{
			$sql = "select $truongmuonlay from $bangmuonlay where SUBSTR($truongmuonlay,3)=(select MAX(SUBSTR($truongmuonlay,3)*1.0) from $bangmuonlay)";
			$query=$this->db->query($sql)->result_array();
			if(!empty($query)){
				return $query[0];
			}else{
				return null;
			}
			
		}
		
		function get_by_id($table_name,$key_table,$key_cmp)
		{
			$this->db->where($key_table,$key_cmp);
			return $this->db->get($table_name)->result_array();
		}

		function get_all($table_name)
		{
			return $this->db->get($table_name)->result_array();
		}

		function insert($table_name,$array)
		{
			$this->db->insert($table_name,$array);
			return $this->db->affected_rows();
		}
		
		function update($table_name,$array,$key_of_table,$key_cmp)
		{
			$this->db->where($key_of_table,$key_cmp);
			$this->db->update($table_name,$array);
			return $this->db->affected_rows();
		}
		
		function del($table_name,$key_of_table,$key_cmp)
		{
			$this->db->where($key_of_table,$key_cmp);
			$this->db->delete($table_name);
			return $this->db->affected_rows();
		}
		
		function sql($sql)
		{
			return $this->db->query($sql)->result_array();
		}

		function check_user($dk1,$dk2)
		{
			$this->db->where('email',$dk1);
			$this->db->where('tentaikhoan',$dk2);
			$query = $this->db->get('tbl_user');
			return $query->result_array();
		}

		function get_like($table,$key, $like)
		{
			$this->db->like($key, $like); 
			$query = $this->db->get($table);
			return $query->result_array();
		}
 } 
?>