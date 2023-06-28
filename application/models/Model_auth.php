<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_auth extends CI_Model{
    
    function __construct()
    {
        parent::__construct();
    }

    public function auth_admin($username, $password) 
    {
        $query = $this->db->query("SELECT * FROM users where nip='$username' AND password='$password' LIMIT 1");

        if ($query->num_rows() > 0) {
            $row = $query->row();

            $data_session = array(
                'nip' => $row->nip,
                'password' => $row->password,
                'nama_admin' => $row->nama_pegawai
            );

            $this->session->set_userdata($data_session);
        }
        return $query;
    }

    public function auth_pegawai($username, $password) 
    {
        $query = $this->db->query("SELECT * FROM users where nip='$username' AND password='$password' LIMIT 1");

        if ($query->num_rows() > 0) {
            $row = $query->row();

            $data_session = array(
                'nip' => $row->nip,
                'password' => $row->password,
                'nama_pegawai' => $row->nama_pegawai
            );

            $this->session->set_userdata($data_session);
        }
        return $query;
    }
}

?>