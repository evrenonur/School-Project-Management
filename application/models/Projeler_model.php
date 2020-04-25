<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Projeler_model extends CI_Model
{

    private $proje,$users,$proje_teslim;
    public function __construct()
    {
        parent::__construct();
        $this->proje = "proje";
        $this->users = "users";
        $this->proje_teslim = "proje_teslim";
    }

    public function get_all_data(){
        $this->db->select('*');
        $this->db->from($this->proje);
        $this->db->join($this->users,'proje.user = users.user_id');
        $this->db->where('proje.tarih>=', date('Y-m-d'));
        $this->db->where('proje.aktif=',1);
        return $this->db->get()->result();
    }


    public function get_data($id){
        $this->db->select('*');
        $this->db->from($this->proje);
        $this->db->join($this->users,'proje.user = users.user_id');
        $this->db->where('proje_id',$id);
        return $this->db->get()->row();
    }

    /*Proje Teslim Edilenler*/
    public function get_all_teslim($id){
        $this->db->select('*');
        $this->db->from($this->proje_teslim);
        $this->db->join($this->proje,'proje_teslim.teslim_proje = proje.proje_id');
        $this->db->where('teslim_user',$id);
        return $this->db->get()->result();
    }

    /*Proje teslim kontrol */
    public function teslim_et_control($id,$proje){
        $this->db->select('*');
        $this->db->from($this->proje_teslim);
        $this->db->where('teslim_proje',$proje);
        $this->db->where('teslim_user',$id);
        return $this->db->get()->row();
    }

    /*Proje teslim kayıt*/
    public function insert_data($data = array()){
        return $this->db->insert($this->proje_teslim,$data);
    }

    /*Rezive talep*/
    public function revize_talep($id){
       return $this->db->where('teslim_id',$id)->update($this->proje_teslim,['teslim_revize' => 1]);
    }

    /*Revize görüntüle*/
    public function revize_data($id){
        $this->db->select('*');
        $this->db->from($this->proje);
        $this->db->join($this->users,'proje.user = users.user_id');
        $this->db->join($this->proje_teslim,'proje.proje_id = proje_teslim.teslim_proje');
        $this->db->where('teslim_id',$id);
        return $this->db->get()->row();
    }

    /*Revize Update*/
    public function update_data($id,$data = array()){
        return $this->db->where('teslim_id',$id)->update($this->proje_teslim,$data);
    }

}

/* End of file .php */