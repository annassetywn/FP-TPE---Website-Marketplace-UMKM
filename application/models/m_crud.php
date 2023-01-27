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

	public function pesanan(){
		$this->db->select('*');
		$this->db->from('tbl_order');
		$this->db->where('idPembeli' ,  $this->session->userdata('idPembeli'));
		$this->db->join('tbl_detailOrder', 'tbl_order.idOrder = tbl_detailOrder.idOrder');
		$this->db->join('tbl_toko', 'tbl_order.idToko = tbl_toko.idToko');
		$this->db->join('tbl_penjual', 'tbl_toko.idPenjual = tbl_penjual.idPenjual');
		$this->db->join('tbl_ongkir', 'tbl_order.idOngkir = tbl_ongkir.idOngkir');
		$this->db->join('tbl_produk', 'tbl_detailorder.idProduk = tbl_produk.idProduk');
		
		return $this->db->get();
	}

	public function get_data_pembayaran($table,$id){
		$this->db->join('tbl_order', 'tbl_order.idOrder = tbl_detailOrder.idOrder');
		$this->db->join('tbl_ongkir', 'tbl_order.idOngkir = tbl_ongkir.idOngkir');
		$this->db->join('tbl_toko', 'tbl_order.idToko = tbl_toko.idToko');
		$this->db->join('tbl_rekening', 'tbl_toko.idRekening = tbl_rekening.idRekening');
		$this->db->join('tbl_bank', 'tbl_rekening.idBank = tbl_bank.idBank');

		return $this->db->get_where($table,$id);
	}	

	public function kelolatoko(){
		$this->db->select('*');
		$this->db->from('tbl_toko');
		$this->db->where('idPenjual', $this->session->userdata('idPenjual'));
		$this->db->join('tbl_rekening', 'tbl_toko.idRekening = tbl_rekening.idRekening');
		$this->db->join('tbl_bank', 'tbl_rekening.idBank = tbl_bank.idBank');
		
		return $this->db->get();

	}

	public function insertToko($table, $data){
        $query = $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

	public function gettokobypenjual(){
		$this->db->select('*');
		$this->db->from('tbl_toko');
		$this->db->where('idPenjual', $this->session->userdata('idPenjual'));
		return $this->db->get();
	}

	public function kelolaproduk(){
		$this->db->select('*');
		$this->db->from('tbl_toko');
		$this->db->where('idPenjual', $this->session->userdata('idPenjual'));
		$this->db->join('tbl_produk', 'tbl_produk.idToko = tbl_toko.idToko');
		$this->db->join('tbl_kategori', 'tbl_produk.idKategori = tbl_kategori.idKategori');
		return $this->db->get();
	}

	public function kelolapesananmasuk(){
		$this->db->select('*');
		$this->db->from('tbl_toko');
		$this->db->where('idPenjual', $this->session->userdata('idPenjual'));
		$this->db->join('tbl_order', 'tbl_order.idToko = tbl_toko.idToko');
		$this->db->join('tbl_detailOrder', 'tbl_order.idOrder = tbl_detailOrder.idOrder');
		$this->db->join('tbl_produk', 'tbl_detailorder.idProduk = tbl_produk.idProduk');
		$this->db->join('tbl_pembeli', 'tbl_pembeli.idPembeli = tbl_Order.idPembeli');
		$this->db->join('tbl_ongkir', 'tbl_ongkir.idOngkir = tbl_Order.idOngkir');
		return $this->db->get();
	}
}