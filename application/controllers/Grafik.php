<?php

class Grafik extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_grafik');
    }

    public function grafik_batang()
    {
        $data = array(
            'title' => 'Chart Penjualan',
            'nama_user' => $this->session->userdata('nama_user'),
            'title_content' => 'Chart Penjualan',
            'link1' => 'Grafik',
            'link2' => 'Chart Penjualan',
        );

        $grafik['penjualan'] = $this->Model_grafik->get_jumlah_barang_dibeli();

        $this->load->view('include/header', $data);
        $this->load->view('grafik/chart_penjualan', $grafik);
        $this->load->view('include/footer');
    }

    public function grafik_lingkaran()
    {
        $data = array(
            'title' => 'Pie Penjualan',
            'nama_user' => $this->session->userdata('nama_user'),
            'title_content' => 'Pie Penjualan',
            'link1' => 'Grafik',
            'link2' => 'Pie Penjualan',
        );

        $grafik['penjualan'] = $this->Model_grafik->get_jumlah_barang_dibeli();

        $this->load->view('include/header', $data);
        $this->load->view('grafik/pie_penjualan', $grafik);
        $this->load->view('include/footer');
    }
}


?>