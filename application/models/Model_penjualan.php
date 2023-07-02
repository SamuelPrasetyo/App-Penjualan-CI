<?php

class Model_penjualan extends CI_Model
{
    public function history_penjualan()
    {
        return $this->db->get('penjualan');
    }

    public function get_harga_barang($nama_barang)
    {
        $this->db->select('harga_barang');
        $this->db->from('data_barang');
        $this->db->where('nama_barang', $nama_barang);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function get_add($get_input)
    {
        $cek_input = array(
            'id_transaksi' => $get_input['id'],
            'tgl_beli' => $get_input['tgl'],
            'nama_pembeli' => $get_input['nama_pembeli'],
            'item_dibeli' => $get_input['item'],
            'total_harga' => $get_input['harga'],
        );

        $data = array(
            'id_transaksi' => $get_input['id'],
            'tgl_beli' => $get_input['tgl'],
            'nama_pembeli' => $get_input['nama_pembeli'],
            'item_dibeli' => $get_input['item'],
            'total_harga' => $get_input['harga'],
        );

        $this->db->where($cek_input);
        $query = $this->db->get('penjualan');

        if ($query->num_rows() > 0) {
            return 0;
        } else {
            $this->db->insert('penjualan', $data);
            return 1;
        }
    }

    public function get_edit($get_update)
    {
        $cek_input = array(
            'id_transaksi' => $get_update['id'],
        );

        $data = array(
            'id_transaksi' => $get_update['id'],
            'tgl_beli' => $get_update['tgl'],
            'nama_pembeli' => $get_update['nama_pembeli'],
            'item_dibeli' => $get_update['item'],
            'total_harga' => $get_update['harga'],
        );

        $this->db->where($cek_input);
        $query = $this->db->get('penjualan');

        if ($query->num_rows() > 0) {
            $this->db->set($data);
            $this->db->where($cek_input);
            $this->db->update('penjualan');
            return 1;
        } else {
            $this->db->update('penjualan', $data);
            return 0;
        }
    }

    public function get_delete($data_pjl)
    {
        $cek['id_transaksi'] = $data_pjl;

        $data = array(
            'id_transaksi' => $data_pjl['id_pjl'],
            'tgl_beli' => $data_pjl['tgl'],
            'nama_pembeli' => $data_pjl['nm_pbl'],
            'item_dibeli' => $data_pjl['item_dibeli'],
            'total_harga' => $data_pjl['hrg'],
        );

        $this->db->where($data);
        $query = $this->db->get('penjualan');

        if ($query->num_rows() > 0) {
            $this->db->where($data);
            $this->db->delete('penjualan');
            return 1;
        } else {
            return 0;
        }
    }

    public function view_laporan_penjualan() 
    {
        $query = $this->db->get('penjualan');
        return $query->result();
    }
}

?>