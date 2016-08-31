
<!-- BEGIN PAGE HEADER-->
<div class="note note-success">
    <p>
        <b>Seja bem vindo</b>, <?php echo $this->conta_model->user('nome'); ?>. Seu login é " <?php echo $this->conta_model->user('login'); ?>", e você possui o ID de n°  <?php echo $this->conta_model->user('id'); ?>
    </p>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN DASHBOARD STATS -->
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat2">
            <div class="display">
                <div class="number">
                    <h3 class="font-green-sharp"><small class="font-green-sharp">$ </small><?php echo $this->conta_model->user('saldo_disponivel'); ?></h3>
                    <small>SALDO DISPONÍVEL</small>
                </div>
                <div class="icon">
                    <i class="icon-pie-chart"></i>
                </div>
            </div>
            <div class="progress-info">
                <div class="progress">
                    <span style="width: 100%;" class="progress-bar progress-bar-success green-sharp">
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat2">
            <div class="display">
                <div class="number">
                    <h3 class="font-red-haze"><small class="font-red-haze">$ </small><?php echo $this->conta_model->user('saldo_bloqueado'); ?></h3>
                    <small>SALDO BLOQUEADO</small>
                </div>
                <div class="icon">
                    <i class="icon-like"></i>
                </div>
            </div>
            <div class="progress-info">
                <div class="progress">
                    <span style="width: 100%;" class="progress-bar progress-bar-success red-haze">
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat2">
            <div class="display">
                <div class="number">
                    <h3 class="font-blue-sharp"><?php echo $this->conta_model->TotalIndicados(); ?></h3>
                    <small>INDICADOS DIRETOS</small>
                </div>
                <div class="icon">
                    <i class="icon-basket"></i>
                </div>
            </div>
            <div class="progress-info">
                <div class="progress">
                    <span style="width: 100%;" class="progress-bar progress-bar-success blue-sharp">
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat2">
            <div class="display">
                <div class="number">
                    <h3 class="font-purple-soft"><?php echo $this->conta_model->CotasAtivas(); ?></h3>
                    <small>POSIÇÕES NA MESA</small>
                </div>
                <div class="icon">
                    <i class="icon-user"></i>
                </div>
            </div>
            <div class="progress-info">
                <div class="progress">
                    <span style="width: 100%;" class="progress-bar progress-bar-success purple-soft">
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END DASHBOARD STATS -->
<div class="clearfix">
</div>


<div class="portlet light">
    <div class="form-group">
        <h4 class="block" align="center"><b>Seu link de indicação</b></h4>
        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-users" style="color:#424242"></i>
            </span>
            <input type="email" class="form-control input-circle-right" value=" <?php echo base_url('patrocinador/' . $login); ?>">
        </div>
    </div>
</div>
<div class="portlet light">
    <div class="portlet-body">
        <div class="row">
            <div class="col-md-12">
                <br />
            </div>
        </div>
    </div>

    <!-- BEGIN SAMPLE TABLE PORTLET-->
    <div class="portlet box green-meadow">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>INFORMAÇÕES
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse">
                </a>

            </div>
        </div>
        <div class="portlet-body flip-scroll">
            <table class="table table-bordered table-striped table-condensed flip-content">
                <thead class="flip-content">
                    <tr>
                        <th width="20%">
                            Pacote
                        </th>
                        <th>
                            Data de Cadastro
                        </th>
                        <th class="numeric">
                            Data de Renovação
                        </th>
                        </th>
                        <th class="numeric">
                            Status
                        </th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($cotas !== false) {

                        foreach ($cotas as $cota) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $cota->quantidade; ?>
                                </td>
                                <td>
                                    <?php echo date('d/m/Y', $cota->primeiro_recebimento); ?>
                                </td>
                                <td>
                                    <?php echo date('d/m/Y', $cota->ultimo_recebimento); ?>
                                </td>
                                <td>
                                    <?php echo ($cota->status == 1) ? 'Ativa' : 'Expirada'; ?>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END SAMPLE TABLE PORTLET-->

    <?php
    if ($anuncios !== false && config_site('permitir_cadastro_anuncio') == 1) {
        ?>
        <div class="anuncios">
            <center><h3>Anúncios</h3></center>

            <div class="row">

                <?php
                foreach ($anuncios as $anuncio) {
                    ?>
                    <a href="<?php echo base_url('redirecionar/' . $anuncio->id); ?>" target="_blank">
                        <div class="col-md-4 anuncio_box">
                            <p><strong><?php echo $anuncio->titulo; ?></strong></p>
                            <p><?php echo $anuncio->descricao; ?>    </p>
                        </div>
                    </a>
                    <?php
                }
                ?>

            </div>
        </div> <!-- .anuncios -->
        <?php
    }
    ?>

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
<?php if (isset($novaGraduacao)) { ?>
    <div id="myModal2" class="modal fade" role="dialog">

        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Parabéns! Você recebeu uma nova graduação</h4>
                </div>
                <div class="modal-body">
                    <?= $novaGraduacao ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>

                </div>

            </div>

        </div>

    </div>
<?php } ?>
