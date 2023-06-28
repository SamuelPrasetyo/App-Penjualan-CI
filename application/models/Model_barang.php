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
        $this->db->where('kategori', 'Mac');
        return $this->db->get('data_barang');
    }

    public function get_add($get_input)
    {
        $cek_input = array(
            'id_barang' => $get_input['id'],
            'nama_barang' => $get_input['nama_barang'],
            'kategori' => $get_input['kategori'],
            'harga_barang' => $get_input['harga'],
        );

        $data = array(
            'id_barang' => $get_input['id'],
            'nama_barang' => $get_input['nama_barang'],
            'kategori' => $get_input['kategori'],
            'harga_barang' => $get_input['harga'],
        );

        $this->db->where($cek_input);
        $query = $this->db->get('data_barang');

        if ($query->num_rows() > 0) {
            return 0;
        } else {
            $this->db->insert('data_barang', $data);
            return 1;
        }
    }

    public function view_laporanbarang() 
    {
        return $this->db->get('data_barang');
    }
}


?>