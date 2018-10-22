<?php 
/**
 * 
 */
class Cdanhmuccauhoi extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Mcauhoi');
	}
	public function index()
	{
		$records = $this->Mcauhoi->getDanhSachCauHoi();
		
		$data = array();
		$data['records'] = $records;
		$data['content'] = 'admin/cauhoi/view_cauhoi_admin';
		$this->load->view('admin/view_layout_admin', $data);
		
	}

	public function them()
	{
		if($this->input->post('import'))
		{
			$this->import_cauhoi();
			$mes = array(
				'sobanghi'=>1,
                'thongbao'=>'import thành công!',
                'mau'=>'success'
			);
			$this->session->set_flashdata('mes', $mes);
		}
	}

	public function import_cauhoi()
    {
        $this->load->library('Excel'); //load thu vien
        if($_FILES['file_import']['error'] == 0)
        {
            $data = PHPExcel_IOFactory::load($_FILES['file_import']['tmp_name']);
            $sheetData = $data->getActiveSheet()->toArray(null, true, true, true);
            $sohang=1;

            foreach ($sheetData as $row)
            {
                if ($sohang>=2 && !empty($row['A']) && !empty($row['B'])) //i bắt đầu đọc dữ liệu từ dòng số 2
                {
                    $mamon = $row['A'];
                    $manhom = $row['B'];	//đọc dữ liệu theo cột
                    $noidung = $row['C'];
					
					if($manhom == '1')
					{
						$manhom = 'de';
					}
					else if($manhom == '2')
					{
						$manhom = 'tbinh';
					}
					else if($manhom == '3')
					{
						$manhom = 'kho';
					}
                    else if($manhom == '4')
                    {
                        $manhom = 'khohn';
                    }

                    // dua vao mang de chen
                    $insertCauhoi = array(
                        'mamon'  	  =>	$mamon,
                        'manhom'      =>	$manhom,
                        'noidung'     =>    $noidung
                    );
                    $macauhoi =  $this->Mcauhoi->insertCauhoi($insertCauhoi);

                    $socotcautraloi = 'D';
                    $mangmacautraloi = array();
                    for($i=0;$i<6;$i++)//insert câu trả lời
                    {
                        if($row[$socotcautraloi] != '')//nếu nội dung != ''
                        {
                            $insertCautraloi = array(
                                'macauhoi' => $macauhoi,
                                'noidung' => $row[$socotcautraloi]
                            );
                            $macautraloi = $this->Mcauhoi->insertCautraloi($insertCautraloi);
                            $mangmacautraloi[$socotcautraloi] = $macautraloi;
                        }
                        $socotcautraloi++;
                    }


                    $socotdapandung = 'J';
                    if(!empty($mangmacautraloi))//có câu trả lời mới có đáp án
                    {
                        for($i=0;$i<6;$i++)
                        {
                            if($row[$socotdapandung] != '')//nếu nội dung != ''
                            {
                                $insertDapandung = array(
                                    'macauhoi' => $macauhoi,
                                    'macautraloi' => $mangmacautraloi[$row[$socotdapandung]]
                                );
                                $this->IUD('insert','tbl_dapandung','','',$insertDapandung,'');
                            }
                            $socotdapandung++;
                        }
                    }
                }
                $sohang++;
            }
            unlink($_FILES['file_import']['tmp_name']);
        }
    }


    public function xem()
    {
        $macauhoi = $_GET['macauhoi'];
        $cauhoi = $this->Mcauhoi->getThongTinCauHoi($macauhoi);
        //print_r($cauhoi);

        //echo "<br/>";

        $cautraloi = $this->Mcauhoi->getCauTraLoi($macauhoi);
        $ar_ans = array();
        $i= 0;
        foreach ($cautraloi->result() as $row) 
        {
            $ar_ans[$i] = $row->noidung;
            $i++;
            //echo $row->noidung.'<br/>';
        }
        //print_r($ar_ans);

        $dapan = $this->Mcauhoi->getDapAn($macauhoi);
        //print_r($dapan);

        $data['cauhoi'] = $cauhoi;
        $data['cautraloi'] = $ar_ans;
        $data['dapan'] = $dapan;
        $data['content'] = 'admin/cauhoi/view_chitiet_cauhoi';
        $this->load->view('admin/view_layout_admin', $data);
    }

    public function sua()
    {
        $macauhoi = $_GET['macauhoi'];
        $cauhoi = $this->Mcauhoi->getThongTinCauHoi($macauhoi);
        //print_r($cauhoi);

        //echo "<br/>";

        $cautraloi = $this->Mcauhoi->getCauTraLoi($macauhoi);

        $dapan = $this->Mcauhoi->getDapAn($macauhoi);
        
        $nhomcauhoi = $this->Mcauhoi->getDanhSachNhomCauHoi();
        

        $data['cauhoi'] = $cauhoi;
        $data['cautraloi'] = $cautraloi;
        $data['dapan'] = $dapan;
        $data['nhomcauhoi'] = $nhomcauhoi;
        $data['content'] = 'admin/cauhoi/view_sua_cauhoi';
        $this->load->view('admin/view_layout_admin', $data);

        if($this->input->post('sua'))
        {
            $imanhom = $this->input->post('mucdo');
            $inoidung = $this->input->post('noidung');
            $idapan = $this->input->post('dapan');
            $icautraloi = array();
            $icautraloi = $this->input->post('cautraloi');

            //echo $imanhom.' '.$inoidung.' '.$idapan;
            
            $this->db->trans_begin();
            foreach ($icautraloi as $key => $value) {
               $this->Mcauhoi->suaCauTraLoi($key, $value); 
            }  
            $this->Mcauhoi->suaDapAn($macauhoi,$idapan);
            $this->Mcauhoi->suaCauHoi($macauhoi, $imanhom, $inoidung);
            if ($this->db->trans_status() === FALSE)
            {
                $this->db->trans_rollback();
                $this->session->set_flashdata('message', 'Cập nhật thất bại');
            }
            else
            {
                $this->db->trans_commit();
                $this->session->set_flashdata('message', 'Cập nhật thành công');
            }

            redirect(base_url('admin/Cdanhmuccauhoi'));
        }
    }

    public function xoa()
    {
        $macauhoi = $_GET['macauhoi'];
        $this->Mcauhoi->xoaCauHoi($macauhoi);
        $this->session->set_flashdata('message', 'Xóa thành công');
        redirect(base_url('admin/Cdanhmuccauhoi'));
    }
}
?>