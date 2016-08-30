<?php
$indicadosMaster = $indicados;
$urlPagar = base_url('pagar/saldo');

function indicados($id, $conta_model, $admin_model) {
    $indicados = $conta_model->Indicados($id);

    $urlPagar = base_url('pagar/saldo');
    $url = base_url();

    if ($indicados !== false) {

        foreach ($indicados as $indicado) {
            $pacote = $admin_model->InformacaoPacote($indicado->pacote);
            $indicador = $admin_model->InformacaoUsuario($indicado->id_patrocinador);
            $valor = number_format(config_site('valor_cota') * $pacote->cotas_qnt, 2);
            if ($indicado->block == 1) {

                $situacao = "Inativo";
            } else {
                $situacao = "Ativo";
            }
            echo" <tr>
                <td>{$indicado->id}</td>
                                <td>
            {$indicado->nome}({$indicado->login})
                                </td>
                                <td>
            {$indicado->email}
                                </td>
                                <td>
                            {$pacote->nome}({$valor})
                                </td>
                                   <td>
                            {$indicador->login}
                                </td>
                                 <td>
                            {$situacao}
                                </td>
                                      <td>
                           <a href='{$url}indicados?rede={$indicador->id}&login={$indicador->login}'>Ver Rede</a>
                                </td>
                            </tr>";
        }
    }
}
?>
<!-- BEGIN PAGE HEADER-->
<div class="page-head">
    <div class="page-title">
        <h1>Rede</h1>
    </div>
</div>
<ul class="page-breadcrumb breadcrumb">
    <li>
        <i class="fa fa-user"></i>
        <?php if (isset($_GET['rede'])) { ?>
            <a href="#"><?= $_GET['login'] ?></a>
        <?php } else { ?>
            <a href="#">Rede</a>

        <?php } ?>
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
                <i class="fa fa-globe"></i> Indicados diretos
            </div>
            <div class="tools">
            </div>
        </div>
        <div class="portlet-body">
            <table class="tableIndicados table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Nome
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Pacote
                        </th>
                        <th>
                            Indicador
                        </th>
                        <th>
                            Situação
                        </th>
                        <th>
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($indicados !== false) {

                        foreach ($indicados as $indicado) {
                            $pacote = $admin_model->InformacaoPacote($indicado->pacote);

                            $indicador = $admin_model->InformacaoUsuario($indicado->id_patrocinador);
                            $valor = number_format(config_site('valor_cota') * $pacote->cotas_qnt, 2);
                            ?>
                            <tr>
                                <td>
                                    <?php echo $indicado->id; ?>
                                </td>
                                <td>
                                    <?php echo $indicado->nome; ?>(<?php echo $indicado->login; ?>)
                                </td>
                                <td>
                                    <?php echo $indicado->email; ?>
                                </td>
                                <td>
                                    <?php echo $pacote->nome; ?>( <?php echo $valor; ?>)
                                </td>
                                <td>
                                    <?php echo $indicador->login; ?>
                                </td>
                                <?php
                                if ($indicado->block == 1) {
                                    $situacao = "Inativo";
                                } else {
                                    $situacao = "Ativo";
                                }
                                ?>
                                <td>
                                    <?php echo $situacao; ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('indicados') . '?rede=' . $indicado->id . '&login=' . $indicado->login ?>">Ver rede</a>
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




















    <!-- BEGIN SAMPLE TABLE PORTLET-->
    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-globe"></i> 2° Nível
            </div>
            <div class="tools">
            </div>
        </div>
        <div class="portlet-body">
            <table  class="tableIndicados table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Nome
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Pacote
                        </th>
                        <th>
                            Indicador
                        </th>
                        <th>
                            Situação
                        </th>
                        <th>
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($indicados !== false) {

                        foreach ($indicados as $indicado) {
                            indicados($indicado->id, $conta_model, $admin_model);
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- END SAMPLE TABLE PORTLET-->

    <!-- BEGIN SAMPLE TABLE PORTLET-->
    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-globe"></i> 3° Nível
            </div>
            <div class="tools">
            </div>
        </div>
        <div class="portlet-body">
            <table  class="tableIndicados table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Nome
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Pacote
                        </th>
                        <th>
                            Indicador
                        </th>
                        <th>
                            Situação
                        </th>
                        <th>
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($indicados !== false) {
                        foreach ($indicados as $indicado) {
//1
                            $indicados = $conta_model->Indicados($indicado->id);
                            if ($indicados !== false) {
                                foreach ($indicados as $indicado) {
                                    //2
                                    indicados($indicado->id, $conta_model, $admin_model);
                                }
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>



    <!-- END SAMPLE TABLE PORTLET-->
    <!-- BEGIN SAMPLE TABLE PORTLET-->


    <!-- END SAMPLE TABLE PORTLET-->
    <?php ?>
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
