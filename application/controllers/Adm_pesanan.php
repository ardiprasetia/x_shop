<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_pesanan extends CI_Controller {

	public function index()
	{
		parent::__construct();
		$this->db->select('*');
		$this->db->join('m_akun','m_akun.akun_id = t_pesanan_h.akun_id_pembeli');
		$send['qr_pesan'] = $this->db->get('t_pesanan_h');

		$send['qr_k_utama'] = $this->main_model->menu_k_utama();
		$send['qr_k_sub'] = $this->main_model->menu_k_sub();
		
		$send['hal'] = 'adm_vtbl_pesanan';
		$this->load->view('adm_v_home',$send);
	}
	
	public function pesanan_inp($akun_alamat_id=0){	
		
		$send['qr_k_utama'] = $this->main_model->menu_k_utama();
		
		$send['qr_k_sub'] = $this->main_model->menu_k_sub();

		$send['qr_pesan'] = $this->db->get('t_pesanan_h');

		$this->db->where('akun_id',$akun_alamat_id);
		$send['qr_akun_alamat']=$this->db->get('t_akun_alamat');

		$this->db->join('m_kategori_brg_sub','m_kategori_brg_sub.kategori_brg_sub_id = t_barang.kategori_brg_sub_id');
		$this->db->join('t_toko','t_toko.toko_id = t_barang.toko_id');
		$this->db->where('barang_flag',1);
		$send['qr_barang'] = $this->db->get('t_barang');

		$this->db->where('kurir_flag',1);
		$send['qr_kurir'] = $this->db->get('m_kurir');

		$this->db->where('akun_flag', 1);
		$send['qr_akun'] = $this->db->get('m_akun');

		$this->db->limit(1);
		$this->db->order_by('pesanan_h_id','desc');
		$send['qr_pesan_id'] = $this->db->get('t_pesanan_h'); 
		
		$send['hal'] = 'adm_vtbl_pesanan_inp';
		$this->load->view('adm_v_home',$send);
	}
	public function pesanan_input_proses(){
		$data_pesan = array(
			'pesanan_h_id' => $this->input->post('pesanan_h_id'),
			'akun_id_pembeli' => $this->input->post('akun_id_pembeli'),
			'akun_alamat_id' => $this->input->post('akun_alamat_id'),
			'pesanan_h_tgl' => $this->input->post('pesanan_h_tgl'),
			'promo_id' => $this->input->post('promo_id'),
			'pembayaran_id' => $this->input->post('pembayaran_id'),
			'pesanan_h_ket' => $this->input->post('pesanan_h_ket')
		);
		$data_pesanan_d = array(
			'pesanan_d_id' => '',
			'pesanan_h_id' =>$this->input->post('pesanan_h_id'),
			'barang_id' =>$this->input->post('barang_id'),
			'pesanan_d_jumlah' =>$this->input->post('pesanan_d_jumlah'),
			'kurir_sub_id' =>$this->input->post('kurir_id')
		);
		$this->db->insert('t_pesanan_h',$data_pesan);
		if($this->input->post('s_save') == 'SIMPAN'){
			$this->db->insert('t_pesanan_d',$data_pesanan_d);
			return redirect(base_url('adm_pesanan'));
		}else{
			$this->pesanan_edt_proses();
		}
	}
	public function pesanan_edt($pesanan_h_id = 0){
		$send['qr_k_utama'] = $this->main_model->menu_k_utama();
		
		$send['qr_k_sub'] = $this->main_model->menu_k_sub();

		$this->db->where('pesanan_h_id',$pesanan_h_id);
		$this->db->join('m_akun','m_akun.akun_id=t_pesanan_h.akun_id_pembeli');
		$this->db->join('t_akun_alamat','t_akun_alamat.akun_alamat_id=t_pesanan_h.akun_alamat_id');
		$send['qr_pesanan_h'] = $this->db->get('t_pesanan_h');

		$this->db->where('akun_flag', 1);
		$send['qr_akun'] = $this->db->get('m_akun');

		$send['qr_akun_alamat']=$this->db->get('t_akun_alamat');

		$this->db->join('m_kategori_brg_sub','m_kategori_brg_sub.kategori_brg_sub_id = t_barang.kategori_brg_sub_id');
		$this->db->join('t_toko','t_toko.toko_id = t_barang.toko_id');
		$this->db->where('barang_flag',1);
		$send['qr_barang'] = $this->db->get('t_barang');

		$this->db->where('kurir_flag',1);
		$send['qr_kurir'] = $this->db->get('m_kurir');

		$this->db->join('t_barang','t_barang.barang_id=t_pesanan_d.barang_id');
		$this->db->join('t_toko','t_barang.toko_id=t_toko.toko_id');
		$this->db->join('m_kurir','m_kurir.kurir_id=t_pesanan_d.kurir_sub_id');
		$send['qr_pesanan_d'] = $this->db->get('t_pesanan_d');

		$send['hal'] = 'adm_vtbl_pesanan_edt';
		$this->load->view('adm_v_home',$send);

	}
	public function pesanan_edt_proses(){
		$pesanan_h_id = $this->input->post('pesanan_h_id');
		$data_pesanan_h = array(
			'akun_alamat_id' =>$this->input->post('akun_alamat_id'),
			'pesanan_h_tgl' =>$this->input->post('pesanan_h_tgl'),
			'pembayaran_id' =>$this->input->post('pembayaran_id'),
			'pesanan_h_ket' =>$this->input->post('pesanan_h_ket')
		);
		$this->db->where('pesanan_h_id',$pesanan_h_id);
		$this->db->update('t_pesanan_h',$data_pesanan_h);

		$data_pesanan_d = array(
			'pesanan_d_id' =>'',
			'pesanan_h_id' => $pesanan_h_id,
			'barang_id' => $this->input->post('barang_id'),
			'pesanan_d_jumlah' => $this->input->post('pesanan_d_jumlah'),
			'kurir_sub_id' => $this->input->post('kurir_id')
		);
		$this->db->insert('t_pesanan_d',$data_pesanan_d);
		return redirect(base_url('adm_pesanan/pesanan_edt/'.$pesanan_h_id));
	}
}
