<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Jual extends CI_Model {

    private $namaTabel = "jual";

    public function getItemPenjualan(){
        $query = "SELECT * FROM ".$this->namaTabel."";
        return $this->db->query($query)->result();
    }

    public function storeItemPenjualan($param){
        $query = "INSERT INTO ".$this->namaTabel." (id_penjualan, id_barang, jml_jual, harga_barang) VALUES ('".$param['id_penjualan']."','".$param['id_barang']."','".$param['jml_jual']."','".$param['harga_barang']."') ";
        return $this->db->query($query);
    }
}

?>