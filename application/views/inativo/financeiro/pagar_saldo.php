
<!-- BEGIN PAGE HEADER-->
<div class="page-head">
    <div class="page-title">
        <h1>Pagar faturas com saldo</h1>
    </div>
</div>
<ul class="page-breadcrumb breadcrumb">
    <li>
        <i class="fa fa-dollar"></i>
        <a href="#">Financeiro</a>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <a href="<?php echo base_url('transferir'); ?>">Pagar faturas com saldo</a>
    </li>
</ul>

<!-- END PAGE HEADER-->
<div class="clearfix">
</div>

<div class="portlet form">


    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PORTLET-->
            <div class="portlet box red-pink">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-money"></i>Pague qualquer fatura com saldo
                    </div>
                </div>
                <div class="portlet-body">
                    <!-- BEGIN FORM-->
                    <?php
                    if (config_site('pagar_com_saldo') == 1) {
                        ?>


                        <form action="" method="post" class="form-horizontal">

                            <?php
                            if (!$this->input->post('submit') AND ! $this->input->post('submit2')) {
                                ?>
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">ID da Fatura</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="id_fatura" value="<?= @$fatura_id ?>" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <input type="submit" name="submit" class="btn green" value="Pagar Fatura">
                                        </div>
                                    </div>
                                </div>

                                <?php
                            } elseif ($this->input->post('submit') AND ! $this->input->post('submit2')) {
                                ?>

                                <div class="form-body">
                                    <?php
                                    $informacao = $this->conta_model->InformacaoFaturaAleatoria($this->input->post('id_fatura'));
                                    $usr = $this->admin_model->InformacaoUsuario($informacao->id_user);
                                    $pacote = $this->admin_model->InformacaoPacote($usr->pacote);

                                    if ($informacao !== false) {
                                        ?>
                                        <p>
                                            <b>ID da Fatura:</b> #<?php echo $informacao->id; ?><br />
                                            <b>Valor da Fatura:</b> R$ <?php echo number_format($pacote->valor, 2); ?> Reais<br />
                                            <?php
                                            if (config_site('taxa_pagamento_saldo') > 0) {
                                                echo '<b>Taxa: </b>R$ ' . config_site('taxa_pagamento_saldo') . ' Reais <br />';
                                            }
                                            ?>
                                            <b>Total a pagar: </b> R$ <?php echo number_format(($pacote->valor) + config_site('taxa_pagamento_saldo'), 2); ?> Reais

                                        </p>

                                        <input type="hidden" name="id" value="<?php echo $informacao->id; ?>">
                                        <input type="submit" name="submit2" class="btn btn-success" value="Confirmar pagamento">

                                        <?php
                                    } else {
                                        echo '<div class="alert alert-danger text-center">Fatura não encontrada. Verifique a <b>ID</b> e tente novamente.</div>';
                                    }
                                    ?>
                                </div>

                                <?php
                            } else {
                                echo $message;
                            }
                            ?>
                        </form>
                        <!-- END FORM-->

                        <?php
                    } else {
                        ?>
                        <div class="alert alert-info text-center">O módulo de pagamento de faturas com saldo não está disponível no momento. Tente novamente mais tarde.</div>
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
