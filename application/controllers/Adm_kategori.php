<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_kategori extends CI_Controller {

	public function index()
	{
		$send['qr_k_utama'] = $this->main_model->menu_k_utama();
		
		$send['qr_k_sub'] = $this->main_model->menu_k_sub();

		$send['hal'] = 'adm_vtbl_kategori';
		$this->load->view('adm_v_home', $send);
	}
}
