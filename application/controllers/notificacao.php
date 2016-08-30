<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notificacao extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('cobranca_model', 'cobranca');
    }


    public function gerencianet(){

            if(config_site('ativa_gerencianet') == 1){

                if(!empty($_POST["xml"])){

                   echo $this->cobranca->gerencianet();
            }
        }
    }
}