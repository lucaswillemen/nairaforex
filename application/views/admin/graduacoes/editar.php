<!-- BEGIN PAGE CONTENT -->
<div class="page-content">
    <div class="container">
        <!-- BEGIN PAGE BREADCRUMB -->
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="<?php echo base_url('ctadmin'); ?>">Home</a><i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="<?php echo base_url('ctadmin/graduacoes'); ?>">Adiciona Graduação</a>
                <i class="fa fa-circle"></i>
            </li>
            <li class="active">
                Nova Graduação
            </li>
        </ul>
        <!-- END PAGE BREADCRUMB -->
        <!-- BEGIN PAGE CONTENT INNER -->
        <div class="row">
            <div class="col-md-12">
                <!-- Begin: life time stats -->
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-bank font-green-sharp"></i>
                            <span class="caption-subject font-green-sharp bold uppercase">
                                Nova Graduação </span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="tabbable">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">


                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- BEGIN SAMPLE FORM PORTLET-->
                                            <div class="portlet light">
                                                <div class="portlet-body form">
                                                    <form action="" method="post">
                                                        <div class="form-body">

                                                            <?php if (isset($message)) echo $message; ?>


                                                            <div class="form-group">
                                                                <label>Nome</label>
                                                                <input type="text" name="nome" class="form-control" value="<?= $graduacao->nome ?>" required="">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Ícone</label>
                                                                <input type="text" name="icone" class="form-control"  placeholder="" value="<?= $graduacao->icone ?>" required="">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Pontuação Requerida</label>
                                                                <input type="number" name="pontuacao" class="form-control" value="<?= $graduacao->pontuacao ?>" required="">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Graduação Requerida</label>

                                                                <select name="grad_required" required="">
                                                                    <?php if ($graduacao->grad_required == 0) { ?>
                                                                        <option value="0" selected="">Indicados diretos</option>

                                                                    <?php } else { ?>
                                                                        <option value="<?= $graduacao->grad_required ?>" selected=""><?= $this->admin->TableById('graduacoes', $graduacao->grad_required)->nome ?></option>
                                                                    <?php } ?>
                                                                    <option value="0">Indicados diretos</option>
                                                                    <?php
                                                                    foreach ($graduacoes as $graduaca) {
                                                                        $nomeGraduacao = $this->admin->TableById('graduacoes', $graduaca->id)->nome;
                                                                        if ($nomeGraduacao) {
                                                                            echo "<option value='{$graduaca->id}'>{$nomeGraduacao}</option>";
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Quantidade de graduados ou indicados</label>
                                                                <input type="text" name="qntd_grad" class="form-control"  placeholder="" value="<?= $graduacao->qntd_grad ?>" required="">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Status</label>
                                                                <select name="status" required="">
                                                                    <option value="<?= $graduacao->status ?>" selected=""><?= $graduacao->status ?></option>
                                                                    <option value="Ativa">Ativa</option>
                                                                    <option value="Inativa">Inativa</option>

                                                                </select>

                                                            </div>




                                                        </div>


                                                        <div class="form-actions">
                                                            <input type="submit" name="submit" class="btn blue" value="Adicionar">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- END SAMPLE FORM PORTLET-->


                                            <!-- END SAMPLE FORM PORTLET-->
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End: life time stats -->
            </div>
        </div>
        <!-- END PAGE CONTENT INNER -->
    </div>
</div>
<!-- END PAGE CONTENT -->
</div>