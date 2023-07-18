<?php

use Restserver\libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Kategori extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model', 'kategori'); // setelah koma alias
        //per method per jam
        //$this->methods['index_get']['limit'] = 5;
    }

    // FUNGSI GET
    public function index_get()
    {
        $id = $this->get('kategori_id');
        if ($id === null) {
            $kategori = $this->kategori->getKategori();
        } else {
            $kategori = $this->kategori->getKategori($id);
        }

        if ($kategori) {
            $this->response([
                'status' => TRUE,
                'data' => $kategori
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    // FUNGSI GET By ID
    public function Kategori_id_get()
    {
        $kategori = $this->kategori->getKodeKategori();

        if ($kategori) {
            $this->response([
                'status' => TRUE,
                'data' => $kategori
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'kategori_id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    //AKHIR GET


    // FUNGSI DELETE
    public function index_delete()
    {
        $id = $this->delete('kategori_id');

        if ($id === null) {
            $this->response([
                'status' => FALSE,
                'message' => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->kategori->deleteKategori($id) > 0) {
                $this->response([
                    'status' => TRUE,
                    'id' => $id,
                    'message' => 'deleted'
                ], REST_Controller::HTTP_NO_CONTENT);
            } else {
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
            'kategori_id' => $this->post('kategori_id'),
            'kategori_nama' => $this->post('kategori_nama')
        ];

        if ($this->kategori->createKategori($data) > 0) {
            $this->response([
                'status' => TRUE,
                'message' => 'new data!'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'failed to add data!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


    // FUNGSI PUT 
    public function index_put()
    {
        $id = $this->put('kategori_id');
        $data = [
            'kategori_id' => $this->put('kategori_id'),
            'kategori_nama' => $this->put('kategori_nama')
        ];

        if ($this->kategori->updateKategori($data, $id) > 0) {
            $this->response([
                'status' => TRUE,
                'message' => 'data updated!'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'failed to update data!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
