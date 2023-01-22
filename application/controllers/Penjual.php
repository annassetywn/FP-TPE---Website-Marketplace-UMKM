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

  public function add(){
    $this->template->load('template/layout_admin', 'admin/penjual/form_addPenjual');
  }

  public function save(){
    $username = $this->input->post('username');
    $namaLengkap = $this->input->post('namaLengkap');
    $email = $this->input->post('email');
    $noTelepon = $this->input->post('noTelepon');
    $password = $this->input->post('password');
    $dataInsert = array(
      'usernamePenjual' => $username,
      'namalengkapPenjual' => $namaLengkap,
      'emailPenjual' => $email,
      'teleponPenjual' => $noTelepon,
      'password' => $password
    );

    $cek = $this->m_crud->get_by_id('tbl_penjual', $dataInsert);

    if ($dataInsert == NULL) {
      $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
	  		      <strong>Upss.. Sepertinya anda belum memasukan data apapun,</strong>
	  			  <strong>mohon isi data terlebih dahulu !</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
      redirect('penjual/add');
    } else {
      if ($cek->num_rows() == 1) {
        $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
		          <strong>Data yang anda masukan seudah ada !</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
        redirect('penjual/add');
      } else {
        $this->m_crud->insert('tbl_penjual', $dataInsert);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		          <strong>Data penjual berhasil ditambahkan !</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
        redirect('penjual');
      }
    }
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

  public function getid($id)
  {
    $dataWhere = array('idPenjual' => $id);
    $data['penjual'] = $this->m_crud->get_by_id('tbl_penjual', $dataWhere)->row_object();
    $this->template->load('template/layout_admin', 'admin/penjual/form_editPenjual', $data);
  }

  public function saveedit(){
    $id = $this->input->post('idPenjual');
    $username = $this->input->post('username');
    $namaLengkap = $this->input->post('namaLengkap');
    $email = $this->input->post('email');
    $noTelepon = $this->input->post('noTelepon');
    $password = $this->input->post('password');

    $dataUpdate = array(
      'idPenjual' => $id,
      'usernamePenjual' => $username,
      'namalengkapPenjual' => $namaLengkap,
      'emailPenjual' => $email,
      'teleponPenjual' => $noTelepon,
      'password' => $password
    );

    $this->m_crud->update('tbl_penjual', $dataUpdate, 'idPenjual', $id);
    $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Data penjual yang anda ubah berhasil disimpan !</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>');
    redirect('penjual');
  }

}