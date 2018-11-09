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
		if(ISSET($_POST["btn_them"]))
		{
			$mamon = $_POST["mamon"];
			$tenmon = $_POST["tenmon"];
			$mahocphan = $_POST["mahocphan"];
			$manguoitao = $_POST["manguoitao"];
			$this->Mmonhoc->them($mamon, $tenmon, $mahocphan, $manguoitao);
            redirect(base_url('admin/Cdanhmucmonhoc'));
		}
	}

	public function sua()
	{
		$mamon = $_GET["mamon"];
		$this->load->view('admin/monhoc/view_sua_monhoc', $mamon);
		if(ISSET($_POST["btn_sua"]))
		{
			$tenmon = $_POST["tenmon"];
			$mahocphan = $_POST["mahocphan"];
			$manguoitao = $_POST["manguoitao"];
			$this->Mmonhoc->suaMonHoc($mamon, $tenmon, $mahocphan, $manguoitao);
            redirect(base_url('admin/Cdanhmucmonhoc'));
		}
	}

	public function xoa()
    {
        $mamon = $_GET['mamon'];
        $this->Mmonhoc->xoaMonHoc($mamon);
        // $this->session->set_flashdata('message', 'Xóa thành công');
        redirect(base_url('admin/Cdanhmucmonhoc'));
    }
}
?>