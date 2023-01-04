<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminpanel extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/v_loginAdmin');
	} 

    public function actionLogin()
    {   
        $this->load->model('m_login');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $cek = $this->m_login->login_admin($username, $password)->num_rows();
        if ($cek == 1) {
            $data_session = array(
                'userName' => $username,
                'status' => 'login'
            );
            $this->session->set_userdata($data_session);
            redirect('Adminpanel/dashboard');
        } else {
            redirect('Adminpanel');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Adminpanel');
    }

    public function dashboard()
    {
        if (empty($this->session->userdata('userName'))) {
            redirect('Adminpanel');
        }
        $this->template->load('template/layout_admin', 'admin/v_dashboard');
    }

}
