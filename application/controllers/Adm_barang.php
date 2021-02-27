<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_barang extends CI_Controller {

	public function index()
	{
		$this->load->view('adm_v_home');
	}

	public function vbarang($id_brg=0){
		$this->db->select('*');
		$this->db->where(array('kategori_brg_sub_id'=>$id_brg, 'barang_flag'=>1));
		$this->db->join('t_toko','t_toko.toko_id = t_barang.toko_id');
		$send['qr_barang'] = $this->db->get('t_barang');
		
		$send['qr_k_utama'] = $this->main_model->menu_k_utama();
		
		$send['qr_k_sub'] = $this->main_model->menu_k_sub();
		
		$send['hal'] = 'adm_vtbl_barang';
		$this->load->view('adm_v_home',$send);

	}

	public function barang_inp($id_sub=0){
		$send['qr_k_utama'] = $this->main_model->menu_k_utama();
		
		$send['qr_k_sub'] = $this->main_model->menu_k_sub();
		
		$send['hal'] = 'adm_vtbl_barang_inp';
		$this->load->view('adm_v_home',$send);
	}
	public function barang_input_proses($id_sub=0){
		$data_barang = array(
			'barang_id' =>'',
			'toko_id' => $this->input->post('toko_id'),
			'barang_nama' => $this->input->post('barang_nama'),
			'barang_harga' => $this->input->post('barang_harga'),
			'barang_potongan' => $this->input->post('barang_potongan')/100,
			'barang_tgl_daftar' => $this->input->post('barang_tgl_daftar'),
			'kategori_brg_sub_id' => $id_sub,
			'barang_flag' => 1
		);
		$this->db->insert('t_barang',$data_barang);
		return redirect(base_url('adm_barang/vbarang/'.$id_sub));
	}

	public function akun_delete($barang_id=0){
		$send['qr_k_utama'] = $this->main_model->menu_k_utama();
		
		$send['qr_k_sub'] = $this->main_model->menu_k_sub();

		$this->db->where('barang_id', $barang_id);
		$this->db->delete('t_barang');

		return redirect(base_url('adm_akun'));
	}
}
