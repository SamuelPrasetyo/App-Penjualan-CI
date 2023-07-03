<?php

class Model_dashboard extends CI_Model
{
    public function get_jumlah_barang_dibeli() {
        $tahunIni = date('Y');
    
        $query = $this->db->select('item_dibeli, COUNT(*) as jumlah')
                          ->group_by('item_dibeli')
                          ->where("YEAR(tgl_beli) = '$tahunIni'")
                          ->get('penjualan');
        return $query->result_array();
    }    

    public function getJumlahBarangTerjual() {
        $today = date('Y-m-d');

        $query = $this->db->query("SELECT item_dibeli, COUNT(*) AS total_jumlah FROM penjualan WHERE tgl_beli = '$today'");
        $result = $query->row();

        return $result->total_jumlah;
    }

    public function getStatistikPendapatan() {
        $today = date('Y-m-d');

        $query = $this->db->query("SELECT SUM(total_harga) AS total_pendapatan FROM penjualan WHERE tgl_beli = '$today'");
        $result = $query->row();

        return $result->total_pendapatan;
    }

    public function getPenjualanAwalTahun() {
        $tahunIni = date('Y');
    
        $query = $this->db->query("SELECT SUM(total_harga) AS total_pendapatan FROM penjualan WHERE YEAR(tgl_beli) = '$tahunIni'");
        $result = $query->row();
    
        return $result->total_pendapatan;
    }

    public function getJumlahBarangAwalTahun() {
        $tahunIni = date('Y');

        $query = $this->db->query("SELECT item_dibeli, COUNT(*) AS total_jumlah FROM penjualan WHERE YEAR(tgl_beli) = '$tahunIni'");
        $result = $query->row();

        return $result->total_jumlah;
    }
    
}


?>