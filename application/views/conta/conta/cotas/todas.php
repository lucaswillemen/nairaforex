
<!-- BEGIN PAGE HEADER-->
<div class="page-head">
    <div class="page-title">
        <h1>Minhas cotas</h1>
    </div>
    <div class="page-toolbar">
    </div>
</div>
<ul class="page-breadcrumb breadcrumb">
    <li>
        <i class="fa fa-magic"></i>
        <a href="#">Cotas</a>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <a href="<?php echo base_url('cotas'); ?>">Minhas cotas</a>
    </li>
</ul>

<!-- END PAGE HEADER-->
<div class="clearfix">
</div>

<div class="portlet light">

    <a href="<?php echo base_url('cotas/comprar'); ?>" class="btn btn-success pull-right">Comprar Cotas</a>

    <div class="clearfix">
    </div>

    <br />
    <!-- BEGIN SAMPLE TABLE PORTLET-->
    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-globe"></i>Todas suas cotas já compradas
            </div>
            <div class="tools">
            </div>
        </div>
        <div class="portlet-body">
            <table class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                    <tr>
                        <th>
                            Qtd. Cotas
                        </th>
                        <th>
                            Data de Ativação
                        </th>
                        <th>
                            Último Recebimento
                        </th>
                        <th>
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
