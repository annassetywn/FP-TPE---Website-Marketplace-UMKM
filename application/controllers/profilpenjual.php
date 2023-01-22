<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profilpenjual extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_crud');
		$this->load->model('m_landingpage');
		$this->load->helper('form','file');
        $this->load->library('form_validation');
        if (empty($this->session->userdata('userName'))) {
            redirect('landingpage/loginpenjual');
          }
    }

	public function index()
	{
        $data['session_user'] = $this->db->get_where('tbl_penjual' , ['usernamePenjual' => $this->session->userdata('userName')])->row();
        $this->template->load('template/layout_penjual', 'penjual/dashboard', $data);
	} 

    public function toko(){
        $data['session_user'] = $this->db->get_where('tbl_penjual' , ['usernamePenjual' => $this->session->userdata('userName')])->row();
        $data['crosscheckdata'] = $this->m_crud->cek('tbl_toko');
        $data['kelolatoko'] = $this->m_crud->kelolatoko('tbl_toko')->result();
       
        $this->template->load('template/layout_penjual', 'penjual/toko', $data);
    }

    public function addtoko(){
        $data['bank'] = $this->m_crud->get_all_data('tbl_bank')->result();
        $data['session_user'] = $this->db->get_where('tbl_penjual' , ['usernamePenjual' => $this->session->userdata('userName')])->row();
        $this->template->load('template/layout_penjual', 'penjual/form_addtoko', $data);
    }

    public function saveaddtoko(){
        $idBank = $this->input->post('idBank');
        $noRekening = $this->input->post('noRekening');
        $namaRekening = $this->input->post('namaRekening');
        $data1 = array(
            'idBank' => $idBank,
            'noRekening' => $noRekening,
            'namaRekening' => $namaRekening
        );

        $idRekening = $this->m_crud->insertToko('tbl_rekening', $data1);
        
        $idPenjual = $this->input->post('idPenjual');
        $namaToko = $this->input->post('namaToko');
        $deskripsi = $this->input->post('deskripsi');
        $alamatToko = $this->input->post('alamatToko');

        $logotoko = $_FILES['logotoko'];

        if($_FILES['logotoko']['name'] == null) {
            $logotoko = ' ';
        } else {
            $config['upload_path'] = './assets/img/logotoko';
            $config['allowed_types'] = 'jpg|png|gif';
			$config['max_size']     = '1048';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('logotoko')) {

                $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Proses upload logo toko gagal!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  	</div>');
                redirect('profilpenjual/addtoko');
            } else {
                $logotoko = $this->upload->data('file_name');
            }
        }
        
        $data = array(
            'idPenjual' => $idPenjual,
            'namaToko' => $namaToko,
            'deskripsi' => $deskripsi,
            'alamatToko' => $alamatToko,
            'logotoko' => $logotoko,
            'idRekening' => $idRekening
        );

        $this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Data toko berhasil ditambahkan !</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');

        $insert1 = $this->m_crud->insertToko('tbl_toko', $data);
        redirect('profilpenjual/toko');
        
    }

    public function produk(){
        $data['session_user'] = $this->db->get_where('tbl_penjual' , ['usernamePenjual' => $this->session->userdata('userName')])->row();
        $data['kelolaproduk'] = $this->m_crud->kelolaproduk('tbl_produk')->result();
        $data['crosscheckdata'] = $this->m_crud->cek('tbl_produk');
        $this->template->load('template/layout_penjual', 'penjual/produk', $data);
    }

    public function addProduk(){
        $data['kategori'] = $this->m_crud->get_all_data('tbl_kategori')->result();
        $data['session_user'] = $this->db->get_where('tbl_penjual' , ['usernamePenjual' => $this->session->userdata('userName')])->row();
        $data['gettokobypenjual'] = $this->m_crud->gettokobypenjual('tbl_toko')->result();
        $data['crosscheckdata'] = $this->m_crud->cek('tbl_produk');
        $this->template->load('template/layout_penjual', 'penjual/form_addproduk', $data);
    }
    
    public function saveaddproduk(){
        $namaProduk = $this->input->post('namaProduk');
        $idToko = $this->input->post('idToko');
        $idKategori = $this->input->post('idKategori');
        $hargaProduk = $this->input->post('hargaProduk');
        $deskripsiProduk = $this->input->post('deskripsiProduk');
        $beratProduk = $this->input->post('beratProduk');
        $stokProduk = $this->input->post('stokProduk');
        
        $fotoproduk = $_FILES['fotoproduk'];

        if($_FILES['fotoproduk']['name'] == null) {
            $fotoproduk = ' ';
        } else {
            $config['upload_path'] = './assets/img/fotoproduk';
            $config['allowed_types'] = 'jpg|png|gif';
			$config['max_size']     = '1048';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('fotoproduk')) {

                $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Proses upload foto produk gagal!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  	</div>');
                redirect('profilpenjual/addproduk');
            } else {
                $fotoproduk = $this->upload->data('file_name');
            }
        }

        $data = array(
            'namaProduk' => $namaProduk,
            'idToko' => $idToko,
            'idKategori' => $idKategori,
            'hargaProduk' => $hargaProduk,
            'deskripsiProduk' => $deskripsiProduk,
            'beratProduk' => $beratProduk,
            'stokProduk' => $stokProduk,
            'fotoProduk' => $fotoproduk
        );

        $this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Data produk berhasil ditambahkan !</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
        
        $this->m_crud->insert('tbl_produk', $data);
        redirect('profilpenjual/produk');
    }

    public function editproduk($id){
        $data['kelolaproduk'] = $this->m_crud->kelolaproduk('tbl_produk')->result();
        $data['kategori'] = $this->m_crud->get_all_data('tbl_kategori')->result();
        $data['session_user'] = $this->db->get_where('tbl_penjual' , ['usernamePenjual' => $this->session->userdata('userName')])->row();
        $dataWhere = array('idProduk' => $id);
        $data['produk'] = $this->m_crud->get_by_id('tbl_produk', $dataWhere)->row_object();
        $this->template->load('template/layout_penjual', 'penjual/form_editproduk', $data);
    }

    public function saveeditproduk(){
        $id = $this->input->post('idProduk');
        $namaProduk = $this->input->post('namaProduk');
        $idToko = $this->input->post('idToko');
        $idKategori = $this->input->post('idKategori');
        $hargaProduk = $this->input->post('hargaProduk');
        $deskripsiProduk = $this->input->post('deskripsiProduk');
        $beratProduk = $this->input->post('beratProduk');
        $stokProduk = $this->input->post('stokProduk');
        
        $fotoproduk = $_FILES['fotoproduk'];

        if($_FILES['fotoproduk']['name'] == null) {
            $fotoproduk = ' ';
        } else {
            $config['upload_path'] = './assets/img/fotoproduk';
            $config['allowed_types'] = 'jpg|png|gif';
			$config['max_size']     = '1048';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('fotoproduk')) {

                $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Proses upload foto produk gagal!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  	</div>');
                redirect('profilpenjual/addproduk');
            } else {
                $fotoproduk = $this->upload->data('file_name');
            }
        }

        $update = array(
            'namaProduk' => $namaProduk,
            'idToko' => $idToko,
            'idKategori' => $idKategori,
            'hargaProduk' => $hargaProduk,
            'deskripsiProduk' => $deskripsiProduk,
            'beratProduk' => $beratProduk,
            'stokProduk' => $stokProduk,
            'fotoProduk' => $fotoproduk
        );

        $this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Data produk berhasil diedit !</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
        
        $this->m_crud->update('tbl_produk', $update, 'idProduk', $id);
        redirect('profilpenjual/produk');
    }

    public function hapusproduk($id)
    {
      $where = array('idProduk' => $id);
      $this->m_crud->delete($where, 'tbl_produk');
      $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data yang anda pilih berhasil dihapus !</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
      redirect('profilpenjual/produk');
    }

    public function pesananmasuk(){
        $data['session_user'] = $this->db->get_where('tbl_penjual' , ['usernamePenjual' => $this->session->userdata('userName')])->row();
        $data['kelolapesananmasuk'] = $this->m_crud->kelolapesananmasuk('tbl_toko')->result();
        $data['crosscheckdata'] = $this->m_crud->cek('tbl_order');
        $this->template->load('template/layout_penjual', 'penjual/pesananmasuk', $data);
    }

    public function editstatuspesanan($id){
        $data['session_user'] = $this->db->get_where('tbl_penjual' , ['usernamePenjual' => $this->session->userdata('userName')])->row();
        $dataWhere = array('idOrder' => $id);
        $data['status'] = $this->m_crud->get_by_id('tbl_order', $dataWhere)->row_object();
        $this->template->load('template/layout_penjual', 'penjual/editstatuspesanan', $data);
		
	}

    public function savestatuspesanan(){

        $id = $this->input->post('idOrder');
        $status = $this->input->post('statuspesanan');
        $dataUpdate = array('statusOrder' => $status);
        $this->m_crud->update('tbl_order', $dataUpdate, 'idOrder', $id);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data yang anda ubah berhasil disimpan !</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('profilpenjual/pesananmasuk');


    }



}