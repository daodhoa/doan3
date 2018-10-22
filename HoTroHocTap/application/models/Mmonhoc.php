<?php
/**
 * 
 */
class Mmonhoc extends CI_Model
{
	public function getDanhSachMonHoc()
	{
		$records = $this->db->get('dm_mon');
		if(empty($records))
		{
			return FALSE;
		}
		return $records;
	}

	public function getThongTinMonHoc($mamon) 
	{
		$this->db->where('mamon', $mamon);
		$records = $this->db->get('dm_mon');
		return $records->row_array();
	}
	public function them($tenmon, $ghichu)
 	{
		$data = array(
			'mamon' => '',
			'tenmon' => $tenmon,
			'ghichu' => $ghichu
		);
		$this->db->insert('dm_mon', $data);
 	}
 	public function xoaMonHoc($mamon)
    {
        // $table = array('dm_nhomcauhoi', 'dm_trangthainopbai', 'tbl_bailam', 'tbl_cautraloi', 'tbl_dapandung', 'tbl_dethi', 'tbl_mathi', 'tbl_nhomcauhoi_mathi', 'tbl_nnhomdethi_manhom','tbl_mathi', 'tbl_nhomdethi', 'tbl_cauhoi', 'dm_mon');
        $this->db->where('mamon', $mamon);
        // var_dump($d1);
        return $this->db->delete('tbl_cauhoi');
    }
    public function suaMonHoc($tenmon, $ghichu)
    {
        $data = array(
        	'mamon' => '',
            'tenmon' => $tenmon,
            'ghichu' => $ghichu
        );
        $this->db->where('mamon', $mamon);
        $this->db->update('dm_mon', $data);
    }
}
?>