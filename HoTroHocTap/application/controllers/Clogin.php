<?php
/**
 * 
 */
class Clogin extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Msinhvien');
		if($this->session->userdata('masinhvien') != "")
		{
			redirect(base_url());
		}
	}

	public function index()
	{

		$this->load->library('form_validation');

		if($this->input->post('dangnhap'))
		{
			$tentaikhoan = $this->input->post('email');
			$matkhau = $this->input->post('matkhau');
			$matkhau = md5($matkhau);

			$record = $this->Msinhvien->login($tentaikhoan, $matkhau);
			if($record == FALSE ){
				$this->session->set_flashdata('error_login', 'Sai tài khoản hoặc mật khẩu.');
				redirect(base_url('clogin'));
			}
			else
			{
				$this->session->set_userdata('masinhvien', $record['masinhvien']);
				$this->session->set_userdata('hoten', $record['hoten']);
				redirect(base_url().'Chome');
			}
		}

		if($this->input->post('dangky'))
		{
			$this->form_validation->set_rules('email','Email','required|valid_email|callback_check_email');
			$this->form_validation->set_rules('matkhau','Mật khẩu','required');
			$this->form_validation->set_rules('rematkhau','Nhập lại mật khẩu', 'required|matches[matkhau]');
			$this->form_validation->set_rules('masinhvien','Mã số sinh viên', 'required|callback_check_mssv');
			$this->form_validation->set_rules('hoten','Họ tên', 'required');

			if($this->form_validation->run() != FALSE)
			{
				$email = $this->input->post('email');
				$matkhau = md5($this->input->post('matkhau'));
				$hoten = $this->input->post('hoten');
				$masinhvien = $this->input->post('masinhvien');
				$ngaysinh = $this->input->post('ngaysinh');
				$gioitinh = $this->input->post('gioitinh');

				$input = array(
					'email' => $email,
					'matkhau' => $matkhau,
					'hoten' => $hoten,
					'masinhvien' => $masinhvien,
					'ngaysinh' => $ngaysinh,
					'gioitinh' => $gioitinh
				);

				if(file_exists($_FILES['anhdaidien']['tmp_name']))
				{
					$name = $_FILES['anhdaidien']['name'];
					$tmp_name = $_FILES['anhdaidien']['tmp_name'];
					$dir= './anhdaidien/';
					$destination = $dir.$name;
					if(move_uploaded_file($tmp_name, $destination))
					{
						$input['anhdaidien'] = $name;
					}
				}
				
				if($this->Msinhvien->dangky($input))
				{
					$data['message'] = array('noidung' => 'Đăng ký thành công', 'kieu' => 1 );
				}
				else
				{
					$data['message'] = array('noidung' => 'Đăng ký thất bại, vui lòng thử lại', 'kieu' => 0 );
				}

			}
			else
			{
				$data['message'] = array('noidung' => 'Đăng ký thất bại, vui lòng thử lại', 'kieu' => 0 );
			}

		}

		$data['content'] = 'sinhvien/student/vlogin';
		$data['slide'] = 'sinhvien/student/student_title';
		$this->load->view('sinhvien/view_layout_sv', $data);
	}

	function check_email()
	{
		$email = $this->input->post('email');
		$where= array();
		$where['email']= $email;
		if($this->Msinhvien->kiemtra($where))
		{
			$this->form_validation->set_message(__FUNCTION__,'Email đã tồn tại');
			return FALSE;
		}
		return true;
	}

	function check_mssv()
	{
		$masinhvien = $this->input->post('masinhvien');
		$where= array();
		$where['masinhvien']= $masinhvien;
		if($this->Msinhvien->kiemtra($where))
		{
			$this->form_validation->set_message(__FUNCTION__,'Mã sinh viên đã tồn tại');
			return FALSE;
		}
		return true;
	}
}
?>