<?php
/**
 * 
 */
class Clamdethi extends CI_Controller
{	
	function __construct()
	{
		date_default_timezone_set('Asia/Bangkok');
		parent::__construct();
		$this->load->model('Mthicu');
		if($this->session->userdata('masinhvien')== '')
		{
			redirect(base_url());
		}
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
		$dethi = $this->Mthicu->getChitietdethi($madethi);
		$dscauhoi = $this->Mthicu->getCauhoiDethi($madethi);
		$cautraloi = array();
		$arrayDapandung = array();
		foreach ($dscauhoi as $row) 
		{
			$arrayDapandung[$row['macauhoi']] = $this->Mthicu->getDapandung($row['macauhoi']);
			$cautraloi[$row['macauhoi']] = $this->Mthicu->getCauTraLoi($row['macauhoi']);
		}
		$slc = count($arrayDapandung);
		$bailam = array();
		if($this->input->post('nopbai'))
		{
			$bailam = $this->input->post('chondapan');
		}
		//tinh so cau dung
		$count = 0;
		if(!empty($bailam))
		{
			foreach ($bailam as $key => $value) 
			{
				if($bailam[$key] == $arrayDapandung[$key]['macautraloi'])
				{
					$count++;
				}
			}
		}
		//
		//tao mang bai lam moi
		$bailammoi = array();
		foreach ($arrayDapandung as $key => $value) 
		{
			$bailammoi[$key] = 0;
		}
		if(!empty($bailam))
		{
			foreach ($bailam as $key => $value) {
			$bailammoi[$key] = $bailam[$key];
			}
		}
		
		//print_r($cautraloi);
		//die();

		//luu file bai lam
		$filename = $madethi."_".$this->session->userdata('masinhvien').".txt";
		$html = '';
		
		$html .= '<div class="container" style="padding-left: 10px;">';
		$html .= '<div class="row" style="margin-top: 20px;">';
		$html .= '<div class= "col-md-12">';
		$html .= '<h4>MSSV:'.$this->session->userdata('masinhvien').' </h4>
				<h5>Mã đề: '.$madethi.'</h5> 
				<p>Thời gian: '.date("Y/m/d H:i:s",time()).'</p>
				<p>Số câu đúng: '.$count.'/'.$slc.'</p>
				<p>Điểm: '.number_format((10/$slc)*$count,2).'</p>
				';
		$html.= '</div>';
    	$html .= '<div class="col-md-9">';
    	$sottcau = 1;
      	foreach ($dscauhoi as $row)
      	{
      		$html .= '<div class="col-md-12" style="margin-top: 20px;">
      		<h4>Câu <span>'.$sottcau.'</span>: <span>'.$row['noidung'].'
        	</span>
        	</h4>'; $sottcau++;
        	$stt = 1;
        	foreach ($cautraloi[$row['macauhoi']] as $val)
        	{
        		$label = '';
            	switch ($stt)
            	{
              		case 1:
               		$label = 'A';
                	break;
              		case 2:
                	$label = 'B';
                	break;
              		case 3:
                	$label = 'C';
                	break;
              		case 4:
                	$label = 'D';
                	break;
              		default:
                	$label= '';
                	break;
        		}

        		if($arrayDapandung[$row['macauhoi']]['macautraloi'] == $val['macautraloi'] )
        		{
        			$html .= '<div class= "radio" style="color: red;">';
        		}
        		else
        		{
        			$html .= '<div class= "radio">';
        		}
        		
              	$html .= '<label>';
              	if($val['macautraloi'] == $bailammoi[$row['macauhoi']])
              	{
              		$html .= '<input type="radio" checked>';
              	}
              	else
              	{
              	 	$html .= '<input type="radio" disabled>';
              	}

                $html .= '<span>'.$label.':</span>
                		<span> '.$val["noidung"].'</span>
              			</label>
            			</div>';
            	$stt++;
        	}

        	$html .= '</div>';
      	}
      	$html .= '</div> <hr/>';
      	$html .= '<div class="col-md-12">
      		<p><b>Chú thích:</b> <br>
      		<input type="radio" disabled checked> : Phương án đã chọn
      		 | <span style="color:red;">Đáp án đúng</span>
      		</p>
      	</div>';
      	$html .= '</div>  
			</div>';

		//echo $html;
		$file = fopen(rootlogbailam().$filename,"wb");
                fwrite($file,$html);
                fclose($file);
		//print_r($cautraloi);

        //insert csdl
        $this->load->model('Mbailam');
        $arrayBl = array(
        	'masinhvien' => $this->session->userdata('masinhvien'),
        	'madethi' => $madethi,
        	'thoigiannopbai' => date("Y/m/d H:i:s",time()),
        	'socaudung' => $count,
        	'sodiem' => number_format((10/$slc)*$count,2),
        	'file' => $filename
        );

        $this->Mbailam->thembailam($arrayBl); //insert bailam csdl
        //

		$data['slc'] = $slc;
		$data['socaudung'] = $count;
		$data['sodiem'] = number_format((10/$slc)*$count,2);
		$data['dethi'] =  $dethi; //$this->Mthicu->getChitietdethi($madethi);

		$data['content'] = 'sinhvien/dethi/vketquathi';
		$this->load->view('sinhvien/view_layout_sv', $data);
		
	}
}
?>