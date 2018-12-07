<?php
/**
 * 
 */
class Mlophoc extends CI_Model
{

	public function getLimitDethi($malop, $tongso)
	{
		$this->db->select('madethi, thoigianlambai, tbl_dethi.trangthai, thoigiantao');
		$this->db->from('tbl_dethi');
		$this->db->join('tbl_lophoc', 'tbl_dethi.mamon = tbl_lophoc.mamon','left');
		$this->db->where('malophoc', $malop);
		$this->db->order_by('thoigiantao','desc');
		$this->db->limit($tongso);
       	$query=$this->db->get();
       	return $query->result_array();
	}

	public function getDanhsachDethi($malop)
	{
		$this->db->select('tbl_dethi.*');
		$this->db->from('tbl_dethi');
		$this->db->join('tbl_lophoc', 'tbl_dethi.mamon = tbl_lophoc.mamon','left');
		$this->db->where('malophoc', $malop);
		$this->db->order_by('thoigiantao','desc');
		$query=$this->db->get();
       	return $query->result_array();
	}

	public function getDanhSachLopHoc()
	{
		$records = $this->db->get('tbl_lophoc');
		if(empty($records))
		{
			return FALSE;
		}
		return $records;
	}

	public function getLophoc($where= array())
	{
		$this->db->where($where);
		return $this->db->get('tbl_lophoc')->result_array();
	}

	public function getDanhSachLopHoc1($mamonhoc,$makyhoc,$maquantri)
	{

		$this->db->select('tbl_lophoc.malophoc');
		$this->db->where('kyhoc', $makyhoc);
		$this->db->where('magiangvien', $maquantri);
		$this->db->where('mamon', $mamonhoc);
		$record = $this->db->get('tbl_lophoc');
		if(empty($record))
		{
			return FALSE;
		}
		return $record;
	}
	public function getDanhSachKyhoc()
	{
		$this->db->distinct();
		$this->db->select('kyhoc');
		$records = $this->db->get('tbl_lophoc');
		if(empty($records))
		{
			return FALSE;
		}
		return $records;
	}
	
	public function them($data = array())
 	{
		return $this->db->insert('tbl_lophoc', $data);
 	}

 	public function xoa($id)
 	{
 		$this->db->where('id_lophoc', $id);
        return $this->db->delete('tbl_lophoc');
 	}

	public function kiemtra($where = array())
	{
		$this->db->where($where);
        $query = $this->db->get('tbl_lophoc');
        if($query->num_rows() > 0)
        {
        	return TRUE;
        }
        else
        {
            return FALSE;
        }
	}

	public function getdssv($id_lophoc)
	{
		$this->db->where('id_lophoc',$id_lophoc);
		$records = $this->db->get('tbl_sinhvien_lophoc');
		return $records->result_array();
	}

	public function importSV($data)
	{
		$this->db->insert('tbl_sinhvien_lophoc', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
	}

	public function check_exist($where = array())
    {
        $this->db->where($where);
        $query = $this->db->get('tbl_sinhvien_lophoc');
        if($query->num_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function xoaSVLH($data= array())
    {
    	$this->db->where($data);
        return $this->db->delete('tbl_sinhvien_lophoc');
    }

}
?>