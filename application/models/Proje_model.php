<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Proje_model extends CI_Model
{
    private $proje,$proje_teslim;

    public function __construct()
    {
        parent::__construct();
        $this->proje = "proje";
        $this->proje_teslim = "proje_teslim";
    }

    public function insert_data($data = array()){
        return $this->db->insert($this->proje,$data);
    }

    public function get_data($id){
        return $this->db->where('proje_id',$id)->get($this->proje)->row();
    }

    public function get_all_data($user_id){
        return $this->db->where('user',$user_id)->get($this->proje)->result();
    }

    public function delete_data($id){
        $dosya = $this->db->where('proje_id',$id)->get($this->proje)->row();
        unlink('dosya/proje/'.$dosya->dosya);

        $teslim = $this->db->where('teslim_proje',$id)->get($this->proje_teslim)->result();

        foreach ($teslim as $item){
            unlink('dosya/teslim/'.$item->teslim_dosya);
        }

        $teslim = $this->db->where('teslim_proje',$id)->delete($this->proje_teslim);
        return $this->db->where('proje_id',$id)->delete($this->proje);
    }

    public function update_data($id,$data = array()){
        return $this->db->where('proje_id',$id)->update($this->proje,$data);

    }



}

/* End of file .php */