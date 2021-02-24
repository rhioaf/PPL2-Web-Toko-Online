<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Barang extends CI_Model {

    private $namaTabel = "barang";

    public function getAllBarang(){
        $query = "SELECT * FROM ".$this->namaTabel."";
        return $this->db->query($query)->result();
    }

    public function searchBarang($keyword){
        $query = "SELECT * FROM ".$this->namaTabel." WHERE nama_barang LIKE '%".$keyword."%'";
        return $this->db->query($query)->result();
    }

    public function getDetailBarangById($id){
        $query = "SELECT * FROM ".$this->namaTabel." WHERE id_barang = ".$id." ";
        return $this->db->query($query)->row();
    }

    public function updateStok($stok, $id_barang){
        $query = "UPDATE ".$this->namaTabel." SET stok_barang = '".$stok."' WHERE id_barang = '".$id_barang."' ";
        return $this->db->query($query);
    }

}

?>