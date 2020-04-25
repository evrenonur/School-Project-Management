<?php
if (!$this->session->userdata('is_admin_login')){
    redirect(base_url('login/auth'));
}