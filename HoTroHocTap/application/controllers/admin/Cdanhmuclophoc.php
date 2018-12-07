<?php
/**
 * 
 */
class Cdanhmuclophoc extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Mlophoc');
		$this->load->model('Mmonhoc');
	}

	public function index($mamon)
	{
		$this->load->model('Mkyhoc');
		$lastKH = $this->Mkyhoc->getLast()['makyhoc'];
		$dskyhoc = $this->Mkyhoc->getAll();
		$monhoc = $this->Mmonhoc->chitiet($mamon);

		$where = array();
		$where['mamon'] = $mamon;
		if(isset($_GET['makyhoc']) && $_GET['makyhoc'] != '')
		{
			$where['kyhoc'] = $_GET['makyhoc'];
		}
		else
		{
			$where['kyhoc'] = $lastKH;
		}
		
		$records = $this->Mlophoc->getLophoc($where);

		if($this->input->post('them'))
		{
			$malophoc = $this->input->post('malophoc');
			$kyhoc = $this->input->post('hocky');

			$this->load->library('form_validation');
			$this->form_validation->set_rules('malophoc','Mã lớp học','required|callback_check_malophoc');

			if($this->form_validation->run() != FALSE)
			{	
				$arraythem= array(
					'malophoc' => $malophoc,
					'mamon' => $mamon,
					'kyhoc' => $kyhoc,
					'trangthai' => 1
				);

				if($this->Mlophoc->them($arraythem))
				{
					$data['message'] = array('noidung' => 'Thêm mới thành công', 'kieu' => 1 );
					$records = $this->Mlophoc->getLophoc($where);
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

		$data['kyhoc'] = $dskyhoc;
		$data['records'] =  $records;
		$data['monhoc'] = $monhoc;
		$data['content'] = 'admin/lophoc/view_lophoc_admin';
		$this->load->view('admin/view_layout_admin', $data);
	}

	public function xoa()
	{
		$id_lophoc = $_GET['id'];
		$id_lophoc = intval($id_lophoc);
		if($this->Mlophoc->xoa($id_lophoc))
		{
			$this->session->set_flashdata('message','Xóa lớp học thành công');
		}
		else
		{
			$this->session->set_flashdata('message','Xóa lớp học thất bại');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	function check_malophoc()
	{
		$malophoc = $this->input->post('malophoc');
		$where= array();
		$where['malophoc']= $malophoc;

		if($this->Mlophoc->kiemtra($where))
		{
			$this->form_validation->set_message(__FUNCTION__,'Mã lớp học đã tồn tại');
			return FALSE;
		}
		return true;
	}
}
?>