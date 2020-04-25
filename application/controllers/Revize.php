<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Revize extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('revize_model');
        include "control.php";
        if ($this->session->userdata('role') == 0) {
            redirect(base_url());
        }
    }


    public function index()
    {
        $data = array(
            'view' => 'pages/revize/revizeler',
            'revizeler' => $this->revize_model->get_all_data()
        );
        $this->load->view("layout", $data);


    }

    public function onayla($id)
    {
        if ($this->revize_model->islem_onayla($id)) {
            $this->session->set_flashdata('success', 'İşlem Başarılı!');
            redirect(base_url('/revize'));
        } else {
            $this->session->set_flashdata('error', 'İşlem Hatalı!');
            redirect(base_url('/revize'));
        }
    }

    public function onaylama($id)
    {
        if ($this->revize_model->islem_onaylama($id)) {
            $this->session->set_flashdata('success', 'İşlem Başarılı!');
            redirect(base_url('/revize'));
        } else {
            $this->session->set_flashdata('error', 'İşlem Hatalı!');
            redirect(base_url('/revize'));
        }
    }

    public function goruntule($id){
        $data = array(
            'view' => 'pages/revize/goruntule',
            'proje' => $this->revize_model->islem_goruntule($id)
        );
        $this->load->view('layout',$data);
    }

}

/* End of file Controllername.php */