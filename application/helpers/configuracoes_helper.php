<?php

function check_session(){

    $_this =& get_instance();

    if(!$_this->native_session->get('user_id')){

        redirect('login');
    }
}

function check_session_admin(){

    $_this =& get_instance();

    if(!$_this->native_session->get('user_id_admin')){

        redirect('ctadmin/login');
    }
}

function config_site($coluna){

    $_this =& get_instance();

    $_this->db->limit(1);
    $configuracao = $_this->db->get('website_config');

    $row = $configuracao->row();

    return $row->$coluna;
}
?>