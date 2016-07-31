<!-- BEGIN PAGE CONTENT -->
<div class="page-content">
    <div class="container">
        <!-- BEGIN PAGE BREADCRUMB -->
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="#">Home</a><i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="<?php echo base_url('ctadmin/usuarios'); ?>">Usuários</a>
                <i class="fa fa-circle"></i>
            </li>
            <li class="active">
                Todos usuários
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
                            <span class="caption-subject font-green-sharp bold uppercase">Gerenciar usuários</span>
                        </div>
                        <div class="tools">
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                            <thead>
                                <tr>
                                    <th>
                                        Id
                                    </th>
                                    <th>
                                        CPF
                                    </th>
                                    <th>
                                        Nome
                                    </th>
                                    <th>
                                        Login
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Saldo disponível
                                    </th>
                                    <th>
                                        Bloqueado ?
                                    </th>
                                    <th>
                                        Ação
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($usuarios !== false) {
                                    foreach ($usuarios as $usuario) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $usuario->id; ?>
                                            </td>
                                            <td>
                                                <?php echo $usuario->cpf; ?>
                                            </td>
                                            <td>
                                                <?php echo $usuario->nome; ?>
                                            </td>
                                            <td>
                                                <?php echo $usuario->login; ?>
                                            </td>
                                            <td>
                                                <?php echo $usuario->email; ?>
                                            </td>
                                            <td>
                                                R$ <?php echo number_format($usuario->saldo_disponivel, 2, ",", "."); ?>
                                            </td>
                                            <td>
                                                <?php echo ($usuario->block == 1) ? 'Sim' : 'Não'; ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url('ctadmin/usuarios/visualizar/' . $usuario->id); ?>">Visualizar</a> | <a href="<?php echo base_url('ctadmin/usuarios/editar/' . $usuario->id); ?>">Editar</a> | <?php if ($usuario->login != 'demo') { ?> <a href="<?php echo base_url('ctadmin/usuarios/excluir/' . $usuario->id); ?>" onclick="if (!confirm('Tem certeza que deseja continuar ? Essa ação será irreversível.'))
                                                                        return false;">Excluir</a> <?php } ?>
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
