
                <!-- BEGIN PAGE HEADER-->
                <h3 class="page-title">
                Novo Ticket</h3>
                <div class="page-bar">
                    <ul class="page-breadcrumb">
                        <li>
                            <i class="fa fa-ticket"></i>
                            <a href="<?php echo base_url('tickets');?>">Tickets</a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <a href="<?php echo base_url('tickets/novo');?>">Novo Ticket</a>
                        </li>
                    </ul>
                </div>
                <!-- END PAGE HEADER-->
                <div class="clearfix">
                </div>

                <div class="portlet form">


                    <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN PORTLET-->
                        <div class="portlet box red">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-ticket"></i>Novo ticket de suporte
                                </div>
                            </div>
                            <div class="portlet-body">

                            <?php
                            if(isset($message)) echo $message;
                            ?>
                                <!-- BEGIN FORM-->
                                <form action="" method="post" class="form-horizontal">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Assunto</label>
                                            <div class="col-md-6">
                                                <input type="text" name="assunto" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Mensagem</label>
                                            <div class="col-md-6">
                                                <textarea class="form-control" name="mensagem" required></textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                            <input type="submit" name="submit" class="btn green" value="Abrir Ticket">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- END FORM-->
                            </div>
                        </div>
                        <!-- END PORTLET-->
                    </div>
                </div>


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
