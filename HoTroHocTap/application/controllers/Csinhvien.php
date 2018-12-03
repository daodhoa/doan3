<?php
/**
 * 
 */
class Csinhvien extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Msinhvien');
	}

	public function index()
	{
		$masinhvien = $this->session->userdata('masinhvien');
		$profile = $this->Msinhvien->thongtin($masinhvien);

		$data['profile'] = $profile;
		$data['content'] = 'sinhvien/student/profile';
		$this->load->view('sinhvien/view_layout_sv', $data);
	}

	public function thongtincanhan()
	{
		$masinhvien = $this->session->userdata('masinhvien');
		$profile = $this->Msinhvien->thongtin($masinhvien);

		echo json_encode($profile);
	}

	public function capnhatthongtin()
	{
		$masinhvien = $this->session->userdata('masinhvien');

		$email = $this->input->post('email');
		$hoten = $this->input->post('hoten');
		$ngaysinh = $this->input->post('ngaysinh');
		$matkhau = $this->input->post('matkhau');
		$gender = $this->input->post('gender');

		$data = array(
			'email' => $email,
			'hoten' => $hoten,
			'ngaysinh' => $ngaysinh,
			'gioitinh' => $gender
		);
		if($matkhau != "")
		{
			$data['matkhau'] = md5($matkhau);
		}

		if($this->Msinhvien->capnhatthongtin($masinhvien, $data))
		{
			echo "Cập nhật thành công";
		}
		else
		{
			echo "Có lỗi khi cập nhật thông tin";
		}

	}

	public function capnhatanhdaidien()
	{
		$masinhvien = $this->session->userdata('masinhvien');
		$thongtin = $this->Msinhvien->thongtin($masinhvien);
		$anhcu = $thongtin['anhdaidien'];

		if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
	    }
	    else {
	    	$name = $_FILES['file']['name'];
	    	$tmp_name = $_FILES['file']['tmp_name'];
	    	$dir= './attachment/avatar/';
	    	$destination = $dir.$name;

	    	$data= array();
	    	if(move_uploaded_file($tmp_name, $destination))
			{
				unlink($dir.$anhcu);
				$data['anhdaidien'] = $name;
			}
			if($this->Msinhvien->capnhatthongtin($masinhvien, $data))
			{
				echo $name;
			}

	    }
	}
}
?>