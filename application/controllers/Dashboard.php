<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // Validasi jika user belum login
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url();
            redirect($url);
        }

        $this->load->model('Model_dashboard');
    }

    public function index()
    {
        $data = array(
            'title' => 'Home Admin',
            'nama_user' => $this->session->userdata('nama_user'),
            'title_content' => 'Home',
            'link1' => 'Dashboard',
            'link2' => 'Home'
        );

        $data_penjualan = array(
            'barangTerjual' => $this->Model_dashboard->getJumlahBarangTerjual(),
            'statistikPendapatan' => $this->Model_dashboard->getStatistikPendapatan(),
            'penjualanAwalTahun' => $this->Model_dashboard->getPenjualanAwalTahun(),
            'penjualan' => $this->Model_dashboard->get_jumlah_barang_dibeli(),
        );

        $this->load->view('include/header', $data);
        $this->load->view('dashboard/home', $data_penjualan);
        $this->load->view('include/footer');
    }

    // public function index()
    // {
    //     $data = array(
    //         'title' => 'Home Admin',
    //         'nama_user' => $this->session->userdata('nama_admin'),
    //     );
    //     $this->load->view('include/header', $data);
    //     $this->load->view('dashboard/home');
    //     $this->load->view('include/footer');
    // }

    // public function pegawai()
    // {
    //     $data = array(
    //         'title' => 'Home Pegawai',
    //         'nama_user' => $this->session->userdata('nama_pegawai'),
    //     );
    //     $this->load->view('include/header', $data);
    //     $this->load->view('dashboard/home');
    //     $this->load->view('include/footer');
    // }
}
?>