
<!-- BEGIN PAGE HEADER-->
<div class="page-head">
    <div class="page-title">
        <h1>Meus Pacotes</h1>
    </div>
    <div class="page-toolbar">
    </div>
</div>
<ul class="page-breadcrumb breadcrumb">
    <li>
        <i class="fa fa-magic"></i>
        <a href="#">Pacotes</a>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <a href="<?php echo base_url('cotas/comprar'); ?>">Comprar Pacotes</a>
    </li>
</ul>
<!-- END PAGE HEADER-->
<div class="clearfix">
</div>

<div class="portlet form">


    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PORTLET-->
            <div class="portlet box yellow">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-money"></i>Selecione o pacote escolhido
                    </div>
                </div>
                <div class="portlet-body">
                    <?php
                    if (!$this->input->post('submit')) {

                        if (strlen($this->conta_model->user('cpf')) > 5 || strlen($this->conta_model->user('celular')) > 5) {
                            ?>
                            <!-- BEGIN FORM-->
                            <div class="alert alert-info text-center">Caso o CPF ou Número do celular informado forem inválidos, você não conseguira efetuar o pagamento via boleto bancário.</div>
                            <form action="" method="post" class="form-horizontal">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Quantidade</label>
                                        <div class="col-md-6">
                                            <select name="quantidade" class="bs-select form-control" required="">
                                                <?php
                                                $this->db->from('pacotes');
                                                $this->db->where('status', 'Ativo');
                                                $query = $this->db->get();
                                                if ($query->num_rows > 0) {
                                                    foreach ($query->result() as $row) {
                                                        $valor = number_format(config_site('valor_cota') * $row->cotas_qnt, 2);
                                                        echo "<option value='{$row->cotas_qnt}'>{$row->nome} - {$row->cotas_qnt} banca(s) - {$valor}</option>";
                                                    }
                                                }
                                                ?>  
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <input type="submit" name="submit" class="btn green" value="Comprar">
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <?php
                        } else {

                            echo '<div class="alert alert-danger text-center">Informe seu celular e seu CPF para poder gerar faturas.</div>';
                        }
                        ?>
                        <!-- END FORM-->
                        <?php
                    } else {
                        ?>
                        <div class="form-body">
                            <?php
                            $quantidade = $this->input->post('quantidade');
                            $this->db->from('pacotes');
                            $this->db->where('status', 'Ativo');
                            $this->db->where('cotas_qnt', $quantidade);
                            $query = $this->db->get();
                            if ($query->num_rows <= 0) {
                                echo '<div class="alert alert-danger text-center">Pacote não encontrado.</div>';
                                exit();
                            }
                            $id_fatura = $this->conta_model->GerarFatura($quantidade);

                            if (config_site('ativa_gerencianet') == 1) {
                                $link_boleto = $this->conta_model->GerarBoletoBancario($id_fatura);
                            }
                            ?>
                            <p>Parabéns, você efetuou a compra do seu pacote. Segue abaixo a compra detalhada:</p>

                            <br />

                            <p>
                                <b>Quantidade:</b> <?php echo $quantidade; ?> banca(s) <br />
                                <b>Valor a pagar: </b> $ <?php echo number_format($quantidade * (config_site('valor_cota')), 2); ?> USD
                                <?php 
$val = number_format($quantidade * (config_site('valor_cota')), 2);
$request = "https://blockchain.info/tobtc?currency=USD&cors=true&value=".$val;
$xml = file_get_contents($request);
echo "$xml BTC"; ?>
                            </p>

                            <?php
                            if (config_site('ativa_gerencianet') == 1) {
                                ?>
                                <h3>Pague usando Boleto Bancário</h3>

                                <a href="<?php echo $link_boleto; ?>" target="_blank"><img src="<?php echo base_url(); ?>assets/admin/layout/img/boleto.png" height="70" /></a>
                                <?php
                            }
                            ?>

                            <h3>Pague usando BlockChain</h3>

                           
                                <p>
                                    Segue abaixo as carteiras disponíveis para depósito. Após o depósito, nos envie o comprovante com a data atual e o seu login. <br />
                                    <small>Caso já tenha feito o depósito, <a href="<?php echo base_url('comprovante');?>">clique aqui</a> para enviar o comprovante.</small>
                                </p>

                            <!-- BEGIN ACCORDION PORTLET-->
                            <div class="portlet-body">
                                <div class="panel-group accordion" id="accordion1">

                                    <?php
                                    if ($contas != false) {

                                        foreach ($contas as $conta) {
                                            ?>

                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_<?php echo $conta->id; ?>">
                                                             <?php echo $conta->titular; ?></a>
                                                    </h4>
                                                </div>
                                                <div id="collapse_<?php echo $conta->id; ?>" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <p>
                                                            <b>Tipo de conta: </b> <?php echo $conta->tipo_conta; ?><br />
                                                            <b>Titular: </b> <?php echo $conta->titular; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php
                                        }
                                    }
                                    ?>


                                </div>
                            </div>
                            <!-- END ACCORDION PORTLET-->


                            <p><b>Essa fatura foi gerada e inserida em sua conta. Caso queira ve-lá posteriormente, acesse o menu FINANCEIRO -> FATURAS.</b></p>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <!-- END PORTLET-->
        </div>
    </div>


</div>
<!-- PORTLET LIGHT -->


<div class="clearfix">
</div>
</div>
</div>
<!-- END CONTENT -->
<!-- BEGIN QUICK SIDEBAR -->
<!--Cooming Soon...-->
<!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->
