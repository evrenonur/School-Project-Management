<?php


class Home extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        include "control.php";

    }

    public function index(){
        $data = array(
            'view' => "pages/index"
        );
        $this->load->view('layout',$data);
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url('login/auth'), 'refresh');
    }


}