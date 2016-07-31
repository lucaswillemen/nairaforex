<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){

                if($this->native_session->get('user_id')){
                    redirect('conta');
                }

                $data = array();

                if($this->input->post('submit')){

                    $data['message'] = $this->usuario_model->Logar();
                }

                $this->load->view('login', $data);
	}

            public function esqueci(){

                $data = array();

                if($this->input->post('submit')){

                    $data['message'] = $this->usuario_model->RecuperarSenha();
                }

                $this->load->view('esqueci', $data);

            }
}