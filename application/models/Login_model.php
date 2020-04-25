<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{

    private $users;

    public function __construct()
    {
        parent::__construct();
        $this->users = "users";
    }


    public function login($data = array())
    {
        return $this->db->where($data)->get($this->users)->row();
    }

    public function where_sing($email)
    {
        $data = array(
            'email' => $email
        );
        return $this->db->where($data)->get($this->users)->row();
    }

    public function insert_data($data = array())
    {
        return $this->db->insert($this->users, $data);
    }

    public function onay_update($token)
    {

        $check = $this->db->where('user_token', $token)->get($this->users)->row();
        if ($check) {
            $data = array(
                'user_token' => '',
                'user_active' => 1
            );
            return $this->db->where('user_id', $check->user_id)->update($this->users, $data);
        }else{
            return false;
        }
    }

    public function get_user($id){
        return $this->db->where('user_id',$id)->get($this->users)->row();
    }

    public function get_all_data(){
        return $this->db->get($this->users)->result();
    }

    public function update_user($id,$data = array()){
        return $this->db->where('user_id',$id)->update($this->users,$data);
    }
    public function delete_user($id)
    {
        $user_file = $this->db->where('teslim_user', $id)->get('proje_teslim')->result();
        foreach ($user_file as $file) {
            if (!empty($file->teslim_dosya)) {
                unlink('dosya/teslim/' . $file->teslim_dosya);
            }
        }
        $this->db->where('teslim_user', $id)->delete('proje_teslim');
        return $this->db->where('user_id',$id)->delete($this->users);
    }


}

/* End of file .php */