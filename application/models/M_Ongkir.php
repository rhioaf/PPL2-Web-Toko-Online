<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Ongkir extends CI_Model {

    public function get(){
        $query = "SELECT * FROM ongkir";
        return $this->db->query($query)->result();
    }

    public function findOngkir($id_awal, $id_tujuan){
        $query = "SELECT * FROM ongkir WHERE kecamatan_awal = '".$id_awal."' AND kecamatan_tujuan = '".$id_tujuan."'";
        return $this->db->query($query)->row();
    }
}

?>