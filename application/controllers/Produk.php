<?php

class produk extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('m_crud');
    if (empty($this->session->userdata('userName'))) {
      redirect('adminpanel');
    }
  }

  public function index()
  {
    $data['crosscheckdata'] = $this->m_crud->cek('tbl_produk');
    $data['produk'] = $this->m_crud->produk('tbl_produk')->result();
    $this->template->load('template/layout_admin', 'admin/produk/index', $data);
  }

  public function delete_hapus($id)
  {
    $where = array('idProduk' => $id);
    $this->m_crud->delete($where, 'tbl_produk');
    $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Data yang anda pilih berhasil dihapus !</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                  </div>');
    redirect('produk');
  }




}