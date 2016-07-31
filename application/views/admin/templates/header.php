<?php
check_session_admin();
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8">
        <title><?php echo config_site('nome_site'); ?> | administração - <?php echo $titulo; ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <meta content="" name="description">
        <meta content="" name="author">
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
        <link href="<?php echo base_url(); ?>assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css">
        <!-- END PAGE LEVEL PLUGIN STYLES -->
        <!-- BEGIN PAGE STYLES -->
        <link href="<?php echo base_url(); ?>assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
        <!-- END PAGE STYLES -->
        <!-- BEGIN THEME STYLES -->
        <!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
        <link href="<?php echo base_url(); ?>assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/global/css/plugins.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/admin/layout3/css/layout.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/admin/layout3/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color">
        <link href="<?php echo base_url(); ?>assets/admin/layout3/css/custom.css" rel="stylesheet" type="text/css">

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/select2/select2.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
        <!-- END THEME STYLES -->
        <link rel="shortcut icon" href="<?php echo base_url('uploads/' . config_site('favicon')); ?>">
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <!-- DOC: Apply "page-header-menu-fixed" class to set the mega menu fixed  -->
    <!-- DOC: Apply "page-header-top-fixed" class to set the top menu fixed  -->
    <body>
        <!-- BEGIN HEADER -->
        <div class="page-header">
            <!-- BEGIN HEADER TOP -->
            <div class="page-header-top">
                <div class="container">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="<?php echo site_url('ctadmin'); ?>"><img src="<?php echo base_url('uploads/' . config_site('imagem_logo_admin')); ?>" alt="logo" class="logo-default"></a>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler"></a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <li class="dropdown dropdown-user dropdown-dark">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <span class="username username-hide-mobile"><?php echo $this->admin->user('nome'); ?></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="<?php echo base_url('ctadmin/senha'); ?>">
                                            <i class="fa fa-key"></i> Mudar senha </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('ctadmin/users'); ?>">
                                            <i class="fa fa-users"></i> Usuários </a>
                                    </li>
                                    <li class="divider">
                                    </li>

                                    <li>
                                        <a href="<?php echo base_url('ctadmin/logout'); ?>">
                                            <i class="fa fa-sign-out"></i> Log Out </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
            </div>
            <!-- END HEADER TOP -->
            <!-- BEGIN HEADER MENU -->
            <div class="page-header-menu">
                <div class="container">
                    <!-- BEGIN MEGA MENU -->
                    <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
                    <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
                    <div class="hor-menu ">
                        <ul class="nav navbar-nav">
                            <li class="<?php echo (isset($pg_home)) ? 'active' : ''; ?>">
                                <a href="<?php echo base_url('ctadmin'); ?>">
                                    <i class="fa fa-home"></i> Página inicial
                                </a>
                            </li>
                            <li class="menu-dropdown classic-menu-dropdown <?php echo (isset($pg_bancario) OR isset($pg_faturas) OR isset($pg_saques)) ? 'active' : ''; ?> ">
                                <a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;">
                                    <i class="fa fa-dollar"></i> Financeiro <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu pull-left">
                                    <li>
                                        <a href="<?php echo base_url('ctadmin/faturas'); ?>">Faturas</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('ctadmin/saques'); ?>">Saques</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('ctadmin/bancario'); ?>">Contas Bancárias</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="<?php echo (isset($pg_usuarios)) ? 'active' : ''; ?>">
                                <a href="<?php echo base_url('ctadmin/usuarios'); ?>" class="tooltips" data-container="body" data-placement="bottom" data-html="true" data-original-title="Gerencie a conta dos usuários">
                                    <i class="fa fa-user"></i> Usuários
                                </a>
                            </li>
                            <li class="<?php echo (isset($pg_anuncios)) ? 'active' : ''; ?>">
                                <a href="<?php echo base_url('ctadmin/anuncios'); ?>" class="tooltips" data-container="body" data-placement="bottom" data-html="true" data-original-title="Gerenciar anúncios">
                                    <i class="fa fa-bullhorn"></i> Anúncios</a>
                            </li>
                            </li>
                            <li class="<?php echo (isset($pg_tickets)) ? 'active' : ''; ?>">
                                <a href="<?php echo base_url('ctadmin/tickets'); ?>" class="tooltips" data-container="body" data-placement="bottom" data-html="true" data-original-title="Visualizar Tickets e responder">
                                    <i class="fa fa-ticket"></i> Tickets
                                </a>
                            </li>
                            <li class="<?php echo (isset($pg_notificacoes)) ? 'active' : ''; ?>">
                                <a href="<?php echo base_url('ctadmin/notificacoes'); ?>" class="tooltips" data-container="body" data-placement="bottom" data-html="true" data-original-title="Enviar notificações para os usuários">
                                    <i class="fa fa-exclamation"></i> Notificações
                                </a>
                            </li>
                            <li class="<?php echo (isset($pg_configuracoes)) ? 'active' : ''; ?>">
                                <a href="<?php echo base_url('ctadmin/configuracoes'); ?>" class="tooltips" data-container="body" data-placement="top" data-html="true" data-original-title="Configurações do site">
                                    <i class="fa fa-cog"></i> Configurações </a>
                            </li>
                            <li class="menu-dropdown classic-menu-dropdown <?php echo (isset($pg_pacotes) OR isset($pg_pacotes) OR isset($pg_pacotes)) ? 'active' : ''; ?> ">
                                <a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;">
                                    <i class="fa fa-plus"></i> Mais <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu pull-left">
                                    <li>
                                        <a href="<?php echo base_url('ctadmin/pacotes'); ?>" class="tooltips" data-container="body" data-placement="top" data-html="true" data-original-title="Clique aqui para listar,editar e excluir pacotes.">
                                            <i class="fa fa-cog"></i> Pacotes </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('ctadmin/graduacoes'); ?>" class="tooltips" data-container="body" data-placement="top" data-html="true" data-original-title="Clique aqui para listar,editar e excluir Graduações.">
                                            <i class="fa fa-graduation-cap"></i> Graduações </a>
                                    </li>

                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- END MEGA MENU -->
                </div>
            </div>
            <!-- END HEADER MENU -->
        </div>
        <!-- END HEADER -->