<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_akun extends CI_Controller {

	public function index()
	{
		parent::__construct();
		$this->db->select('*');
		$this->db->where('akun_flag', 1);
		$send['qr_akun'] = $this->db->get('m_akun');

		
		$send['qr_k_utama'] = $this->main_model->menu_k_utama();

		$send['qr_k_sub'] = $this->main_model->menu_k_sub();

		
		
		$send['hal'] = 'adm_vtbl_akun';
		$this->load->view('adm_v_home',$send);
	}

	public function akun_inp(){
		$send['qr_k_utama'] = $this->main_model->menu_k_utama();
		
		$send['qr_k_sub'] = $this->main_model->menu_k_sub();
		
		$send['hal'] = 'adm_vtbl_akun_inp';
		$this->load->view('adm_v_home',$send);
	}

	public function akun_input_proses(){
		$data_akun = array(
			'akun_id' => $this->input->post('akun_id'),
			'akun_nama_depan' => $this->input->post('akun_nama_depan'),
			'akun_nama_belakang' => $this->input->post('akun_nama_belakang'),
			'akun_email' => $this->input->post('akun_email'),
			'akun_hp' => $this->input->post('akun_hp'),
			'akun_jenis_kelamin' => $this->input->post('akun_jenis_kelamin'),
			'akun_tanggal_lahir' => $this->input->post('akun_tanggal_lahir'),
			'akun_foto' => 'none',
			'akun_tgl_daftar' => $this->input->post('akun_tgl_daftar'),
			'akun_flag' => 1
		);
		$this->db->insert('m_akun',$data_akun);
		return redirect(base_url('adm_akun'));
	}
	public function akun_edit($akun_id=0){
		$send['qr_k_utama'] = $this->main_model->menu_k_utama();
		
		$send['qr_k_sub'] = $this->main_model->menu_k_sub();

		$this->db->where('akun_id',$akun_id);
		$send['qr_akun'] = $this->db->get('m_akun');
		
		$send['hal'] = 'adm_vtbl_akun_edit';
		$this->load->view('adm_v_home',$send);
	}
	public function akun_edit_proses(){
		$data_akun = array(
			'akun_nama_depan' => $this->input->post('akun_nama_depan'),
			'akun_nama_belakang' => $this->input->post('akun_nama_belakang'),
			'akun_email' => $this->input->post('akun_email'),
			'akun_hp' => $this->input->post('akun_hp'),
			'akun_jenis_kelamin' => $this->input->post('akun_jenis_kelamin'),
			'akun_tanggal_lahir' => $this->input->post('akun_tanggal_lahir'),
			'akun_tgl_daftar' => $this->input->post('akun_tgl_daftar')
		);

		$this->db->where('akun_id',$this->input->post('akun_id'));
		$this->db->update('m_akun',$data_akun);
		return redirect(base_url('adm_akun'));
	}

	public function akun_delete($akun_id=0){
		$send['qr_k_utama'] = $this->main_model->menu_k_utama();
		
		$send['qr_k_sub'] = $this->main_model->menu_k_sub();

		$this->db->where('akun_id', $akun_id);
		$this->db->delete('m_akun');

		return redirect(base_url('adm_akun'));
	}
}
