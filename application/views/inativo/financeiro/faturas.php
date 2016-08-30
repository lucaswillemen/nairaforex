
                <!-- BEGIN PAGE HEADER-->
                <div class="page-head">
                    <div class="page-title">
                        <h1>Faturas</h1>
                    </div>
                </div>
                <!-- END PAGE HEADER-->
                <div class="clearfix">
                </div>

                <div class="portlet light">

                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                        <div class="portlet box blue-hoki">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-globe"></i>Suas Faturas
                                </div>
                                <div class="tools">
                                </div>
                            </div>
                            <div class="portlet-body">
                                <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead>
                                <tr>
                                    <th>
                                        ID da Fatura
                                    </th>
                                    <th>
                                         Quantidade
                                    </th>
                                    <th>
                                        Descrição
                                    </th>
                                    <th>
                                         Valor total
                                    </th>
                                    <th width="20%">
                                         Ação
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if($faturas != false){
                                    foreach($faturas as $fatura){
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $fatura->id;?>
                                    </td>
                                    <td>
                                         <?php echo $fatura->quantidade_cotas;?> banca(s)
                                    </td>
                                    <td>
                                        <?php echo ($fatura->renovacao == 0) ? 'Fatura de pagamento' : '<b><font color="red">FATURA DE RENOVAÇÃO</font></b>'; ?>
                                    </td>
                                    <td>
                                        $ <?php echo number_format(config_site('valor_cota') * $fatura->quantidade_cotas, 2);?> USD
                                    </td>
                                    <td>
                                         <a href="<?php echo base_url('inativo/faturas/pagar/'.$fatura->id);?>" class="btn green">Pagar</a> 
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
