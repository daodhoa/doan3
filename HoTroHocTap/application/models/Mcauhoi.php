<?php
/**
 * 
 */
class Mcauhoi extends CI_Model
{
	public function getDanhSachCauHoi()
	{
		$this->db->select('*');
		$this->db->from('tbl_cauhoi a');
		$this->db->join('dm_mon b', 'a.mamon = b.mamon', 'left');
		$this->db->join('dm_nhomcauhoi c', 'a.manhom = c.manhom', 'left');
		$query = $this->db->get();
		if(empty($query))
		{
			return FALSE;
		}
		return $query;
	}

	public function insertCauhoi($data)
	{
		$this->db->insert('tbl_cauhoi', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
	}
	public function insertCautraloi($data){
        $this->db->insert('tbl_cautraloi', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }

    public function getThongTinCauHoi($macauhoi)
    {
    	$this->db->select('*');
		$this->db->from('tbl_cauhoi a');
		$this->db->join('dm_mon b', 'a.mamon = b.mamon', 'left');
		$this->db->join('dm_nhomcauhoi c', 'a.manhom = c.manhom', 'left');
		$this->db->where('macauhoi', $macauhoi);
		$query = $this->db->get();
		if(empty($query))
		{
			return FALSE;
		}
		return $query->row_array();
		
    }

    public function getCauTraLoi($macauhoi)
    {
    	$this->db->select('*');
    	$this->db->where('macauhoi', $macauhoi);
    	$query = $this->db->get('tbl_cautraloi');
    	if(empty($query))
    	{
    		return FALSE;
    	}
    	
    	return $query;
    }

    public function getDapAn($macauhoi)
    {
    	$this->db->select('tbl_dapandung.macautraloi, noidung');
    	$this->db->from('tbl_cautraloi');
    	$this->db->join('tbl_dapandung', 'tbl_dapandung.macauhoi= tbl_cautraloi.macauhoi');
    	$this->db->where('tbl_dapandung.macauhoi', $macauhoi);
    	$query = $this->db->get();
    	if(empty($query))
    	{
    		return FALSE;
    	}
    	return $query->row_array();
    }

    public function getDanhSachNhomCauHoi()
    {
        $query = $this->db->get('dm_nhomcauhoi');
        return $query;
    }

    public function xoaCauHoi($macauhoi)
    {
        $table = array('tbl_dapandung', 'tbl_cautraloi', 'tbl_dethi_cauhoi' ,'tbl_cauhoi');
        $this->db->where('macauhoi', $macauhoi);
        return $this->db->delete($table);
    }

    public function suaCauTraLoi($macautraloi, $noidung)
    {
        $data= array(
            'noidung' => $noidung,
        );
        $this->db->where('macautraloi', $macautraloi);
        $this->db->update('tbl_cautraloi', $data);
    }

    public function suaDapAn($macauhoi, $macautraloi)
    {
        $data= array(
            'macautraloi' => $macautraloi
        );
        $this->db->where('macauhoi', $macauhoi);
        $this->db->update('tbl_dapandung', $data);
    }

    public function suaCauHoi($macauhoi, $mucdo, $noidung)
    {
        $data = array(
            'manhom' => $mucdo,
            'noidung' => $noidung
        );
        $this->db->where('macauhoi', $macauhoi);
        $this->db->update('tbl_cauhoi', $data);
    }

    public function check_exist($where = array())
    {
        $this->db->where($where);
        $query = $this->db->get('tbl_cauhoi');
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