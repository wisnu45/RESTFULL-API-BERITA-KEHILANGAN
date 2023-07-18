<?php

use GuzzleHttp\Client;

class M_kategori extends CI_Model{

	private $_client;

	function __construct(){
		parent:: __construct();
		$this->_client = new Client([ 
			'base_uri' => 'http://localhost/BERITA/restserverberita/api/',
			'auth' => ['andrian','andrian']
		]);
	}	

	//GET Data Kategori
	function get_all_kategori(){
		//$hsl=$this->db->query("select * from tbl_kategori");
		//return $hsl;

		$response = $this->_client->request('GET','Kategori',[
            'query' => [
            	'keyberita' => 'berita'
            ]
       ]);

       $result = json_decode($response->getBody()->getContents(), TRUE);

       return $result['data'];
	}

	//GET Kategori By Id
	function get_kategori_byid($kategori_id){
		//$hsl=$this->db->query("select * from tbl_kategori where kategori_id='$kategori_id'");
		//return $hsl;

		$response = $this->_client->request('GET','Kategori',[
			 'query' => [
			 	'keyberita' => 'berita',
				 'kategori_id' => $kategori_id

			 ]
		]);
 
		$result = json_decode($response->getBody()->getContents(), TRUE);
 
		return $result['data'][0];
	}

	//Insert Data Kategori
	function simpan_kategori($kategori){ //$kategori){
		//$hsl=$this->db->query("insert into tbl_kategori(kategori_nama) values('$kategori')");
		//return $hsl;

		$response = $this->_client->request('POST', 'Kategori', [
			'form_params' => [
				'kategori_nama' => $kategori,
				'keyberita' => 'berita'
			]
		]);

		$result = json_decode($response->getBody()->getContents(), TRUE);

        return $result;
	}

	//Update Data Kategori
	function update_kategori($kode,$kategori){
		//$hsl=$this->db->query("update tbl_kategori set kategori_nama='$kategori' where kategori_id='$kode'");
		//return $hsl;

		$response = $this->_client->request('PUT', 'Kategori', [
			'form_params' => [
				'kategori_nama' => $kategori,
				'keyberita' => 'berita',
				'kategori_id' => $kode
			]
		]);

		$result = json_decode($response->getBody()->getContents(), TRUE);

        return $result;

	}

	//Hapus Data Kategori
	function hapus_kategori($kode){
		//$hsl=$this->db->query("delete from tbl_kategori where kategori_id='$kode'");
		//return $hsl;

		$response = $this->_client->request('DELETE', 'Kategori', [
			'form_params' => [
				'keyberita' => 'berita',
				'kategori_id' => $kode
			]
		]);

		$result = json_decode($response->getBody()->getContents(), TRUE);
		
		return $result;
	}
	
}