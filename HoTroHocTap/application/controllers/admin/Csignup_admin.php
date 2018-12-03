<?php 
/**
 * 
 */
class Csignup_admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Madmin');
	}

	public function index()
	{	
		$data = array();
		$this->load->library('form_validation');
		if($this->input->post('submit'))
		{
			$this->form_validation->set_rules('tentaikhoan','Tên tài khoản','required|callback_check_tentaikhoan');
			$this->form_validation->set_rules('matkhau','Mật khẩu','required');
			$this->form_validation->set_rules('rematkhau','Nhập lại mật khẩu', 'required|matches[matkhau]');
			$this->form_validation->set_rules('hoten','Họ tên', 'required');

			if($this->form_validation->run() != FALSE)
			{
				$tentaikhoan = $this->input->post('tentaikhoan');
				$matkhau = md5($this->input->post('matkhau'));
				$hoten = $this->input->post('hoten');
				$input = array(
					'tentaikhoan' => $tentaikhoan,
					'matkhau' => $matkhau,
					'hoten' => $hoten,
					'trangthai' => 1,
					'maquyen' => 'giaovien'
				);
				if($this->Madmin->signup($input))
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

		$this->load->view('admin/vsignup_admin', $data);
	}

	function check_tentaikhoan()
	{
		$tentaikhoan = $this->input->post('tentaikhoan');
		$where= array();
		$where['tentaikhoan']= $tentaikhoan;
		if($this->Madmin->kiemtra($where))
		{
			$this->form_validation->set_message(__FUNCTION__,'Tên tài khoản đã tồn tại');
			return FALSE;
		}
		return true;
	}
}
?>