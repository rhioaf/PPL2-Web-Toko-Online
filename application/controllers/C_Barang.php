<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Barang extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('m_barang');
    }

    public function display(){
        // List data yang digunakan pada view
        $list_data = array();
        $list_data['list_barang'] = $this->m_barang->getAllBarang();

        // Data kiriman untuk template
        $data = array();
        $data['data'] = $list_data;
        $data['destination_pages'] = "pages/barang/v_barang_display";
        $this->load->view('pages/v_template', $data);
    }

}

?>