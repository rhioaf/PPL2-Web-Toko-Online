<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class C_Penjualan extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('m_penjualan');
        $this->load->model('m_jual');
        $this->load->model('m_barang');
        $this->load->model('m_kecamatan');
        $this->load->model('m_ongkir');
    }

    public function display(){
        // List data yang digunakan pada view
        $list_data = array();
        $list_data['data_pjl'] = $this->m_penjualan->getDataPenjualan();

        // Data kiriman untuk template
        $data = array();
        $data['data'] = $list_data;
        $data['destination_pages'] = "pages/penjualan/v_penjualan_display";
        $this->load->view('pages/v_template_admin', $data);
    }

    public function checkout(){
        $data_cart_session = $this->session->userdata('data_cart');
        if(!is_null($data_cart_session)){
            foreach($data_cart_session['list'] as $index => $item){
                // Validate amount
                $data_barang = $this->m_barang->getDetailBarangById($item['id_barang']);
                if(intval($data_barang->stok_barang) < $item['jml_barang']){
                    $valueMessage = 'Stok dari '.$data_barang->nama_barang.' kurang dari '.$item['jml_barang'];
                    $this->session->set_flashdata('danger_amount', $valueMessage);
                    redirect('display_cart');
                }
            }
        } else {
            $this->session->set_flashdata('info_cart_null', 'Masukkan min 1 barang ke dalam cart terlebih dahulu');
            redirect('display_cart');
        }
        $list_data = array(
            'list_kecamatan' => $this->m_kecamatan->get(),
            'cart'  =>  $data_cart_session
        );
        $data['data'] = $list_data;
        $data['destination_pages'] = "pages/checkout/v_checkout.php";
        $this->load->view('pages/v_template', $data);
    }

    public function invoice(){
        $data_cart_session = $this->session->userdata('data_cart');
        $idKecamatanTujuan = '40511';

        // Data Pembeli (dari Form)
        $data_pembeli = array();
        $data_pembeli['nama'] = $this->input->post('nama');
        $data_pembeli['nomor'] = $this->input->post('nomor');
        $data_pembeli['alamat'] = $this->input->post('alamat');
        $data_pembeli['id_kecamatan_tujuan'] = $this->input->post('kecamatan_tujuan');

        $data_kecamatan = $this->m_kecamatan->find($this->input->post('kecamatan_tujuan'));
        // Get Ongkir
        $ongkirData = $this->m_ongkir->findOngkir($idKecamatanTujuan, $data_pembeli['id_kecamatan_tujuan']);
        $total_berat = 0;
        $list_menu_ordered = $data_cart_session['list'];
        foreach($list_menu_ordered as $index => $item){
            $total_berat += $item['berat_barang'] * $item['jml_barang'];
        }
        // Perhitungan Ongkir
        $final_total_berat = 0;
        $total_berat = floatval($total_berat);
        if($total_berat < 1){
            $final_total_berat = ceil($total_berat);
        } else {
            $extract_berat = explode('.', (string) $total_berat);
            if(intval($extract_berat[1]) > 3){
                $final_total_berat = ceil($total_berat);
            } else {
                $final_total_berat = floor($total_berat);
            }
        }
        $total_ongkir = $final_total_berat * $ongkirData->ongkir_per_kg;
        $data_pembeli['total_berat'] = $final_total_berat;
        $data_pembeli['ongkir_per_kg'] = $ongkirData->ongkir_per_kg;
        $data_pembeli['total_ongkir'] = $total_ongkir;
        $data_pembeli['kec_tujuan'] = $data_kecamatan->nama_kecamatan;

        // Set data pembeli ke session owner
        $data_cart_session['owner'] = $data_pembeli;
        $this->session->set_userdata('data_cart', $data_cart_session);
        $list_data = array('data_cart' => $data_cart_session);
        $data['data'] = $list_data;
        $data['destination_pages'] = "pages/checkout/v_invoice.php";
        $this->load->view('pages/v_template', $data);
    }

    private function is_decimal( $val ) {
        return is_numeric( $val ) && floor( $val ) != $val;
    }

    public function store(){
        $data_cart_session = $this->session->userdata('data_cart');
        $total_belanja = 0;
        $data_penjualan = $data_cart_session['owner'];

        if(!is_null($data_cart_session)){
            // Looping cart to get total amount and total berat
            foreach($data_cart_session['list'] as $index => $item){
                // Total amount and weight
                $total_belanja += $item['jml_barang'] * $item['harga_barang'];
            }
            $data_penjualan['total_ongkir'] = $data_penjualan['total_ongkir'];
            $data_penjualan['total_belanja'] = $total_belanja;

            // Store new data penjualan
            $this->m_penjualan->storeDataPenjualan($data_penjualan);
            $inserted_id = $this->db->insert_id();
            
            // Looping cart to insert item penjualan
            $data_cart = array();
            $data_cart['id_penjualan'] = $inserted_id;
            $newest_stok;
            foreach($data_cart_session['list'] as $index => $item){
                // Fill up array penjualan
                $data_cart['id_barang'] = $item['id_barang'];
                $data_cart['jml_jual'] = $item['jml_barang'];
                $data_cart['harga_barang'] = $item['harga_barang'];

                // Insert data
                $this->m_jual->storeItemPenjualan($data_cart);

                // Update stok barang
                $data_barang = $this->m_barang->getDetailBarangById($data_cart['id_barang']);
                $newest_stok = intval($data_barang->stok_barang) - $data_cart['jml_jual'];
                $this->m_barang->updateStok($newest_stok, $data_barang->id_barang);
            }

            $this->session->unset_userdata('data_cart'); 
            $this->session->sess_destroy();
            redirect('display_barang');
        } else {
            $this->session->set_flashdata('info_cart_null', 'Masukkan min 1 barang ke dalam cart terlebih dahulu');
            redirect('display_cart');
        }
    }

    public function exportToExcel(){
        // Get data penjualan
        $data_penjualan = $this->m_penjualan->getDataPenjualanLaporan();
        $title = 'Data Penjualan - '. date('Y-m-d H:i:s');
        $data['data_pjl'] = $data_penjualan;
        $data['title'] = $title;
        $this->load->view('pages/export/export_to_excel', $data);
    }

    public function exportToPDF(){
        $this->load->library('pdf');
        $data['date'] = date('Y-m-d H:i:s');
        $data['data_pjl'] = $this->m_penjualan->getDataPenjualanLaporan();
        $html = $this->load->view('pages/export/export_to_pdf', $data, true);
        $this->pdf->createPDF($html, 'mypdf', false);
    }

    private function formatPrice($param){
        $returnedValue = "Rp. " . number_format($param,0,',','.');
        return $returnedValue;
    }

    public function exportToExcelv2(){
        $data_penjualan = $this->m_penjualan->getDataPenjualanLaporan();
        $spreadsheet = new Spreadsheet;
        $spreadsheet->setActiveSheetIndex(0)
                      ->setCellValue('A1', 'No Penjualan')
                      ->setCellValue('B1', 'Nama')
                      ->setCellValue('C1', 'Total Penjualan')
                      ->setCellValue('D1', 'Total Ongkir');
        $kolom = 2;
        foreach($data_penjualan as $index => $item) {
            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A' . $kolom, $item->id_penjualan)
                        ->setCellValue('B' . $kolom, $item->nama)
                        ->setCellValue('C' . $kolom, $this->formatPrice($item->total_penjualan))
                        ->setCellValue('D' . $kolom, $this->formatPrice($item->total_ongkir));
            $kolom++;
        }
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(25);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(25);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(25);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(25);
        $writer = new Xlsx($spreadsheet);
        $title = 'Data Penjualan Tokopidea - '.date('Y-m-d H:i:s');
        header('Content-Type: application/vnd.ms-excel');
	    header('Content-Disposition: attachment;filename='.$title.".xlsx");
	    header('Cache-Control: max-age=0');
	    $writer->save('php://output');
    }
}

?>