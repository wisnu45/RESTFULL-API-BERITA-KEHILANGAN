<?php

use Restserver\libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Pengguna extends REST_Controller
{

    public function __construct(){
        parent:: __construct();
        $this->load->model('Pengguna_model','pengguna'); // setelah koma alias
        //per method per jam
        //$this->methods['index_get']['limit'] = 100; 
    }

    // FUNGSI GET
    public function index_get()
    {
        $id = $this->get('pengguna_id');
        if($id === null){
            $pengguna = $this->pengguna->getPengguna();
        }else{
            $pengguna = $this->pengguna->getPengguna($id);
        }

        if($pengguna){
            $this->response([
                'status' => TRUE,
                'data' => $pengguna
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }


    public function Pengguna_id_get()
    {
        $pengguna = $this->pengguna->getKodePengguna();  

        if($pengguna){
            $this->response([
                'status' => TRUE,
                'data' => $pengguna
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'pengguna_id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    //AKHIR GET


    // FUNGSI DELETE
    public function index_delete()
    {
        $id = $this->delete('pengguna_id');

        if($id === null){
            $this->response([
                'status' => FALSE,
                'message' => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            if($this->pengguna->deletePengguna($id) > 0){
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


    //FUNGSI INSERT
    public function index_post()
    {
        $data = [
            'pengguna_id' => $this->post('pengguna_id'),
            'pengguna_nama' => $this->post('pengguna_nama'),
            'pengguna_jenkel' => $this->post('pengguna_jenkel'),
            'pengguna_username' => $this->post('pengguna_username'),
            'pengguna_password' => $this->post('pengguna_password'),
            'pengguna_email' => $this->post('pengguna_email'),
            'pengguna_nohp' => $this->post('pengguna_nohp'),
            'pengguna_level' => $this->post('pengguna_level'),
            'pengguna_photo' => $this->post('pengguna_photo')
        ];

        if($this->pengguna->createPengguna($data) >0 ){
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


    //FUNGSI UPDATE
    public function index_put()
    {
        $id = $this->put('pengguna_id');
        $data = [
            'pengguna_id' => $this->put('pengguna_id'),
            'pengguna_nama' => $this->put('pengguna_nama'),
            'pengguna_jenkel' => $this->put('pengguna_jenkel'),
            'pengguna_username' => $this->put('pengguna_username'),
            'pengguna_password' => $this->put('pengguna_password'),
            'pengguna_email' => $this->put('pengguna_email'),
            'pengguna_nohp' => $this->put('pengguna_nohp'),
            'pengguna_level' => $this->put('pengguna_level'),
            'pengguna_photo' => $this->put('pengguna_photo')
        ];

        if($this->pengguna->updatePengguna($data,$id) >0 ){
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