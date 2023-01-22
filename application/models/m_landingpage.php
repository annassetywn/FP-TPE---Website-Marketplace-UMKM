<?php

class m_landingpage extends CI_model
{
    public function get_all_produk(){
        $this->db->select('*');
		$this->db->from('tbl_produk');
		$this->db->join('tbl_kategori', 'tbl_produk.idKategori = tbl_kategori.idKategori');
        $this->db->join('tbl_toko', 'tbl_produk.idToko = tbl_toko.idToko');
		return $this->db->get();
    }

    public function insert_reg($data)
    {
        return $this->db->insert('tbl_pembeli',$data);
    }
}