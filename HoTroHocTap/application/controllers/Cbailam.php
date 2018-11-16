<?php
/**
 * 
 */
class Cbailam extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Mbailam');
		if($this->session->userdata('masinhvien') == '')
		{
			$this->session->set_flashdata('message','Bạn chưa đăng nhập');
			redirect(base_url());
		}
	}

	public function index($madethi= '')
	{
		$mang = array(
			'madethi' => $madethi,
			'masinhvien' => $this->session->userdata('masinhvien')
		);
		$bailam = $this->Mbailam->xembailam($mang);

		$filename = $bailam['file'];
		//echo $filename;
		//die();

        $html = ""; 
        $file = fopen(rootlogbailam().$filename,"r");
        $html = fread($file,filesize(rootlogbailam().$filename));
        fclose($file);

        $data['html'] = $html;
		$data['content'] = 'sinhvien/bailam/vbailam';
		$this->load->view('sinhvien/view_layout_sv', $data);
	}
}
?>