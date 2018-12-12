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

	public function thongtin($masinhvien)
	{
		$this->db->where('masinhvien', $masinhvien);
		$record = $this->db->get('tbl_sinhvien');
		return $record->row_array();
	}

	public function capnhatthongtin($masinhvien,$data = array())
	{
		$this->db->where('masinhvien', $masinhvien);
		return $this->db->update('tbl_sinhvien', $data);
	}

	public function dslopthamgia($masinhvien, $thamgia)
	{
		$this->db->select('tenmon, malophoc');
		$this->db->from('dm_mon a');
		$this->db->join('tbl_lophoc b', 'a.mamon = b.mamon', 'left');
		$this->db->join('tbl_sinhvien_lophoc c', 'b.id_lophoc = c.id_lophoc', 'left');
		$this->db->where('masinhvien', $masinhvien);
		$this->db->where('c.trangthai', $thamgia);
		$records = $this->db->get()->result_array();
		return $records;
	}
}
?>