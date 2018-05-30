<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fungsi {
	protected $_ci;
	
	function __construct()
	{
		$this->_ci =&get_instance();
		$this->_ci->load->model('Stokdb');
	}

	function template($content, $data=null)
	{
		$data['_content'] = $this->_ci->load->view($content, $data, true);
		$this->_ci->load->view('template.php', $data);
	}

	function rupiah($nominal)
	{
 		$rp = "Rp ".number_format($nominal,0,',','.');
		return $rp;
	}
}