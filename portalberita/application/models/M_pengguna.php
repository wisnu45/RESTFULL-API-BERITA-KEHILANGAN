<?php

use GuzzleHttp\Client;

class M_pengguna extends CI_Model{

	private $_client;

	function __construct(){
		parent:: __construct();
		$this->_client = new Client([ 
			'base_uri' => 'http://localhost/BERITA/restserverberita/api/'
			,'auth' => ['andrian','andrian']
		]);
	}


	//Get All Pengguna
	function get_all_pengguna(){
		//$hsl=$this->db->query("SELECT tbl_pengguna.*,IF(pengguna_jenkel='L','Laki-Laki','Perempuan') AS jenkel FROM tbl_pengguna");
		//return $hsl;	

		$response = $this->_client->request('GET','Pengguna',[
            'query' => [
            	'keyberita' => 'berita'
            ]
       ]);

       $result = json_decode($response->getBody()->getContents(), TRUE);

       return $result['data'];

	}
	

	//Insert Data Pengguna Form Client 
	function simpan_pengguna($nama,$jenkel,$username,$password,$email,$nohp,$level,$gambar){
		//$hsl=$this->db->query("INSERT INTO tbl_pengguna (pengguna_nama,pengguna_jenkel,pengguna_username,pengguna_password,pengguna_email,pengguna_nohp,pengguna_level,pengguna_photo) VALUES ('$nama','$jenkel','$username',md5('$password'),'$email','$nohp','$level','$gambar')");
		//return $hsl;

		$response = $this->_client->request('POST', 'Pengguna', [
			'form_params' => [
				'pengguna_nama' => $nama,
				'pengguna_jenkel' => $jenkel,
				'pengguna_username' => $username,
				'pengguna_password' => md5($password),
				'pengguna_email' => $email,
				'pengguna_nohp' => $nohp,
				'pengguna_level' => $level,
				'pengguna_photo' => $gambar,
				'keyberita' => 'berita'
				//'kategori_id' => $kategori
			]
		]);

		$result = json_decode($response->getBody()->getContents(), TRUE);

        return $result;
	}



	//UPDATE PENGGUNA //
	function update_pengguna_tanpa_pass($kode,$nama,$jenkel,$username,$email,$nohp,$level,$gambar){
		//$hsl=$this->db->query("UPDATE tbl_pengguna set pengguna_nama='$nama',pengguna_jenkel='$jenkel',pengguna_username='$username',pengguna_email='$email',pengguna_nohp='$nohp',pengguna_level='$level',pengguna_photo='$gambar' where pengguna_id='$kode'");
		//return $hsl;

		$response = $this->_client->request('PUT', 'Pengguna', [
			'form_params' => [
				'pengguna_id' => $kode,
				'pengguna_nama' => $nama,
				'pengguna_jenkel' => $jenkel,
				'pengguna_username' => $username,
				//'pengguna_password' => md5($password),
				'pengguna_email' => $email,
				'pengguna_nohp' => $nohp,
				'pengguna_level' => $level,
				'pengguna_photo' => $gambar,
				'keyberita' => 'berita'
				//'kategori_id' => $kategori
			]
		]);

		$result = json_decode($response->getBody()->getContents(), TRUE);

        return $result;

	}

	function update_pengguna($kode,$nama,$jenkel,$username,$password,$email,$nohp,$level,$gambar){
		//$hsl=$this->db->query("UPDATE tbl_pengguna set pengguna_nama='$nama',pengguna_jenkel='$jenkel',pengguna_username='$username',pengguna_password=md5('$password'),pengguna_email='$email',pengguna_nohp='$nohp',pengguna_level='$level',pengguna_photo='$gambar' where pengguna_id='$kode'");
		//return $hsl;

		$response = $this->_client->request('PUT', 'Pengguna', [
			'form_params' => [
				'pengguna_id' => $kode,
				'pengguna_nama' => $nama,
				'pengguna_jenkel' => $jenkel,
				'pengguna_username' => $username,
				'pengguna_password' => md5($password),
				'pengguna_email' => $email,
				'pengguna_nohp' => $nohp,
				'pengguna_level' => $level,
				'pengguna_photo' => $gambar,
				'keyberita' => 'berita'
				//'kategori_id' => $kategori
			]
		]);

		$result = json_decode($response->getBody()->getContents(), TRUE);

        return $result;
	}

