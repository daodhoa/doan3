<?php
/**
 * 
 */
class Mkyhoc extends CI_Model
{
	public function getDanhSachTenKyhoc()
	{
		$this->db->distinct();
		$this->db->select('tenkyhoc');
		$records = $this->db->get('tbl_kyhoc');
		if(empty($records))
		{
			return FALSE;
		}
		return $records;
	}
	public function getMaKyhoc($tenky)
	{
		$this->db->select('makyhoc');
		$this->db->where('tenkyhoc', $tenky); 
		$records = $this->db->get('tbl_kyhoc')->row();
		if(empty($records))
		{
			return FALSE;
		}
		return $records->makyhoc;
	}
	public function getTenKyhoc($maKyHoc)
	{
		$this->db->select('tenkyhoc');
		$this->db->where('makyhoc', $maKyHoc); 
		$records = $this->db->get('tbl_kyhoc')->row();
		if(empty($records))
		{
			return FALSE;
		}
		return $records->tenkyhoc;
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
	public function getAll()
	{
		$this->db->order_by('makyhoc', 'desc');
		return $this->db->get('tbl_kyhoc')->result_array();
	}

	public function getLast()
	{
		$this->db->order_by('makyhoc','desc');
		$this->db->limit(1);
       	$query=$this->db->get('tbl_kyhoc');
       	return $query->row_array();
	}

	public function add($tenkyhoc)
	{
		$this->db->insert("tbl_kyhoc", array('tenkyhoc'=>$tenkyhoc, 'trangthai' => 1));
		return $this->db->insert_id();
	}

	public function slkyhoc()
	{
		$this->db->select('COUNT(makyhoc) as slkh');
		$result = $this->db->get('tbl_kyhoc');
		return $result->row_array()['slkh'];
	}
	
	public function kiemtra($where = array())
	{
		$this->db->where($where);
        $query = $this->db->get('tbl_kyhoc');
        if($query->num_rows() > 0)
        {
        	return TRUE;
        }
        else
        {
            return FALSE;
        }
	}

	public function chitiet($makyhoc)
	{
		$this->db->where('makyhoc', $makyhoc);
		return $this->db->get('tbl_kyhoc')->row_array();
	}

	public function capnhat($makyhoc, $tenkyhoc)
	{
		$data = array('tenkyhoc' => $tenkyhoc);
		$this->db->where('makyhoc',$makyhoc);
		return $this->db->update('tbl_kyhoc', $data);	
	}
}
?>