<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landingpage extends CI_Controller {


	function __construct()
    {
        parent::__construct();
        $this->load->model('m_crud');
		$this->load->model('m_landingpage');
		$this->load->helper('form','file');
        $this->load->library('form_validation');
    }

	public function index()
	{	
		$data['kategori'] = $this->m_crud->get_all_data('tbl_kategori')->result();
        $data['produk'] = $this->m_landingpage->get_all_produk('tbl_produk')->result();
		$this->template->load('template/layout_landingpage', 'landingpage/index', $data);
	}

	public function registrasi(){
		$this->load->view('landingpage/registrasi');
	}

	public function insert_reg(){
    
		$this->form_validation->set_rules('username','Username','trim|required|is_unique[tbl_pembeli.usernamePembeli]');
        $this->form_validation->set_rules('namalengkap','Full Name','trim|required');
        $this->form_validation->set_rules('email','Email ID','trim|required|valid_email|is_unique[tbl_pembeli.emailPembeli]');
        $this->form_validation->set_rules('no_telepon','No Telpon','trim|required|numeric');
		$this->form_validation->set_rules('alamat','Alamat','trim|required');
        $this->form_validation->set_rules('password','Password','trim|required');
        $this->form_validation->set_rules('confirmpassword','Confirm Password','trim|required|matches[password]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->registrasi();
        }
        else
        {
           $data = array(
				'usernamePembeli' => $this->input->post('username'),
               	'namalengkapPembeli' => $this->input->post('namalengkap'),
              	'emailPembeli' => $this->input->post('email'),
               	'password' => $this->input->post('password'),
               	'alamatPembeli' => $this->input->post('alamat'),
               	'teleponPembeli' => $this->input->post('no_telepon'),
           );
        
           $register_user = new m_landingpage;
           $checking = $register_user->insert_reg($data);
           if($checking)
           {
               $this->session->set_flashdata('status','Registered Succesfully! Go to Login');
               redirect('landingpage/login');
           }
           else
           {
                $this->session->set_flashdata('status','Registered Failed');
                redirect('landingpage/registrasi');
           }

        }
    }

	public function loginPembeli(){
		$this->load->view('landingpage/loginPembeli');
	}

    public function actionLoginPembeli(){
        $this->load->model('m_login');
        $usernamePembeli = $this->input->post('usernamePembeli');
        $password = $this->input->post('password');
        $cek = $this->m_login->login_pembeli($usernamePembeli, $password)->num_rows();
        $result = $this->m_login->login_pembeli($usernamePembeli, $password)->result();
        if ($cek == 1) {
            $data_session = array(
                'idPembeli' => $result[0]->idPembeli,
                'userName' => $usernamePembeli,
                'status' => 'login'
            );
            $this->session->set_userdata($data_session);
            redirect('beranda');
        } else {
            redirect('landingpage/loginPembeli');
        }
    }

    public function loginPenjual(){
		$this->load->view('landingpage/loginPenjual');
	}

    public function actionLoginPenjual(){
        $this->load->model('m_login');
        $usernamePenjual = $this->input->post('username');
        $password = $this->input->post('password');
        $cek = $this->m_login->login_penjual($usernamePenjual, $password)->num_rows();
        $result = $this->m_login->login_penjual($usernamePenjual, $password)->result();
        if ($cek == 1) {
            $data_session = array(
                'idPenjual' => $result[0]->idPenjual,
                'userName' => $usernamePenjual,
                'status' => 'login'
            );
            $this->session->set_userdata($data_session);
            redirect('profilpenjual');
        } else {
            redirect('landingpage/loginPenjual');
        }
    }
}