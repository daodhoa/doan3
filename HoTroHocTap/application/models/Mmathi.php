<?php
/**
  * 
  */
 class Mmathi extends CI_Model
 {
 	public function getListMathi($maquantri)
    {
        $this->db->select('tbl_mathi.*, dm_mon.tenmon');
        $this->db->from('tbl_mathi');
        $this->db->where('maquantri',$maquantri);
        $this->db->join('dm_mon','dm_mon.mamon = tbl_mathi.mamon','inner');
        $this->db->order_by('tbl_mathi.thoigiantao','desc');
        $data = $this->db->get()->result_array();
        foreach($data as $k=>$v)
        {
            $this->db->select('sum(soluongcauhoi) as slc');
            $this->db->from('tbl_nhomcauhoi_mathi');
            $this->db->where('mathi',$v['mathi']);
            $data[$k]['slc'] = $this->db->get()->row_array()['slc'];
        }
        return $data;
    }

    public function getslloaicauhoi($mamon)
    {
        $this->db->select('tbl_cauhoi.manhom,count(tbl_cauhoi.macauhoi) as SL,dm_nhomcauhoi.ghichu');
        $this->db->from('tbl_cauhoi');
        $this->db->join('dm_nhomcauhoi','dm_nhomcauhoi.manhom = tbl_cauhoi.manhom','inner');
        $this->db->where('tbl_cauhoi.mamon',$mamon);
        $this->db->group_by('dm_nhomcauhoi.stt');
        return $this->db->get()->result_array();
    }

    public function changeStatus($mathi)
    {
        $this->db->select('trangthai');
        $this->db->from('tbl_mathi');
        $this->db->where('mathi', $mathi);
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
        $this->db->where('mathi', $mathi);
        $this->db->update('tbl_mathi', $data);
    }
 } 
?>