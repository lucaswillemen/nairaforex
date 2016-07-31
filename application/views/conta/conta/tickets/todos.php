
                <!-- BEGIN PAGE HEADER-->
                <div class="page-head">
                    <div class="page-title">
                        <h1>Tickets</h1>
                    </div>
                </div>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-ticket"></i>
                        <a href="#">Tickets</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="<?php echo base_url('tickets');?>">Todos</a>
                    </li>
                </ul>
                <!-- END PAGE HEADER-->
                <div class="clearfix">
                </div>

                <div class="portlet light">

                <a href="<?php echo base_url('tickets/novo');?>" class="btn btn-success pull-right">Novo Ticket</a>

                <div class="clearfix">
                </div>

                <br />

                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                        <div class="portlet box blue-hoki">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-globe"></i> Todos seus indicados
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
                                         Título
                                    </th>
                                    <th>
                                         Data
                                    </th>
                                    <th>
                                         Status
                                    </th>
                                    <th>
                                        Ação
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if($tickets !== false){

                                    foreach($tickets as $ticket){

                                    ?>
                                    <tr>
                                    <td>
                                        #<?php echo $ticket->id;?>
                                    </td>
                                    <td>
                                         <?php echo $ticket->titulo;?>
                                    </td>
                                    <td>
                                        <?php echo converter_data($ticket->data, "-", "/");?>
                                    </td>
                                    <td>
                                         <?php echo StatusUser($ticket->status);?>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url('tickets/visualizar/'.$ticket->id);?>">Visualizar</a>
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
