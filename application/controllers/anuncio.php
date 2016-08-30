<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Anuncio extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function index(){

        $data['titulo'] = 'Meu Anúncio';

        if($this->input->post('submit')){

            $data['message'] = $this->conta_model->Anunciar();
        }

        $data['anuncio'] = $this->conta_model->MeuAnuncio();

        $this->load->view('conta/templates/header', $data);
        $this->load->view('conta/anuncio/anuncio');
        $this->load->view('conta/templates/footer');

    }

}