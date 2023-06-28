<?php

class Model_barang extends CI_Model
{
    public function view_iphone()
    {
        $this->db->where('kategori', 'IPhone');
        return $this->db->get('data_barang');
    }

    public function view_macbook()
    {
        $this->db->where('kategori', 'Macbook');
        return $this->db->get('data_barang');
    }

    public function view_laporanbarang() 
    {
        return $this->db->get('data_barang');
    }
}


?>