<?php
defined('BASEPATH') or die ('Error');


class M_cari extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
	public function cariOrang()
	{
		$cari = $this->input->GET('cari', TRUE);
		$data = $this->db->query("SELECT * FROM t_barang where barang_nama like '%$cari%' ");
		return $data->result();
	}
 
}