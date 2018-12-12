<?php
/**
 * 
 */
class MY_Controller extends CI_Controller
{
	
	function __construct()
	{
		date_default_timezone_set('Asia/Bangkok');
		parent::__construct();
		$this->load->model('madmin');
		$folder= $this->uri->segment(1);
		$maquyen = $this->session->userdata('maquyen');
		$c_admin = array(1, 'csinhvien', 'cgiangvien','chocky');
		$c_giangvien = array(1, 'cdanhmuccauhoi', 'cdanhmuclophoc', 'cdanhmucmathi', 'cdanhmucmonhoc', 'cdanhmuctintuc', 'cdsbaigiang', 'cdssinhvien', 'cthembaigiang');
		$class = strtolower($this->uri->segment(2));

		switch ($folder) {
			case 'admin':
				$this->check_login();
				if($maquyen == 'admin')
				{
					if(array_search($class, $c_giangvien) != FALSE)
					{

						redirect(base_url().'admin/chome_admin');
					}
				}
				else
				{
					if(array_search($class, $c_admin) != FALSE)
					{
						redirect(base_url().'admin/chome_admin');
					}
				}

				break;
			
			default:
				# code...
				break;
		}
	}

	function check_login()
	{
		$crl = $this->uri->segment(2);
		$taikhoan = $this->session->userdata('tentaikhoan');
		
		if($taikhoan == '' && $crl != 'clogin_admin')
		{
			redirect(base_url().'admin/clogin_admin');
		}
		if($taikhoan != '' && $crl == 'clogin_admin')
		{
			redirect(base_url().'admin/chome_admin');
		}
	}

	function G_ID($tbl_name,$key_of_table,$key_cmp)
	{
		return $this->madmin->get_by_id($tbl_name,$key_of_table,$key_cmp);
	}

	function G_ALL($tbl_name)
	{
		return $this->madmin->get_all($tbl_name);
	}

	function IUD($func,$table_name,$key_of_table,$key_cmp,$data_array,$sql)
	{
		if($func=='insert')
		{
			$ret=$this->madmin->insert($table_name,$data_array);
		}
		else if($func=='update')
		{
			$ret=$this->madmin->update($table_name,$data_array,$key_of_table,$key_cmp);
		}
		else if($func=='delete')
		{
			$ret=$this->madmin->del($table_name,$key_of_table,$key_cmp);
		}
		else if($func=='sql')
		{
			$ret=$this->madmin->sql($sql);
		}
		return $ret;
	}
}
?>