	function update_pengguna_tanpa_pass_dan_gambar($kode,$nama,$jenkel,$username,$email,$nohp,$level){
		//$hsl=$this->db->query("UPDATE tbl_pengguna set pengguna_nama='$nama',pengguna_jenkel='$jenkel',pengguna_username='$username',pengguna_email='$email',pengguna_nohp='$nohp',pengguna_level='$level' where pengguna_id='$kode'");
		//return $hsl;

		$response = $this->_client->request('PUT', 'Pengguna', [
			'form_params' => [
				'pengguna_id' => $kode,
				'pengguna_nama' => $nama,
				'pengguna_jenkel' => $jenkel,
				'pengguna_username' => $username,
				//'pengguna_password' => md5($password),
				'pengguna_email' => $email,
				'pengguna_nohp' => $nohp,
				'pengguna_level' => $level,
				//'pengguna_photo' => $gambar,
				'keyberita' => 'berita'
				//'kategori_id' => $kategori
			]
		]);

		$result = json_decode($response->getBody()->getContents(), TRUE);

        return $result;
	}

	function update_pengguna_tanpa_gambar($kode,$nama,$jenkel,$username,$password,$email,$nohp,$level){
		//$hsl=$this->db->query("UPDATE tbl_pengguna set pengguna_nama='$nama',pengguna_jenkel='$jenkel',pengguna_username='$username',pengguna_password=md5('$password'),pengguna_email='$email',pengguna_nohp='$nohp',pengguna_level='$level' where pengguna_id='$kode'");
		//return $hsl;

		$response = $this->_client->request('PUT', 'Pengguna', [
			'form_params' => [
				'pengguna_id' => $kode,
				'pengguna_nama' => $nama,
				'pengguna_jenkel' => $jenkel,
				'pengguna_username' => $username,
				'pengguna_password' => md5($password),
				'pengguna_email' => $email,
				'pengguna_nohp' => $nohp,
				'pengguna_level' => $level,
				//'pengguna_photo' => $gambar,
				'keyberita' => 'berita'
			]
		]);

		$result = json_decode($response->getBody()->getContents(), TRUE);

        return $result;

	}



	//Hapus Pengguna

	function hapus_pengguna($kode){
		//$hsl=$this->db->query("DELETE FROM tbl_pengguna where pengguna_id='$kode'");
		//return $hsl;

		$response = $this->_client->request('DELETE', 'Pengguna', [
			'form_params' => [
				'keyberita' => 'berita',
				'pengguna_id' => $kode
			]
		]);

		$result = json_decode($response->getBody()->getContents(), TRUE);
		
		return $result;
	}


	//GET PENGGUNA

	function getusername($id){
		//$hsl=$this->db->query("SELECT * FROM tbl_pengguna where pengguna_id='$id'");
		//return $hsl;
		$response = $this->_client->request('GET','Pengguna',[
            'query' => [
            	'keyberita' => 'berita',
				'pengguna_id' => $id
            ]
       ]);

       $result = json_decode($response->getBody()->getContents(), TRUE);

       return $result['data'][0];
	}


	//Rest Password

	function resetpass($id,$pass){
		//$hsl=$this->db->query("UPDATE tbl_pengguna set pengguna_password=md5('$pass') where pengguna_id='$id'");
		//return $hsl;

		$response = $this->_client->request('PUT','Pengguna',[
            'query' => [
            	'keyberita' => 'berita',
				'pengguna_id' => $id,
				'pengguna_password' => md5($pass)
            ]
       ]);

       $result = json_decode($response->getBody()->getContents(), TRUE);

       return $result['data'];

	}


	//Get Login 

	function get_pengguna_login($kode){
		//$hsl=$this->db->query("SELECT * FROM tbl_pengguna where pengguna_id='$kode'");
		//return $hsl;

		$response = $this->_client->request('GET','Pengguna',[
            'query' => [
            	'keyberita' => 'berita',
				'pengguna_id' => $kode
            ]
       ]);

       $result = json_decode($response->getBody()->getContents(), TRUE);

       return $result['data'][0];
	}


}