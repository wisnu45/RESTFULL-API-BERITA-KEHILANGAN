<?php

class Kategori_model extends CI_Model
{

    //GET
    public function getKategori( $id = null){

        if($id === null){
            return $this->db->get('tbl_kategori')->result_array();
        }else{
            return $this->db->get_where('tbl_kategori',['kategori_id' => $id])->result_array();
        }

    }

    function getKodeKategori(){
		return $this->db->query("SELECT kategori_id,kategori_nama FROM tbl_kategori")->result_array();
    }

    //function getTanggalKategori($id){
	//	return $this->db->query("SELECT kategori_tanggal FROM tbl_kategori where kategori_id = '$id' ")->result_array();
   // }
    

    //AKHIR GET




    public function deleteKategori($id)
    {
        $this->db->delete('tbl_kategori',['kategori_id' => $id]);
        return $this->db->affected_rows(); //berapa baris yang terpengaruhi di db
    }

    
    public function createKategori($data)
    {
        $this->db->insert('tbl_kategori',$data);
        return $this->db->affected_rows();
    }

    
    public function updateKategori($data,$id)
    {
        $this->db->update('tbl_kategori',$data,['kategori_id' => $id]);
        return $this->db->affected_rows();
    }

    
}