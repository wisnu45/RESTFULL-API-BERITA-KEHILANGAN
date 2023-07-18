<?php

class Tulisan_model extends CI_Model
{

    //GET
    // Fungsi Get Tulisan Model
    public function getTulisan( $id = null){

        if($id === null){
            return $this->db->get('tbl_tulisan')->result_array();
        }else{
            return $this->db->get_where('tbl_tulisan',['tulisan_id' => $id])->result_array();
        }
    }

    function getKodeTulisan(){
		return $this->db->query("SELECT tulisan_id,tulisan_nama FROM tbl_tulisan")->result_array();
    }

    function getTulisanJudul($id){
		return $this->db->query("SELECT tulisan_judul FROM tbl_tulisan where tulisan_id = '$id' ")->result_array();
    }

    function getTulisanIsi($id){
		return $this->db->query("SELECT tulisan_isi FROM tbl_tulisan where tulisan_id = '$id' ")->result_array();
    }

    function getTulisanTanggal($id){
		return $this->db->query("SELECT tulisan_tanggal FROM tbl_tulisan where tulisan_id = '$id' ")->result_array();
    }

    function getTulisanKategoriId($id){
		return $this->db->query("SELECT tulisan_kategori_id FROM tbl_tulisan where tulisan_id = '$id' ")->result_array();
    }

    function getTulisanKategoriNama($id){
		return $this->db->query("SELECT tulisan_kategori_nama FROM tbl_tulisan where tulisan_id = '$id' ")->result_array();
    }

    function getTulisanGambar($id){
		return $this->db->query("SELECT tulisan_gambar FROM tbl_tulisan where tulisan_id = '$id' ")->result_array();
    }

    function getTulisanPenggunaId($id){
		return $this->db->query("SELECT tulisan_pengguna_id FROM tbl_tulisan where tulisan_id = '$id' ")->result_array();
    }

    function getTulisanAuthor($id){
		return $this->db->query("SELECT tulisan_author FROM tbl_tulisan where tulisan_id = '$id' ")->result_array();
    }

    function getTulisanSlug($id){
		return $this->db->query("SELECT tulisan_slug FROM tbl_tulisan where tulisan_id = '$id' ")->result_array();
    }

    function getTulisanStatus($id){
		return $this->db->query("SELECT tulisan_status FROM tbl_tulisan where tulisan_id = '$id' ")->result_array();
    }

  
    
   // function getStokBarang(){
	//	return $this->db->query('SELECT tgl_kategori.kategori_id, tbl_kategori.kategori_nama, .qty
	//							FROM barang LEFT JOIN penjualan ON barang.kd_barang = penjualan.kd_barang
	//							GROUP BY barang.kd_barang
	//							')->result_array();
	//}

    //AKHIR GET




    public function deleteTulisan($id)
    {
        $this->db->delete('tbl_tulisan',['tulisan_id' => $id]);
        return $this->db->affected_rows(); //berapa baris yang terpengaruhi di db
    }

    
    public function createTulisan($data)
    {
        $this->db->insert('tbl_tulisan',$data);
        return $this->db->affected_rows();
    }

    
    public function updateTulisan($data,$id)
    {
        $this->db->update('tbl_tulisan',$data,['tulisan_id' => $id]);
        return $this->db->affected_rows();
    }

    
}