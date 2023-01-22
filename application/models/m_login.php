<?php

class m_login extends CI_Model{

    public function login_admin($username, $password)
    {
        $query = $this->db->get_where('tbl_admin', array('userName' => $username, 'password' => $password));
        return $query;
    }

    public function login_pembeli($usernamePembeli, $password)
    {
        $query = $this->db->get_where('tbl_pembeli', array('idPembeli' ,'usernamePembeli' => $usernamePembeli, 'password' => $password));
        return $query;
    }

    public function login_penjual($usernamePenjual, $password)
    {
        $query = $this->db->get_where('tbl_penjual', array('idPenjual' ,'usernamePenjual' => $usernamePenjual, 'password' => $password));
        return $query;
    }
}