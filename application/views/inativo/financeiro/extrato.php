
<!-- BEGIN PAGE HEADER-->
<div class="page-head">
    <div class="page-title">
        <h1>Extrato</h1>
    </div>
</div>
<ul class="page-breadcrumb breadcrumb">
    <li>
        <i class="fa fa-dollar"></i>
        <a href="#">Financeiro</a>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <a href="<?php echo base_url('extrato'); ?>">Extrato</a>
    </li>
</ul>
<!-- END PAGE HEADER-->
<div class="clearfix">
</div>

<div class="portlet light">

    <!-- BEGIN SAMPLE TABLE PORTLET-->
    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-globe"></i>Movimentações da conta
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
                            Data
                        </th>
                        <th>
                            Valor
                        </th>
                        <th>
                            Descrição
                        </th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    if ($extrato_registros != false) {

                        foreach ($extrato_registros as $extrato) {
                            ?>
                            <tr>
                                <td>#<?php echo (strlen($extrato->id) == 1) ? "0" . $extrato->id : $extrato->id; ?></td>
                                <td><?php echo date('d/m/Y', strtotime($extrato->data)); ?></td>
                                <?php
                                if ($extrato->valor > 0) {
                                    $cor = 'green';
                                } else {
                                    $cor = 'red';
                                }
                                ?>
                                <td><font color="<?php echo $cor; ?>"><?php echo $extrato->valor; ?></font></td>
                                <td><?php echo $extrato->descricao; ?></td>
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
