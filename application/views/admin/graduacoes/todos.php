<!-- BEGIN PAGE CONTENT -->
<div class="page-content">
    <div class="container">
        <!-- BEGIN PAGE BREADCRUMB -->
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="#">Home</a><i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="<?php echo base_url('ctadmin/plano_carreira'); ?>">Graduações</a>
                <i class="fa fa-circle"></i>
            </li>
            <li class="active">
                Todos as graduações                
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
                            <span class="caption-subject font-green-sharp bold uppercase">Gerenciar Graduações</span>
                        </div>
                        <div class="tools">
                            <div class="form-actions">
                                <a href="<?php echo base_url('ctadmin/graduacao/nova'); ?>" class="btn blue">Adicionar nova </a>
                            </div>
                            <br />
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                                <tr>
                                    <th>
                                        Ícone
                                    </th>
                                    <th>
                                        Nome
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Pontuação
                                    </th>
                                    <th>
                                        Ação
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($graduacoes !== false) {
                                    foreach ($graduacoes as $graduacao) {
                                        ?>
                                        <tr>
                                            <td>

                                                <img src="<?php echo $graduacao->icone; ?>" width="40">
                                            </td>
                                            <td>
                                                <?php echo $graduacao->nome; ?>
                                            </td>
                                            <td>
                                                <?php echo $graduacao->status; ?>
                                            </td>
                                            <td>
                                                <?php echo $graduacao->pontuacao; ?>
                                            </td>

                                            <td>

                                                <a href="<?php echo base_url('ctadmin/graduacao/editar/' . $graduacao->id); ?>">Editar</a>



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
