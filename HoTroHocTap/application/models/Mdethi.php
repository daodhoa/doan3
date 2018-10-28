<?php
/**
 * 
 */
class Mdethi extends CI_Model
{
	function get_dapan($macauhoi)
    {
        $sql = "select * from tbl_dapandung where macauhoi in (".$macauhoi.")";
        $data = $this->db->query($sql)->result_array();
        return $data;
    }

    function insertDethi($data)
    {
        $this->db->insert_batch('tbl_dethi', $data);
    }

    function getMathi($mathi)
    {
        $this->db->select('tbl_mathi.*, dm_mon.tenmon');
        $this->db->from('tbl_mathi');
        $this->db->where('tbl_mathi.mathi',$mathi);
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

    function deleteDeThi($manhomde)
    {
        $this->db->where('manhomde',$manhomde);
        $this->db->delete('tbl_dethi');
    }

    function get_cauhoi($manhom,$slcauhoi,$mamon)
    {
        $sql = "select macauhoi,noidung from tbl_cauhoi where mamon = ? and manhom = ? order by rand() limit ".$slcauhoi;
        return $this->db->query($sql,array($mamon,$manhom))->result_array();
    }

    function get_dscautraloi($mangcauhoi)
    {
        $this->db->select('macautraloi,macauhoi,noidung');
        $this->db->from('tbl_cautraloi');
        $this->db->where_in('macauhoi', $mangcauhoi);
        $this->db->order_by('rand()');
        return $this->db->get()->result_array();
    }

    /////////////////////////////////////////////////////

    function insertnhomde($data)
    {
        $this->db->insert('tbl_nhomdethi',$data);
        $data1['id'] = $this->db->insert_id();
        $data1['af'] = $this->db->affected_rows();
        return $data1;
    }

    function getListDethi($maquantri)
    {
        $this->db->select('tbl_nhomdethi.*, dm_mon.tenmon');
        $this->db->from('tbl_nhomdethi');
        $this->db->where('maquantri',$maquantri);
        $this->db->join('dm_mon','dm_mon.mamon = tbl_nhomdethi.mamon','inner');
        $this->db->order_by('tbl_nhomdethi.thoigiantao','desc');
        $data = $this->db->get()->result_array();
        foreach($data as $k=>$v)
        {
            $this->db->select('sum(soluongcauhoi) as slc');
            $this->db->from('tbl_nhomdethi_manhom');
            $this->db->where('manhomde',$v['manhomde']);
            $data[$k]['slc'] = $this->db->get()->row_array()['slc'];
        }
        return $data;
    }
}
?>