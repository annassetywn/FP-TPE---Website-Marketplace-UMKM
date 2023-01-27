<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bank extends CI_Controller
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
    $data['crosscheckdata'] = $this->m_crud->cek('tbl_bank');
    $data['bank'] = $this->m_crud->get_all_data('tbl_bank')->result();
    $this->template->load('template/layout_admin', 'admin/bank/index', $data);
  }

  public function add()
  {
    $this->template->load('template/layout_admin', 'admin/bank/form_add');
  }

  public function save()
  {
    $namaBank = $this->input->post('namaBank');
    $dataInsert = array('namaBank' => $namaBank);
    $cek = $this->m_crud->get_by_id('tbl_bank', $dataInsert);

    if ($namaBank == NULL) {
      $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
	  		      <strong>Upss.. Sepertinya anda belum memasukan data apapun,</strong>
	  			  <strong>mohon isi data terlebih dahulu !</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
      redirect('bank/add');
    } else {
      if ($cek->num_rows() == 1) {
        $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
		          <strong>Data yang anda masukan seudah ada !</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
        redirect('bank/add');
      } else {
        $this->m_crud->insert('tbl_bank', $dataInsert);
        redirect('bank');
      }
    }
  }

  public function getid($id)
  {
    $dataWhere = array('idBank' => $id);
    $data['bank'] = $this->m_crud->get_by_id('tbl_bank', $dataWhere)->row_object();
    $this->template->load('template/layout_admin', 'admin/bank/form_edit', $data);
  }

  public function edit()
  {
    $id = $this->input->post('id');
    $namaBank = $this->input->post('namaBank');
    $dataUpdate = array('namaBank' => $namaBank);
    $this->m_crud->update('tbl_bank', $dataUpdate, 'idBank', $id);
    $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Data yang anda ubah berhasil disimpan !</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>');
    redirect('bank');
  }

  public function delete_hapus($id)
  {
    $where = array('idBank' => $id);
    $this->m_crud->delete($where, 'tbl_bank');
    $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Data yang anda pilih berhasil dihapus !</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                  </div>');
    redirect('bank');
  }

}