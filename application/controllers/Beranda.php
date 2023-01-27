<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('m_crud');
	  $this->load->model('m_landingpage');
    $this->load->model('m_checkout');

    if (empty($this->session->userdata('userName'))) {
      redirect('landingpage/loginPembeli');
    }
  }

  public function index()
  {	
      $data['kategori'] = $this->m_crud->get_all_data('tbl_kategori')->result();
      $data['produk'] = $this->m_landingpage->get_all_produk('tbl_produk')->result();
      $data['ongkir'] = $this->m_crud->get_all_data('tbl_ongkir')->result();
      $data['session_user'] = $this->db->get_where('tbl_pembeli' , ['usernamePembeli' => $this->session->userdata('userName')])->row();
      $this->template->load('template/layout_beranda','beranda/index', $data);
  }

  public function logoutPembeli()
  {
        $this->session->sess_destroy();
        redirect('landingpage');
  }

  public function checkout($id){
      $dataWhere = array('idProduk' => $id);
      $data['produk'] = $this->m_checkout->get_by_id('tbl_produk', $dataWhere)->row_object();
      $data['kategori'] = $this->m_crud->get_all_data('tbl_kategori')->result();
      $data['ongkir'] = $this->m_crud->get_all_data('tbl_ongkir')->result();
      $data['session_user'] = $this->db->get_where('tbl_pembeli' , ['usernamePembeli' => $this->session->userdata('userName')])->row();
      $this->template->load('template/layout_beranda','beranda/checkout', $data);
  }

  public function insert_checkout(){
    $idPembeli = $this->input->post('idPembeli');
    $idToko = $this->input->post('idToko');
    $idOngkir = $this->input->post('idOngkir');
    $tglOrder = $this->input->post('tglOrder');
    $data1 = array(
      'idPembeli'=>$idPembeli,
      'idToko'=>$idToko,
      'idOngkir'=>$idOngkir,
      'tglOrder'=>$tglOrder,
    );
    $idOrder= $this->m_checkout->insertCheckout('tbl_order', $data1);

    $idProduk = $this->input->post('idProduk');
    $jumlah = $this->input->post('jumlah');
    $hargaProduk = $this->input->post('hargaProduk');
    $data = array(
      'idProduk' => $idProduk,
      'jumlah' => $jumlah,
      'harga' => $hargaProduk,
      'idOrder' => $idOrder
    );
    $insert1 = $this->m_checkout->insertCheckout('tbl_detailOrder', $data);
    redirect('profilpembeli/pesanan');
  }

}