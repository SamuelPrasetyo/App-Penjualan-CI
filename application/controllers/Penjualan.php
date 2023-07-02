<?php

class Penjualan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_penjualan');

        if ($this->session->userdata('id') == "1") {
            redirect('login');
        }
    }

    public function get_barang()
    {
        $nama_barang = $this->input->post('nama_barang'); // Mengambil nilai nama_barang dari request POST

        $this->db->select('id_barang, nama_barang, harga_barang');
        $this->db->from('data_barang');
        $this->db->where('nama_barang', $nama_barang); // Menambahkan kondisi WHERE untuk memfilter berdasarkan nama_barang
        $result = $this->db->get()->row(); // Mengambil hasil query hanya sebagai satu baris (objek)

        echo json_encode($result); // Mengembalikan hasil query dalam format JSON
    }

    public function get_harga_barang()
    {
        $nama_barang = $this->input->post('nama_barang');

        // Query database untuk mendapatkan harga barang berdasarkan nama_barang
        $result = $this->Model_penjualan->get_harga_barang($nama_barang);

        if ($result) {
            $harga_barang = $result->harga_barang;
        } else {
            $harga_barang = "Error";
        }

        // Menyusun data harga barang dalam format JSON dan mengembalikannya sebagai respon
        $data = array('harga_barang' => $harga_barang);
        echo json_encode($data);
    }

    public function view_penjualan()
    {
        $get_penjualan = $this->Model_penjualan->history_penjualan();
        $data = array(
            'get_penjualan' => $get_penjualan,
            'title' => 'History Penjualan',
            'nama_user' => $this->session->userdata('nama_user'),
            'title_content' => 'History Penjualan Barang',
            'link1' => 'Penjualan',
            'link2' => 'History Penjualan',
            'card_title' => 'History Transaksi'
        );

        $this->load->view('include/header', $data);
        $this->load->view('entri_penjualan/history_penjualan');
        $this->load->view('include/footer');
    }

    public function create()
    {   
        // ID Pembayaran Otomatis sesuai Tanggal + Unik ID
		$koneksi = mysqli_connect ("localhost", "root", "", "app_penjualan");
		$kode = '';
		// cek kode
		$query = mysqli_query($koneksi, "SELECT max(right(id_transaksi, 4)) AS kode FROM penjualan WHERE DATE(tgl_beli) = CURDATE()");

		if ($query->num_rows > 0) {
			foreach ($query as $q) {
				$no = ((int)$q['kode'])+1;
				$kd = sprintf("%04s", $no);
				}
			} else {
				$kd = "0001";
		}

		date_default_timezone_set('Asia/Jakarta');
		$kode = date('dmy').$kd;

		// Tanggal Bayar Otomatis sesuai Tanggal
		$tanggal = date("dd/mm/yy");

        $data = array(
            'title' => 'Form Entri Penjualan',
            'nama_user' => $this->session->userdata('nama_user'),
            'title_content' => 'Form Penjualan',
            'link1' => 'Forms',
            'link2' => 'Entri Penjualan',
            'id_transaksi' => $kode,
            'tgl' => $tanggal,
        );

        $this->load->view('include/header', $data);
        $this->load->view('entri_penjualan/form_penjualan');
        $this->load->view('include/footer');
    }

    public function action_create()
    {
        $get_input = array(
            'id' => $this->input->post('id_tsk'),
            'nama_pembeli' => $this->input->post('nm_pbl'),
            'item' => $this->input->post('item_brg'),
            'tgl' => $this->input->post('tgl_beli'),
            'harga' => $this->input->post('hrg_brg'),
        );

        $result = $this->Model_penjualan->get_add($get_input);

        if ($result) {
            $this->session->set_flashdata('success', 'Berhasil Input Data');
        } else {
            $this->session->set_flashdata('failed', 'Gagal Input Data');
        }

        redirect('view_penjualan');
    }

    public function update()
    {
        $data = array(
            'title' => 'Form Update Transaksi',
            'nama_user' => $this->session->userdata('nama_user'),
            'title_content' => 'Update Penjualan',
            'link1' => 'Forms',
            'link2' => 'Update Data Penjualan',
        );

        $id_pjl = $this->uri->segment(2);

        $this->db->where('id_transaksi', $id_pjl);
        $cek = $this->db->get('penjualan');

        if ($cek->num_rows() > 0) {
            foreach ($cek->result() as $row){
                $data_pjl = array(
                    'id_pjl' => $row->id_transaksi,
                    'tgl' => $row->tgl_beli,
                    'nm_pbl' => $row->nama_pembeli,
                    'item_dibeli' => $row->item_dibeli,
                    'hrg' => $row->total_harga,
                );
            }
        } else {
            redirect('view_penjualan');
        }

        $this->load->view('include/header', $data);
        $this->load->view('entri_penjualan/update_penjualan', $data_pjl);
        $this->load->view('include/footer');
    }

    public function action_update()
    {
        $get_update = array(
            'id' => $this->input->post('id_tsk'),
            'nama_pembeli' => $this->input->post('nm_pbl'),
            'item' => $this->input->post('item_brg'),
            'tgl' => $this->input->post('tgl_beli'),
            'harga' => $this->input->post('hrg_brg'),
        );

        $result = $this->Model_penjualan->get_edit($get_update);

        if ($result) {
            $this->session->set_flashdata('success', 'Berhasil Update Data');
        } else {
            $this->session->set_flashdata('failed', 'Gagal Update Data');
        }
        
        redirect('view_penjualan');
    }

    public function delete()
    {
        $id_pjl = $this->uri->segment(2);

        $this->db->where('id_transaksi', $id_pjl);
        $cek = $this->db->get('penjualan');

        if ($cek->num_rows() > 0) {
            foreach ($cek->result() as $row){
                $data_pjl = array(
                    'id_pjl' => $row->id_transaksi,
                    'tgl' => $row->tgl_beli,
                    'nm_pbl' => $row->nama_pembeli,
                    'item_dibeli' => $row->item_dibeli,
                    'hrg' => $row->total_harga,
                );
            }
        }

        $result = $this->Model_penjualan->get_delete($data_pjl);

        if ($result) {
            $this->session->set_flashdata('success', 'Berhasil Hapus Data');
        } else {
            $this->session->set_flashdata('failed', 'Gagal Hapus Data');
        }

        redirect('view_penjualan');
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