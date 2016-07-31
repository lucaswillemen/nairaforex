<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cadastrar extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array();

        if ($this->input->post("submit")) {

            $data['message'] = $this->usuario_model->NovoUsuario();
        }
        $patrocinador = $this->native_session->get('patrocinador');
        if (empty($patrocinador) or ! $patrocinador) {
            $patrocinador = 0;
            $patrocinadorData = '';
        } else {
            $this->load->model('admin_model');

            $patrocinador = 1;
            $patrocinadorData = $this->admin_model->UsuarioByUsername($this->native_session->get('patrocinador'));

            $patrocinadorData = $patrocinadorData->nome . '(' . $patrocinadorData->login . ')';
        }
        $data['patro'] = $patrocinador;
        $data['patrocinador'] = $patrocinadorData;
   

        $this->load->view('cadastrar', $data);
    }

    public function p($login = null) {

        $this->db->where('login', $login);
        $user = $this->db->get('usuarios');

        if ($user->num_rows() > 0) {

            if (!is_null($login)) {

                $this->native_session->set('patrocinador', $login);
            }
            redirect('cadastrar');
        } else {
            redirect('cadastrar?info=2');
        }
    }

}
