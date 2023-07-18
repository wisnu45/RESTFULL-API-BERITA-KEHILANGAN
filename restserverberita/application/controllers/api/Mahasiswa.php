<?php

use Restserver\libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Mahasiswa extends REST_Controller
{

    public function __construct(){
        parent:: __construct();
        $this->load->model('Mahasiswa_model','tbl_user'); // setelah koma alias
        //per method per jam
        //$this->methods['index_get']['limit'] = 100;
    }

    // FUNGSI GET
    public function index_get()
    {
        $id = $this->get('id_user');
        if($id === null){
            $tbl_user = $this->tbl_user->getMahasiswa();
        }else{
            $tbl_user = $this->tbl_user->getMahasiswa($id);
        }

        if($tbl_user){
            $this->response([
                'status' => TRUE,
                'data' => $tbl_user
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    // FUNGSI By ID
    public function Mahasiswa_id_get()
    {

        $tbl_user = $this->tbl_user->getKodeMahasiswa();  

        if($tbl_user){
            $this->response([
                'status' => TRUE,
                'data' => $tbl_user
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'id_user not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    //AKHIR GET


    // FUNGSI DELETE
    public function index_delete()
    {
        $id = $this->delete('id_user');

        if($id === null){
            $this->response([
                'status' => FALSE,
                'message' => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            if($this->tbl_user->deleteMahasiswa($id) > 0){
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

    //
    public function index_post()
    {
        $data = [
            'id_user' => $this->post('id_user'),
            'nim' => $this->post('nim'),
            'nama_user' => $this->post('nama_user'),
            'email' => $this->post('email'),
            'password' => $this->post('password')
        ];

        if($this->tbl_user->createMahasiswa($data) >0 ){
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



    public function index_put(){
        $id = $this->put('id_user');
        $data = [
            'id_user' => $this->put('id_user'),
            'nim' => $this->put('nim'),
            'nama_user' => $this->put('nama_user'),
            'email' => $this->put('email'),
            'password' => $this->put('password')
        ];

        if($this->tbl_user->updateMahasiswa($data,$id) >0 ){
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