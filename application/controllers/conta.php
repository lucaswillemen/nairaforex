<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Conta extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    private function verificar_graduacao() {
        $this->load->model('admin_model');

        $userData = $this->admin_model->InformacaoUsuario($this->native_session->get('user_id'));
        if (isset($userData->pacote)) {
            $userPacote = $this->admin_model->InformacaoPacote($userData->pacote);
            $this->db->where('id  <>', $userData->graduacao);
            $this->db->where('id  >', $userData->graduacao);
            $this->db->where('status', 'Ativa');


            $nextGraduacao = $this->db->get('graduacoes')->row();
            if ($nextGraduacao->id) {
                $this->db->where('id_patrocinador', $this->native_session->get('user_id'));
                $indicados = $this->db->get('patrocinadores');
                $totalGrad = 0;
                $totalIndicados = 0;
                foreach ($indicados->result() as $key) {
                    $indicadoInf = $this->admin_model->InformacaoUsuario($key->id_usuario);

                    if ($indicadoInf->block == 0) {
                        $totalIndicados = $totalIndicados + 1;
                    }
                }

                if ($nextGraduacao->grad_required == 0) {
                    $totalGrad = $totalIndicados;
                } else {
                    foreach ($indicados->result() as $indicado) {
                        $indicadoInf = $this->admin_model->InformacaoUsuario($indicado->id_usuario);
                        if ($indicadoInf->block == 0) {
                            if ($indicadoInf->graduacao == $nextGraduacao->grad_required) {
                                $totalGrad = $totalGrad + 1;
                            } else {
                                $filhos = $this->admin_model->filhosByLevel($indicado->id_usuario, 0, 7);
                                foreach ($filhos as $value) {
                                    $filhoInf = $this->admin_model->InformacaoUsuario($value);
                                    if ($filhoInf->graduacao == $nextGraduacao->grad_required) {
                                        $totalGrad = $totalGrad + 1;
                                        break;
                                    }
                                }
                            }
                        }
                    }
                }
                if ($nextGraduacao->qntd_grad <= $totalGrad and $nextGraduacao->pontuacao <= $userData->pontos) {
                    if ($userData->graduacao <> $nextGraduacao->id) {
                        $this->db->where('id', $userData->id);
                        $this->db->update('usuarios', array('graduacao' => $nextGraduacao->id));
                        $mensagem['boas_vindas'] = "Parabéns,você recebeu uma nova graduação<br><br><div class='icon'>
                    <img src='{$nextGraduacao->icone}' width='30' /> A sua nova graduação é: {$nextGraduacao->nome}
                </div>";
                        return $mensagem;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }

    public function index() {

        $nova_grad = $this->verificar_graduacao();
        if (@$nova_grad['boas_vindas'] != '') {
            $data['novaGraduacao'] = $nova_grad['boas_vindas'];
        }
        $data['titulo'] = 'Backoffice';

        $data['login'] = $this->conta_model->user('login');
        $data['cotas'] = $this->conta_model->MinhasCotas('index');
        $data['indicador'] = $this->conta_model->MeuIndicador();
        $data['anuncios'] = $this->conta_model->Anuncios();

        $this->load->view('conta/templates/header', $data);
        $this->load->view('conta/index'
        );
        $this->load->view('conta/templates/footer');
    }

    public function redirecionar($id) {

        $redirecionamento = $this->conta_model->Redirecionar($id);

        if ($redirecionamento !== false) {

            redirect($redirecionamento);
        } else {

            redirect('conta');
        }
    }

    public function cotas() {

        $data['titulo'] = 'Minhas cotas';

        $data['cotas'] = $this->conta_model->MinhasCotas();

        $this->load->view('conta/templates/header', $data);
        $this->load->view('conta/cotas/todas'
        );
        $this->load->view('conta/templates/footer');
    }

    public function comprar_cotas() {

        $data['titulo'] = 'Comprar cotas';

        $data['contas'] = $this->conta_model->ContasBancarias();

        $this->load->view('conta/templates/header', $data);
        $this->load->view('conta/cotas/comprar'
        );
        $this->load->view('conta/templates/footer');
    }

    public function faturas() {

        $data['titulo'] = 'Faturas';

        $data['faturas'] = $this->conta_model->Faturas();

        $this->load->view('conta/templates/header', $data);
        $this->load->view('conta/financeiro/faturas'
        );
        $this->load->view('conta/templates/footer');
    }

    public function pagar_fatura($id) {

        $data['titulo'] = 'Pagar Fatura';

        $data['fatura'] = $this->conta_model->InformacaoFatura($id);
        $data['contas'] = $this->conta_model->ContasBancarias();

        $this->load->view('conta/templates/header', $data);
        $this->load->view('conta/financeiro/faturas_pagar'
        );
        $this->load->view('conta/templates/footer');
    }

    public function cancelar_fatura($id) {

        $this->
        conta_model->CancelarFatura($id);

        redirect('faturas');
    }

    public function extrato() {

        $data['titulo'] = 'Extrato';

        $data['extrato_registros'] = $this->conta_model->Extrato();

        $this->load->view('conta/templates/header', $data);
        $this->load->view('conta/financeiro/extrato'
        );
        $this->load->view('conta/templates/footer');
    }

    public function transferir() {

        $data['titulo'] = 'Transferir Saldo';

        if ($this->input->post('submit')) {

            $data['message'] = $this->conta_model->TransferirSaldo();
        }

        $this->load->view('conta/templates/header', $data);
        $this->load->view('conta/financeiro/transferir'
        );
        $this->load->view('conta/templates/footer');
    }

    public function pagar_saldo() {

        $data['titulo'] = 'Pagar faturas com saldo';

        if ($this->input->post('submit2')) {

            $data['message'] = $this->conta_model->PagarFaturaSaldo();
        }

        $this->load->view('conta/templates/header', $data);
        $this->load->view('conta/financeiro/pagar_saldo'
        );
        $this->load->view('conta/templates/footer');
    }

    public function comprovante() {

        $data['titulo'] = 'Enviar comprovante';

        $data['faturas'] = $this->conta_model->Faturas();

        if ($this->input->post('submit')) {

            $data['message'] = $this->conta_model->EnviarComprovante();
        }

        $this->load->view('conta/templates/header', $data);
        $this->load->view('conta/financeiro/comprovante'
        );
        $this->load->view('conta/templates/footer');
    }

    public function saque() {

        $data['titulo'] = 'Saques';

        $data['saques'] = $this->conta_model->Saques();

        $this->load->view('conta/templates/header', $data);
        $this->load->view('conta/financeiro/saques'
        );
        $this->load->view('conta/templates/footer');
    }

    public function solicitar_saque() {

        $this->load->helper('bancos');

        $data['titulo'] = 'Solicitar Saque';

        if ($this->input->post('submit')) {

            $data['message'] = $this->conta_model->SolicitarSaque();
        }

        $this->load->view('conta/templates/header', $data);
        $this->load->view('conta/financeiro/saques_solicitar'
        );
        $this->load->view('conta/templates/footer');
    }

    public function configuracoes() {

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

        $this->load->view('conta/templates/header', $data);
        $this->load->view('conta/usuario/configuracoes'
        );
        $this->load->view('conta/templates/footer');
    }

    public function indicados() {

        $this->load->model('admin_model');

        $data['titulo'] = 'Minha Rede';

        if (isset($_GET['rede'])) {
            $filhos = $this->admin_model->filhos($this->native_session->get('user_id'));
            if (in_array($_GET['rede'], $filhos)) {
                $data['indicados'] = $this->conta_model->Indicados($_GET['rede']);
            } else {
                echo '<center><h1>Esse usuário não pertence a sua rede</h1></center>';
                exit();
            }
        } else {
            $data['indicados'] = $this->conta_model->Indicados();
        }

        $data['conta_model'] = $this->conta_model;
        $data['admin_model'] = $this->admin_model;


        $this->load->view('conta/templates/header', $data);
        $this->load->view('conta/indicados'
        );
        $this->load->view('conta/templates/footer');
    }

    public function tickets() {

        $this->load->helper('tickets');

        $data['titulo'] = 'Tickets';

        $data['tickets'] = $this->conta_model->TodosTickets();

        $this->load->view('conta/templates/header', $data);
        $this->load->view('conta/tickets/todos'
        );
        $this->load->view('conta/templates/footer');
    }

    public function novo_ticket() {

        $data['titulo'] = 'Novo Ticket';

        if ($this->input->post('submit')) {

            $data['message'] = $this->conta_model->NovoTicket();
        }

        $this->load->view('conta/templates/header', $data);
        $this->load->view('conta/tickets/novo'
        );
        $this->load->view('conta/templates/footer');
    }

    public function visualizar_ticket($id) {

        $data['titulo'] = 'Visualizar Ticket';

        if ($this->input->post('submit')) {

            $this->conta_model->AdicionarMensagemTicket($id);
        }

        $data['ticket'] = $this->conta_model->InformacaoTicket($id);
        $data['ticket_mensagens'] = $this->conta_model->MensagensTicket($id);

        $this->load->view('conta/templates/header', $data);
        $this->load->view('conta/tickets/visualizar'
        );
        $this->load->view('conta/templates/footer');
    }

    public function atualiza_notificacao() {

        echo $this->conta_model->AtualizaNotificacoes();
    }

    public function graduacoes() {
        $idUsr = $this->native_session->get('user_id');
        $data['titulo'] = 'Graduações';
        $this->db->where('status', "Ativa");
        $graduacoes = $this->db->get('graduacoes');
        $data['graduacoes'] = $graduacoes->result();
        $this->load->view('conta/templates/header', $data);
        $this->load->view('conta/graduacoes/todos'
        );
        $this->load->view('conta/templates/footer');
    }

    public function sair() {

        $this->native_session->unset_userdata('user_id');
        redirect('login');
    }

}
