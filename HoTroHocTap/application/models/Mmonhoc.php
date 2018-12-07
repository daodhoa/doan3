<?php
/**
 * 
 */
class Mmonhoc extends CI_Model
{
	public function UpdateTrangthai($mamon, $masv,$data)
	{
		$this->db->where('id_lophoc',$mamon);
		$this->db->where('masinhvien',$masv);
		$this->db->update('tbl_sinhvien_lophoc',$data);
	}
	public function getDanhSachMonHoc()
	{
		$records = $this->db->get('dm_mon');
		if(empty($records))
		{
			return FALSE;
		}
		return $records;
	}
	public function getSv_lh($masv)
	{
		$this->db->select('*');
		$this->db->from('tbl_sinhvien_lophoc');
		$this->db->where ('masinhvien',$masv);
		$kq = $this->db->get();
		return $kq->result_array();
	}
	public function getDanhSachLopHoc($mamonhoc)
	{
		$this->db->select('*');
		$this->db->from('dm_mon');
		$this->db->join('tbl_lophoc', 'dm_mon.mamon = tbl_lophoc.mamon');
		$this->db->where('manguoidang', $maquantri);
		$records = $this->db->get();
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

	//hòa làm đoạn này đừng có sửa
	public function getListMonHoc($maquantri)
	{
		$this->db->where('manguoitao', $maquantri);
		$records = $this->db->get('dm_mon');
		return $records->result_array();
	}

	public function them($data = array())
 	{
		return $this->db->insert('dm_mon', $data);
 	}

 	public function xoa($mamon)
 	{
 		$this->db->where('mamon', $mamon);
        return $this->db->delete('dm_mon');
 	}
 	public function kiemtra($where = array())
	{
		$this->db->where($where);
        $query = $this->db->get('dm_mon');
        if($query->num_rows() > 0)
        {
        	return TRUE;
        }
        else
        {
            return FALSE;
        }
	}
	public function chitiet($mamon)
	{
		$this->db->where('mamon', $mamon);
		return $this->db->get('dm_mon')->row_array();
	}

	public function capnhat($mamon, $data= array())
	{
		$this->db->where('mamon',$mamon);
		return $this->db->update('dm_mon', $data);	
	}

	public function getListLopHoc($mamon, $makyhoc)
	{
		$this->db->select('tbl_lophoc.*, tenmon, mahocphan');
		$this->db->from('tbl_lophoc');
		$this->db->join('dm_mon', 'tbl_lophoc.mamon = dm_mon.mamon', 'left');
		$this->db->where('tbl_lophoc.mamon', $mamon);
		$this->db->where('kyhoc', $makyhoc);
		$records = $this->db->get();
		$kq = $records->result_array();

		foreach ($kq as $k => $val) {
			$this->db->select('masinhvien,trangthai');
			$this->db->where('tbl_sinhvien_lophoc.id_lophoc',$val['id_lophoc']);
			$this->db->where('masinhvien',$masv);
			$kq[$k]["masinhvien"]= $this->db->get('tbl_sinhvien_lophoc')->result_array();
		}
		return $kq;
	}

	public function getLimitMonhoc($tongso, $batdau)
	{
		$this->db->select('mamon, tenmon, mahocphan, hoten');
		$this->db->from('dm_mon');
		$this->db->join('tbl_quantri', 'dm_mon.manguoitao = tbl_quantri.maquantri');
		$this->db->limit($tongso, $batdau);
       	$query=$this->db->get();
       	return $query->result_array();
	}

	public function countAll()
	{
		return $this->db->count_all('dm_mon');
	}

	public function getdskyhoc()
	{
		return $this->db->get('tbl_kyhoc')->result_array();
	}
	//end
}
?>