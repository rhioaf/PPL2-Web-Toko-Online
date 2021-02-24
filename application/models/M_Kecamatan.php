<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Kecamatan extends CI_Model {

    public function get(){
        $query = "SELECT * FROM kecamatan";
        return $this->db->query($query)->result();
    }

    public function find($id_kecamatan){
        $query = "SELECT * FROM kecamatan WHERE id_kecamatan = '".$id_kecamatan."'";
        return $this->db->query($query)->row();
    }
}

?>