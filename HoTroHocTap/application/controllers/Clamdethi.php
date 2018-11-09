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

		$data['content'] = 'sinhvien/dethi/vdethi';
		$this->load->view('sinhvien/view_layout_sv', $data);
	}
}
?>