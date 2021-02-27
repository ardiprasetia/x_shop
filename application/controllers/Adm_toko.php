<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_toko extends CI_Controller {

	public function index()
	{
		$this->db->select('*');
		$this->db->where('toko_flag',1);
		$this->db->join('m_akun','m_akun.akun_id = t_toko.akun_id');
		$send['qr_toko'] = $this->db->get('t_toko');

		$send['qr_k_utama'] = $this->main_model->menu_k_utama();
		
		$send['qr_k_sub'] = $this->main_model->menu_k_sub();
		
		$send['hal'] = 'adm_vtbl_toko';
		$this->load->view('adm_v_home',$send);
	}

	public function toko_inp(){
		$send['qr_k_utama'] = $this->main_model->menu_k_utama();
		
		$send['qr_k_sub'] = $this->main_model->menu_k_sub();

		$this->db->where('akun_flag', 1);
		$send['qr_akun'] = $this->db->get('m_akun');

		$this->db->limit(1);
		$this->db->order_by('toko_id','desc');
		$send['qr_toko_id'] = $this->db->get('t_toko'); 
		
		$send['hal'] = 'adm_vtbl_toko_inp';
		$this->load->view('adm_v_home',$send);
	}
	public function toko_input_proses(){
		$data_toko = array(
			'toko_id' => $this->input->post('toko_id'),
			'akun_id' => $this->input->post('akun_id'),
			'toko_nama' => $this->input->post('toko_nama'),
			'toko_logo' => 'none',
			'toko_alamat' => $this->input->post('toko_alamat'),
			'toko_kota' => $this->input->post('toko_kota'),
			'toko_provinsi' => $this->input->post('toko_provinsi'),
			'toko_hp' => $this->input->post('toko_hp'),
			'toko_tgl_daftar' => $this->input->post('toko_tgl_daftar'),
			'toko_flag' => 1
		);
		$this->db->insert('t_toko',$data_toko);
		return redirect(base_url('adm_toko'));
	}
	public function toko_edit($toko_id=0){
		$send['qr_k_utama'] = $this->main_model->menu_k_utama();
		
		$send['qr_k_sub'] = $this->main_model->menu_k_sub();

		$this->db->where('akun_flag', 1);
		$send['qr_akun'] = $this->db->get('m_akun');

		$this->db->where('toko_id',$toko_id);
		$send['qr_toko'] = $this->db->get('t_toko'); 
		
		$send['hal'] = 'adm_vtbl_toko_edit';
		$this->load->view('adm_v_home',$send);
	}
	public function toko_edit_proses(){
		$data_toko = array(
			'akun_id' => $this->input->post('akun_id'),
			'toko_nama' => $this->input->post('toko_nama'),
			'toko_alamat' => $this->input->post('toko_alamat'),
			'toko_kota' => $this->input->post('toko_kota'),
			'toko_provinsi' => $this->input->post('toko_provinsi'),
			'toko_hp' => $this->input->post('toko_hp'),
			'toko_tgl_daftar' => $this->input->post('toko_tgl_daftar'),
		);
		$this->db->where('toko_id',$this->input->post('toko_id'));
		$this->db->update('t_toko',$data_toko);
		return redirect(base_url('adm_toko'));
	}
	public function toko_delete($toko_id=0){
		$send['qr_k_utama'] = $this->main_model->menu_k_utama();
		
		$send['qr_k_sub'] = $this->main_model->menu_k_sub();

		$this->db->where('toko_id', $toko_id);
		$this->db->delete('t_toko');

		return redirect(base_url('adm_toko'));
	}
}
