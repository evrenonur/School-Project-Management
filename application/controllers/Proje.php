<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Proje extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('proje_model');
        include "control.php";
        if ($this->session->userdata('role')==0){
            redirect(base_url());
        }
    }

    public function index()
    {
        $data = array(
            'view' => 'pages/proje/listele',
            'projeler' => $this->proje_model->get_all_data($this->session->userdata('user_id'))
        );
        $this->load->view('layout',$data);
    }

    public function ekle()
    {
        $data = array(
            'view' => 'pages/proje/ekle'
        );
        $this->load->view('layout', $data);
    }

    public function insert()
    {

        $data = array(
            'user' => $this->session->userdata('user_id'),
            'baslik' => $this->input->post('baslik'),
            'aciklama' => $this->input->post('aciklama'),
            'aktif' => $this->input->post('aktif') == "on" ? 1 : 0,
            'tarih' => date('Y-m-d',strtotime($this->input->post('tarih'))),
        );
        $config['upload_path'] = 'dosya/proje/';
        $config['allowed_types'] = 'pdf|jpg|png|zip|rar|doc|docx|xls|xlsx|ppt|pptx';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('dosya')) {
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];
            $data['dosya'] = $file_name;
        }
        if ($this->proje_model->insert_data($data)){
            $this->session->set_flashdata('success', 'Proje Başarıyla Eklendi!');
            redirect(base_url('proje'));
        }else{
            $this->session->set_flashdata('error', 'Hata! Proje Eklenemedi!');
            redirect(base_url('proje'));
        }



    }

    public function sil($id){
        if ($this->proje_model->delete_data($id)){
            $this->session->set_flashdata('success', 'Proje Başarıyla Silindi!');
            redirect(base_url('proje'));
        }else{
            $this->session->set_flashdata('error', 'Hata! Proje Silinemedi!');
            redirect(base_url('proje'));
        }
    }

    public function guncelle($id){
        $data = array(
            'view' => 'pages/proje/guncelle',
            'proje' => $this->proje_model->get_data($id)
        );
        $this->load->view('layout',$data);
    }

    public function update(){
        $id = $this->input->post('proje_id');
        $data = array(
            'user' => $this->session->userdata('user_id'),
            'baslik' => $this->input->post('baslik'),
            'aciklama' => $this->input->post('aciklama'),
            'aktif' => $this->input->post('aktif') == "on" ? 1 : 0,
            'tarih' => date('Y-m-d',strtotime($this->input->post('tarih'))),
        );
        $config['upload_path'] = 'dosya/proje/';
        $config['allowed_types'] = 'pdf|jpg|png|zip|rar|doc|docx|xls|xlsx|ppt|pptx';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('dosya')) {
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];
            $tmp_dosya = $this->input->post('tmp_dosya');
            if (!empty($tmp_dosya)){
                unlink('dosya/proje/'.$tmp_dosya);
            }
            $data['dosya'] = $file_name;
        }
        if ($this->proje_model->update_data($id,$data)){
            $this->session->set_flashdata('success', 'Proje Başarıyla Güncellendi!');
            redirect(base_url('proje'));
        }else{
            $this->session->set_flashdata('error', 'Hata! Proje Güncellenemedi!');
            redirect(base_url('proje'));
        }
    }

}

/* End of file Controllername.php */