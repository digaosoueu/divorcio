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
                            <h1>Cliente
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
                                <a href="#">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>                            
                        </ul>
                        <!-- END PAGE BREADCRUMBS -->
                        <!-- BEGIN PAGE CONTENT INNER -->
                        <div class="page-content-inner">
                        	<div class="row">
                            	<div class="col-md-12" style="margin:20px;">
                            	
                                    <div class="form-body">
                                        <div class="form-group col-md-6">
                                            <label class="control-label col-md-2">Status</label>
                                            <div class="col-md-9">
                                                <select class="bs-select form-control" id="Status" onchange="alteraStatus()">
                                                <?php
													if($status != NULL){
													
														foreach ($status as $st) {
															
															$select = "";
															if($st["tipo"] == $cliente["cliente_status"]){
																$select = " selected='selected'";
															}
															
															echo "<option value='" . $st["tipo"] . "'" . $select. ">" . $st["status"] . "</option>";
														}
													
													}
												?>
                                                </select>
                                            </div>
                                        </div>
                            		</div>
                            	
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div>
                                        
                                        <div class="tab-content">
                                            
                                            <div>
                                                <div class="portlet box blue">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-gift"></i>Cliente </div>
                                                        <div class="tools">
                                                            <a href="javascript:;" class="collapse"> </a>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body form">
                                                        <!-- BEGIN FORM-->
                                                        <form action="<?php echo base_url(); ?>jcandidoadm/salvarCliente" class="horizontal-form" method="post">
                                                            <div class="form-body">
                                                                <h3 class="form-section">Informações</h3>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label">Nome</label>
                                                                            <input type="text" id="nome" name="nome" class="form-control" value="<?php echo $cliente["cliente_nome"]; ?>">
                                                                            <input type="hidden" id="id" name="id" class="form-control" value="<?php echo $cliente["id"]; ?>">
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    <!--/span-->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label">Sobre nome</label>
                                                                            <input type="text" id="sobreNome" name="sobreNome" class="form-control" value="<?php echo $cliente["cliente_sobrenome"]; ?>">
                                                                        </div>
                                                                    </div>
                                                                    <!--/span-->
                                                                </div>
                                                                <!--/row-->
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label">Email</label>
                                                                            <input type="text" id="email" name="email" class="form-control" value="<?php echo $cliente["cliente_email"]; ?>">
                                                                           
                                                                        </div>
                                                                    </div>
                                                                    <!--/span-->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label">Telefone</label>
                                                                            <input type="text" name="telefone" id="telefone" class="form-control" value="<?php echo $cliente["cliente_telefone"]; ?>"> </div>
                                                                    </div>
                                                                    <!--/span-->
                                                                </div>
                                                                <!--/row-->
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label">CPF</label>
                                                                            <input type="text" name="cpf" id="cpf" class="form-control" value="<?php echo $cliente["cliente_cpf"]; ?>">
                                                                        </div>
                                                                    </div>
                                                                    <!--/span-->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label">Senha</label>
                                                                            <input type="password" name="senha" id="senha" class="form-control" value="">
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    <!--/span-->
                                                                </div>
                                                                <!--/row-->
                                                                
                                                            </div>
                                                            
                                                            <div class="form-actions right">
                                                                
                                                                <button type="submit" class="btn blue">
                                                                    <i class="fa fa-check"></i> Save</button>
                                                            </div>
                                                        </form>
                                                        
                                                        <!-- END FORM-->
                                                    </div>
                                                </div>
                                                
                                                
                                            </div>
                                            
                                            
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin:auto">
                                                                
                                <a href="<?php echo base_url() . "jcandidoadm/formCliente_" . $cliente["id"] . "_" . $cliente["cliente_tipo_form"] ; ?>" class="btn btn-lg blue" target="_blank"><i class="fa fa-file-o"></i> edite ou preencha o formulário</a> 
                                <?php 
								$linkPrint = base_url() . "cliente_formJudicialPrint?id=" . $cliente["id"];
								if($cliente["cliente_tipo_form"] == "extraJudicial"){
									$linkPrint = base_url() . "cliente_formExtrajudicialPrint?id=" . $cliente["id"];
								}
								 ?>
                                <a href="<?php echo $linkPrint; ?>" class="btn btn-lg green" target="_blank"><i class="fa fa-print"></i> imprimir formulário</a>
                            </div>
                            <div style="margin:20px;"></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="portlet light portlet-fit ">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class=" icon-layers font-green"></i>
                                                <span class="caption-subject font-green bold uppercase">Documentos</span>
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="mt-element-card mt-element-overlay">
                                                <div class="row">
                                                <?php
												
												if($docs != NULL){
													
													foreach ($docs as $dcs) {
														$doc = "";
														$tipo = $dcs['tipo']; 
														if($tipo == "RG1"){$doc = "RG Cônjuge 1";}
														if($tipo == "RG2"){$doc = "RG Cônjuge 2";}
														
														if($tipo == "CPF1"){$doc = "CPF Cônjuge 1";}
														if($tipo == "CPF2"){$doc = "CPF Cônjuge 2";}
														
														if($tipo == "CompEnd"){$doc = "Comprovande de Endereço";}															
														if($tipo == "CertCasam"){$doc = "Certidão de Casamento";}														
														if($tipo == "Procuracao"){$doc = "Procuração";}
														if($tipo == "Contrato"){$doc = "Contrato";}
														
														if($tipo == "OutDocs"){$doc = $dcs['label'];}
														
													?>
														<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
															<div class="mt-card-item">
																<div class="mt-card-avatar mt-overlay-1">
																	<div class="glyphicon glyphicon-circle-arrow-down" style="font-size:24px; margin:15px;"></div>
																	<div class="mt-overlay">
																		<ul class="mt-info">
																			<li>
																				<a class="btn default btn-outline" href="<?php echo base_url() . "uploadsdocs/" . $cliente["id"] . "/" . $dcs["nome"]; ?>" target="_blank">
																					<i class="icon-link"></i>
																				</a>
																			</li>
																		</ul>
																	</div>
																</div>
																<div class="mt-card-content">
																	<h3 class="mt-card-name"><?php echo $doc; ?></h3>
																	
																</div>
															</div>
														</div>
                                                 <?php  }   
													
												}
												else
												{
													echo "<p>Nenhum documento enviado";
												}
												?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div>
                                        
                                        <div class="tab-content">
                                            
                                            <div>
                                                <div class="portlet box yellow">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-commenting-o"></i>Mensagens </div>
                                                        <div class="tools">
                                                            <a href="javascript:;" class="collapse"> </a>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body form">
                                                        <!-- BEGIN FORM-->
                                                        <form action="<?php echo base_url(); ?>" class="horizontal-form" method="post" id="formMensagem" onsubmit="return false">
                                                            <div class="form-body">                                                                
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">                                                                            <textarea name="mensagem" id="mensagem" style="width:100%" rows="5"></textarea>
                                                                            
                                                                            <input type="hidden" name="id" class="form-control" value="<?php echo $cliente["id"]; ?>">
                                                                            
                                                                        </div>
                                                                    </div>
                                                                   
                                                                </div>                                                       
                                                            </div>
                                                            
                                                            <div class="form-actions right">
                                                                
                                                                <button type="submit" class="btn blue" id="enviaMensagem">
                                                                    <i class="fa fa-check"></i> Enviar</button>
                                                            </div>
                                                        </form>
                                                        
                                                        <!-- END FORM-->
                                                    </div>
                                                </div>
                                                <div class="portlet-body" id="ListaMsg">
                                                    <h4 class="block">....</h4>
                                                                                                  
                                                </div>
                                                
                                            </div>
                                            
                                            
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                        <!-- END PAGE CONTENT INNER -->
                    </div>
                </div>
                <!-- END PAGE CONTENT BODY -->
                <!-- END CONTENT BODY -->
            </div>