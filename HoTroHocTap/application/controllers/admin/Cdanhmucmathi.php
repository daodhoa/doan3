<?php 
/**
 * 
 */
class Cdanhmucmathi extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Mthicu');
	}

	public function index()
	{
		
		$this->load->model('Mmonhoc');
		$dsmonhoc = $this->Mmonhoc->getListMonHoc($this->session->userdata('maquantri'));
		$dsdethi = $this->Mthicu->layDanhSachDeThi($this->session->userdata('maquantri'));
		//print_r($dsmonhoc);
		//print_r($dsdethi);


		$data= array();
		$data['dsmonhoc'] = $dsmonhoc;
		$data['mathimoi'] = substr(time(), 5);
		$data['dsdethi'] =  $dsdethi;
		
		$this->load->library('form_validation');
		if($this->input->post('luu'))
		{
			$this->form_validation->set_rules('slcauhoi','Số lượng câu hỏi', 
			'callback_check_slch');
			if($this->form_validation->run() != FALSE)
			{
				$mamon = $this->input->post('monhoc');
				$madethi = $this->input->post('mathi');
				$slcauhoi = $this->input->post('slcauhoi');
				$thoigianlambai = $this->input->post('thoigianlambai');
				
				$this->Mthicu->insertDethi(array(
					'madethi' => $madethi,
					'mamon' => $mamon,
					'thoigianlambai' => $thoigianlambai,
					'trangthai' => 1,
					'thoigiantao' => date("Y/m/d H:i",time())
				));
				
				$arrayCauhoi = array();
				foreach ($slcauhoi as $key => $value) {
					if($value > 0)
					{
						$arrayCauhoi = $this->Mthicu->taoDsCauHoi($mamon, $key, $value);
						foreach ($arrayCauhoi as $row) {
							$this->Mthicu->insertDethiCauhoi(array(
								'madethi' => $madethi,
								'macauhoi' => $row['macauhoi']
							));
						}
					}
				}

				$this->session->set_flashdata('message', 'thêm mới thành công');
				redirect(base_url('admin/Cdanhmucmathi'));
			}	
		}

			$data['content'] = 'admin/dethicu/view_dethi_admin';
			$this->load->view('admin/view_layout_admin', $data);
	}

	public function changeStatus($madethi)
	{
		$result = $this->Mthicu->changeStatus($madethi);
		echo json_encode(array("status" => TRUE));
	}

	function check_slch()
	{
		$slcauhoi = $this->input->post('slcauhoi');
			$mamon = $this->input->post('monhoc');
			$de = $this->Mthicu->demslch($mamon, 'de');
			$tb = $this->Mthicu->demslch($mamon, 'tb');
			$kho = $this->Mthicu->demslch($mamon, 'kho');
			$khohn = $this->Mthicu->demslch($mamon, 'khohn');

			$flag = TRUE;

		if(empty($slcauhoi))
		{
			$this->form_validation->set_message(__FUNCTION__, '1 đề thi phải chứa ít nhất 1 câu hỏi');
			return FALSE;
		}

		foreach ($slcauhoi as $key => $value) {
			if($this->Mthicu->demslch($mamon, $key) < $value){
				$flag = FALSE;
				break;
			}
		}

		if($flag==FALSE){
			$this->form_validation->set_message(__FUNCTION__,'Số câu hỏi tối đa: Dễ: '.$de.', trung bình: '.$tb.' khó: '.$kho.',  khó hơn: '.$khohn);
			return FALSE;
		}
		return TRUE;
	}

	public function xemchitiet()
	{
		$madethi = $this->input->get('madethi');
		$dethi = $this->Mthicu->getChitietdethi($madethi);
		$dscauhoi = $this->Mthicu->getCauhoiDethi($madethi);
		$arrayCautraloi = array();
		$arrayDapandung = array();
		foreach ($dscauhoi as $row) 
		{
			$arrayDapandung[$row['macauhoi']] = $this->Mthicu->getDapandung($row['macauhoi']);
			$arrayCautraloi[$row['macauhoi']] = $this->Mthicu->getCauTraLoi($row['macauhoi']);
		}

		$data= array(
			'dethi' => $dethi,
			'dscauhoi' => $dscauhoi,
			'cautraloi' => $arrayCautraloi,
			'dapandung' => $arrayDapandung
		);

		$this->load->view('admin/dethicu/view_dethi_chitiet', $data);

	}
}
?>