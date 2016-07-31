<!-- BEGIN PAGE CONTENT -->
    <div class="page-content">
        <div class="container">
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="<?php echo base_url('ctadmin');?>">Home</a><i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="<?php echo base_url('ctadmin/usuarios');?>">Usuários</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li class="active">
                     Visualizar Usuário
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <!-- BEGIN PAGE CONTENT INNER -->
            <div class="row">
                <div class="col-md-12">
                    <!-- Begin: life time stats -->
                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-user font-green-sharp"></i>
                                <span class="caption-subject font-green-sharp bold uppercase">
                                <?php echo $usuario->nome;?> </span>
                                <span class="caption-helper">Membro desde <?php echo date('d/m/Y', strtotime($usuario->data_cadastro));?></span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="tabbable">
                                <ul class="nav nav-tabs nav-tabs-lg">
                                    <li class="active">
                                        <a href="#tab_1" data-toggle="tab">
                                        Detalhes Principais </a>
                                    </li>
                                    <li>
                                        <a href="#tab_2" data-toggle="tab">
                                        Cotas
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab_3" data-toggle="tab">
                                        Extrato </a>
                                    </li>
                                    <li>
                                        <a href="#tab_4" data-toggle="tab">
                                        Indicados </a>
                                    </li>

                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="portlet yellow-crusta box">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-cogs"></i>Dados Pessoais
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name">
                                                                 Nome
                                                            </div>
                                                            <div class="col-md-7 value">
                                                                 <?php echo $usuario->nome;?>
                                                            </div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name">
                                                                 Email
                                                            </div>
                                                            <div class="col-md-7 value">
                                                                 <?php echo $usuario->email;?>
                                                            </div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name">
                                                                 CPF
                                                            </div>
                                                            <div class="col-md-7 value">
                                                                <?php echo $usuario->cpf;?>
                                                            </div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name">
                                                                 Data de nascimento
                                                            </div>
                                                            <div class="col-md-7 value">
                                                                 <?php echo date('d/m/Y', strtotime($usuario->nascimento));?>
                                                            </div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name">
                                                                 Celular
                                                            </div>
                                                            <div class="col-md-7 value">
                                                                 <?php echo $usuario->celular;?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="portlet blue-hoki box">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-cogs"></i>Dados de acesso
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name">
                                                                 Login
                                                            </div>
                                                            <div class="col-md-7 value">
                                                                <?php echo $usuario->login;?>
                                                            </div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name">
                                                                 Senha
                                                            </div>
                                                            <div class="col-md-7 value">
                                                                 <span class="label label-danger">Criptografada com MD5</span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="portlet green-meadow box">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-cogs"></i>Dados bancários
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name">
                                                                 Banco
                                                            </div>
                                                            <div class="col-md-7 value">
                                                                <?php echo BancoPorID($usuario->banco);?>
                                                            </div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name">
                                                                 Agência
                                                            </div>
                                                            <div class="col-md-7 value">
                                                                <?php echo $usuario->agencia;?>
                                                            </div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name">
                                                                 Conta
                                                            </div>
                                                            <div class="col-md-7 value">
                                                                <?php echo $usuario->conta;?>
                                                            </div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name">
                                                                 Tipo de conta
                                                            </div>
                                                            <div class="col-md-7 value">
                                                                <?php echo $usuario->tipo_conta;?>
                                                            </div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name">
                                                                 Titular
                                                            </div>
                                                            <div class="col-md-7 value">
                                                                <?php echo $usuario->titular;?>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="portlet red-sunglo box">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-cogs"></i>Informações Financeiras
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name">
                                                                 Saldo disponível
                                                            </div>
                                                            <div class="col-md-7 value">
                                                                R$ <?php echo number_format($usuario->saldo_disponivel, 2, ",", ".");?>
                                                            </div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name">
                                                                 Saldo bloqueado
                                                            </div>
                                                            <div class="col-md-7 value">
                                                                R$ <?php echo number_format($usuario->saldo_bloqueado, 2, ",", ".");?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_2">
                                        <div class="table-container">


                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="portlet grey-cascade box">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-cogs"></i>Detalhes de todas as cotas
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <?php
                                                        if($cotas_usuario !== false){
                                                        ?>
                                                        <div class="table-responsive">
                                                            <table class="table table-hover table-bordered table-striped">
                                                            <thead>
                                                            <tr>
                                                                <th>
                                                                     Qtd. Cotas
                                                                </th>
                                                                <th>
                                                                     Primeiro Recebimento
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
                                                            foreach($cotas_usuario as $cota){
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $cota->quantidade;?>
                                                                </td>
                                                                <td>
                                                                    <?php echo date('d/m/Y', $cota->primeiro_recebimento);?>
                                                                </td>
                                                                <td>
                                                                     <?php echo date('d/m/Y', $cota->ultimo_recebimento);?>
                                                                </td>
                                                                <td>
                                                                     <?php
                                                                     if($cota->status == 1){
                                                                        echo '<span class="label label-sm label-success">Ativa</span>';
                                                                     }else{
                                                                        echo '<span class="label label-sm label-danger">Expirada</span>';
                                                                     }
                                                                     ?>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            }
                                                            ?>
                                                            </tbody>
                                                            </table>
                                                        </div>
                                                        <?php
                                                        }else{
                                                            echo '<div class="alert alert-info text-center">Esse usuário ainda não comprou nenhuma cota</div>';
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_3">
                                        <div class="table-container">

                                            <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="portlet grey-cascade box">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-cogs"></i>Extrato do usuário
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <?php
                                                        if($extratos_usuario !== false){
                                                        ?>
                                                        <div class="table-responsive">
                                                            <table class="table table-hover table-bordered table-striped">
                                                            <thead>
                                                            <tr>
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
                                                            foreach($extratos_usuario as $extrato){
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo date('d/m/Y', strtotime($extrato->data));?>
                                                                </td>
                                                                <td>
                                                                    <?php echo '<font color="'.$extrato->cor.'">'.$extrato->valor.'</font>';?>
                                                                </td>
                                                                <td>
                                                                     <?php echo $extrato->descricao;?>
                                                                </td>

                                                            </tr>
                                                            <?php
                                                            }
                                                            ?>
                                                            </tbody>
                                                            </table>
                                                        </div>
                                                        <?php
                                                        }else{
                                                            echo '<div class="alert alert-info text-center">Esse usuário não tem nenhuma movimentação em conta ainda.</div>';
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        </div>
                                    </div>

                                    <div class="tab-pane" id="tab_4">
                                        <div class="table-container">

                                            <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="portlet grey-cascade box">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-cogs"></i>Indicados do usuário
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <?php
                                                        if($indicados_usuario !== false){
                                                        ?>
                                                        <strong class="pull-right">Total de indicados:  <?php echo count($indicados_usuario);?></strong>
                                                        <br /><br />
                                                        <div class="table-responsive">
                                                            <table class="table table-hover table-bordered table-striped">
                                                            <thead>
                                                            <tr>
                                                                <th>
                                                                     Nome
                                                                </th>
                                                                <th>
                                                                     Email
                                                                </th>
                                                                <th>
                                                                     Login
                                                                </th>
                                                                <th>
                                                                     Membro desde
                                                                </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                            foreach($indicados_usuario as $indicado){
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $indicado->nome;?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $indicado->email;?>
                                                                </td>
                                                                <td>
                                                                     <?php echo $indicado->login;?>
                                                                </td>
                                                                <td>
                                                                    <?php echo date('d/m/Y', strtotime($indicado->data_cadastro));?>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            }
                                                            ?>
                                                            </tbody>
                                                            </table>
                                                        </div>
                                                        <?php
                                                        }else{
                                                            echo '<div class="alert alert-info text-center">Esse usuário não indicou ninguém.</div>';
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End: life time stats -->
                </div>
            </div>
            <!-- END PAGE CONTENT INNER -->
        </div>
    </div>
    <!-- END PAGE CONTENT -->
</div>