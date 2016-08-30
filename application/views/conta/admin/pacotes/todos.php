<!-- BEGIN PAGE CONTENT -->
<div class="page-content">
    <div class="container">
        <!-- BEGIN PAGE BREADCRUMB -->
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="#">Home</a><i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="<?php echo base_url('ctadmin/pacotes'); ?>">Pacotes</a>
                <i class="fa fa-circle"></i>
            </li>
            <li class="active">
                Todos os pacotes                
            </li>
        </ul>
        <!-- END PAGE BREADCRUMB -->
        <!-- BEGIN PAGE CONTENT INNER -->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-cogs font-green-sharp"></i>
                            <span class="caption-subject font-green-sharp bold uppercase">Gerenciar Pacotes</span>
                        </div>
                        <div class="tools">
                            <div class="form-actions">
                                <a href="<?php echo base_url('ctadmin/pacotes/novo'); ?>" class="btn blue">Adicionar novo </a>
                            </div>
                            <br />
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                                <tr>
                                    <th>
                                        Nome
                                    </th>
                                    <th>
                                        Valor
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Nível
                                    </th>
                                    <th>
                                        Nível 1
                                    </th>
                                    <th>
                                        Ação
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($pacotes !== false) {
                                    foreach ($pacotes as $pacote) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $pacote->nome; ?>
                                            </td>
                                            <td>

                                                <?php echo $valor = number_format(config_site('valor_cota') * $pacote->cotas_qnt, 2); ?>  -  <?php echo $pacote->cotas_qnt?> cota(s)
                                            </td>
                                            <td>
                                                <?php echo $pacote->status; ?>
                                            </td>
                                            <td>
                                                <?php echo $pacote->nivel; ?>
                                            </td>
                                            <td>
                                                <?php echo $pacote->nivel1; ?>
                                            </td>

                                            <td>

                                                <a href="<?php echo base_url('ctadmin/pacotes/editar/' . $pacote->id); ?>">Editar</a>
                                                |
                                                <a href="<?php echo base_url('ctadmin/pacotes/excluir/' . $pacote->id); ?>">Excluir</a>


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
                <!-- END EXAMPLE TABLE PORTLET-->

            </div>
        </div>
        <!-- END PAGE CONTENT INNER -->
    </div>
</div>
<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
