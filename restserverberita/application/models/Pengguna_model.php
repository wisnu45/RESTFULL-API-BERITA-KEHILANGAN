<?php

class Pengguna_model extends CI_Model
{

    //GET

    public function getPengguna( $id = null){

        if($id === null){
            return $this->db->get('tbl_pengguna')->result_array();
        }else{
            return $this->db->get_where('tbl_pengguna',['pengguna_id' => $id])->result_array();
        }

    }

    function getKodePengguna(){
		return $this->db->query("SELECT pengguna_id,pengguna_nama FROM tbl_pengguna")->result_array();
    }

    function getPenggunaJenkel($id){
		return $this->db->query("SELECT pengguna_jenkel FROM tbl_pengguna where pengguna_id = '$id' ")->result_array();
    }

    function getPenggunaUsername($id){
		return $this->db->query("SELECT pengguna_username FROM tbl_pengguna where pengguna_id = '$id' ")->result_array();
    }

    function getPenggunaPassword($id){
		return $this->db->query("SELECT pengguna_password FROM tbl_pengguna where pengguna_id = '$id' ")->result_array();
    }

    function getPenggunaEmail($id){
		return $this->db->query("SELECT pengguna_email FROM tbl_pengguna where pengguna_id = '$id' ")->result_array();
    }

    function getPenggunaNohp($id){
		return $this->db->query("SELECT pengguna_nohp FROM tbl_pengguna where pengguna_id = '$id' ")->result_array();
    }

    function getPenggunaStatus($id){
		return $this->db->query("SELECT pengguna_status FROM tbl_pengguna where pengguna_id = '$id' ")->result_array();
    }

    function getPenggunaLevel($id){
		return $this->db->query("SELECT pengguna_level FROM tbl_pengguna where pengguna_id = '$id' ")->result_array();
    }

    //function getPenggunaRegister($id){
		//return $this->db->query("SELECT pengguna_register FROM tbl_pengguna where pengguna_id = '$id' ")->result_array();
   // }

    function getPenggunaPhoto($id){
		return $this->db->query("SELECT pengguna_photo FROM tbl_pengguna where pengguna_id = '$id' ")->result_array();
    }

    //AKHIR GET




    public function deletePengguna($id)
    {
        $this->db->delete('tbl_pengguna',['pengguna_id' => $id]);
        return $this->db->affected_rows(); //berapa baris yang terpengaruhi di db
    }

    
    public function createPengguna($data)
    {
        $this->db->insert('tbl_pengguna',$data);
        return $this->db->affected_rows();
    }

    
    public function updatePengguna($data,$id)
    {
        $this->db->update('tbl_pengguna',$data,['pengguna_id' => $id]);
        return $this->db->affected_rows();
    }

    
}