<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Projeler extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('projeler_model');
        include "control.php";
    }


    public function index()
    {
        $user_id = $this->session->userdata('user_id');
        $data = array(
            'view' => 'pages/projeler/listele',
            'projeler' => $this->projeler_model->get_all_data(),

        );
        $this->load->view('layout', $data);
    }

    public function durum()
    {
        $user_id = $this->session->userdata('user_id');
        $data = array(
            'view' => 'pages/projeler/teslim',
            'projeler' => $this->projeler_model->get_all_teslim($user_id),
        );
        $this->load->view('layout', $data);
    }

    public function goruntule($id)
    {

        $data = array(
            'view' => 'pages/projeler/goruntule',
            'proje' => $this->projeler_model->get_data($id)
        );
        $this->load->view('layout', $data);
    }

    public function teslimet($id)
    {
        $data = array(
            'view' => 'pages/projeler/teslimet',
            'proje' => $this->projeler_model->get_data($id)
        );
        $this->load->view('layout', $data);
    }

    public function insert()
    {

        $teslim_user = $this->session->userdata('user_id');
        $teslim_proje = $this->input->post('proje_id');
        $control = $this->projeler_model->teslim_et_control($teslim_user, $teslim_proje);
        if (!$control) {

            $data = array(
                'teslim_user' => $teslim_user,
                'teslim_proje' => $teslim_proje,
                'teslim_aciklama' => $this->input->post('teslim_aciklama'),
                'teslim_onay' => 0,
                'teslim_revize' => 0,
                'teslim_tarih' => date('Y-m-d')
            );

            $config['upload_path'] = 'dosya/teslim/';
            $config['allowed_types'] = 'pdf|jpg|png|zip|rar|doc|docx|xls|xlsx|ppt|pptx';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('teslim_dosya')) {
                $upload_data = $this->upload->data();
                $file_name = $upload_data['file_name'];
                $data['teslim_dosya'] = $file_name;
            }
            if ($this->projeler_model->insert_data($data)) {
                $this->session->set_flashdata('success', 'Proje Başarıyla Teslim Edili!');
                redirect(base_url('projeler'));
            } else {
                $this->session->set_flashdata('error', 'Hata! Proje Teslim Edilemedi!');
                redirect(base_url('projeler'));
            }
        } else {
            $this->session->set_flashdata('error', 'Hata! Daha Önce Kaydınız Mevcut!');
            redirect(base_url('projeler'));
        }


    }

    public function revizetalep($id)
    {

        $data = array(
            'teslim_id' => $id,
            'teslim_revize' => 0,
            'teslim_onay' => 3
        );
        $check = $this->db->where($data)->get('proje_teslim')->row();
        if ($check) {
            if ($this->projeler_model->revize_talep($id)) {
                $this->session->set_flashdata('success', 'Revize Talep Edildi!');
                redirect(base_url('projeler/durum'));
            } else {
                $this->session->set_flashdata('error', 'Revize Talep Edilemedi!');
                redirect(base_url('projeler/durum'));
            }


        } else {
            $this->session->set_flashdata('error', 'Revize Talep Edilmiş!');
            redirect(base_url('projeler/durum'));
        }
    }

    public function duzenle($id)
    {

        $where = array(
            'teslim_id' => $id,
            'teslim_revize' => 2
        );
        $control = $this->db->where($where)->get('proje_teslim')->row();
        if ($control) {
            $data = array(
                'view' => 'pages/projeler/duzenle',
                'proje' => $this->projeler_model->revize_data($id)
            );
            $this->load->view('layout', $data);
        } else {
            $this->session->set_flashdata('error', 'Hata! Revize Kaydınız Bulunmamaktadır!');
            redirect(base_url('projeler/durum'));
        }
    }

    public function update()
    {


        $teslim_id = $this->input->post('teslim_id');
        $where = array(
            'teslim_id' => $teslim_id,
            'teslim_revize' => 2
        );
        $control = $this->db->where($where)->get('proje_teslim')->row();
        if ($control) {

            $data = array(
                'teslim_aciklama' => $this->input->post('teslim_aciklama'),
                'teslim_revize' => 0,
                'teslim_revize_tarih' => date('Y-m-d')
            );

            $config['upload_path'] = 'dosya/teslim/';
            $config['allowed_types'] = 'pdf|jpg|png|zip|rar|doc|docx|xls|xlsx|ppt|pptx';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('teslim_dosya')) {
                $upload_data = $this->upload->data();

                if (!empty($this->input->post('tmp_dosya'))){
                    unlink('dosya/teslim/' . $this->input->post('tmp_dosya'));
                }
                $file_name = $upload_data['file_name'];
                $data['teslim_dosya'] = $file_name;
            }
            if ($this->projeler_model->update_data($teslim_id, $data)) {
                $this->session->set_flashdata('success', 'Proje Başarıyla Güncellendi!');
                redirect(base_url('projeler/durum'));
            } else {
                $this->session->set_flashdata('error', 'Hata! Proje Güncellenemedi!');
                redirect(base_url('projeler/durum'));
            }
        } else {
            $this->session->set_flashdata('error', 'Hata! Revize Kaydınız Bulunmamaktadır!');
            redirect(base_url('projeler/durum'));
        }
    }

    public function tesgoruntule($id)
    {
        $data = array(
            'view' => 'pages/projeler/tesgoruntule',
            'proje' => $this->projeler_model->revize_data($id)
        );
        $this->load->view('layout', $data);
    }

}

/* End of file Controllername.php */