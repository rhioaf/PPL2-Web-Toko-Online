<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Berita extends CI_Model {

    private $namaTabel = "berita";

    public function getAllBerita(){
        $query = "SELECT * FROM ".$this->namaTabel." ORDER BY tgl_berita ASC";
        return $this->db->query($query)->result();
    }

    public function searchBerita($keyword){
        $query = "SELECT * FROM ".$this->namaTabel." WHERE judul_berita LIKE '%".$keyword."%'";
        return $this->db->query($query)->result();
    }

    public function inputBerita($param){
        $query = "INSERT INTO ".$this->namaTabel." (judul_berita, isi_berita, gambar_berita, tgl_berita) VALUES ('".$param['judul']."', '".$param['isi']."', '".$param['gambar']."', '".$param['tanggal']."')";
        return $this->db->query($query);
    }

    public function getDetailBerita($id){
        $query = "SELECT * FROM ".$this->namaTabel." WHERE id_berita = '".$id."'";
        return $this->db->query($query)->row();
    }
}

?>