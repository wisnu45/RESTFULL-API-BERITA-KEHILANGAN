<?php

use Restserver\libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Tulisan extends REST_Controller
{

    public function __construct(){
        parent:: __construct();
        $this->load->model('Tulisan_model','tbl_tulisan'); // setelah koma alias
        //per method per jam
        //$this->methods['index_get']['limit'] = 100;
    }

    // FUNGSI GET
    public function index_get()
    {
        $id = $this->get('tulisan_id');
        if($id === null){
            $tbl_tulisan = $this->tbl_tulisan->getTulisan();
        }else{
            $tbl_tulisan = $this->tbl_tulisan->getTulisan($id);
        }

        if($tbl_tulisan){
            $this->response([
                'status' => TRUE,
                'data' => $tbl_tulisan
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    // FUNGSI GET By ID
    public function Tulisan_id_get()
    {

        $tbl_tulisan = $this->tbl_tulisan->getKodeTulisan();  

        if($tbl_tulisan){
            $this->response([
                'status' => TRUE,
                'data' => $tbl_tulisan
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'tulisan_id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    //AKHIR GET

    // FUNGSI DELETE
    public function index_delete()
    {
        $id = $this->delete('tulisan_id');

        if($id === null){
            $this->response([
                'status' => FALSE,
                'message' => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            if($this->tbl_tulisan->deleteTulisan($id) > 0){
                $this->response([
                    'status' => TRUE,
                    'id' => $id,
                    'message' => 'deleted'
                ], REST_Controller::HTTP_NO_CONTENT);
            }else{
                $this->response([
                    'status' => FALSE,
                    'message' => 'id not found!'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    // FUNGSI POST 
    public function index_post()
    {
        $data = [
            'tulisan_id' => $this->post('tulisan_id'),
            'tulisan_judul' => $this->post('tulisan_judul'),
            'tulisan_isi' => $this->post('tulisan_isi'),
            //'tulisan_tanggal' => $this->post('tulisan_tanggal'),
            'tulisan_kategori_id' => $this->post('tulisan_kategori_id'),
            'tulisan_kategori_nama' => $this->post('tulisan_kategori_nama'),
            'tulisan_gambar' => $this->post('tulisan_gambar'),
            'tulisan_pengguna_id' => $this->post('tulisan_pengguna_id'),
            'tulisan_author' => $this->post('tulisan_author'),
            'tulisan_slug' => $this->post('tulisan_slug'),
            'tulisan_status' => $this->post('tulisan_status')
        ];

        if($this->tbl_tulisan->createTulisan($data) >0 ){
            $this->response([
                'status' => TRUE,
                'message' => 'new data!'
            ], REST_Controller::HTTP_CREATED);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'failed to add data!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


    // FUNGSI PUT 
    public function index_put(){
        $id = $this->put('tulisan_id');
        $data = [
            'tulisan_id' => $this->put('tulisan_id'),
            'tulisan_judul' => $this->put('tulisan_judul'),
            'tulisan_isi' => $this->put('tulisan_isi'),
            //'tulisan_tanggal' => $this->put('tulisan_tanggal'),
            'tulisan_kategori_id' => $this->put('tulisan_kategori_id'),
            'tulisan_kategori_nama' => $this->put('tulisan_kategori_nama'),
            'tulisan_gambar' => $this->put('tulisan_gambar'),
            'tulisan_pengguna_id' => $this->put('tulisan_pengguna_id'),
            'tulisan_author' => $this->put('tulisan_author'),
            'tulisan_slug' => $this->put('tulisan_slug'),
            'tulisan_status' => $this->put('tulisan_status')
        ];

        if($this->tbl_tulisan->updateTulisan($data,$id) >0 ){
            $this->response([
                'status' => TRUE,
                'message' => 'data updated!'
            ], REST_Controller::HTTP_CREATED);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'failed to update data!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


}