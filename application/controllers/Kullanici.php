<?php


class Kullanici extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        include "control.php";
        $this->load->model('login_model');
        if ($this->session->userdata('role') == 0) {
            redirect(base_url());
        }
    }


    public function index()
    {
        $data = array(
            'view' => 'pages/kullanici/kullanicilar',
            'users' => $this->login_model->get_all_data()
        );
        $this->load->view('layout', $data);
    }

    public function json_data($id)
    {
        echo json_encode($this->login_model->get_user($id), JSON_UNESCAPED_UNICODE);
    }

    public function update()
    {
        $user_id = $this->input->post('user_id');
        $data = array(
            'role' => $this->input->post('role')
        );

        if ($this->login_model->update_user($user_id, $data)) {
            $this->session->set_flashdata('success', 'Başarıyla Güncellendi!');
            redirect(base_url('kullanici'));
        } else {
            $this->session->set_flashdata('error', 'Hata! Güncellenemedi!');
            redirect(base_url('kullanici'));
        }


    }

    public function delete($id){
        if ($this->login_model->delete_user($id)) {
            $this->session->set_flashdata('success', 'Başarıyla Silindi!');
            redirect(base_url('kullanici'));
        } else {
            $this->session->set_flashdata('error', 'Hata! Silinemedi!');
            redirect(base_url('kullanici'));
        }
    }
}