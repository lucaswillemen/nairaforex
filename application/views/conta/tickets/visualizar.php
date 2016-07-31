
                <!-- BEGIN PAGE HEADER-->
                <h3 class="page-title">
                Visualizar Ticket</h3>
                <div class="page-bar">
                    <ul class="page-breadcrumb">
                        <li>
                            <i class="fa fa-ticket"></i>
                            <a href="<?php echo base_url('tickets');?>">Tickets</a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <a href="#">Visualizar Ticket</a>
                        </li>
                    </ul>
                </div>
                <!-- END PAGE HEADER-->
                <div class="clearfix">
                </div>

                <div class="portlet form">


                    <div class="col-md-12 col-sm-12">
                        <!-- BEGIN PORTLET-->
                        <div class="portlet light ">
                        <form action="" method="post">
                            <?php
                            if($ticket !== false){
                            ?>
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-ticket font-red-sunglo"></i>
                                    <span class="caption-subject font-red-sunglo bold uppercase"><?php echo $ticket->titulo;?></span>
                                </div>
                            </div>
                            <div class="portlet-body" id="chats">
                                <div class="scroller" style="height: 353px;" data-always-visible="1" data-rail-visible1="1">
                                    <ul class="chats">
                                    <?php
                                    foreach($ticket_mensagens as $mensagem){
                                    ?>
                                        <li class="<?php echo ($mensagem->user == 1) ? 'out' : 'in';?>">
                                            <div class="message">
                                                <span class="arrow">
                                                </span>
                                                <a href="#" class="name">
                                                <?php echo ($mensagem->user == 1) ? 'Você' : 'Administração';?> </a>
                                                <span class="datetime">
                                                em <?php echo date('d/m/Y H:i:s', $mensagem->data);?> </span>
                                                <span class="body">
                                                <?php
                                                echo $mensagem->mensagem;
                                                ?>
                                                </span>
                                            </div>
                                        </li>
                                    <?php
                                    }
                                    ?>
                                    </ul>
                                </div>
                                <?php
                                if($ticket->status != 2){
                                ?>
                                <div class="chat-form">
                                    <div class="input-cont">
                                        <input class="form-control" name="resposta" type="text" placeholder="Escreva sua mensagem" style="width:97% !important"/>
                                    </div>
                                    <div class="btn-cont" style="margin-right:27px;">
                                        <span class="arrow">
                                        </span>
                                        <input type="submit" name="submit" class="btn blue icn-only" value="Enviar">
                                    </div>
                                </div>
                                <?php
                                }else{
                                ?>
                                <p class="text-center"><font color="red"><b>Ticket Fechado</b></font></p>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                        }else{
                            echo '<div class="alert alert-danger text-center">Você não tem acesso a esse ticket ou ele não existe.</div>';
                        }
                        ?>
                        </form>
                        <!-- END PORTLET-->
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
