<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_Mahasiswa extends CI_Model {

    private $namaTabel = "mahasiswa";

    public function getAllMhsw(){
        $query = "SELECT * FROM ".$this->namaTabel." ORDER BY nim";
    }

    public function getMhsw($limit, $offset){
        $query = "SELECT * FROM ".$this->namaTabel." ORDER BY nim LIMIT ".$limit." OFFSET ".$offset." ";
        return $this->db->query($query)->result();
    }

    public function getTotalOfMhsw(){
        $query = "SELECT COUNT(nim) as Total FROM ".$this->namaTabel."";
        return $this->db->query($query)->result();
    }

    public function addMhsw($param){
        $query = "INSERT INTO ".$this->namaTabel." VALUES ('".$param['nim']."', '".$param['nama']."', '".$param['tgl_lahir']."', '".$param['umur']."')";
        return $this->db->query($query);
    }

    public function findMhsw($id){
        $query = "SELECT * FROM ".$this->namaTabel." WHERE nim = '".$id."'";
        return $this->db->query($query)->row();
    }

    public function updateMhsw($param, $id){
        $query = "UPDATE ".$this->namaTabel." SET nama = '".$param['nama']."', tgl_lahir = '".$param['tgl_lahir']."', umur = '".$param['umur']."' WHERE nim = '".$id."'";
        return $this->db->query($query);
    }

    public function deleteMhsw($id){
        $query = "DELETE FROM ".$this->namaTabel." WHERE nim = '".$id."'";
        return $this->db->query($query);
    }

    public function searchNamaMhsw($nama){
        $query = "SELECT * FROM ".$this->namaTabel." WHERE nama LIKE '%".$nama."%'";
        return $this->db->query($query)->result();
    }
}
?>