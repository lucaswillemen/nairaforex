<?php 

class Cron extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('cron_model');
    }

    public function cotas(){

        $this->cron_model->PagarCota();
    }

    public function renovacao(){

        $this->cron_model->GerarFaturaRenovacao();
    }

    public function expirar_cotas(){

        $this->cron_model->ExpiraCotas();
    }
}