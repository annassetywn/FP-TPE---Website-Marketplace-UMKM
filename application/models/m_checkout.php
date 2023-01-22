<?php

class m_checkout extends CI_Model

{

    public function find($id)
	{
		$result = $this->db->where('idProduk',$id)
						   ->limit(1)
						   ->get('tbl_produk');
		if($result->num_rows() > 0)
		{
			return $result->row();
		}else{
			return array();
		}
	}

    public function insertCheckout($table, $data){
        $query = $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

}