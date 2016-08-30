<!-- BEGIN PAGE HEADER-->
                <div class="page-head">
                    <div class="page-title">
                        <h1>Configurações do usuário</h1>
                    </div>
                </div>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-cog"></i>
                        <a href="#">Configurações</a>
                    </li>
                </ul>

                <!-- END PAGE HEADER-->
                <!-- BEGIN PAGE CONTENT-->
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN PROFILE CONTENT -->
                        <div class="profile-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="portlet light">
                                        <div class="portlet-title tabbable-line">
                                            <div class="caption caption-md">
                                                <i class="icon-globe theme-font hide"></i>
                                                <span class="caption-subject font-blue-madison bold uppercase">Configurações do usuário</span>
                                            </div>
                                            <ul class="nav nav-tabs">
                                                <li class="<?php echo ((!isset($message1) && !isset($message2) && !isset($message3)) OR isset($message1)) ? 'active' : ''; ?>">
                                                    <a href="#tab_1_1" data-toggle="tab">Informações da conta</a>
                                                </li>
                                                <li class="<?php echo (isset($message2)) ? 'active' : '';?>">
                                                    <a href="#tab_1_3" data-toggle="tab">Mudar Senha</a>
                                                </li>
                                                <li class="<?php echo (isset($message3)) ? 'active' : '';?>">
                                                    <a href="#tab_1_4" data-toggle="tab">Carteira (Wallet)</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="tab-content">
                                                <!-- PERSONAL INFO TAB -->

                                                <div class="tab-pane <?php echo ((!isset($message1) && !isset($message2) && !isset($message3)) OR isset($message1)) ? 'active' : ''; ?>" id="tab_1_1">

                                                    <?php if(isset($message1)) echo $message1; ?>

                                                    <form role="form" method="post" action="">
                                                        <div class="form-group">
                                                            <label class="control-label">Nome</label>
                                                            <input type="text" name="nome" value="<?php echo $this->conta_model->user('nome');?>" class="form-control" required/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Email</label>
                                                            <input type="email" name="email" value="<?php echo $this->conta_model->user('email');?>" class="form-control" required/>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="hidden" name="cpf" value="<?php echo $this->conta_model->user('cpf');?>" id="cpf" class="form-control" required/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Data de Nascimento</label>
                                                            <input type="text" name="nascimento" value="<?php echo date('d/m/Y', strtotime($this->conta_model->user('nascimento')));?>" id="data" class="form-control" required/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Celular</label>
                                                            <input type="text" name="celular" value="<?php echo $this->conta_model->user('celular');?>" id="celular" class="form-control" required/>
                                                        </div>

                                                        <div class="margiv-top-10">
                                                            <input type="submit" name="submit1" class="btn green-haze" value="Atualizar dados">
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- END PERSONAL INFO TAB -->
                                                <!-- CHANGE PASSWORD TAB -->
                                                <div class="tab-pane <?php echo (isset($message2)) ? 'active' : '';?>" id="tab_1_3">

                                                <?php if(isset($message2)) echo $message2; ?>

                                                    <form action="" method="post">
                                                        <div class="form-group">
                                                            <label class="control-label">Senha Atual</label>
                                                            <input type="password" name="senha_atual" class="form-control" required/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Nova Senha</label>
                                                            <input type="password" name="nova_senha" class="form-control" required/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Confirmar a nova senha</label>
                                                            <input type="password" name="confirmar_senha" class="form-control" required/>
                                                        </div>
                                                        <div class="margin-top-10">
                                                            <input type="submit" name="submit2" class="btn green-haze" value="Mudar senha">
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- END CHANGE PASSWORD TAB -->
                                                <!-- PRIVACY SETTINGS TAB -->
                                                <div class="tab-pane <?php echo (isset($message3)) ? 'active' : '';?>" id="tab_1_4">

                                                <?php if(isset($message3)) echo $message3; ?>

                                                    <form role="form" action="" method="post">
                                                        
                                                        <div class="form-group">
                                                            <label class="control-label">Endereço da carteira</label>
                                                            <input type="text" name="tipo_conta" value="<?php echo $this->conta_model->user('tipo_conta');?>" required class="form-control"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Nome do Gateway</label>
                                                            <input type="text" name="titular" value="<?php echo $this->conta_model->user('titular');?>" required class="form-control"/>
                                                        </div>

                                                        <div class="margiv-top-10">
                                                            <input type="submit" name="submit3" class="btn green-haze" value="Atualizar carteira">
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- END PRIVACY SETTINGS TAB -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END PROFILE CONTENT -->
                    </div>
                </div>
                <!-- END PAGE CONTENT-->
            </div>
        </div>
        <!-- END CONTENT -->
        <!-- BEGIN QUICK SIDEBAR -->
        <!--Cooming Soon...-->
        <!-- END QUICK SIDEBAR -->
    </div>