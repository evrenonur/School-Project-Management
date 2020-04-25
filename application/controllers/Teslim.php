<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Teslim extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('teslim_model');
        include "control.php";
        if ($this->session->userdata('role')==0){
            redirect(base_url());
        }
    }

	public function listele($id){
        $data = array(
            'view' => 'pages/teslim/listele',
            'veriler' => $this->teslim_model->get_data($id)
        );
        $this->load->view('layout',$data);
    }

    public function goster($id){


        $data = array(
            'view' => 'pages/teslim/goster',
            'proje' => $this->teslim_model->islem_goster($id)
        );

        $this->load->view('layout',$data);
    }

    public function update(){
        $id = $this->input->post('teslim_id');
        $data = array(
            'teslim_onay' => $this->input->post('teslim_onay')
        );

        if ($this->teslim_model->islem_update($id,$data)){
            $this->session->set_flashdata('success', 'Proje Başarıyla Eklendi!');
            redirect(base_url('proje'));
        }else{
            $this->session->set_flashdata('error', 'Güncelleme Başarısız!');
            redirect(base_url('proje'));
        }

        print_r($data);
    }

}

/* End of file Controllername.php */