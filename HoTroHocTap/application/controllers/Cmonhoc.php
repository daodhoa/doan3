<?php
/**
 * 
 */
class Cmonhoc extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Mmonhoc');
	}
	public function index()
	{
		$config['full_tag_open'] = "<div class='pagination'>";
    	$config['full_tag_close'] = '</div>';

    	$config['num_tag_open'] = '<span style="margin-left:2px;" class="page-numbers">';
    	$config['num_tag_close'] = '</span>';

    	$config['cur_tag_open'] = '<span style="margin-left:2px;" class="page-numbers current">';
    	$config['cur_tag_close'] = '</span>';
    	
    	$config['first_tag_open'] = '<span style="margin-left:2px;" class="page-numbers">';
    	$config['first_tag_close'] = '</span>';
    	$config['last_tag_open'] = '<span style="margin-left:2px;" class="page-numbers">';
    	$config['last_tag_close'] = '</span>';
    	$config['first_link'] = '<<';
    	$config['last_link'] = '>>';



    	$config['prev_link'] = '<span style="margin-left:2px;" class="page-numbers"><';
    	$config['next_link'] = '<span style="margin-left:2px;" class="page-numbers">>';
    	

    	$config['num_links'] = 2;
		$config['total_rows'] = $this->Mmonhoc->countAll();
        $config['base_url'] = base_url('cmonhoc/index');
        $config['per_page'] = 4;
        $start=$this->uri->segment(3);

        $this->load->library('pagination', $config);
        $data['data']= $this->Mmonhoc->getLimitMonhoc($config['per_page'], $start);
        //echo $start;
        //print_r($data['data']);


		$data['content'] = 'sinhvien/monhoc/vdanhsachmonhoc';
		$data['slide'] = 'sinhvien/monhoc/monhoc_title';
		$this->load->view('sinhvien/view_layout_sv', $data);
	}


    public function dslop($mamon)
    {
        //$dslop = $this->Mmonhoc->getListLopHoc($mamon);
        $dskyhoc = $this->Mmonhoc->getdskyhoc();

        $dslop = array();
        if($this->input->get('makyhoc'))
        {
            $makyhoc = $this->input->get('makyhoc');
            $dslop = $this->Mmonhoc->getListLopHoc($mamon,$makyhoc);
        }

        $data['monhoc'] = $this->Mmonhoc->getThongTinMonHoc($mamon);
        $data['dskyhoc'] = $dskyhoc;
        $data['dslop'] = $dslop;
        $data['content'] = 'sinhvien/monhoc/vdanhsachlophoc';
        $data['slide'] = 'sinhvien/monhoc/monhoc_title';
        $this->load->view('sinhvien/view_layout_sv', $data);
    }
}
?>