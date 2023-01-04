<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjual extends CI_Controller
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
    $data['crosscheckdata'] = $this->m_crud->cek('tbl_penjual');
    $data['penjual'] = $this->m_crud->get_all_data('tbl_penjual')->result();
    $this->template->load('template/layout_admin', 'admin/penjual/index', $data);
  }

  public function status_penjual($idPenjual) {
    $where = array('idPenjual' => $idPenjual);
    $status = $this->m_crud->get_by_id('tbl_penjual', $where)->row_object();
    
    if ($status->statusAktif == "Aktif") {
        $update = array('statusAktif' => "Nonaktif");
        $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Penjual berhasil di Non Aktifkan</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
    } else {
        $update = array('statusAktif' => "Aktif");
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Penjual Berhasil di Aktifkan</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
    }

    $this->m_crud->update('tbl_penjual', $update, 'idPenjual', $idPenjual);
    redirect('penjual');
}

}