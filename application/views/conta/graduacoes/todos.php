
<!-- BEGIN PAGE HEADER-->
<div class="page-head">
    <div class="page-title">
        <h1>Graduações</h1>
    </div>
    <div class="page-toolbar">
    </div>
</div>
<ul class="page-breadcrumb breadcrumb">
    <li>
        <i class="fa fa-magic"></i>
        <a href="#">Graduações</a>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <a href="<?php echo base_url('conta/sorteios'); ?>">Graduações</a>
    </li>
</ul>

<!-- END PAGE HEADER-->
<div class="clearfix">
</div>

<div class="portlet light">


    <div class="clearfix">
    </div>

    <br />
    <!-- BEGIN SAMPLE TABLE PORTLET-->
    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-star"></i>Graduações
            </div>
            <div class="tools">
            </div>
        </div>
        <div class="portlet-body">
            <table class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Nome
                        </th>
                        <th>
                            Requisitos
                        </th>


                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($graduacoes !== false) {

                        foreach ($graduacoes as $graduacao) {
                            $bg = '';
                            if ($graduacao->id == $this->conta_model->user('graduacao')) {
                                $bg = 'class="bg-yellow" title="Graduação Atual"';
                            }
                            ?>
                            <tr <?= @$bg ?>>
                                <td>
                                    <img src="<?php echo $graduacao->icone; ?>" width="40">
                                </td>
                                <td>
                                    <?php echo $graduacao->nome; ?>
                                </td>
                                <td>
                                    <?php
                                    $requisitos = $this->conta_model->requisitosGraduacao($graduacao->id);
                                    if ($requisitos['grad_name'] == 'Indicados') {
                                        $icon = '';

                                        if ($requisitos['total_grad_necessario'] == 0) {
                                            $icon = '<i class="fa fa-check bg-green-sharp"></i>';
                                        } else {
                                            $icon = '<i class="fa fa-close bg-red"></i>';
                                        }
                                        echo "Você precisa indicar diretamete mais " . $requisitos['total_grad_necessario'] . ' usuários' . $icon;
                                    } else {
                                        $icon = '';
                                        if ($requisitos['total_grad_necessario'] == 0) {
                                            $icon = '<i class="fa fa-check bg-green-sharp"></i>';
                                        } else {
                                            $icon = '<i class="fa fa-close bg-red"></i>';
                                        }
                                        echo "Você precisa ter " . $requisitos['total_grad_necessario'] . ' indicados(diretos e/ou indiretos) em linhas distintas com a seguinte graduação: ' . $requisitos['grad_name'] . $icon;
                                    }
                                    $icon = '';
                                    if ($requisitos['total_pt_necessario'] == 0) {
                                        $icon = '<i class="fa fa-check bg-green-sharp"></i>';
                                    } else {
                                        $icon = '<i class="fa fa-close bg-red"></i>';
                                    }
                                    echo "<br>Você precisa de mais " . $requisitos['total_pt_necessario'] . ' ponto(s) ' . $icon;
                                    ?>
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
