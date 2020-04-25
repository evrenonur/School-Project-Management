<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Revize_model extends CI_Model
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
        $this->db->from($this->proje_teslim);
        $this->db->join($this->proje,'proje_teslim.teslim_proje = proje.proje_id');
        $this->db->join($this->users,'proje_teslim.teslim_user = users.user_id');
        $this->db->where('teslim_revize',1);
        return $this->db->get()->result();
    }

    public function islem_onayla($id){
        return $this->db->where('teslim_id',$id)->update($this->proje_teslim,['teslim_revize' => 2]);
    }

    public function islem_onaylama($id){
        return $this->db->where('teslim_id',$id)->update($this->proje_teslim,['teslim_revize' => 3]);
    }

    public function islem_goruntule($id){
        $this->db->select('*');
        $this->db->from($this->proje);
        $this->db->join($this->users,'proje.user = users.user_id');
        $this->db->join($this->proje_teslim,'proje.proje_id = proje_teslim.teslim_proje');
        $this->db->where('teslim_id',$id);
        return $this->db->get()->row();
    }





}

/* End of file .php */