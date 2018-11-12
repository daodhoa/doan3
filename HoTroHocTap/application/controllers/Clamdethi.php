<?php
/**
 * 
 */
class Clamdethi extends CI_Controller
{	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Mthicu');
	}

	public function index($madethi)
	{
		$dethi = $this->Mthicu->getChitietdethi($madethi);
		$this->session->set_userdata('thoigianlambai', $dethi['thoigianlambai'] );

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
			'dapandung' => $arrayDapandung,
			'madethi' => $madethi
		);

		$data['content'] = 'sinhvien/dethi/vdethi';
		$this->load->view('sinhvien/view_layout_sv', $data);
	}

	public function ketqualambai($madethi="")
	{

		$dscauhoi = $this->Mthicu->getCauhoiDethi($madethi);
		$arrayDapandung = array();
		foreach ($dscauhoi as $row) 
		{
			$arrayDapandung[$row['macauhoi']] = $this->Mthicu->getDapandung($row['macauhoi']);
		}

		$bailam = array();
		if($this->input->post('nopbai'))
		{
			$bailam = $this->input->post('chondapan');
		}
		
		$count = 0;
		if(!empty($bailam))
		{
			foreach ($bailam as $key => $value) {
				if($bailam[$key] == $arrayDapandung[$key]['macautraloi'])
				{
					$count++;
				}
			}
		}
		
		$slc = count($arrayDapandung);
		//echo "Số câu đúng: ".$count."/".$slc."<br/>";
		//echo "Số điểm: ".number_format((10/$slc)*$count,2);

		$data['slc'] = $slc;
		$data['socaudung'] = $count;
		$data['sodiem'] = number_format((10/$slc)*$count,2);

		$data['content'] = 'sinhvien/dethi/vketquathi';
		$this->load->view('sinhvien/view_layout_sv', $data);
		
	}
}
?>