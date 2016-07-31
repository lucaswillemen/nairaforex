
                <!-- BEGIN PAGE HEADER-->
                <div class="page-head">
                    <div class="page-title">
                        <h1>Saques</h1>
                    </div>
                </div>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-dollar"></i>
                        <a href="#">Financeiro</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="<?php echo base_url('saque');?>">Saques</a>
                    </li>
                </ul>
                <!-- END PAGE HEADER-->
                <div class="clearfix">
                </div>

                <div class="portlet light">

                <a href="<?php echo base_url('saque/solicitar');?>" class="btn btn-success pull-right">Solicitar Saque</a>

                <div class="clearfix">
                </div>

                 <br />
                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                        <div class="portlet box blue-hoki">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-globe"></i>Todos os saques
                                </div>
                                <div class="tools">
                                </div>
                            </div>
                            <div class="portlet-body">
                                <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead>
                                <tr>
                                    <th>
                                        ID Pedido
                                    </th>
                                    <th>
                                         Data do Pedido
                                    </th>
                                    <th>
                                         Valor
                                    </th>
                                    <th>
                                         Status
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if($saques !== false){

                                    $status = array(0=>'<b><font color="orange">Pendente</font></b>', 1=>'<b><font color="green">Pago</font></b>', 2=>'<b><font color="red">Estornado</font></b>');

                                    foreach($saques as $saque){

                                    ?>
                                    <tr>
                                    <td>
                                         #<?php echo $saque->id;?>
                                    </td>
                                    <td>
                                        <?php echo converter_data($saque->data_pedido, "-", "/");?>
                                    </td>
                                    <td>
                                         <?php echo $saque->valor;?>
                                    </td>
                                    <td>
                                         <?php echo $status[$saque->status]; ?>
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
