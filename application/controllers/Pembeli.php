<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembeli extends CI_Controller
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
    $data['crosscheckdata'] = $this->m_crud->cek('tbl_pembeli');
    $data['pembeli'] = $this->m_crud->get_all_data('tbl_pembeli')->result();
    $this->template->load('template/layout_admin', 'admin/pembeli/index', $data);
  }

  public function status_pembeli($idPembeli) {
    $where = array('idPembeli' => $idPembeli);
    $status = $this->m_crud->get_by_id('tbl_pembeli', $where)->row_object();
    
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

    $this->m_crud->update('tbl_pembeli', $update, 'idPembeli', $idPembeli);
    redirect('pembeli');
}

}