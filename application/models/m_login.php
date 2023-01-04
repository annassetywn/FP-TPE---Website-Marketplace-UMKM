<?php

class m_login extends CI_Model{

    public function login_admin($username, $password)
    {
        $query = $this->db->get_where('tbl_admin', array('userName' => $username, 'password' => $password));
        return $query;
    }
}