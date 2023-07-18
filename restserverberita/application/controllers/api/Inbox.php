<?php

use Restserver\libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Inbox extends REST_Controller
{

    public function __construct(){
        parent:: __construct();
        $this->load->model('Inbox_model','tbl_inbox'); // setelah koma alias
        //per method per jam
        //$this->methods['index_get']['limit'] = 100;
    }

    // FUNGSI GET Inbox
    public function index_get()
    {
        $id = $this->get('inbox_id');
        if($id === null){
            $tbl_inbox = $this->tbl_inbox->getInbox();
        }else{
            $tbl_inbox = $this->tbl_inbox->getInbox($id);
        }

        if($tbl_inbox){
            $this->response([
                'status' => TRUE,
                'data' => $tbl_inbox
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    // FUNGSI By ID
    public function Inbox_id_get()
    {

        $tbl_inbox = $this->tbl_inbox->getKodeInbox();  

        if($tbl_inbox){
            $this->response([
                'status' => TRUE,
                'data' => $tbl_inbox
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'inbox_id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    
    //AKHIR GET

    // FUNGSi DELETE
    public function index_delete()
    {
        $id = $this->delete('inbox_id');

        if($id === null){
            $this->response([
                'status' => FALSE,
                'message' => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            if($this->tbl_inbox->deleteInbox($id) > 0){
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
            'inbox_id' => $this->post('inbox_id'),
            'inbox_nama' => $this->post('inbox_nama'),
            'inbox_email' => $this->post('inbox_email'),
            'inbox_pesan' => $this->post('inbox_pesan')
            //,'inbox_tanggal' => $this->post('inbox_tanggal')
        ];

        if($this->tbl_inbox->createInbox($data) >0 ){
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


}