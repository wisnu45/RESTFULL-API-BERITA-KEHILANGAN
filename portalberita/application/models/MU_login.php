<?php
class MU_login extends CI_Model{
    function cekadmin($nim,$password){
        $hasil=$this->db->query("SELECT * FROM tbl_user WHERE Nim='$nim' AND password=md5('$password')");
        return $hasil;
    }
}
