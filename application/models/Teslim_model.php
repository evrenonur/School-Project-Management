<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Teslim_model extends CI_Model
{

    private $proje, $users, $proje_teslim;

    public function __construct()
    {
        parent::__construct();
        $this->proje = "proje";
        $this->users = "users";
        $this->proje_teslim = "proje_teslim";
    }


    public function get_data($id)
    {
        $this->db->select('*');
        $this->db->from($this->proje_teslim);
        $this->db->join($this->users,'proje_teslim.teslim_user = users.user_id');
        $this->db->join($this->proje,'proje_teslim.teslim_proje = proje.proje_id');
        $this->db->where('teslim_proje',$id);
        return $this->db->get()->result();
    }

    public function islem_goster($id){
        $this->db->select('*');
        $this->db->from($this->proje_teslim);
        $this->db->join($this->users,'proje_teslim.teslim_user = users.user_id');
        $this->db->join($this->proje,'proje_teslim.teslim_proje = proje.proje_id');
        $this->db->where('teslim_id',$id);
        return $this->db->get()->row();
    }

    public function islem_update($id, $data = array()){
        return $this->db->where('teslim_id',$id)->update($this->proje_teslim,$data);
    }


}

/* End of file .php */