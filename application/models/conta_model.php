<?php

class Conta_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function requisitosGraduacao($id) {
        $this->load->model('admin_model');

        $userData = $this->admin_model->InformacaoUsuario($this->native_session->get('user_id'));
        $userPacote = $this->admin_model->InformacaoPacote($userData->pacote);
        $this->db->where('id', $id);
        $nextGraduacao = $this->db->get('graduacoes')->row();

        if (isset($userData->pacote)) {
            $userPacote = $this->admin_model->InformacaoPacote($userData->pacote);

            $this->db->where('id', $id);

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

                if ($nextGraduacao->grad_required == 0) {
                    $retorno['grad_name'] = 'Indicados';
                } else {
                    $this->db->where('id', $nextGraduacao->grad_required);
                    $gra = $this->db->get('graduacoes')->row();
                    $retorno['grad_name'] = $gra->nome;
                }
                $retorno['grad_info'] = $nextGraduacao;
                $retorno['total_grad'] = $totalGrad;
                $retorno['total_grad_necessario'] = $nextGraduacao->qntd_grad - $totalGrad;
                if ($retorno['total_grad_necessario'] < 0) {
                    $retorno['total_grad_necessario'] = 0;
                }
                $retorno['total_pt_necessario'] = $nextGraduacao->pontuacao - $userData->pontos;
                if ($retorno['total_pt_necessario'] < 0) {
                    $retorno['total_pt_necessario'] = 0;
                }
                return $retorno;
            }
        } else {
            return false;
        }
    }

    public function user($coluna, $parametro = null) {

        if (!$this->native_session->get('inativo_id') and ! $this->native_session->get('user_id')) {
            redirect('login?hhh');
        }
        if ($this->native_session->get('inativo_id')) {
            $sessao = $this->native_session->get('inativo_id');
        } else {
            $sessao = $this->native_session->get('user_id');
        }

        $this->db->where('id', $sessao);
        $user = $this->db->get('usuarios');

        $row = $user->row();

        if (is_null($parametro)) {

            return $row->$coluna;
        }

        preg_match('/[^\s]*/i', $row->$coluna, $matches);

        return $matches[0];
    }

    public function Redirecionar($id) {

        $this->load->helper('urlfy');

        $this->db->where('id', $id);
        $this->db->where('status', 1);

        $anuncios = $this->db->get('anuncios');

        if ($anuncios->num_rows() > 0) {

            $row = $anuncios->row();

            $url = addhttp($row->link);

            $novo_clique = $row->cliques + 1;

            $this->db->where('id', $id);
            $this->db->update('anuncios', array('cliques' => $novo_clique));

            return $url;
        }

        return false;
    }

    public function InserirExtrato($sessao, $mensagem, $valor, $cor) {

        $array_extrato = array(
            'id_user' => $sessao,
            'valor' => $valor,
            'descricao' => $mensagem,
            'cor' => $cor,
            'data' => date('Y-m-d')
        );

        $this->db->insert('extrato', $array_extrato);
    }

    public function ContasBancarias() {

        $contas = $this->db->get('contas_bancarias');

        if ($contas->num_rows() > 0) {

            return $contas->result();
        }

        return false;
    }

    public function GerarFatura($quantidade) {

        $sessao = $this->native_session->get('user_id');

        $array_fatura = array(
            'id_user' => $sessao,
            'quantidade_cotas' => $quantidade,
            'status' => 0,
            'renovacao' => 0
        );

        $this->db->insert('faturas', $array_fatura);

        return $this->db->insert_id();
    }

    public function GerarBoletoBancario($id_fatura) {

        $info = $this->InformacaoFatura($id_fatura);


        $valor = str_replace(".", "", str_replace(",", "", number_format(config_site('valor_cota') * $info->quantidade_cotas, 2)));

        $xml = "

        <boleto>

         <token>" . config_site('token_gerencianet') . "</token>

         <clientes>

         <cliente>

         <nomeRazaoSocial>" . $this->user('nome') . "</nomeRazaoSocial>

         <cpfcnpj>" . str_replace('.', '', str_replace('-', '', $this->user('cpf'))) . "</cpfcnpj>

         <cel>" . str_replace('(', '', str_replace(')', '', str_replace(' ', '', str_replace('-', '', $this->user('celular'))))) . "</cel>

         <opcionais>

         <retorno>" . $id_fatura . "</retorno>

         </opcionais>

         </cliente>

         </clientes>

         <itens>

         <item>

         <descricao>Compra de " . $info->quantidade_cotas . " cota(s)</descricao>

         <valor>" . $valor . "</valor>

         <qtde>1</qtde>

         <desconto>0</desconto>

         </item>

         </itens>

         <vencimento>" . date('d/m/Y', (time() + (60 * 60 * 24))) . "</vencimento>

         <opcionais>

         <contra>n</contra>

         <btaxa>n</btaxa>

         <enviarParaMim>n</enviarParaMim>

         <continuarCobrando>0</continuarCobrando>

         <correios>n</correios>

         </opcionais>

        </boleto>";

        $xml = str_replace("\n", '', $xml);
        $xml = str_replace("\r", '', $xml);
        $xml = str_replace("\t", '', $xml);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://integracao.gerencianet.com.br/xml/boleto/emite/xml");

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_MAXREDIRS, 2);

        curl_setopt($ch, CURLOPT_AUTOREFERER, true);

        $data = array('entrada' => $xml);

        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);

        $resposta = curl_exec($ch);

        curl_close($ch);

        $retorno = simplexml_load_string($resposta);

        if ($retorno->statusCod == 2) {

            $chave = $retorno->resposta->cobrancasGeradas->cliente->cobranca->chave;
            $lote = $retorno->resposta->lote;

            $this->db->insert('boletos', array('id_fatura' => $id_fatura, 'chave_boleto' => 'chave_' . $chave . '_' . $lote));

            return $retorno->resposta->cobrancasGeradas->cliente->cobranca->link;
        } elseif ($retorno->resposta->erro->status == 1012) {

            return $retorno->resposta->erro->entrada->emitirCobranca->resposta->cobrancasGeradas->cliente->cobranca->link;
        }
    }

    public function Faturas($id = '') {
        if ($id == '') {
            $sessao = $this->native_session->get('user_id');
        } else {
            $sessao = $id;
        }
        $this->db->where('id_user', $sessao);
        $this->db->where('status', 0);
        $faturas = $this->db->get('faturas');

        if ($faturas->num_rows() > 0) {

            return $faturas->result();
        }

        return false;
    }

    public function InformacaoFatura($id, $usr = '') {

        if ($this->native_session->get('inativo_id')) {
            $sessao = $this->native_session->get('inativo_id');
        } else {
            $sessao = $this->native_session->get('user_id');
        }
        $this->db->where('id', $id);
        $this->db->where('status', 0);
        $this->db->where('id_user', $sessao);
        $fatura = $this->db->get('faturas');
        if ($fatura->num_rows() > 0) {

            return $fatura->row();
        }

        return false;
    }

    public function CancelarFatura($id) {

        if ($this->native_session->get('inativo_id')) {
            $sessao = $this->native_session->get('inativo_id');
        } else {
            $sessao = $this->native_session->get('user_id');
        }

        $this->db->where('id_user', $sessao);
        $this->db->where('status', 0);
        $this->db->where('id', $id);

        $this->db->delete('faturas');

        return true;
    }

    public function MinhasCotas($page = null) {

        if ($this->native_session->get('inativo_id')) {
            $sessao = $this->native_session->get('inativo_id');
        } else {
            $sessao = $this->native_session->get('user_id');
        }

        if ($page == 'index') {
            $this->db->where('status', 1);
        }
        $this->db->where('id_user', $sessao);
        $cotas = $this->db->get('cotas');

        if ($cotas->num_rows() > 0) {

            return $cotas->result();
        }

        return false;
    }

    public function CotasAtivas() {

        $sessao = $this->native_session->get('user_id');

        $this->db->where('id_user', $sessao);
        $this->db->where('status', 1);
        $cotas = $this->db->get('cotas');

        $cotas = $this->db->query("SELECT COALESCE(SUM(quantidade), 0) AS total_cotas FROM cotas WHERE status = 1 AND id_user = '$sessao'");

        $row = $cotas->row();

        return $row->total_cotas;
    }

    public function MeuIndicador() {

        $sessao = $this->native_session->get('user_id');

        $indicador = $this->db->query("SELECT u.nome, u.email FROM patrocinadores AS p INNER JOIN usuarios AS u ON u.id = p.id_patrocinador WHERE p.id_usuario = '$sessao'");

        if ($indicador->num_rows() > 0) {

            return $indicador->row();
        }

        return false;
    }

    public function TotalIndicados() {

        $sessao = $this->native_session->get('user_id');

        $this->db->where('id_patrocinador', $sessao);
        $patrocinadores = $this->db->get('patrocinadores');

        return $patrocinadores->num_rows();
    }

    public function Extrato() {

        $sessao = $this->native_session->get('user_id');

        $this->db->where('id_user', $sessao);
        $this->db->order_by('id', 'DESC');

        $extrato = $this->db->get('extrato');

        if ($extrato->num_rows() > 0) {

            return $extrato->result();
        }

        return false;
    }

    public function TransferirSaldo() {

        $sessao = $this->native_session->get('user_id');

        $login = $this->input->post('login');
        $valor_input = $this->input->post('valor');

        $valor = str_replace(",", ".", $valor_input);

        $this->db->where('login', $login);
        $user_login = $this->db->get('usuarios');

        if ($user_login->num_rows() > 0) {

            $this->db->where('id', $sessao);
            $user = $this->db->get('usuarios');

            $row = $user->row();
            $row_user_recebimento = $user_login->row();

            if ($row->login != $login) {

                if ($row->saldo_disponivel >= $valor) {

                    if ($valor >= (config_site('valor_minimo_transferencia'))) {

                        $novo_saldo_recebedor = $row_user_recebimento->saldo_disponivel + $valor;
                        $novo_saldo_doador = $row->saldo_disponivel - $valor;

                        $this->db->where('id', $row_user_recebimento->id);
                        $u1 = $this->db->update('usuarios', array('saldo_disponivel' => $novo_saldo_recebedor));

                        $this->db->where('id', $sessao);
                        $u2 = $this->db->update('usuarios', array('saldo_disponivel' => $novo_saldo_doador));

                        $this->InserirExtrato($sessao, 'Transferência de saldo para usuário', '-' . $valor, 'red');
                        $this->InserirExtrato($row_user_recebimento->id, 'Recebimento de saldo', $valor, 'green');

                        if ($u1 && $u2) {

                            return '<div class="alert alert-success text-center">Saldo transferido com sucesso!</div>';
                        }

                        return '<div class="alert alert-danger text-center">Erro ao transferir saldo.</div>';
                    }

                    return '<div class="alert alert-danger text-center">O valor mínimo para transferência é de <b>R$ ' . config_site('valor_minimo_transferencia') . ' Reais</b>.</div>';
                }

                return '<div class="alert alert-danger text-center">Saldo insuficiente para transferência.</div>';
            }

            return '<div class="alert alert-danger text-center">Você não pode transferir para si mesmo.</div>';
        }

        return '<div class="alert alert-danger text-center">Usuário não existe. Verifique o login e tente novamente.</div>';
    }

    public function InformacaoFaturaAleatoria($id) {

        $this->db->where('id', $id);
        $faturas = $this->db->get('faturas');

        if ($faturas->num_rows() > 0) {

            return $faturas->row();
        }

        return false;
    }

    public function PagarFaturaSaldo() {

        $sessao = $this->native_session->get('user_id');

        $id_fatura = $this->input->post('id');

        $this->db->where('id', $sessao);
        $user = $this->db->get('usuarios');

        $row_user = $user->row();

        $this->db->where('id', $id_fatura);
        $fatura = $this->db->get('faturas');

        $row_fatura = $fatura->row();

        $valor_fatura = $row_fatura->quantidade_cotas * config_site('valor_cota');

        if (config_site('pagar_com_saldo') == 1) {

            $valor_total = $valor_fatura + (config_site('taxa_pagamento_saldo'));
        } else {
            $valor_total = $valor_fatura;
        }

        if ($valor_total > $row_user->saldo_disponivel) {

            return '<div class="alert alert-danger text-center">Você não tem saldo suficiente para pagar essa fatura.</div>';
        }

        if ($row_fatura->status == 1) {

            return '<div class="alert alert-danger text-center">Essa fatura já foi paga.</div>';
        }


        $novo_saldo = $row_user->saldo_disponivel - $valor_total;

        $this->db->where('id', $sessao);
        $qr1 = $this->db->update('usuarios', array('saldo_disponivel' => $novo_saldo));

        $this->db->where('id', $id_fatura);
        $qr2 = $this->db->update('faturas', array('status' => 1));

        $dias = Recebimentos(date('Y-m-d'), config_site('validade_cotas'));

        $data_primeiro_recebimento = $dias['primeiro_recebimento'] . ' ' . config_site('hora_pagamento') . ':00';
        $data_ultimo_recebimento = $dias['ultimo_recebimento'] . ' ' . config_site('hora_pagamento') . ':00';

        $this->db->where('id', $row_fatura->id_user);
        $this->db->update('usuarios', array('block' => 0));

        $primeiro_recebimento = strtotime($data_primeiro_recebimento);
        $ultimo_recebimento = strtotime($data_ultimo_recebimento);

        $array_cotas = array(
            'id_user' => $row_fatura->id_user,
            'quantidade' => $row_fatura->quantidade_cotas,
            'primeiro_recebimento' => $primeiro_recebimento,
            'ultimo_recebimento' => $ultimo_recebimento,
            'status' => 1
        );

        $qr3 = $this->db->insert('cotas', $array_cotas);

        /* Envia bônus de indicação */

        $id_user_fatura = $row_fatura->id_user;

        $user_indicador = $this->db->query("SELECT u.id, u.saldo_disponivel FROM patrocinadores AS p INNER JOIN usuarios AS u ON p.id_patrocinador = u.id WHERE p.id_usuario = '$id_user_fatura'");

        if ($user_indicador->num_rows() > 0) {
            $this->load->model('admin_model');
            $this->admin_model->bonus_indicacao($sessao);
        }
        if ($qr1 && $qr2 && $qr3) {

            $this->InserirExtrato($sessao, 'Pagamento de fatura com saldo', '-' . $valor_total, 'red');

            return '<div class="alert alert-success text-center">Fatura paga com sucesso!</div>';
        }

        return '<div class="alert alert-danger text-center">Erro ao pagar fatura.</div>';
    }

    public function EnviarComprovante() {

        $config['allowed_types'] = 'bmp|jpg|jpeg|pjpeg|png|gif|doc|pdf';
        $config['upload_path'] = './uploads/';
        $config['encrypt_name'] = true;

        $id_fatura = $this->input->post('id_fatura');

        $this->upload->initialize($config);

        if ($this->upload->do_upload()) {

            $retornoUpload = $this->upload->data();

            $this->db->where('id_fatura', $id_fatura);
            $comprovantes = $this->db->get('comprovantes');

            if ($comprovantes->num_rows() > 0) {

                $this->db->where('id_fatura', $id_fatura);
                $qr = $this->db->update('comprovantes', array('comprovante' => $retornoUpload['file_name']));
            } else {

                $array_comprovantes = array(
                    'id_fatura' => $id_fatura,
                    'comprovante' => $retornoUpload['file_name']
                );

                $qr = $this->db->insert('comprovantes', $array_comprovantes);
            }

            if ($qr) {

                return '<div class="alert alert-success text-center">Comprovante enviado com sucesso!</div>';
            }

            return '<div class="alert alert-danger text-center">Erro ao enviar comprovante.</div>';
        }

        return '<div class="alert alert-danger text-center">Erro ao fazer upload: ' . $this->upload->display_errors() . ' </div>';
    }

    public function Saques() {

        $sessao = $this->native_session->get('user_id');

        $this->db->where('id_user', $sessao);
        $saques = $this->db->get('saques');

        if ($saques->num_rows() > 0) {

            return $saques->result();
        }

        return false;
    }

    public function SolicitarSaque() {

        $sessao = $this->native_session->get('user_id');

        $valor_input = $this->input->post('valor');
        $valor_formatado = str_replace(",", ".", $valor_input);

        $percentual = config_site('taxa_saque') / 100;

        $taxa = $valor_formatado * $percentual;

        $valor = $valor_formatado;

        $this->db->where('id', $sessao);
        $user = $this->db->get('usuarios');

        $row = $user->row();
        if ($row->saldo_disponivel < ($valor + config_site('valor_reserva'))) {
            $valorMin = $row->saldo_disponivel - config_site('valor_reserva');
            if ($valorMin <= 0) {
                $valorMin = 0;
            }
            return '<div class="alert alert-danger text-center">O valor solicitado é maior do que o permitido. O valor máximo permitido é de <b>R$ ' . $valorMin . ' Reais</b></div>';
        } else if ($valor >= config_site('valor_minimo_saque')) {

            if ($row->saldo_disponivel >= ($valor + config_site('valor_reserva'))) {
                $valorSaque = $valor_formatado - $taxa;
                $novo_saldo_disponivel = $row->saldo_disponivel - $valor_formatado;
                $novo_saldo_bloqueado = $row->saldo_bloqueado + $valorSaque;

                $array_usuario_saldo = array(
                    'saldo_disponivel' => $novo_saldo_disponivel,
                    'saldo_bloqueado' => $novo_saldo_bloqueado
                );

                $this->db->where('id', $sessao);
                $atualiza = $this->db->update('usuarios', $array_usuario_saldo);

                $array_solicitar_saque = array(
                    'id_user' => $sessao,
                    'data_pedido' => date('Y-m-d'),
                    'valor' => $valorSaque,
                    'status' => 0
                );

                $this->InserirExtrato($sessao, 'Pedido de saque', '-' . $valor_formatado, 'red');

                $saque_insert = $this->db->insert('saques', $array_solicitar_saque);


                if ($atualiza && $saque_insert) {

                    return '<div class="alert alert-success text-center">Saque solicitado com sucesso. Seu pedido será processado e dentro de <b>' . config_site('dias_saque') . ' dias úteis</b> seu saque entrará em sua conta.</div>';
                }

                return '<div class="alert alert-danger text-center">Erro ao solicitar seu saque. Tente novamente mais tarde.</div>';
            }

            return '<div class="alert alert-danger text-center">O valor solicitado é maior do que você tem em conta. Você tem que ter ao menos R$ ' . $valor . ' Reais.</div>';
        }

        return '<div class="alert alert-danger text-center">O valor solicitado é menor do que o permitido. O valor mínimo permitido é de <b>R$ ' . config_site('valor_minimo_saque') . ' Reais</b></div>';
    }

    public function ValoresPagos() {

        $sessao = $this->native_session->get('user_id');

        $saques = $this->db->query("SELECT COALESCE(SUM(valor), '0.00') AS valor_pago FROM saques WHERE id_user = '$sessao' AND status = '1'");

        if ($saques->num_rows() > 0) {

            $row = $saques->row();

            return $row->valor_pago;
        }

        return '0.00';
    }

    public function AtualizarDados() {

        $sessao = $this->native_session->get('user_id');

        $nome = $this->input->post('nome');
        $email = $this->input->post('email');
        $cpf = $this->input->post('cpf');
        $nascimento = $this->input->post('nascimento');
        $celular = $this->input->post('celular');

        $array_usuarios_pessoal = array(
            'nome' => $nome,
            'email' => $email,
            'cpf' => $cpf,
            'nascimento' => converter_data($nascimento),
            'celular' => $celular
        );

        $this->db->where('id', $sessao);
        $atualiza = $this->db->update('usuarios', $array_usuarios_pessoal);

        if ($atualiza) {

            return '<div class="alert alert-success text-center">Dados atualizados com sucesso!</div>';
        }

        return '<div class="alert alert-danger text-center">Erro ao atualizar dados.</div>';
    }

    public function AlterarSenha() {

        $sessao = $this->native_session->get('user_id');

        $senha_atual = $this->input->post('senha_atual');
        $nova_senha = $this->input->post('nova_senha');
        $confirmar_senha = $this->input->post('confirmar_senha');

        $this->db->where('id', $sessao);
        $this->db->where('senha', md5($senha_atual));
        $user_senha = $this->db->get('usuarios');

        if ($user_senha->num_rows() > 0) {

            if ($nova_senha == $confirmar_senha) {

                $array_senha = array(
                    'senha' => md5($nova_senha)
                );

                $this->db->where('id', $sessao);
                $atualiza = $this->db->update('usuarios', $array_senha);

                if ($atualiza) {

                    return '<div class="alert alert-success text-center">Senha atualizada com sucesso!</div>';
                }

                return '<div class="alert alert-danger text-center">Erro ao atualizar senha.</div>';
            }

            return '<div class="alert alert-danger text-center">Senhas digitadas não são compativeis uma com a outra.</div>';
        }

        return '<div class="alert alert-danger text-center">Senha atual incorreta. Por favor, verifique.</div>';
    }

    public function AlterarContaBancaria() {

        $sessao = $this->native_session->get('user_id');

        $banco = $this->input->post('banco');
        $agencia = $this->input->post('agencia');
        $conta = $this->input->post('conta');
        $tipo_conta = $this->input->post('tipo_conta');
        $titular = $this->input->post('titular');

        $array_conta_bancaria = array(
            'banco' => $banco,
            'agencia' => $agencia,
            'conta' => $conta,
            'tipo_conta' => $tipo_conta,
            'titular' => $titular
        );

        $this->db->where('id', $sessao);
        $atualiza = $this->db->update('usuarios', $array_conta_bancaria);

        if ($atualiza) {

            return '<div class="alert alert-success text-center">Conta bancária atualizada com sucesso!</div>';
        }

        return '<div class="alert alert-danger text-center">Erro ao atualizar conta bancária.</div>';
    }

    public function Indicados($id = '') {

        $sessao = $this->native_session->get('user_id');
        if ($id == '') {
            $sessao = $this->native_session->get('user_id');
        } else {
            $sessao = $id;
        }


        $query = $this->db->query("SELECT u. * , p.id_patrocinador
FROM patrocinadores AS p
INNER JOIN usuarios AS u ON u.id = p.id_usuario
WHERE p.id_patrocinador =  '$sessao'");
        if ($query->num_rows() > 0) {

            return $query->result();
        }

        return false;
    }

    public function TodosTickets() {

        $sessao = $this->native_session->get('user_id');

        $this->db->where('id_user', $sessao);
        $tickets = $this->db->get('tickets');

        if ($tickets->num_rows() > 0) {

            return $tickets->result();
        }

        return false;
    }

    public function NovoTicket() {

        $sessao = $this->native_session->get('user_id');

        $assunto = $this->input->post('assunto');
        $mensagem = $this->input->post('mensagem');

        $array_ticket = array(
            'id_user' => $sessao,
            'titulo' => $assunto,
            'data' => date('Y-m-d'),
            'status' => 0
        );

        $this->db->insert('tickets', $array_ticket);

        $array_ticket_mensagem = array(
            'id_ticket' => $this->db->insert_id(),
            'mensagem' => $mensagem,
            'user' => 1,
            'data' => time()
        );

        $finish = $this->db->insert('tickets_mensagem', $array_ticket_mensagem);

        if ($finish) {

            return '<div class="alert alert-success text-center">Ticket aberto com sucesso, em breve responderemos.</div>';
        }

        return '<div class="alert alert-danger text-center">Erro ao abrir ticket.</div>';
    }

    public function InformacaoTicket($id) {

        $sessao = $this->native_session->get('user_id');

        $this->db->where('id', $id);
        $this->db->where('id_user', $sessao);

        $ticket = $this->db->get('tickets');

        if ($ticket->num_rows() > 0) {

            return $ticket->row();
        }

        return false;
    }

    public function MensagensTicket($id) {

        $this->db->order_by('data', 'ASC');
        $this->db->where('id_ticket', $id);
        $tickets_mensagens = $this->db->get('tickets_mensagem');

        if ($tickets_mensagens->num_rows() > 0) {

            return $tickets_mensagens->result();
        }

        return false;
    }

    public function AdicionarMensagemTicket($id) {

        $resposta = $this->input->post('resposta');

        $array_mensagem = array(
            'id_ticket' => $id,
            'mensagem' => $resposta,
            'user' => 1,
            'data' => time()
        );

        $this->db->insert('tickets_mensagem', $array_mensagem);

        $this->db->where('id', $id);
        $this->db->update('tickets', array('status' => 0));
    }

    public function AtualizaNotificacoes() {

        $sessao = $this->native_session->get('user_id');

        $this->db->where('id_user', $sessao);
        $atualiza = $this->db->update('notificacoes', array('visto' => 1));

        if ($atualiza) {

            return true;
        }

        return false;
    }

    public function Anuncios() {

        $this->db->order_by('id', 'RANDOM');
        $this->db->where('status', 1);
        $anuncios = $this->db->get('anuncios');

        if ($anuncios->num_rows() > 0) {

            return $anuncios->result();
        }

        return false;
    }

    public function MeuAnuncio() {

        $sessao = $this->native_session->get('user_id');

        $this->db->where('id_user', $sessao);
        $anuncio = $this->db->get('anuncios');

        if ($anuncio->num_rows() > 0) {

            return $anuncio->row();
        }

        return false;
    }

    public function Anunciar() {

        $sessao = $this->native_session->get('user_id');

        $titulo = $this->input->post('titulo');
        $descricao = $this->input->post('descricao');
        $link = $this->input->post('link');

        if ($this->MeuAnuncio() === false) {

            $array_insert = array(
                'id_user' => $sessao,
                'titulo' => $titulo,
                'descricao' => $descricao,
                'link' => $link,
                'cliques' => 0,
                'status' => 0
            );

            $inserir = $this->db->insert('anuncios', $array_insert);

            if ($inserir) {

                return '<div class="alert alert-success text-center">Anúncio adicionado com sucesso!</div>';
            }

            return '<div class="alert alert-danger text-cneter">Erro ao adicionar anúncio. Tente novamente.</div>';
        } else {

            $array_update = array(
                'titulo' => $titulo,
                'descricao' => $descricao,
                'link' => $link,
            );

            $this->db->where('id_user', $sessao);
            $update = $this->db->update('anuncios', $array_update);

            if ($update) {

                return '<div class="alert alert-success text-center">Anúncio atualizado com sucesso!</div>';
            }

            return '<div class="alert alert-danger text-center">Erro ao atualizar anúncio.</div>';
        }
    }

}
