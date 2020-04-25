<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        include "control.php";
        $this->load->model('login_model');

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }


    public function index()
    {

        $user_id = $this->session->userdata('user_id');
        $data = array(
            'view' => "pages/profil/profil",
            'user' => $this->login_model->get_user($user_id)
        );

        $this->load->view('layout', $data);
    }

    public function update()
    {

        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('newpass', 'Password', 'required|trim');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|trim|matches[newpass]');


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Hata! İşlem Kabul Edilmedi!');
            redirect(base_url('profil'));

        } else {

            $oldpass = $this->input->post('password');
            $newpass = md5($this->input->post('newpass'));
            $user_id = $this->session->userdata('user_id');

            $where = array(
                'user_id' => $user_id,
                'password' => md5($oldpass)
            );

            $check = $this->db->where($where)->get('users')->row();
            if ($check){
                $data = array(
                    'password' => $newpass
                );
                $this->db->where('user_id',$user_id)->update('users',$data);
                $this->session->set_flashdata('success', 'İşlem Başarılı');
                redirect(base_url('profil'));
            }else{
                $this->session->set_flashdata('error', 'Şifreniz Uyuşmamaktadır!');
                redirect(base_url('profil'));
            }
        }


    }

}

/* End of file Controllername.php */