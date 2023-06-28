<?php


class Data_barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_barang');

        if ($this->session->userdata('id') == "1") {
            redirect('login');
        }

        $this->folder = 'data_barang';
    }

    public function view_iphone() 
    {
        $get_iphone = $this->Model_barang->view_iphone();
        $data = array(
            'get_barang' => $get_iphone,
            'title' => 'Data Iphone',
            'nama_user' => $this->session->userdata('nama_user'),
            'title_content' => 'Data Iphone',
            'link1' => 'Data Barang',
            'link2' => 'Iphone',
            'card_title' => 'Iphone'
        );

        $this->load->view('include/header', $data);
        $this->load->view('data_barang/view_barang');
        $this->load->view('include/footer');
    }

    public function view_macbook()
    {
        $get_macbook = $this->Model_barang->view_macbook();
        $data = array(
            'get_barang' => $get_macbook,
            'title' => 'Data Macbook',
            'nama_user' => $this->session->userdata('nama_user'),
            'title_content' => 'Data Macbook',
            'link1' => 'Data Barang',
            'link2' => 'Macbook',
            'card_title' => 'Macbook'
        );

        $this->load->view('include/header', $data);
        $this->load->view('data_barang/view_barang');
        $this->load->view('include/footer');
    }

    public function create()
    {
        $data = array(
            'title' => 'Form Entri Barang',
            'nama_user' => $this->session->userdata('nama_user'),
            'title_content' => 'Form Barang',
            'link1' => 'Forms',
            'link2' => 'Entri Data Barang',
            'card_title' => 'Macbook'
        );

        $this->load->view('include/header', $data);
        $this->load->view('data_barang/form_barang');
        $this->load->view('include/footer');
    }

    public function laporan() 
    {
        $get_barang = $this->Model_barang->view_laporanbarang();
        $data = array(
            'get_barang' => $get_barang,
            'title' => 'Laporan Data Barang',
            'nama_user' => $this->session->userdata('nama_user'),
            'title_content' => 'Laporan Data Barang',
            'link1' => 'Laporan',
            'link2' => 'Laporan Data Barang'
        );

        $this->load->view('include/header', $data);
        $this->load->view('data_barang/laporan_barang');
        $this->load->view('include/footer');
    }
}
?>