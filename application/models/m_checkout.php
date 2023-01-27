<?php

class m_checkout extends CI_Model

{

	public function get_by_id($table,$id){
		$this->db->join('tbl_toko', 'tbl_produk.idToko = tbl_toko.idToko');
		
		return $this->db->get_where($table,$id);

	}

    public function insertCheckout($table, $data){
        $query = $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

}