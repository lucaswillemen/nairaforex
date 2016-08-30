
<!-- BEGIN PAGE HEADER-->
<div class="page-head">
    <div class="page-title">
        <h1>Meus Pacotes</h1>
    </div>
    <div class="page-toolbar">
    </div>
</div>
<ul class="page-breadcrumb breadcrumb">
    <li>
        <i class="fa fa-magic"></i>
        <a href="#">Pacotes</a>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <a href="<?php echo base_url('cotas'); ?>">Meus Pacotes</a>
    </li>
</ul>

<!-- END PAGE HEADER-->
<div class="clearfix">
</div>

<div class="portlet light">

    <a href="<?php echo base_url('cotas/comprar'); ?>" class="btn btn-success pull-right">Comprar Pacotes</a>

    <div class="clearfix">
    </div>

    <br />
    <!-- BEGIN SAMPLE TABLE PORTLET-->
    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-globe"></i>Você já adquiriu todos os pacotes.
            </div>
            <div class="tools">
            </div>
        </div>
        <div class="portlet-body">
            <table class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                    <tr>
                        <th>
                            Pacote
                        </th>
                        <th>
                            Data de Ativação
                        </th>
                        <th>
                            Data de Renovação
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
