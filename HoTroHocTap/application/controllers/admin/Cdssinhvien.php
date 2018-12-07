<?php 
/**
 * 
 */
class Cdssinhvien extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Mlophoc');
	}

	public function index($malophoc)
	{
		$dssv = $this->Mlophoc->getdssv($malophoc);

		if($this->input->post('import'))
		{
			$this->load->library('Excel'); //load thu vien
			if($_FILES['file_import']['error'] == 0)
			{
				$obj = PHPExcel_IOFactory::load($_FILES['file_import']['tmp_name']);
	            $sheetData = $obj->getActiveSheet()->toArray(null, true, true, true);
	            $sohang=1;

	            $mangimport = array();
	            $count =0;
	            foreach ($sheetData as $row)
	            {
	            	if ($sohang>=2 && !empty($row['A']) && !empty($row['B'])) //i bắt đầu đọc dữ liệu từ dòng số 2
                	{
	                    $masinhvien = $row['A'];
	                    $hotensv = $row['B'];

	                    $mangimport[$masinhvien] = $hotensv;


	                    //đọc dữ liệu theo cột
	                    if($this->Mlophoc->check_exist(array('masinhvien' => $masinhvien, 'id_lophoc'=> $malophoc )))
	                    {
	                    	continue;
	                    }

	                    
	                    $insertSV= array(
	                    	'masinhvien' => $masinhvien,
	                    	'hotensv' => $hotensv,
	                    	'id_lophoc' => $malophoc,
	                    	'trangthai' => 'f',
	                    	'thoigian' => date("Y/m/d",time())
	                    );

	                    $rs = $this->Mlophoc->importSV($insertSV);
	                    $count++;
	                    
	               	}
	               	$sohang++;
	        	}
	        	unlink($_FILES['file_import']['tmp_name']);
	        	
	        	$mangdb = array();
	        	
	        	foreach ($dssv as $row) {
	        		$mangdb[$row['masinhvien']] = $row['hotensv'];
	        	}

	        	$result=array_diff_key($mangdb,$mangimport);
				
				foreach ($result as $key => $value) {
					$xsv = $this->Mlophoc->xoaSVLH(array('masinhvien' => $key, 'id_lophoc'=>$malophoc));
				}

	        	$this->session->set_flashdata('message','Import thành công');
	        	redirect($_SERVER['HTTP_REFERER']);
			}
			
		}

		$data['id_lophoc'] = $malophoc;
		$data['dssv'] = $dssv;
		$data['content'] = 'admin/lophoc/v_dssv';
		$this->load->view('admin/view_layout_admin', $data);
	}

	public function xoa($id_lophoc)
	{
		$masinhvien = $_GET['mssv'];
		$data = array(
			'masinhvien'=> $masinhvien,
			'id_lophoc' => $id_lophoc
		);
		if($this->Mlophoc->xoaSVLH($data))
		{
			$this->session->set_flashdata('message','Xóa thành công');
		}
		else
		{
			$this->session->set_flashdata('message','Xóa thất bại, vui lòng thử lại');
		}
		redirect(base_url('admin/Cdssinhvien/index/'.$id_lophoc));
	}
}
?>