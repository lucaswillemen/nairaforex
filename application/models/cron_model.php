<?php
class Cron_model extends CI_Model{

    public function __construct(){
        parent::__construct();

        $this->load->helper('valor');

    }

    public function PagarCota(){

        if(config_site('pagamento_automatico') == 1){

            if(config_site('paga_fim_de_semana') == 0 && (date('D') == 'Sun' OR date('D') == 'Sat')){

                exit;

            }

            $this->db->limit(1);
            $cron = $this->db->get('cron');

            $row = $cron->row();

            $ultimo_recebimento = $row->proxima_execucao;

        if(strtotime(date('H:i')) >= $ultimo_recebimento){


                $query_cotas = $this->db->query("SELECT * FROM cotas WHERE primeiro_recebimento <= '$ultimo_recebimento' AND ultimo_recebimento >= '$ultimo_recebimento'");

                if($query_cotas->num_rows() > 0){

                    foreach($query_cotas->result() as $cota){

                        $this->db->where('id', $cota->id_user);
                        $user = $this->db->get('usuarios');

                        $row_user = $user->row();

                        $saldo_atual = $row_user->saldo_disponivel;
                        $valor_pago = randomWithDecimal(config_site('valor_minimo_pago'), config_site('valor_maximo_pago'), 2)*$cota->quantidade;

                        $this->conta_model->InserirExtrato($cota->id_user, 'Pagamento de '.$cota->quantidade.' cota(s)', $valor_pago, 'green');

                        $this->db->where('id', $cota->id_user);
                        $this->db->update('usuarios', array('saldo_disponivel'=>($saldo_atual+($valor_pago/100))));
                    }
                }

                $this->db->update('cron', array('proxima_execucao'=>time()+(60*60*24)));
            }
        }
    }

    public function GerarFaturaRenovacao(){

        if(config_site('permitir_renovacao_automatica') == 1){

            $hoje_tres = date('Y-m-d', strtotime(date('Y-m-d'))+(60*60*24*3));

            $query = $this->db->query("SELECT * FROM cotas WHERE FROM_UNIXTIME(ultimo_recebimento, '%Y-%m-%d') = '$hoje_tres'");

            if($query->num_rows() > 0){

                foreach($query->result() as $result){

                    $array_fatura = array(
                                                            'id_user'=>$result->id_user,
                                                            'quantidade_cotas'=>$result->quantidade,
                                                            'renovacao'=>1,
                                                            'status'=>0
                                                            );

                    $this->db->insert('faturas', $array_fatura);
                }

            }
        }
    }

    public function ExpiraCotas(){

        $query = $this->db->query("SELECT * FROM cotas WHERE ultimo_recebimento < '".time()."' AND status = '1'");

        if($query->num_rows() > 0){

            foreach($query->result() as $cota){

                $this->db->where('id', $cota->id);
                $this->db->update('cotas', array('status'=>0));
            }
        }
    }
}
