<?php

class Mahasiswa_model extends CI_Model
{

    //GET

    public function getMahasiswa( $id = null){

        if($id === null){
            return $this->db->get('tbl_user')->result_array();
        }else{
            return $this->db->get_where('tbl_user',['id_user' => $id])->result_array();
        }

    }

    function getKodeMahasiswa(){
		return $this->db->query("SELECT id_user,nim FROM tbl_user")->result_array();
    }

    function getNamaMahasiswa($id){
		return $this->db->query("SELECT nama_user FROM tbl_user where id_user = '$id' ")->result_array();
    }

    function getEmailMahasiswa($id){
		return $this->db->query("SELECT email FROM tbl_user where id_user = '$id' ")->result_array();
    }

    function getPasswordMahasiswa($id){
		return $this->db->query("SELECT password FROM tbl_user where id_user = '$id' ")->result_array();
    }
    
   // function getStokBarang(){
	//	return $this->db->query('SELECT tgl_kategori.kategori_id, tbl_kategori.kategori_nama, .qty
	//							FROM barang LEFT JOIN penjualan ON barang.kd_barang = penjualan.kd_barang
	//							GROUP BY barang.kd_barang
	//							')->result_array();
	//}

    //AKHIR GET




    public function deleteMahasiswa($id)
    {
        $this->db->delete('tbl_user',['id_user' => $id]);
        return $this->db->affected_rows(); //berapa baris yang terpengaruhi di db
    }

    
    public function createMahasiswa($data)
    {
        $this->db->insert('tbl_user',$data);
        return $this->db->affected_rows();
    }

    
    public function updateMahasiswa($data,$id)
    {
        $this->db->update('tbl_user',$data,['id_user' => $id]);
        return $this->db->affected_rows();
    }

    
}