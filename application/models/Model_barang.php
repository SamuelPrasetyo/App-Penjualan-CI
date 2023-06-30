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

    public function get_edit($get_update)
    {
        $cek_input = array(
            'id_barang' => $get_update['id'],
        );

        $data = array(
            'nama_barang' => $get_update['nama_barang'],
            'kategori' => $get_update['kategori'],
            'harga_barang' => $get_update['harga'],
        );

        $this->db->where($cek_input);
        $query = $this->db->get('data_barang');

        if ($query->num_rows() > 0) {
            $this->db->set($data);
            $this->db->where($cek_input);
            $this->db->update('data_barang');
            return 1;
        } else {
            $this->db->update('data_barang', $data);
            return 0;
        }
    }

    public function get_delete($data_brg)
    {
        $cek['id_barang'] = $data_brg;

        $data = array(
            'id_barang' => $data_brg['id_brg'],
            'nama_barang' => $data_brg['nm_brg'],
            'kategori' => $data_brg['ktg_brg'],
            'harga_barang' => $data_brg['hrg_brg'],
        );

        $this->db->where($data);
        $query = $this->db->get('data_barang');

        if ($query->num_rows() > 0) {
            $this->db->where($data);
            $this->db->delete('data_barang');
            return 1;
        } else {
            return 0;
        }
    }

    public function view_laporanbarang() 
    {
        return $this->db->get('data_barang');
    }
}


?>