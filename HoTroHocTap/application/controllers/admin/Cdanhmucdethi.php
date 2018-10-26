<?php
/**
 * 
 */
class Cdanhmucdethi extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Mdethi');
	}

	public function index()
	{
		$this->load->model('Mmonhoc');
		$data['monhoc'] = $this->Mmonhoc->getListMonHoc($this->session->userdata('maquantri'));
		$data['dsnhomdethi'] = $this->Mdethi->getListDethi($this->session->userdata('maquantri'));
		$data['content'] = 'admin/dethi/view_nhomdethi_admin';
		$this->load->view('admin/view_layout_admin', $data);
	}

	public function them()
	{
		if($this->input->post('luu'))
        {
            $dataIs['mamon'] = $this->input->post('monhoc');
            $dataIs['soluongde'] = $this->input->post('soluongde');
            $dataIs['thoigiantao'] = date("d/m/Y H:i",time());
            $dataIs['maquantri'] = $this->session->userdata('maquantri');
            $rs = $this->Mdethi->insertnhomde($dataIs);
            if($rs['af'] > 0)
            {
                $soluongcauhoi = $this->input->post('slcauhoi');
                if(!empty($soluongcauhoi))
                {
                    foreach($soluongcauhoi as $k=>$v)
                    {
                        $i['manhomde'] = $rs['id'];
                        $i['manhom'] = $k;
                        $i['soluongcauhoi'] = $v;
                        $this->IUD('insert','tbl_nhomdethi_manhom','','',$i,'');
                    }
                }
                $this->session->set_flashdata('thongbao','Thêm nhóm đề thi thành công');
            }
        }
        redirect(base_url('admin/cdanhmucdethi'));
	}

	public function taoDeThi()
	{
		if($this->input->get('type')== 0 )
        {
            $filename = $this->input->get('md')."_dethi.txt";
            $html = '';
            if(file_exists(rootlogfile().$filename))
            {//file tồn tại down luôn
                $file = fopen(rootlogfile().$filename,"r");
                $html = fread($file,filesize(rootlogfile().$filename));
                fclose($file);
            }
            else
            {//ko tồn tại tạo rồi down
                $manhomde = $this->input->get('md');
                $this->Mdethi->deleteDeThi($manhomde);
                for($i = 0;$i < $this->G_ID('tbl_nhomdethi','manhomde',$manhomde)[0]['soluongde'];$i++)//for lặp đề
                {
                    $data = $this->buid($i);
                    $html .= $data['html'];
                    $mangde[] = $data['mangde'];
                }

                $this->Mdethi->insertDethi($mangde);//insert các đề được buid
                $file = fopen(rootlogfile().$filename,"wb");
                fwrite($file,$html);
                fclose($file);
            }
            $data['html'] = $html;
            /*header("Content-type:application/doc");
            header("Content-Disposition:attachment;filename='dethi_".$this->input->get('md').".docx'");
            $data['url']=base_url();
            $this->parser->parse('admin/dethi/view_dethi',$data);*/
            $this->load->view('admin/dethi/view_dethi', $data);
        }
	}

	function buid($sll)
    {
        $datanhomdethi = $this->G_ID('tbl_nhomdethi','manhomde',$this->input->get('md'))[0];
        $arrayCauhoi = array();
        foreach($this->G_ID('tbl_nhomdethi_manhom','manhomde',$datanhomdethi['manhomde']) as $v)
        {
            $arrayCauhoi = array_merge($this->Mdethi->get_cauhoi($v['manhom'],$v['soluongcauhoi'],$datanhomdethi['mamon']),$arrayCauhoi);
        }
        shuffle($arrayCauhoi);//random array
        $stringDsCauHoi = '';
        $a = '';
        foreach($arrayCauhoi as $v)
        {
            $dscauhoi[] = $v['macauhoi'];
            $stringDsCauHoi .= $a;
            $stringDsCauHoi .= $v['macauhoi'];
            $a = ',';
        }
        $made = time().'.'.$sll;
        $insertde = array(
            'madethi' => $made,
            'manhomde' => $datanhomdethi['manhomde'],
            'danhsachcau' => $stringDsCauHoi
        );
//        $this->IUD('insert','tbl_dethi','','',$insertde,'');

        $dscautraloiraw = $this->Mdethi->get_dscautraloi($dscauhoi);
        foreach($arrayCauhoi as $k => $v)
        {
            foreach($dscautraloiraw as $d)
            {
                if($v['macauhoi'] == $d['macauhoi'])
                {
                    $arrayCauhoi[$k]['cautraloi'][] = $d;
                }
            }
        }
        //////buid html
        $html = '<span><b>Mã đề thi: '.$made.'</b></span><br><span><b>Mã sinh viên: . . . . . . . . . . . . . . . . . . . . . . .</b></span><br><span><b>Họ tên: . . . . . . . . . . . . . . . . . . . . . . . . . . .</b></span><br><span><b>Lớp: . . . . . . . . . . . . . . . . . . . . . . . . . . . .</b></span><br><span><b>Chữ ký sinh viên: . . . . . . . . . . . . . . . . . . . . . . . . .</b></span><br><br><br>';
        $html .= '<div style="width:700px;margin: auto;text-align: center"><span style="font-size: 30px"><b>Môn ';
        $html .= $this->G_ID('dm_mon','mamon',$datanhomdethi['mamon'])[0]['tenmon'];
        $html .= '</b></span></div>';
        $html .= '<br><br>';
        $socau = 1;

//        pr($arrayCauhoi);

        $arrayCauhoicopy = $arrayCauhoi;

        foreach($arrayCauhoi as $v)
        {
            $html .= '<label><b>Câu ';
            $html .= $socau++.'. ';
            $html .= $v['noidung'].'</b></label><br>';

            $mucchon = 'A';
            $stringcount = "";

            foreach($v['cautraloi'] as $val)
            {
                $stringcount.= $mucchon++.' ( '.$val['macautraloi'].' ) . '.$val['noidung'];
            }

            $numbercount = strlen($stringcount);

//            $html .= "<br>".$numbercount."<br>";

            $mucchon = 'A';
            if($numbercount < 150)
            {
                $html .= '<table>';
                foreach($v['cautraloi'] as $ctl)
                {
//                    if($mucchon == 'C' || $mucchon == 'E' || $mucchon == 'G')
//                    {
//                        $html .= '<br>';
//                    }
                    if($mucchon == 'B' || $mucchon == 'D' || $mucchon == 'F')
                    {
                        $html .= '<td><label>&#09;&#09;&#09;';
//                        $html .= $mucchon++.' ( '.$ctl['macautraloi'].' ) . '.$ctl['noidung'];
                        $html .= $mucchon++.' . '.$ctl['noidung'];
                        $html .= '</label></td>';
                        $html .= '</tr>';
                    }
                    else
                    {
                        $html .= '<tr>';
                        $html .= '<td width="60px"><label>&nbsp;&nbsp;&nbsp;';
//                        $html .= $mucchon++.' ( '.$ctl['macautraloi'].' ) . '.$ctl['noidung'];
                        $html .= $mucchon++.' . '.$ctl['noidung'];
                        $html .= '</label></td>';
                    }
                }
                $html .= '</table>';
//                $html .= '<br>';
            }
            else
            {
                foreach($v['cautraloi'] as $ctl)
                {
                    $html .= '<label>&nbsp;&nbsp;&nbsp;';
//                    $html .= $mucchon++.' ( '.$ctl['macautraloi'].' ) . '.$ctl['noidung'];
                    $html .= $mucchon++.' . '.$ctl['noidung'];
                    $html .= '</label><br>';
                }
            }
        }
        $html .= '<br style="page-break-before: always">';

        $data['mangde'] = $insertde;

        $dapandung1 = $this->Mdethi->get_dapan($data['mangde']['danhsachcau']);
        foreach ($arrayCauhoicopy as $k => $val)
        {
            $mch = $val['macauhoi'];
            $strda = "";
            foreach($dapandung1 as $item)
            {
                if($mch == $item['macauhoi'])
                {
//                    $strda .= $item['macautraloi']." ";
                    $strda .= $item['macautraloi'];
                }
            }
            $arrayCauhoicopy[$k]['madapandung'] = $strda;
        }

        foreach ($arrayCauhoicopy as $k => $v)
        {
            $arrayCauhoicopy[$k]['dapandung'] = $this->get_text($this->get_so($v['madapandung'],$v['cautraloi']));
        }

        foreach ($arrayCauhoicopy as $k => $value)
        {
            $html .= 'Câu '.($k+1).': '.$value['dapandung'].'<br>';
        }
        $html .= '<br style="page-break-before: always">';

        $data['html'] = $html;
//        pr($dapandung1);
        return $data;
    }

    function get_so($ma,$arr)
    {
        foreach ($arr as $k => $item)
        {
            if($item['macautraloi'] == $ma)
            {
                return $k;
            }
        }
    }

    function get_text($so)
    {
        switch ($so)
        {
            case 0: return 'A';
            case 1: return 'B';
            case 2: return 'C';
            case 3: return 'D';
            case 4: return 'E';
            case 5: return 'F';
            case 6: return 'G';
            case 7: return 'H';
        }
    }
}
?>