<?php
use GuzzleHttp\Client;

class M_kirimpesan extends CI_Model{
	private $_client;

	function __construct(){
		parent:: __construct();
		$this->_client = new Client([ 
			'base_uri' => 'http://localhost/BERITA/restserverberita/api/',
			'auth' => ['andrian','andrian']
		]);
	}

	//Inset Data Inbox
	function simpan_pesan($nama,$email,$pesan){
		//$hsl=$this->db->query("INSERT INTO tbl_inbox(inbox_nama,inbox_email,inbox_pesan) VALUES ('$nama','$email','$pesan')");
		//return $hsl;

		$response = $this->_client->request('POST', 'Inbox', [
			'form_params' => [
				'inbox_nama' => $nama,
				'inbox_email' => $email,
				'inbox_pesan' => $pesan,
				'keyberita' => 'berita'
			]
		]);

		$result = json_decode($response->getBody()->getContents(), TRUE);

        return $result;

	}

	//Get Data Inbox
	function get_all_inbox(){
		//$hsl=$this->db->query("SELECT tbl_inbox.*,DATE_FORMAT(inbox_tanggal,'%d %M %Y') AS tanggal FROM tbl_inbox ORDER BY inbox_id DESC");
		//return $hsl;

		$response = $this->_client->request('GET','Inbox',[
            'query' => [
            	'keyberita' => 'berita',
				'inbox_tanggal' => 'inbox_id'
            ]
       ]);

       $result = json_decode($response->getBody()->getContents(), TRUE);

       return $result['data'];
	}


	function hapus_kontak($kode){
		//$hsl=$this->db->query("DELETE FROM tbl_inbox WHERE inbox_id='$kode'");
		//return $hsl;

		$response = $this->_client->request('DELETE', 'Inbox', [
			'form_params' => [
				'keyberita' => 'berita',
				'inbox_id' => $kode
			]
		]);

		$result = json_decode($response->getBody()->getContents(), TRUE);
		
		return $result;
	}


	function update_status_kontak(){
		$hsl=$this->db->query("UPDATE tbl_inbox SET inbox_status='0'");
		return $hsl;
	}
}