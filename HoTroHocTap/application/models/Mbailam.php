<?php 
/**
 * 
 */
class Mbailam extends CI_Model
{
	public function thembailam($mang= array())
	{
		return $this->db->insert('tbl_bailam', $mang);
	}

	public function xembailam($mang = array())
	{
		$this->db->where($mang);
		$record = $this->db->get('tbl_bailam');

		return $record->row_array();
	}

	public function kiemtra($where = array())
	{
		$this->db->where($where);
        $query = $this->db->get('tbl_bailam');
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