<?php

class toko extends CI_Controller
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
    $data['crosscheckdata'] = $this->m_crud->cek('tbl_toko');
    $data['toko'] = $this->m_crud->toko('tbl_toko')->result();
    $this->template->load('template/layout_admin', 'admin/toko/index', $data);
  }

}