<?php

use GuzzleHttp\Client;

class M_mahasiswa extends CI_Model{
	private $_client;

	function __construct(){
		parent:: __construct();
		$this->_client = new Client([ 
			'base_uri' => 'http://localhost/BERITA/restserverberita/api/',
			'auth' => ['andrian','andrian']
		]);
	}

	//Get All Data Mahasiswa 
	function get_all_mahasiswa(){
		//$hsl=$this->db->query("SELECT id_user,nim,nama_user,email,password FROM tbl_user ORDER BY id_user DESC");
		//return $hsl;

		$response = $this->_client->request('GET','Mahasiswa',[
            'query' => [
            	'keyberita' => 'berita'
            ]
       ]);

       $result = json_decode($response->getBody()->getContents(), TRUE);

       return $result['data'];
	}


	//POST Data Mahasiswa 
	function simpan_mhs($nim,$nama,$email,$pass){
		//$hsl=$this->db->query("INSERT INTO tbl_user(nim,nama_user,email,password) VALUES ('$nim','$nama','$email',md5('$pass'))");
		//return $hsl;

		$response = $this->_client->request('POST', 'Mahasiswa', [
			'form_params' => [
				'nim' => $nim,
				'nama_user' => $nama,
				'email' => $email,
				'password' => md5($pass),
				'keyberita' => 'berita'
			]
		]);

		$result = json_decode($response->getBody()->getContents(), TRUE);

        return $result;
	}


	//Get Pernyataan by Id
	function get_pernyataan_login($kode){
		//$hsl=$this->db->query("SELECT * FROM tbl_user where id_user='$kode'");
		//return $hsl;

		$response = $this->_client->request('GET','Mahasiswa',[
			'query' => [
				'keyberita' => 'berita',
				'id_user' => $kode

			]
	   ]);

	   $result = json_decode($response->getBody()->getContents(), TRUE);

	   return $result['data'][0];
	}


	//Update Mahasiswa
	function update_mhs($kode,$nim,$nama,$email,$pass){
		//$hsl=$this->db->query("UPDATE tbl_user SET nim='$nim',nama_user='$nama',email='$email',password=md5('$pass') where id_user='$kode'");
		//return $hsl;

		$response = $this->_client->request('PUT', 'Mahasiswa', [
			'form_params' => [
				'nim' => $nim,
				'nama_user' => $nama,
				'email' => $email,
				'password' => md5($pass),
				'keyberita' => 'berita',
				'id_user' => $kode
				//'kategori_id' => $kategori
			]
		]);

		$result = json_decode($response->getBody()->getContents(), TRUE);

        return $result;
	}


	//Hapus Data Mahasiswa 
	function hapus_mahasiswa($kode){
		//$hsl=$this->db->query("DELETE FROM tbl_user WHERE id_user='$kode'");
		//return $hsl;

		$response = $this->_client->request('DELETE', 'Mahasiswa', [
			'form_params' => [
				'keyberita' => 'berita',
				'id_user' => $kode
			]
		]);

		$result = json_decode($response->getBody()->getContents(), TRUE);
		
		return $result;
	}


} 