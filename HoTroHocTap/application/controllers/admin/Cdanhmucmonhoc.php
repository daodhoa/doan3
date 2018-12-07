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
		$maquantri = $this->session->userdata('maquantri');
		$records = $this->Mmonhoc->getListMonHoc($maquantri);
		$data = array();
		$data['records'] = $records;

		if($this->input->post('them'))
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('mahocphan','Mã học phần','required|callback_check_mahocphan');

			if($this->form_validation->run() != FALSE)
			{
				$tenmon = $this->input->post('tenmon');
				$mahocphan = $this->input->post('mahocphan');
				
				$where= array(
					'tenmon' => $tenmon,
					'mahocphan' => $mahocphan,
					'manguoitao' => $maquantri
				);

				if($this->Mmonhoc->them($where))
				{
					$data['message'] = array('noidung' => 'Thêm mới thành công', 'kieu' => 1 );
					$data['records'] = $this->Mmonhoc->getListMonHoc($maquantri);
				}
				else
				{
					$data['message'] = array('noidung' => 'Thêm mới thất bại, vui lòng thử lại', 'kieu' => 0 );
				}
			}
			else
			{
				$data['message'] = array('noidung' => 'Thêm mới thất bại, vui lòng thử lại', 'kieu' => 0 );
			}
		}

		if($this->input->post('sua'))
		{
			$mamon = $this->input->post('mamon');
			$tenmon = $this->input->post('tenmon');
			$mahocphan = $this->input->post('mahocphan');

			$mahocphancu = $this->Mmonhoc->chitiet($mamon)['mahocphan'];

			if($mahocphan != $mahocphancu)
			{
				

				$this->load->library('form_validation');
				$this->form_validation->set_rules('mahocphan','Mã học phần','required|callback_check_mahocphan');
				if($this->form_validation->run() != FALSE)
				{
					$tenmon = $this->input->post('tenmon');
					$mahocphan = $this->input->post('mahocphan');
					
					$where= array(
						'tenmon' => $tenmon,
						'mahocphan' => $mahocphan
					);

					if($this->Mmonhoc->capnhat($mamon,$where))
					{
						$data['message'] = array('noidung' => 'Cập nhật thành công', 'kieu' => 1 );
						$data['records'] = $this->Mmonhoc->getListMonHoc($maquantri);
					}
					else
					{
						$data['message'] = array('noidung' => 'Cập nhật thất bại, vui lòng thử lại', 'kieu' => 0 );
					}
				}
				else
				{
					$data['message'] = array('noidung' => 'Cập nhật thất bại: Mã học phần đã tồn tại', 'kieu' => 0 );
				}
			}
			else
			{
				$tenmon = $this->input->post('tenmon');
				$where= array(
					'tenmon' => $tenmon
				);
				if($this->Mmonhoc->capnhat($mamon,$where))
				{
					$data['message'] = array('noidung' => 'Cập nhật thành công', 'kieu' => 1 );
					$data['records'] = $this->Mmonhoc->getListMonHoc($maquantri);
				}
				else
				{
					$data['message'] = array('noidung' => 'Cập nhật thất bại, vui lòng thử lại', 'kieu' => 0 );
				}
			}
		}



		$data['content'] = 'admin/monhoc/view_monhoc_admin';
		$this->load->view('admin/view_layout_admin', $data);
	}

	function check_mahocphan()
	{
		$maquantri = $this->session->userdata('maquantri');
		$mahocphan = $this->input->post('mahocphan');
		$where= array();

		$where['mahocphan']= $mahocphan;
		$where['manguoitao'] = $maquantri;
		if($this->Mmonhoc->kiemtra($where))
		{
			$this->form_validation->set_message(__FUNCTION__,'Học phần đã tồn tại');
			return FALSE;
		}
		return true;
	}

	public function chitiet($mamon)
	{
		$chitiet = $this->Mmonhoc->chitiet($mamon);
		echo json_encode($chitiet);
	}


	////////////////////////////////////////////////////////

	public function xoa()
    {
        $mamon = $_GET['mamon'];
        $mamon = intval($mamon);

        if($this->Mmonhoc->xoa($mamon))
        {
        	$this->session->set_flashdata('message','Xóa môn học thành công');
        }
        else
        {
        	$this->session->set_flashdata('message','Xóa môn học thất bại, vui lòng thử lại');
        }
        redirect(base_url('admin/Cdanhmucmonhoc'));
    }
}
?>