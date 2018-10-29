<?php
	// $data['title'] = $title;
	$data['hoten'] = $this->session->userdata['hoten'];
	$data['url']  = base_url();
	$this->parser->parse('admin/view_left_admin', $data);
	$this->parser->parse('admin/view_layout_admin', $data);
	$this->parser->parse($template, $data);
?>