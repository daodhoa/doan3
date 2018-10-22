<?php
/**
 * 
 */
class Cdanhmucmonhoc extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Mmonhoc');
	}

	public function index()
	{
		$records = $this->Mmonhoc->getDanhSachMonHoc();
		$data = array();
		$data['records'] = $records;
		$data['content'] = 'admin/monhoc/view_monhoc_admin';
		$this->load->view('admin/view_layout_admin', $data);
	}

	public function them()
	{
		
		$this->load->view('admin/monhoc/view_them_monhoc');
		if (isset($_POST["btn_them"])){
			
			$tenmon = $_POST["tenmon"];
			$ghichu =  $_POST["ghichu"];
			
			if ($tenmon == "" || $ghichu == "" ) {
				echo "bạn vui lòng nhập đầy đủ thông tin";
				}else{
					$this->Mmonhoc->them($tenmon, $ghichu);
					// $this->session->set_flashdata
					echo "dang ki thanh cong";
				}
			}
	}
	public function xoa()
    {
        $mamon = $_GET['mamon'];
        // var_dump($mamon);
        $this->Mmonhoc->xoaMonHoc($mamon);
        $this->session->set_flashdata('message', 'Xóa thành công');
        redirect(base_url('admin/Cdanhmucmonhoc'));
    }
    
}
?>