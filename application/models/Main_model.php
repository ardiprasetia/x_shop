<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Main_model extends CI_Model{
    public function menu_k_utama(){
        $this->db->select('*');
		$this->db->where('kategori_brg_utama_flag',1);
        $query = $this->db->get('m_kategori_brg_utama');
        
        return $query->result();
    }

    public function menu_k_sub(){
		$this->db->select('*');
		$this->db->where('kategori_brg_sub_flag',1);
        $query = $this->db->get('m_kategori_brg_sub');
        
        return $query->result();
    }

}

?>
