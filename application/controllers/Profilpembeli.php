<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profilpembeli extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_crud');
		$this->load->model('m_landingpage');
		$this->load->helper('form','file');
        $this->load->library('form_validation');
        if (empty($this->session->userdata('userName'))) {
            redirect('landingpage/loginpembeli');
          }
    }

	public function index()
	{
        $data['session_user'] = $this->db->get_where('tbl_pembeli' , ['usernamePembeli' => $this->session->userdata('userName')])->row();
        $this->template->load('template/layout_pembeli', 'pembeli/dashboard', $data);
	} 

    public function pesanan(){

        $data['session_user'] = $this->db->get_where('tbl_pembeli' , ['usernamePembeli' => $this->session->userdata('userName')])->row();
        $data['crosscheckdata'] = $this->m_crud->cek('tbl_order');
        $data['pesanan'] = $this->m_crud->pesanan('tbl_pembeli')->result();
        $this->template->load('template/layout_pembeli', 'pembeli/pesanan', $data);
    }

    public function buktibayar($id){
        $data['session_user'] = $this->db->get_where('tbl_pembeli' , ['usernamePembeli' => $this->session->userdata('userName')])->row();
        $dataWhere = array('idDetailOrder' => $id);
        $data['pembayaran'] = $this->m_crud->get_data_pembayaran('tbl_detailorder', $dataWhere)->row_object();
        $this->template->load('template/layout_pembeli', 'pembeli/formbuktibayar', $data);
    }

    public function saveuploadbuktibayar() {
        $id = $this->input->post('idDetailOrder');
        $buktibayar = $_FILES['buktibayar'];

        if($_FILES['buktibayar']['name'] == null) {
            $buktibayar = ' ';
        } else {
            $config['upload_path'] = './assets/img/buktibayar';
            $config['allowed_types'] = 'jpg|png|gif';
			$config['max_size']     = '1048';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('buktibayar')) {

                $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Proses upload buktibayar gagal!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  	</div>');
                redirect('profilpembeli/pesanan');
            } else {
                $buktibayar = $this->upload->data('file_name');
            }
        }

        $data = array(
            'buktibayar' => $buktibayar,
        );

        $this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Bukti bayar berhasil ditambahkan, silahkan tunggu konfirmasi penjual dan pesanan anda segera dikirim!</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
        $this->m_crud->update('tbl_detailorder', $data, 'idDetailOrder', $id);
        redirect('profilpembeli/pesanan');
    } 

    public function riwayatpesanan(){

        $data['session_user'] = $this->db->get_where('tbl_pembeli' , ['usernamePembeli' => $this->session->userdata('userName')])->row();
        $data['crosscheckdata'] = $this->m_crud->cek('tbl_order');
        $data['pesanan'] = $this->m_crud->pesanan('tbl_pembeli')->result();
        $this->template->load('template/layout_pembeli', 'pembeli/riwayatpesanan', $data);
    }


}