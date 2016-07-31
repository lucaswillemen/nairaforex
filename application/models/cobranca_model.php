<?php
class Cobranca_model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function gerencianet(){

            $xml = $_POST["xml"];

            $resposta = simplexml_load_string($xml);

            $id_fatura = $resposta->cobranca->retorno;
            $chave = 'chave_'.$resposta->cobranca->chave.'_'.$resposta->cobranca->chaveLote;

            $this->db->where('id', $id_fatura);
            $this->db->where('chave_boleto', $chave);

            $boletos = $this->db->get('boletos');

            if($boletos->num_rows() > 0){

                /*
                Deleta registro da chave do boleto
                */
                $this->db->where('id', $id_fatura);
                $this->db->where('chave_boleto', $chave);
                $this->db->delete('boletos');

                $this->db->where('id', $id_fatura);
                $fatura = $this->db->get('faturas');

                $rowFatura = $fatura->row();

                $dias = Recebimentos(date('Y-m-d'), config_site('validade_cotas'));

                $data_primeiro_recebimento = $dias['primeiro_recebimento'].' '.config_site('hora_pagamento').':00';
                $data_ultimo_recebimento = $dias['ultimo_recebimento'].' '.config_site('hora_pagamento').':00';

                $primeiro_recebimento = strtotime($data_primeiro_recebimento);
                $ultimo_recebimento = strtotime($data_ultimo_recebimento);

                /* Envia bônus para o indicador */

                $id_user_fatura = $rowFatura->id_user;

                $user_indicador = $this->db->query("SELECT u.id, u.saldo_disponivel FROM patrocinadores AS p INNER JOIN usuarios AS u ON p.patrocinador = u.id WHERE p.id_usuario = '$id_user_fatura'");

                if($user_indicador->num_rows() > 0){

                    $row_indicador = $user_indicador->row();

                    $saldo_user_indicador = $row_indicador->saldo_disponivel + (config_site('valor_indicacao'));

                    $this->db->where('id', $row_indicador->id);
                    $this->db->update('usuarios', array('saldo_disponivel'=>$saldo_user_indicador));

                }

                /*
                Atualiza o status da fatura
                */
                $this->db->where('id', $id_fatura);
                $this->db->update('faturas', array('status'=>1));

                $array_cotas = array(
                                                        'id_user'=>$rowFatura->id_user,
                                                        'quantidade'=>$rowFatura->quantidade_cotas,
                                                        'primeiro_recebimento'=>$primeiro_recebimento,
                                                        'ultimo_recebimento'=>$ultimo_recebimento,
                                                        'status'=>1
                                                        );

                /*
                Ativa a cota do usuário
                */
                $this->db->insert('cotas', $array_cotas);

                return 'ok';
            }

            return 'nao existe';
    }

}