<?php 
/**
 * 
 */
class Msinhvien extends CI_Model
{
	public function login($email, $matkhau)
 	{
 		$this->db->where('email', $email);
 		$this->db->where('matkhau', $matkhau);
 		$record = $this->db->get('tbl_sinhvien');
 		if(empty($record))
 		{
 			return FALSE;
 		}
 		else
 		{
 			return $record->row_array();
 		}
 	}

	public function dangky($input = array())
	{
		return $this->db->insert('tbl_sinhvien', $input);
	}

	public function kiemtra($where = array())
	{
		$this->db->where($where);
        $query = $this->db->get('tbl_sinhvien');
        if($query->num_rows() > 0)
        {
        	return TRUE;
        }
        else
        {
            return FALSE;
        }
	}
}
?>