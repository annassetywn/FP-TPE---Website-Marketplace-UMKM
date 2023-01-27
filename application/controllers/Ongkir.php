<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ongkir extends CI_Controller
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
    $data['crosscheckdata'] = $this->m_crud->cek('tbl_ongkir');
    $data['ongkir'] = $this->m_crud->get_all_data('tbl_ongkir')->result();
    $this->template->load('template/layout_admin', 'admin/ongkir/index', $data);
  }

  public function add()
  {
    $this->template->load('template/layout_admin', 'admin/ongkir/form_add');
  }

  public function save()
  {
    $tujuanKirim = $this->input->post('tujuanKirim');
    $hargaKirim = $this->input->post('hargaKirim');
    $dataInsert = array(
        'tujuanKirim' => $tujuanKirim,
        'hargaKirim' => $hargaKirim
    );
    $cek = $this->m_crud->get_by_id('tbl_ongkir', $dataInsert);

    if ($tujuanKirim == NULL) {
      $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
	  		      <strong>Upss.. Sepertinya anda belum memasukan data apapun,</strong>
	  			  <strong>mohon isi data terlebih dahulu !</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
      redirect('ongkir/add');
    } else {
      if ($cek->num_rows() == 1) {
        $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
		          <strong>Data yang anda masukan seudah ada !</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
        redirect('ongkir/add');
      } else {
        $this->m_crud->insert('tbl_ongkir', $dataInsert);
        redirect('ongkir');
      }
    }
  }

  public function getid($id)
  {
    $dataWhere = array('idOngkir' => $id);
    $data['ongkir'] = $this->m_crud->get_by_id('tbl_ongkir', $dataWhere)->row_object();
    $this->template->load('template/layout_admin', 'admin/ongkir/form_edit', $data);
  }

  public function edit()
  {
    $id = $this->input->post('id');
    $tujuanKirim = $this->input->post('tujuanKirim');
    $hargaKirim = $this->input->post('hargaKirim');

    $dataUpdate = array(
        'tujuanKirim' => $tujuanKirim,
        'hargaKirim' => $hargaKirim
    );
    $this->m_crud->update('tbl_ongkir', $dataUpdate, 'idOngkir', $id);
    $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Data yang anda ubah berhasil disimpan !</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>');
    redirect('ongkir');
  }

  public function delete_hapus($id)
  {
    $where = array('idOngkir' => $id);
    $this->m_crud->delete($where, 'tbl_ongkir');
    $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Data yang anda pilih berhasil dihapus !</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                  </div>');
    redirect('kategori');
  }

}