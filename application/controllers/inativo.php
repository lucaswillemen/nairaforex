<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inativo extends CI_Controller {

    public function verificar_sessao() {
        $sessao = $this->native_session->get('inativo_id');
        if (!isset($sessao) or $sessao == '') {
            redirect('/login?ffdfdf');
        }
    }

    public function index() {
        $this->verificar_sessao();
        $data['titulo'] = 'Faturas';

        $data['faturas'] = $this->conta_model->Faturas($this->native_session->get('inativo_id'));
        $this->load->view('inativo/templates/header', $data);

        $this->load->view('inativo/financeiro/faturas');
        $this->load->view('inativo/templates/footer');
    }

    public function pagar_fatura($id) {
        $this->verificar_sessao();

        $data['titulo'] = 'Pagar Fatura';
        $data['fatura'] = $this->conta_model->InformacaoFatura($id);
        $data['contas'] = $this->conta_model->ContasBancarias();
        $this->load->view('inativo/templates/header', $data);
        $this->load->view('inativo/financeiro/faturas_pagar');
        $this->load->view('inativo/templates/footer');
    }

    public function comprovante() {
        $this->verificar_sessao();

        $data['titulo'] = 'Enviar comprovante';


        $data['faturas'] = $this->conta_model->Faturas($this->native_session->get('inativo_id'));

        if ($this->input->post('submit')) {

            $data['message'] = $this->conta_model->EnviarComprovante();
        }


        $this->load->view('inativo/templates/header', $data);
        $this->load->view('inativo/financeiro/comprovante');
        $this->load->view('inativo/templates/footer');
    }

    public function configuracoes() {
        $this->verificar_sessao();

        $this->load->helper('bancos');

        $data['titulo'] = 'Configurações';

        if ($this->input->post('submit1')) {

            $data['message1'] = $this->conta_model->AtualizarDados();
        }

        if ($this->input->post('submit2')) {

            $data['message2'] = $this->conta_model->AlterarSenha();
        }

        if ($this->input->post('submit3')) {

            $data['message3'] = $this->conta_model->AlterarContaBancaria();
        }

        $data['bancos'] = Bancos();

        $this->load->view('inativo/templates/header', $data);
        $this->load->view('inativo/usuario/configuracoes');
        $this->load->view('inativo/templates/footer');
    }

    public function sair() {
        $this->native_session->unset_userdata('inativo_id');
        redirect('login');
    }

}
