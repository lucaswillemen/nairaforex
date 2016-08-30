
                <!-- BEGIN PAGE HEADER-->
                <h3 class="page-title">
                Faturas</h3>
                <div class="page-bar">
                </div>
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
                                    <i class="fa fa-money"></i>Informações da Fatura teste
                                </div>
                            </div>
                            <div class="portlet-body form">

                                <div class="form-body">
                                <?php
                                $quantidade = $fatura->quantidade_cotas;

                                if(config_site('ativa_gerencianet') == 1){
                                    $link_boleto = $this->conta_model->GerarBoletoBancario($this->uri->segment(4));
                                }
                                ?>

                                <p>
                                    <b>Quantidade:</b> <?php echo $quantidade;?> banca(s) <br />
                                    <b>Valor a pagar: </b> $ <?php echo number_format($quantidade * (config_site('valor_cota')), 2);?> USD //
                                                    <?php 
$val = number_format($quantidade * (config_site('valor_cota')), 2);
$request = "https://blockchain.info/tobtc?currency=USD&cors=true&value=".str_replace(str_replace($val, ",", ""), ".", "");
$xml = file_get_contents($request);
echo "$xml BTC"; ?>
                                </p>

                                <?php

                                if(config_site('ativa_gerencianet') == 1){

                                ?>

                                <h3>Pague usando Boleto Bancário</h3>

                                <a href="<?php echo $link_boleto;?>" target="_blank"><img src="<?php echo base_url();?>assets/admin/layout/img/boleto.png" height="70" /></a>
                                <?php
                                }
                                ?>


                                <h3>Pague por transferência online</h3>

                                <p>
                                    Segue abaixo as carteiras disponíveis para depósito. Após o depósito, nos envie o comprovante com a data atual e o seu login. <br />
                                    <small>Caso já tenha feito o depósito, <a href="<?php echo base_url('comprovante');?>">clique aqui</a> para enviar o comprovante.</small>
                                </p>

                                <!-- BEGIN ACCORDION PORTLET-->
                            <div class="portlet-body">
                                <div class="panel-group accordion" id="accordion1">

                                    <?php
                                    if($contas != false){

                                        foreach($contas as $conta){

                                    ?>

                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_<?php echo $conta->id;?>">
                                            <?php echo $conta->titular;?></a>
                                            </h4>
                                        </div>
                                        <div id="collapse_<?php echo $conta->id;?>" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <p>
                                                     <b>Endereço da carteira: </b> <?php echo $conta->tipo_conta;?><br />
                                                     <b>Nome do endereço: </b> <?php echo $conta->titular;?>
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
                              </div>
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
