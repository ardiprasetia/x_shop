<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_home extends CI_Controller {

	public function index()
	{
		$this->db->select('*');
		$this->db->where('akun_flag', 1);
		$send['qr_akun'] = $this->db->get('m_akun');

		$send['qr_k_utama'] = $this->main_model->menu_k_utama();
		
		$send['qr_k_sub'] = $this->main_model->menu_k_sub();
		
		$send['hal'] = 'adm_vtbl_akun';
		$this->load->view('adm_v_home',$send);
	}	
	public function CekStatusLogin(){
		$SudahkahLogin=$this->session->userdata('SudahkahLogin');
		   if(!isset($SudahkahLogin)||$SudahkahLogin!= true) {
			$this->session->set_userdata('pesan_login','<div class="alert alert-warning">Anda harus login terlebih dahulu !</div>');
			 redirect(site_url('adm_home/login'),'refresh');  
		} else {
			 $this->session->unset_userdata('pesan_login');
		}
	 } 
	public function Login()
    {
       $send['hal']= 'adm_v_login';
       $this->load->view('adm_v_home',$send);
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
