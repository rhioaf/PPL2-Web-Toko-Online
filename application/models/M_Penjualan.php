<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Penjualan extends CI_Model {

    private $namaTabel = "penjualan";

    public function getDataPenjualan(){
        $query = "SELECT * FROM ".$this->namaTabel."";
        return $this->db->query($query)->result();
    }

    public function getDataPenjualanLaporan(){
        $query = "SELECT id_penjualan, nama, total_penjualan, total_ongkir FROM ".$this->namaTabel."";
        return $this->db->query($query)->result();
    }

    public function storeDataPenjualan($param){
        $query = "INSERT INTO ".$this->namaTabel." (id_penjualan, tgl_penjualan, total_penjualan, total_ongkir, nama, nomor, alamat, id_kecamatan_tujuan) VALUES (NULL, NULL, '".$param['total_belanja']."', '".$param['total_ongkir']."','".$param['nama']."','".$param['nomor']."','".$param['alamat']."', '".$param['id_kecamatan_tujuan']."') ";
        return $this->db->query($query);
    }
}

?>