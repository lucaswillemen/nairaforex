<!-- BEGIN PAGE CONTENT -->
<div class="page-content">
    <div class="container">
        <!-- BEGIN PAGE BREADCRUMB -->
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="#">Home</a><i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="<?php echo base_url('ctadmin/saques'); ?>">Saques</a>
                <i class="fa fa-circle"></i>
            </li>
            <li class="active">
                Todos os saques
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
                            <span class="caption-subject font-green-sharp bold uppercase">Todos os pedidos de saques</span>
                        </div>
                        <div class="tools">
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Id do usuário
                                    </th>
                                    <th>
                                        CPF                          
                                    </th>
                                    <th>
                                        Login
                                    </th>
                                    <th>
                                        Valor
                                    </th>
                                    <th>
                                        Data do Pedido
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Ação
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($saques !== false) {
                                    foreach ($saques as $saque) {
                                    
                                        ?>
                                        <tr>
                                            <td>
                                                #<?php echo $saque->id; ?>
                                            </td>
                                            <td>
                                                <?php echo $this->admin->InformacaoUsuarioByLogin($saque->login)->id; ?>
                                            </td>
                                            <td>
                                                <?php echo $this->admin->InformacaoUsuarioByLogin($saque->login)->cpf; ?>
                                            </td>
                                            <td>
                                                <?php echo $saque->login; ?>
                                            </td>
                                            <td>
                                                <?php echo $saque->valor; ?>
                                            </td>
                                            <td>
                                                <?php echo date('d/m/Y', strtotime($saque->data_pedido)); ?>
                                            </td>

                                            <td>
                                                <?php
                                                if ($saque->status == 0) {
                                                    echo '<font color="orange">Pendente</font>';
                                                } elseif ($saque->status == 1) {
                                                    echo '<font color="green">Pago</font>';
                                                } else {
                                                    echo '<font color="red">Estornado</font>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url('ctadmin/saques/visualizar/' . $saque->id); ?>">Visualizar</a>
                                                <?php
                                                if ($saque->status == 0) {
                                                    ?>
                                                    |
                                                    <a href="<?php echo base_url('ctadmin/saques/pago/' . $saque->id); ?>" onclick="if (!confirm('Caso continue, o pagamento será marcado como pago no B.O do afiliado. Tem certeza ?'))
                                                                            return false;">Marcar como pago</a>
                                                    |
                                                    <a href="<?php echo base_url('ctadmin/saques/estornar/' . $saque->id); ?>">Estornar</a>
                                                <?php } ?>


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
