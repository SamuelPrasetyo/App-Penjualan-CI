<?php


class Data_barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
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
        );

        $this->load->view('include/header', $data);
        $this->load->view('data_barang/form_barang');
        $this->load->view('include/footer');
    }

    public function action_create()
    {
        $get_input = array(
            'id' => $this->input->post('id_brg'),
            'nama_barang' => $this->input->post('nm_brg'),
            'kategori' => $this->input->post('ktg_brg'),
            'harga' => $this->input->post('hrg_brg'),
        );

        var_dump($get_input);

        $result = $this->Model_barang->get_add($get_input);

        if ($result) {
            $this->session->set_flashdata('success', 'Berhasil Input Data');
        } else {
            $this->session->set_flashdata('failed', 'Gagal Input Data');
        }

        if ($get_input['kategori'] == 'IPhone') {
            redirect('view_iphone');
        } else {
            redirect('view_macbook');
        }
    }

    public function update()
    {
        $data = array(
            'title' => 'Form Update Barang',
            'nama_user' => $this->session->userdata('nama_user'),
            'title_content' => 'Update Barang',
            'link1' => 'Forms',
            'link2' => 'Update Data Barang',
        );

        $id_brg = $this->uri->segment(2);

        $this->db->where('id_barang', $id_brg);
        $cek = $this->db->get('data_barang');

        if ($cek->num_rows() > 0) {
            foreach ($cek->result() as $row){
                $data_brg = array(
                    'id_brg' => $row->id_barang,
                    'nm_brg' => $row->nama_barang,
                    'ktg_brg' => $row->kategori,
                    'hrg_brg' => $row->harga_barang,
                );
            }
        } else {
            redirect('home');
        }

        $this->load->view('include/header', $data);
        $this->load->view('data_barang/update_barang', $data_brg);
        $this->load->view('include/footer');
    }

    public function action_update()
    {
        $get_update = array(
            'id' => $this->input->post('id_brg'),
            'nama_barang' => $this->input->post('nm_brg'),
            'kategori' => $this->input->post('ktg_brg'),
            'harga' => $this->input->post('hrg_brg'),
        );

        $result = $this->Model_barang->get_edit($get_update);

        if ($result) {
            $this->session->set_flashdata('success', 'Berhasil Update Data');
        } else {
            $this->session->set_flashdata('failed', 'Gagal Update Data');
        }

        if ($get_update['kategori'] == 'IPhone') {
            redirect('view_iphone');
        } else {
            redirect('view_macbook');
        }
    }

    public function delete()
    {
        $id_brg = $this->uri->segment(2);

        $this->db->where('id_barang', $id_brg);
        $cek = $this->db->get('data_barang');

        if ($cek->num_rows() > 0) {
            foreach ($cek->result() as $row){
                $data_brg = array(
                    'id_brg' => $row->id_barang,
                    'nm_brg' => $row->nama_barang,
                    'ktg_brg' => $row->kategori,
                    'hrg_brg' => $row->harga_barang,
                );
            }
        }

        $result = $this->Model_barang->get_delete($data_brg);

        if ($result) {
            $this->session->set_flashdata('success', 'Berhasil Hapus Data');
        } else {
            $this->session->set_flashdata('failed', 'Gagal Hapus Data');
        }

        if ($data_brg['ktg_brg'] == 'IPhone') {
            redirect('view_iphone');
        } else {
            redirect('view_macbook');
        }
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