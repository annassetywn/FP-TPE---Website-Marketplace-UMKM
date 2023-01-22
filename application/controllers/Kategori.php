<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
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
    $data['crosscheckdata'] = $this->m_crud->cek('tbl_kategori');
    $data['kategori'] = $this->m_crud->get_all_data('tbl_kategori')->result();
    $this->template->load('template/layout_admin', 'admin/kategori/index', $data);
  }

  public function add()
  {
    $this->template->load('template/layout_admin', 'admin/kategori/form_add');
  }

  public function save()
  {
    $namaKategori = $this->input->post('namaKategori');
    $dataInsert = array('namaKategori' => $namaKategori);
    $cek = $this->m_crud->get_by_id('tbl_kategori', $dataInsert);

    if ($namaKategori == NULL) {
      $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
	  		      <strong>Upss.. Sepertinya anda belum memasukan data apapun,</strong>
	  			  <strong>mohon isi data terlebih dahulu !</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
      redirect('kategori/add');
    } else {
      if ($cek->num_rows() == 1) {
        $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
		          <strong>Data yang anda masukan seudah ada !</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
        redirect('kategori/add');
      } else {
        $this->m_crud->insert('tbl_kategori', $dataInsert);
        redirect('kategori');
      }
    }
  }

  public function getid($id)
  {
    $dataWhere = array('idKategori' => $id);
    $data['kategori'] = $this->m_crud->get_by_id('tbl_kategori', $dataWhere)->row_object();
    $this->template->load('template/layout_admin', 'admin/kategori/form_edit', $data);
  }

  public function edit()
  {
    $id = $this->input->post('id');
    $namaKategori = $this->input->post('namaKategori');
    $dataUpdate = array('namaKategori' => $namaKategori);
    $this->m_crud->update('tbl_kategori', $dataUpdate, 'idKategori', $id);
    $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Data yang anda ubah berhasil disimpan !</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>');
    redirect('kategori');
  }

  public function delete_hapus($id)
  {
    $where = array('idKategori' => $id);
    $this->m_crud->delete($where, 'tbl_kategori');
    $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Data yang anda pilih berhasil dihapus !</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                  </div>');
    redirect('kategori');
  }

}