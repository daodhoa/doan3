<?php 
/**
 * 
 */
class Cdanhmucmathi extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Mmathi');
	}

	public function index()
	{
		$this->load->model('Mmonhoc');
		$dsmonhoc = $this->Mmonhoc->getListMonHoc($this->session->userdata('maquantri'));
		$dsmathi = $this->Mmathi->getListMathi($this->session->userdata('maquantri'));
		$data= array();
		$data['dsmonhoc'] = $dsmonhoc;
		$data['mathimoi'] = substr(time(), 5);
		$data['dsmathi'] =  $dsmathi;
		$data['content'] = 'admin/mathi/view_mathi_admin';
		$this->load->view('admin/view_layout_admin', $data);
	}

	public function changeStatus($mathi)
	{
		$this->Mmathi->changeStatus($mathi);
		echo json_encode(array("status" => TRUE));
	}

	public function them()
	{
		
		$this->load->model('Mmonhoc');
		if($this->input->post('luu'))
		{
			$mamon = $this->input->post('monhoc');
			$ghichu = $this->Mmonhoc->getThongTinMonHoc($mamon)->ghichu;
			$dataIs['mathi'] = $ghichu.$this->input->post('mathi');
            $dataIs['mamon'] = $mamon;
            $dataIs['thoigianlambai'] = $this->input->post('thoigianlambai');
            $dataIs['thoigiantao'] = date("d/m/Y h:i",time());
            $dataIs['maquantri'] = $this->session->userdata('maquantri');
            
            if($this->IUD('insert','tbl_mathi','','',$dataIs,'') > 0)
            {
                $soluongcauhoi = $this->input->post('slcauhoi');
                if(!empty($soluongcauhoi))
                {
                    foreach($soluongcauhoi as $k=>$v)
                    {
                        $i['mathi'] = $dataIs['mathi'];
                        $i['manhom'] = $k;
                        $i['soluongcauhoi'] = $v;
                        $this->IUD('insert','tbl_nhomcauhoi_mathi','','',$i,'');
                    }
                }

                $this->session->set_flashdata('thongbao','Thêm mã thi thành công');
            }
            
		}

		redirect(base_url('admin/cdanhmucmathi'));
	}

}
?>