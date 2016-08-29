<!-- BEGIN PAGE CONTENT -->
<div class="page-content">
    <div class="container">
        <!-- BEGIN PAGE BREADCRUMB -->
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="<?php echo base_url('ctadmin'); ?>">Home</a><i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="<?php echo base_url('ctadmin/pacotes'); ?>">Editar Pacote</a>
                <i class="fa fa-circle"></i>
            </li>
            <li class="active">
                Editar Pacote
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
                                Novo Pacote </span>
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
                                                                <input type="text" name="nome" class="form-control" value="<?= $pacote->nome ?>" required="">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Status</label>
                                                                <select name="status" required="">
                                                                    <option selected="" value="<?= $pacote->status ?>"><?= $pacote->status ?></option>
                                                                    <option value="Ativo">Ativo</option>
                                                                    <option value="Inativo">Inativo</option>

                                                                </select>

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Quantidade de cotas</label>
                                                                <select name="cotas_qnt" required="">
                                                                    <option value="">Selecione</option>

                                                                    <?php
                                                                    for ($i = 1; $i <= 300; $i++) {
                                                                        $valor = number_format(config_site('valor_cota') * $i, 2);
                                                                        if ($i == $pacote->cotas_qnt) {
                                                                            echo "<option value = '{$i}' selected>$i cota(s) -$ {$valor}</option>";
                                                                        } else {
                                                                            echo "<option value = '{$i}' >$i cota(s) -$ {$valor}</option>";
                                                                        }
                                                                    }
                                                                    ?>

                                                                </select>

                                                            </div>
                                                            <div class='form-group'>
                                                                <label>Indicação direta: </label>
                                                                <input type='text' name='nivel' class='form-control' value='<?= $pacote->nivel ?>' required="">
                                                            </div>
                                                            <?php
                                                            for ($i = 1; $i <= 14; $i++) {
                                                                $key = 'nivel' . $i;
                                                                $valor = $pacote->$key;
                                                                echo "   <div class='form-group'>
                                                                <label>Nível {$i}: </label>
                                                                <input type='text' name='nivel{$i}' class='form-control' value='{$valor}'>
                                                            </div>";
                                                            }
                                                            ?>
                                                        </div>


                                                        <div class="form-actions">
                                                            <input type="submit" name="submit" class="btn blue" value="Salvar">
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