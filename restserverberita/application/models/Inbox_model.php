<?php

class Inbox_model extends CI_Model
{

    //GET Data Inbox Models API
    public function getInbox( $id = null){

        if($id === null){
            return $this->db->get('tbl_inbox')->result_array();
        }else{
            return $this->db->get_where('tbl_inbox',['inbox_id' => $id])->result_array();
        }

    }

    function getKodeInbox(){
		return $this->db->query("SELECT inbox_id,inbox_nama FROM tbl_inbox")->result_array();
    }

    function getInboxEmail($id){
		return $this->db->query("SELECT inbox_email FROM tbl_inbox where inbox_id = '$id' ")->result_array();
    }
    function getInboxPesan($id){
		return $this->db->query("SELECT inbox_pesan FROM tbl_inbox where inbox_id = '$id' ")->result_array();
    }

    function getInboxTanggal($id){
		return $this->db->query("SELECT inbox_tanggal FROM tbl_inbox where inbox_id = '$id' ")->result_array();
    }
  
    
  // function getInboxEmail(){
		//return $this->db->query('SELECT tgl_inbox.inbox_id, tbl_inbox.inbox_nama, .email
	//							FROM tbl_inbox LEFT JOIN tbl_user ON tbl_inbox.inbox_email = tbl_user.email
	//							GROUP BY tbl_inbox.inbox_email
//								')->result_array();
	//}

    //AKHIR GET




    public function deleteInbox($id)
    {
        $this->db->delete('tbl_inbox',['inbox_id' => $id]);
        return $this->db->affected_rows(); //berapa baris yang terpengaruhi di db
    }

    
    public function createInbox($data)
    {
        $this->db->insert('tbl_inbox',$data);
        return $this->db->affected_rows();
    }

    
    public function updateKategori($data,$id)
    {
        $this->db->update('tbl_inbox',$data,['inbox_id' => $id]);
        return $this->db->affected_rows();
    }

    
}