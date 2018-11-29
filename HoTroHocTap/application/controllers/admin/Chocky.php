<?php
/**
 * 
 */
class Chocky extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Mkyhoc');
	}

	public function index()
	{
		$records = $this->Mkyhoc->getAll();
		$data = array();
		$data['records'] = $records;

		if($this->input->post('them'))
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('tenhocky','Tên học kỳ','required|callback_check_tenhocky');

			if($this->form_validation->run() != FALSE)
			{
				$tenhocky = $this->input->post('tenhocky');
				
				if($this->Mkyhoc->add($tenhocky))
				{
					$data['message'] = array('noidung' => 'Thêm mới thành công', 'kieu' => 1 );
					$data['records'] = $this->Mkyhoc->getAll();
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
			$mahocky = $this->input->post('makyhoc');
			$tenhocky = $this->input->post('tenhocky');

			if($this->Mkyhoc->kiemtra(array('tenkyhoc' => $tenhocky )))
			{
				$this->session->set_flashdata('message','Học kỳ đã tồn tại, cập nhật thất bại');
			}
			else
			{
				if($this->Mkyhoc->capnhat($mahocky, $tenhocky))
				{
					$data['message'] = array('noidung' => 'Cập nhật thành công', 'kieu' => 1 );
					$data['records'] = $this->Mkyhoc->getAll();
				}
				else
				{
					$data['message'] = array('noidung' => 'Cập nhật thất bại, vui lòng thử lại', 'kieu' => 0 );
				}
			}
			
		}

		$data['content'] = 'admin/hocky/v_hocky';
		$this->load->view('admin/view_layout_admin', $data);
	}

	function check_tenhocky()
	{
		$tenhocky = $this->input->post('tenhocky');
		$where= array();
		$where['tenkyhoc']= $tenhocky;
		if($this->Mkyhoc->kiemtra($where))
		{
			$this->form_validation->set_message(__FUNCTION__,'Học kỳ đã tồn tại');
			return FALSE;
		}
		return true;
	}

	public function chitiet($mahocky)
	{
		$chitiet = $this->Mkyhoc->chitiet($mahocky);
		echo json_encode($chitiet);
	}
}
?>