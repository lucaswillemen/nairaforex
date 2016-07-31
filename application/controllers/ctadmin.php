<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ctadmin extends CI_Controller {

    public function verificar_sessao() {
        $sessao = $this->native_session->get('user_id_admin');
        if (!isset($sessao) or $sessao == '') {
            redirect('ctadmin/login');
        }
    }

    public function __construct() {
        parent::__construct();
        $this->load->model('admin_model', 'admin');
        $this->load->helper('bancos');
        $this->load->helper('tickets');
    }

    public function index() {

        if ($this->native_session->get('user_id_admin')) {

            redirect('ctadmin/home');
        }

        redirect('ctadmin/login');
    }

    public function login() {

        $data = array();

        if ($this->input->post('submit')) {

            $data['message'] = $this->admin->Login();
        }

        $this->load->view('admin/login', $data);
    }

    public function home() {
        $this->verificar_sessao();

        $data['titulo'] = 'Página inicial';

        $data['pg_home'] = true;

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/index');
        $this->load->view('admin/templates/footer');
    }

    public function usuarios() {
        $this->verificar_sessao();

        $data['titulo'] = 'Usuários';

        $data['pg_usuarios'] = true;

        $data['usuarios'] = $this->admin->Usuarios();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/usuarios/todos');
        $this->load->view('admin/templates/footer');
    }

    public function visualizar_usuario($id) {
        $this->verificar_sessao();

        $data['titulo'] = 'Visualizar usuário';

        $data['pg_usuarios'] = true;

        $data['usuario'] = $this->admin->InformacaoUsuario($id);
        $data['cotas_usuario'] = $this->admin->CotasUsuario($id);
        $data['extratos_usuario'] = $this->admin->ExtratoUsuario($id);
        $data['indicados_usuario'] = $this->admin->IndicadosUsuario($id);

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/usuarios/visualizar');
        $this->load->view('admin/templates/footer');
    }

    public function editar_usuario($id) {
        $this->verificar_sessao();

        $data['titulo'] = 'Editar usuário';

        $data['pg_usuarios'] = true;

        if ($this->input->post('submit')) {

            $data['message'] = $this->admin->EditarUsuario($id);
        }

        $data['usuario'] = $this->admin->InformacaoUsuario($id);

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/usuarios/editar');
        $this->load->view('admin/templates/footer');
    }

    public function excluir_usuario($id) {
        $this->verificar_sessao();

        $this->admin->ExcluirUsuario($id);

        redirect('ctadmin/usuarios');
    }

    public function faturas() {
        $this->verificar_sessao();

        $data['titulo'] = 'Todas faturas';

        $data['pg_faturas'] = true;

        $data['faturas'] = $this->admin->TodasFaturas();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/faturas/todos');
        $this->load->view('admin/templates/footer');
    }

    public function liberar_fatura($id) {
        $this->verificar_sessao();

        $this->admin->LiberarFatura($id);

        redirect('ctadmin/faturas');
    }

    public function saques() {
        $this->verificar_sessao();

        $data['titulo'] = 'Todos os saques';

        $data['pg_saques'] = true;

        $data['saques'] = $this->admin->TodosSaques();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/saques/todos');
        $this->load->view('admin/templates/footer');
    }

    public function visualizar_saque($id) {
        $this->verificar_sessao();

        $data['titulo'] = 'Visualizar Saque';

        $data['pg_saques'] = true;

        $data['saque'] = $this->admin->Saque($id);

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/saques/visualizar');
        $this->load->view('admin/templates/footer');
    }

    public function pagar_saque($id) {
        $this->verificar_sessao();

        $this->admin->PagarSaque($id);

        redirect('ctadmin/saques');
    }

    public function estornar_saque($id) {
        $this->verificar_sessao();

        $this->admin->EstornarSaque($id);

        redirect('ctadmin/saques');
    }

    public function anuncios() {
        $this->verificar_sessao();

        $data['titulo'] = 'Anúncios';

        $data['pg_anuncios'] = true;

        $data['anuncios'] = $this->admin->TodosAnuncios();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/anuncios/todos');
        $this->load->view('admin/templates/footer');
    }

    public function visualizar_anuncio($id) {
        $this->verificar_sessao();

        $data['titulo'] = 'Visualizar Anúncio';

        $data['pg_anuncios'] = true;

        $data['anuncio'] = $this->admin->VisualizarAnuncio($id);

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/anuncios/visualizar');
        $this->load->view('admin/templates/footer');
    }

    public function desativar_anuncio($id) {
        $this->verificar_sessao();

        $this->admin->DesativarAnuncio($id);
        redirect('ctadmin/anuncios/visualizar/' . $id);
    }

    public function aprovar_anuncio($id) {
        $this->verificar_sessao();

        $this->admin->AprovarAnuncio($id);
        redirect('ctadmin/anuncios/visualizar/' . $id);
    }

    public function excluir_anuncio($id) {
        $this->verificar_sessao();

        $this->admin->ExcluirAnuncio($id);
        redirect('ctadmin/anuncios/');
    }

    public function tickets() {
        $this->verificar_sessao();

        $data['titulo'] = 'Todos Tickets';

        $data['pg_tickets'] = true;

        $data['tickets'] = $this->admin->TodosTickets();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/tickets/todos');
        $this->load->view('admin/templates/footer');
    }

    public function visualizar_ticket($id) {
        $this->verificar_sessao();

        $data['titulo'] = 'Visualizar Ticket';

        $data['pg_tickets'] = true;

        if ($this->input->post('submit')) {

            $this->admin->EnviarMensagemTicket($id);
        }

        $data['ticket'] = $this->admin->VisualizarTicket($id);
        $data['mensagens_ticket'] = $this->admin->MensagensTicket($id);

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/tickets/visualizar');
        $this->load->view('admin/templates/footer');
    }

    public function fechar_ticket($id) {
        $this->verificar_sessao();

        $this->admin->FecharTicket($id);

        redirect('ctadmin/tickets');
    }

    public function reabrir_ticket($id) {
        $this->verificar_sessao();

        $this->admin->ReabrirTicket($id);

        redirect('ctadmin/tickets');
    }

    public function notificacoes() {
        $this->verificar_sessao();

        $data['titulo'] = 'Notificações';

        $data['pg_notificacoes'] = true;

        if ($this->input->post('submit')) {

            $data['message'] = $this->admin->EnviarNotificacao();
        }

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/notificacoes/nova');
        $this->load->view('admin/templates/footer');
    }

    public function senha() {
        $this->verificar_sessao();

        $data['titulo'] = 'Alterar Senha';

        if ($this->input->post('submit')) {

            $data['message'] = $this->admin->MudarSenha();
        }

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/senha');
        $this->load->view('admin/templates/footer');
    }

    public function users() {
        $this->verificar_sessao();

        $data['titulo'] = 'Usuários administrativos';

        $data['usuarios'] = $this->admin->TodosUsuariosAdmin();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/usuarios_admin/todos');
        $this->load->view('admin/templates/footer');
    }

    public function novo_user_admin() {
        $this->verificar_sessao();

        $data['titulo'] = 'Novo usuário administrativo';

        if ($this->input->post('submit')) {

            $data['message'] = $this->admin->AdicionarUsuarioAdministrativo();
        }

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/usuarios_admin/novo');
        $this->load->view('admin/templates/footer');
    }

    public function editar_user_admin($id) {
        $this->verificar_sessao();

        $data['titulo'] = 'Editar usuário administrativo';

        if ($this->input->post('submit')) {

            $data['message'] = $this->admin->AtualizarUsuarioAdministrativo($id);
        }

        $data['usuario'] = $this->admin->InformacaoUsuarioAdministrativo($id);

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/usuarios_admin/editar');
        $this->load->view('admin/templates/footer');
    }

    public function excluir_user_admin($id) {
        $this->verificar_sessao();

        $this->admin->ExcluirUsuarioAdministrativo($id);

        redirect('ctadmin/users');
    }

    public function configuracoes() {
        $this->verificar_sessao();

        $data['titulo'] = 'Configurações do site';

        $data['pg_configuracoes'] = true;

        if ($this->input->post('submit')) {

            $data['message'] = $this->admin->AtualizarConfiguracoes();
        }

        $data['config'] = $this->admin->Configuracoes();
        $data['cron'] = $this->admin->Cron();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/configuracoes/configuracoes');
        $this->load->view('admin/templates/footer');
    }

    public function bancario() {
        $this->verificar_sessao();

        $data['titulo'] = 'Contas Bancárias';

        $data['pg_bancario'] = true;

        $data['contas'] = $this->admin->ContasBancarias();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/bancario/todos');
        $this->load->view('admin/templates/footer');
    }

    public function nova_conta_bancaria() {
        $this->verificar_sessao();

        $data['titulo'] = 'Contas Bancárias';

        $data['pg_bancario'] = true;

        if ($this->input->post('submit')) {
            $data['message'] = $this->admin->NovaContaBancaria();
        }

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/bancario/nova');
        $this->load->view('admin/templates/footer');
    }

    public function editar_conta_bancaria($id) {
        $this->verificar_sessao();

        $data['titulo'] = 'Contas Bancárias';

        $data['pg_bancario'] = true;

        if ($this->input->post('submit')) {
            $data['message'] = $this->admin->EditarContaBancaria($id);
        }

        $data['conta'] = $this->admin->InformacaoContaBancaria($id);

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/bancario/editar');
        $this->load->view('admin/templates/footer');
    }

    public function excluir_conta_bancaria($id) {
        $this->verificar_sessao();

        $this->admin->ExcluirContaBancaria($id);

        redirect('ctadmin/bancario');
    }

    public function logout() {

        $this->native_session->unset_userdata('user_id_admin');

        redirect('ctadmin/login');
    }

    //pacotes
    public function pacotes() {
        $this->verificar_sessao();

        $data['titulo'] = 'Pacotes';

        $data['pg_pacotes'] = true;

        $data['pacotes'] = $this->admin->Pacotes();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/pacotes/todos');
        $this->load->view('admin/templates/footer');
    }

    public function novo_pacotes() {
        $this->verificar_sessao();

        $data['titulo'] = 'Novo Pacote';
        $data['pg_pacotes'] = true;

        if ($this->input->post('submit')) {
            $data['message'] = $this->admin->NovoPacote();
        }

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/pacotes/novo');
        $this->load->view('admin/templates/footer');
    }

    public function editar_pacote($id) {
        $this->verificar_sessao();

        $data['titulo'] = 'Pacote';

        $data['pg_pacotes'] = true;

        if ($this->input->post('submit')) {
            $data['message'] = $this->admin->EditarPacote($id);
        }

        $data['pacote'] = $this->admin->InformacaoPacote($id);

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/pacotes/editar');
        $this->load->view('admin/templates/footer');
    }

    public function graduacoes() {
        $this->verificar_sessao();
        $data['titulo'] = 'Graduações';

        $data['pg_pacotes'] = true;

        $data['graduacoes'] = $this->admin->Graduacoes();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/graduacoes/todos');
        $this->load->view('admin/templates/footer');
    }

    public function nova_graduacao() {
        $this->verificar_sessao();

        $data['titulo'] = 'Nova Graduação';
        $data['pg_pacotes'] = true;
        $data['graduacoes'] = $this->admin->Graduacoes();

        if ($this->input->post('submit')) {
            $data['message'] = $this->admin->NovaGraduacao();
        }

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/graduacoes/novo');
        $this->load->view('admin/templates/footer');
    }

    public function editar_graduacao($id) {
        $this->verificar_sessao();

        $data['titulo'] = 'Graduação';

        $data['pg_pacotes'] = true;

        if ($this->input->post('submit')) {
            $data['message'] = $this->admin->EditarGraduacao($id);
        }
        $data['graduacoes'] = $this->admin->Graduacoes();

        $data['graduacao'] = $this->admin->InformacaoGraduacao($id);

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/graduacoes/editar', $data);
        $this->load->view('admin/templates/footer');
    }

}
