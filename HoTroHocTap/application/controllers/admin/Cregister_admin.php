<?php
/**
 * 
 */
class CRegister_admin extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Mregister');
	}

	public function index()
	{
		$this->load->view('admin/view_register');
	
		if (isset($_POST["btn_submit"])){
			$maquantri = $_POST["maquantri"];
			$tentaikhoan =  $_POST["tentaikhoan"];
			$matkhau = md5($_POST["matkhau"]);
			$hoten = $_POST["hoten"];
			$trangthai = $_POST["trangthai"];
			$maquyen = $_POST["maquyen"];
			
			if ($maquantri == "" || $tentaikhoan == "" || $matkhau == "" || $hoten == "" || $trangthai == "" || $maquyen == "") {
				echo "bạn vui lòng nhập đầy đủ thông tin";
				}else{
					if($this->Mregister->getdata($maquantri)){
						echo "tai khoan da ton tai";
					}else{
						$this->Mregister->insertdata($maquantri, $tentaikhoan, $matkhau,$hoten, $trangthai, $maquyen);
						$this->load->view('admin/view_layout_admin');
					}
				}
		}
	}
}
?>