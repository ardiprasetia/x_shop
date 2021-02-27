<?php
class Cari extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->model('M_cari');
	}
 
	public function cari() 
	{
		$this->load->view('adm_v_home');
	}
 
	public function hasil()
	{
        $send['cari'] = $this->M_cari->cariOrang();
        $send['hal'] = 'adm_v_cari';
		$this->load->view('result', $send);
	}
}