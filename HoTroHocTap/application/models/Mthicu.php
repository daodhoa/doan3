<?php
/**
 * 
 */
class Mthicu extends CI_Model
{
	public function layDanhSachDeThi($maquantri)
	{
		$this->db->select('a.*, b.tenmon');
		$this->db->from('tbl_dethi a');
		$this->db->join('dm_mon b', 'a.mamon = b.mamon', 'left');
		$this->db->join('tbl_quantri c', 'b.manguoitao = c.maquantri', 'left');
		$this->db->where('c.maquantri', $maquantri);
        $data = $this->db->get()->result_array();
        return $data;
	}

    public function getChitietdethi($madethi)
    {
        $this->db->select('madethi, tenmon,mahocphan, thoigiantao, thoigianlambai');
        $this->db->from('tbl_dethi');
        $this->db->join('dm_mon', 'tbl_dethi.mamon = dm_mon.mamon', 'left');
        return $this->db->get()->row_array();
    }

	public function xoaDethi($madethi)
	{
		$table = array('tbl_dethi_cauhoi', 'tbl_dethi');
        $this->db->where('madethi', $madethi);
        return $this->db->delete($table);
	}

	public function taoDsCauHoi($mamon,$manhom, $soluong)
	{
		$this->db->select('macauhoi');
		$this->db->where('mamon', $mamon);
		$this->db->where('manhom',$manhom);
		$this->db->order_by('rand()');
    	$this->db->limit($soluong);
    	$query = $this->db->get('tbl_cauhoi');
    	return $query->result_array();
	}

	public function demslch($mamon, $manhom)
	{
		$this->db->select('COUNT(macauhoi) as slc');
		$this->db->where('mamon', $mamon);
		$this->db->where('manhom',$manhom);
		$result = $this->db->get('tbl_cauhoi');
		return $result->row_array()['slc'];
	}

	public function insertDethi($data = array())
	{
		return $this->db->insert('tbl_dethi', $data);
	}

	public function insertDethiCauhoi($data = array())
	{
		return $this->db->insert('tbl_dethi_cauhoi', $data);
	}

	public function changeStatus($madethi)
    {
        $this->db->select('trangthai');
        $this->db->from('tbl_dethi');
        $this->db->where('madethi', $madethi);
        $trangthai = $this->db->get()->row_array()['trangthai'];

        $data = array();
        if($trangthai == 1)
        {
            $data['trangthai'] = 0;
        }
        else
        {
            $data['trangthai'] = 1;
        }
        $this->db->where('madethi', $madethi);
        return $this->db->update('tbl_dethi', $data);
    }

    public function getCauhoiDethi($madethi)
    {
    	$this->db->select('a.madethi, c.macauhoi, c.noidung');
    	$this->db->from('tbl_dethi a');
    	$this->db->join('tbl_dethi_cauhoi b', 'a.madethi = b.madethi', 'left');
    	$this->db->join('tbl_cauhoi c', 'b.macauhoi=c.macauhoi', 'left');
    	$this->db->where('a.madethi', $madethi);
    	$this->db->order_by('rand()');
    	$result = $this->db->get();
    	return $result->result_array();
    }
    
    public function getCauTraLoi($macauhoi)
    {
    	$this->db->select('macautraloi, noidung');
    	$this->db->where('macauhoi', $macauhoi);
    	$record = $this->db->get('tbl_cautraloi');
    	return $record->result_array();
    }

    public function getDapandung($macauhoi)
    {
    	$this->db->where('macauhoi', $macauhoi);
    	return $this->db->get('tbl_dapandung')->row_array();
    }

}
?>