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
	public function suaMonHoc($mamon, $tenmon, $mahocphan, $manguoitao)
    {
        $data = array(
            'tenmon' => $tenmon,
            'mahocphan' => $mahocphan,
            'manguoitao' => $manguoitao
        );
        $this->db->where('mamon', $mamon);
        $this->db->update('dm_mon', $data);
    }
    public function them($mamon, $tenmon, $mahocphan, $manguoitao)
 	{
		$data = array(
			'mamon' => $mamon,
			'tenmon' => $tenmon,
			'mahocphan' => $mahocphan,
			'manguoitao' => $manguoitao
		);
		$this->db->insert('dm_mon', $data);
 	}
 	public function xoaMonHoc($mamon)
    {
        $table = array('dm_mon');
        $this->db->where('mamon', $mamon);
        return $this->db->delete($table);
    }

}
?>