<?php

class m_crud extends CI_Model{

	public function get_all_data($table){
		$query = $this->db->get($table);
		return $query;
	}

    public function cek($table){
		$this->db->select('*');
		$this->db->from($table);
		return $this->db->get()->num_rows();
	}

	public function insert($table,$data){
		$this->db->insert($table,$data);
	}

	public function get_by_id($table,$id){
		return $this->db->get_where($table,$id);
	}

	public function update($table,$data,$pk,$id){
		$this->db->where($pk,$id);
		$this->db->update($table,$data);
	}

	public function delete($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function toko(){
		$this->db->select('*');
		$this->db->from('tbl_toko');
		$this->db->join('tbl_penjual', 'tbl_toko.idPenjual = tbl_penjual.idPenjual');
		return $this->db->get();
	}

	public function produk(){
		$this->db->select('*');
		$this->db->from('tbl_produk');
		$this->db->join('tbl_toko', 'tbl_produk.idToko = tbl_toko.idToko');
		$this->db->join('tbl_penjual', 'tbl_toko.idPenjual = tbl_penjual.idPenjual');
		return $this->db->get();
	}

	
}