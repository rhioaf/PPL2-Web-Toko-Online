<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Cart extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('m_barang');
    }

    public function display(){
        // List data yang digunakan pada view
        $list_data = array();
        $data_cart_session = $this->session->userdata('data_cart');
        if(!is_null($data_cart_session)){
            $data_cart_session['list'] = array_values($data_cart_session['list']);
        }
        $list_data['data_cart'] = $data_cart_session;

        // Data kiriman untuk template
        $data = array();
        $data['data'] = $list_data;
        $data['destination_pages'] = "pages/cart/v_cart_display_v2";
        $this->load->view('pages/v_template', $data);
    }

    public function store(){
        $data_cart_session = $this->session->userdata('data_cart');
        $data_barang = $this->m_barang->getDetailBarangById($this->input->post('id_barang'));
        $data_cart = array(
            'id_barang' => $this->input->post('id_barang'),
            'jml_barang' => 1,
            'harga_barang' => $this->input->post('harga_barang'),
            'berat_barang'  => $data_barang->berat_barang,
            'nama_barang' => $data_barang->nama_barang,
            'stok_barang' => $data_barang->stok_barang,
            'gambar_barang' => $data_barang->gambar_barang
        );
        $validate_item_in_session = false;
        if(is_null($data_cart_session) || count($data_cart_session['list']) == 0){
            $validate_item_in_session = true;
            $data_cart_session['list'] = [$data_cart];
            $data_cart_session['owner'] = NULL;
        } else {
            $list_menu_ordered = $data_cart_session['list'];
            foreach($list_menu_ordered as $index => $item){
                if($item['id_barang'] == $data_cart['id_barang']){
                    $validate_item_in_session = true;
                    $item['jml_barang'] += $data_cart['jml_barang'];
                    $list_menu_ordered[$index] = $item;
                    break;
                }
            }
            $data_cart_session['list'] = $list_menu_ordered;
        }
        if(!$validate_item_in_session){
            array_push($data_cart_session['list'], $data_cart);
        }
        $this->session->set_userdata('data_cart', $data_cart_session);
        redirect('display_cart');
    }

    public function clearCart(){
        $this->session->unset_userdata('data_cart'); 
        $this->session->sess_destroy(); 
        redirect('display_cart'); 
    }

}

?>