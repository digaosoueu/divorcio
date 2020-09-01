<!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <div class="container">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Divórcio online 24hs
                                <small>Clientes</small>
                            </h1>
                        </div>
                        <!-- END PAGE TITLE -->
                        <!-- BEGIN PAGE TOOLBAR -->
                        
                        <!-- END PAGE TOOLBAR -->
                    </div>
                </div>
                <!-- END PAGE HEAD-->
                <!-- BEGIN PAGE CONTENT BODY -->
                <div class="page-content">
                    <div class="container">
                        <!-- BEGIN PAGE BREADCRUMBS -->
                        <ul class="page-breadcrumb breadcrumb">
                            <li>
                                <a href="index.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Clientes</span>
                            </li>
                            
                        </ul>
                        <!-- END PAGE BREADCRUMBS -->
                        <!-- BEGIN PAGE CONTENT INNER -->
                        <div class="page-content-inner">
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                    <div class="portlet light ">
                                        <div class="portlet-title">
                                            <div class="caption font-dark">
                                                <i class="icon-settings font-dark"></i>
                                                <span class="caption-subject bold uppercase"> Lista</span>
                                            </div>
                                            <div class="actions">
                                                <div class="btn-group btn-group-devided" data-toggle="buttons">
                                                    <button type="button" id="btnExportExcel" class="btn btn-circle btn-primary"><i class="fa fa-file-excel-o"></i>Excel</button>
                                                </div>
                                                
                                                <div class="btn-group btn-group-devided" data-toggle="buttons">
                                                    
                                                    <button class="btn sbold green btn-circle" onclick="window.location.href='<?php echo base_url(); ?>jcandidoadm/cliente_add'"> Adicionar
                                                    <i class="fa fa-plus"></i>
                                                    </button>                                                    
                                                    
                                                </div>
                                            </div>                                            
                                              
                                        </div>
                                        
                                        <div class="col-md-3" style="float:right; top:40px;z-index:10;">
                                            <select class="form-control" id="filtroClienteAE">
                                                <option value="todos"<?php if($AE == "todos"){?> selected="selected"<?php }?>>Todos</option>
                                                <option value="ativos"<?php if($AE == "ativos"){?> selected="selected"<?php }?>>Ativos</option>
                                                <option value="encerrados"<?php if($AE == "encerrados"){?> selected="selected"<?php }?>>Encerrados</option>
                                            </select>
                                        </div>  
                                        <div class="portlet-body">                                        
                                        
                                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /> 
                                                        </th>
                                                        <th style="width:30%"> Nome </th>
                                                        <th> Email </th>
                                                        <th> Data Cadastro </th>
                                                        <th> Status </th>
                                                        <th> Processo </th>
                                                        <th style="width:14%">  </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                               <?php 
											  if(!empty($clientes)){
											   foreach ($clientes as $dc) {		
                                                        
                                                    ?>
                                                    <tr class="odd gradeX">
                                                        <td>
                                                            <input type="checkbox" class="checkboxes" value="1" /> 
                                                        </td>
                                                        <td> 
														<?php echo $dc['cliente_nome'] . " " . $dc['cliente_sobrenome']; ?> </td>
                                                        <td>
                                                            <?php echo $dc['cliente_email']; ?>
                                                        </td>
                                                        <td>
                                                            <?php 
															
															$date = date_create($dc['cliente_data']);															
															echo date_format($date,"d/m/Y");
															
															?>
                                                        </td>
                                                        <td>
                                                            <?php echo $dc['cliente_status']; ?>
                                                        </td>
                                                        <td>
                                                        <?php 
														$processo = "Extra Judicial";
														if($dc['cliente_tipo_form'] == "consensualJudicial"){
															$processo = "Consensual Judicial";
														}
														echo $processo;
														?>                                                        </td>                                                        
                                                        <td>
                                                        
                                                         <button class="btn btn-sm green" onclick="javascript:window.location.href='cliente_edit_<?php echo $dc['id'] ?>'" style="margin-right:0">
                                                        	Editar
                                                         </button>
                                                			<button class="btn btn-sm btn red-mint" onclick="javascript:if(confirm('Deseja relamente excluir o cliente?')){window.location.href='cliente_deletar_<?php echo $dc['id'] ?>'}" style="margin-right:0">
                                                        	Deletar
                                                         </button>
                                                        </td>
                                                    </tr>
                                                   <?php
											   }
												    }?> 
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- END EXAMPLE TABLE PORTLET-->
                                </div>
                            </div>
                            
                        </div>
                        <!-- END PAGE CONTENT INNER -->
                    </div>
                </div>
                <!-- END PAGE CONTENT BODY -->
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
           
        </div>
        <!-- END CONTAINER -->
        
    </body>

</html>