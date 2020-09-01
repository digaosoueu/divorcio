<?php
	
	//$dados[] = $this->clientes_model->DadosCliente($cliente_id);
	//print_r($dados);
	//echo $CL->{'lastname'}; // 12345
	//foreach ($clientes as $cl) {
		//echo $clientes['cliente_nome'];
	//}
	//$passo = $clientes["cliente_passo"];
	//var_dump($docs);
	$form = $clientes["cliente_tipo_form"];
	$checkedRg = "";
	$checkedCpf = "";
	$checkedCompEnd = "";
	$checkedCertCasam = "";
	$checkedOutDocs = "";
	/*if($docs != NULL){
		foreach ($docs as $dc) {
			
			$tipo = $dc['tipo']; 
			//echo $tipo;
			//if($tipo == "RG"){$checkedRg = " checked";}
			//if($tipo == "CPF"){$checkedCpf = " checked";}
			//if($tipo == "CompEnd"){$checkedCompEnd = " checked";}
			//if($tipo == "CertCasam"){$checkedCertCasam = " checked";}
			//if($tipo == "OutDocs"){$checkedOutDocs = " checked";}
		}
	}*/
?>

<main role="main">

		<div class="main-breadcrumb container">
			<div class="content">
				
				<!-- <menu itemscope itemtype="https://schema.org/BreadcrumbList">
					<ul class="main-breadcrumb">

						<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
							<a itemprop="item" href="/">home</a>
							<meta itemprop="position" content="1">
						</li>

						<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
							<a itemprop="item" class="active" href="<?php $_SERVER['PHP_SELF']; ?>">minha conta</a>
							<meta itemprop="position" content="2">
						</li>
						
					</ul>
				</menu> -->

			</div>
			<div class="clear"></div>
		</div>

		<section class="main-single container">

			<div class="content">
				
				<header>
					<h2 class="title-myaccount">por favor, preencha o formulário, faça o envio dos documentos e realize o pagamento.</h2>
				</header>

				<div class="main-myaccount">

					<!--<span class="title-myaccount">Escolha sua opção</span>-->
					<input type="hidden" value="<?php echo $clientes["id"];?>" id="cod" />
					<ul class="checklist-options">
                    <?php if($form == "extraJudicial"){?>
						<li><label><input type="radio" name="opcaoDivorcio" value="extraJudicial" checked="checked">Divórcio Consensual em Cartório (Extrajudicial)</label>
                        <input type="hidden" value="1" id="produto_id" />
                        </li>
                   <?php }elseif($form == "consensualJudicial"){?>
						<li><label><input type="radio" checked="checked" name="opcaoDivorcio" value="consensualJudicial">Divórcio Consensual Judicial</label>
                        <input type="hidden" value="1" id="produto_id" />
                        </li>
                    <?php }else{ ?>
						
                        <li><label><input type="radio" name="opcaoDivorcio" value="extraJudicial" checked="checked">Divórcio Consensual em Cartório (Extrajudicial)</label></li>                   
						<li><label><input type="radio" checked="checked" name="opcaoDivorcio" value="consensualJudicial">Divórcio Consensual Judicial</label></li>
                        
					<?php }
					?>  
                    	<li><?php if($form == "extraJudicial"){?>
                        <a class="btn btn-form-my-account" href="form-extrajudicial">
                        <?php } ?>
                        <?php if($form == "consensualJudicial"){?>
                        <a class="btn btn-form-my-account" href="form-consensual-judicial">
                        <?php } ?>
                        edite ou preencha o formulário</a>
                        </li>
						<?php if($passo >= 2){?>
                        
                        <li class="fl-right info-status step-done"><i class="icon icon-file-small"></i>Etapa Concluída</li>                        
                        <?php }
						if($passo <= 1){
						?>                        
						<li class="fl-right info-status waiting-process"><i class="icon icon-clock-pink-small"></i>Aguardando preenchimento</li>
                        <?php }?>
                        
					</ul>

					<div class="clear"></div>

		
		<?php if($passo >= 2){ ?>

					<span class="title-myaccount">Imprima os documentos gerados pelo sistema e assine</span>

					<ul class="list-documents">
						<li><i class="icon icon-download"></i><a href="GerarHtmltoPdf/procuracao" target="_blank">Procuração</a></li>
						<li><i class="icon icon-download"></i><a href="GerarHtmltoPdf/contrato" target="_blank">Contrato</a></li>
					</ul>

					<div class="clear"></div>
	
					<span class="title-myaccount">Envie os documentos necessários para o divórcio</span>
                    
					<ul class="checklist-upload">
						
                        <li>
                        	<div class="file-wrapper-select fl-left">
                        		<select name="tipoArquivo" id="tipoArquivo">
                                 	<option value="">Selecione o arquivo</option>
                                 	<option value="RG1">RG Cônjuge 1</option>
                                    <option value="RG2">RG Cônjuge 2</option>
                                    <option value="CPF1">CPF Cônjuge 1</option>
                                    <option value="CPF2">CPF Cônjuge 2</option>
                                    <option value="CompEnd">Comprovande de Endereço</option>
                                    <option value="CertCasam">Certidão de Casamento</option>
                                    <option value="Procuracao">Procuração</option>
                                    <option value="Contrato">Contrato</option>
                                    <option value="OutDocs">Outros Documentos</option>
                                 </select>
                        	</div>

							<div class="file-wrapper fl-left formArquivos">
                                <form id="formArquivos" method="post" enctype="multipart/form-data">
                                    
                                    <label><p>enviar arquivo</p>
                                        
                                        <input type="file" name="inputArquivo" id="inputArquivo">
                                        <div id="loadformArquivo" style="display:none; position:absolute; top:0px; left:120px; color:#000">aguarde...</div> 
                                        
                                    </label>

                                    <!-- <label>Tipo do arquivo</label> -->

                                     <span id="mostraIdentificacao" style="display:none">
                                     	<label>Identificação</label><input type="text" name="nomeArquivoOutros" id="nomeArquivoOutros" value="" />
                                     </span>

                                     <input type="hidden" name="tipoFile" value="inputArquivo" />
                                     
                                </form>                             
							</div>

							<span class="fl-left">Arquivos</span>
						</li>

                        
						<!--<li>
							<span>RG</span>

							<div class="file-wrapper formUploadRg<?php echo $checkedRg; ?>">
                                <form id="formUploadRg" method="post" enctype="multipart/form-data">
                                    <label><p>enviar arquivo</p>
                                        <input type="file" name="inputFileRg" id="inputFileRg">
                                        <div id="loadformUploadRg" style="display:none; position:absolute; top:0px; left:120px; color:#000">aguarde...</div>  
                                        <input type="hidden" name="pasta" value="RG" />
                                        <input type="hidden" name="tipoFile" value="inputFileRg" />
                                    </label>
                                     
                                </form>                             
							</div>
						</li>

						<li>
							<span>CPF</span>

							<div class="file-wrapper formUploadCpf<?php echo $checkedCpf; ?>">
                            <form id="formUploadCpf" method="post" enctype="multipart/form-data">
								<label><p>enviar arquivo</p>
									<input type="file" name="inputFileCpf" id="inputFileCpf">
                                    <div id="loadformUploadCpf" style="display:none; position:absolute; top:0px; left:120px; color:#000">aguarde...</div> 
                                    <input type="hidden" name="pasta" value="CPF" />
                                    <input type="hidden" name="tipoFile" value="inputFileCpf" />
								</label>
                             </form>
							</div>
						</li>

						<li>
							<span>Comprovamente de Endereço</span>

							<div class="file-wrapper formUploadCompEnd<?php echo $checkedCompEnd; ?>">
                            <form id="formUploadCompEnd" method="post" enctype="multipart/form-data">
								<label><p>enviar arquivo</p>
									<input type="file" name="inputFileCompEnd" id="inputFileCompEnd">
                                    <div id="loadformUploadCompEnd" style="display:none; position:absolute; top:0px; left:120px; color:#000">aguarde...</div> 
                                    <input type="hidden" name="pasta" value="CompEnd" />
                                    <input type="hidden" name="tipoFile" value="inputFileCompEnd" />
								</label>
                            </form>
							</div>
						</li>

						<li>
							<span>Certidão de Casamento</span>

							<div class="file-wrapper formUploadCertCasam<?php echo $checkedCertCasam; ?>">
                            <form id="formUploadCertCasam" method="post" enctype="multipart/form-data">
								<label><p>enviar arquivo</p>
									<input type="file" name="inputFileCertCasam" id="inputFileCertCasam">
                                    <div id="loadformUploadCertCasam" style="display:none; position:absolute; top:0px; left:120px; color:#000">aguarde...</div> 
                                    <input type="hidden" name="pasta" value="CertCasam" />
                                    <input type="hidden" name="tipoFile" value="inputFileCertCasam" />
								</label>
                            </form>
							</div>
						</li>

						<li>
							<span>Outros Documentos</span>

							<div class="file-wrapper formUploadOutDocs<?php echo $checkedOutDocs; ?>">
                            <form id="formUploadOutDocs" method="post" enctype="multipart/form-data">
								<label>enviar arquivo
									<input type="file" name="inputFileOutDocs" id="inputFileOutDocs">
                                    <div id="loadformUploadOutDocs" style="display:none; position:absolute; top:0px; left:120px; color:#000">aguarde...</div> 
                                    <input type="hidden" name="pasta" value="OutDocs" />
                                    <input type="hidden" name="tipoFile" value="inputFileOutDocs" />
								</label>
                            </form>
							</div>
						</li>-->
                        
					</ul>
						
					<div class="checklist-upload-wrapper">
						<span class="list-documents-uploaded">Arquivo Enviados</span>
                    	<ul class="checklist-uploaded" id="Listadocs"></ul>
	                    <?php
	                    /*if($docs != NULL){
							echo "<ul>";
	                        foreach ($docs as $dc) {
	                            
	                            $tipo = $dc['tipo']; 
	                            //echo $tipo;
	                            if($tipo == "RG1"){echo "<li>RG Cônjuge 1</li>";}
	                            if($tipo == "RG2"){echo "<li>RG Cônjuge 2</li>";}
								
								if($tipo == "CPF1"){echo "<li>CPF Cônjuge 1</li>";}
	                            if($tipo == "CPG2"){echo "<li>CPF Cônjuge 2</li>";}
								
								if($tipo == "CompEnd1"){echo "<li>Comprovande de Endereço Cônjuge 1</li>";}
	                            if($tipo == "CompEnd2"){echo "<li>Comprovande de Endereço Cônjuge 2</li>";}
								
								if($tipo == "CertCasam1"){echo "<li>Certidão de Casamento Cônjuge 1</li>";}
	                            if($tipo == "CertCasam2"){echo "<li>Certidão de Casamento Cônjuge 2</li>";}
								
								if($tipo == "Procuracao1"){echo "<li>Procuração Cônjuge 1</li>";}
	                            if($tipo == "Procuracao2"){echo "<li>Procuração Cônjuge 2</li>";}
								
								if($tipo == "Contrato1"){echo "<li>Contrato Cônjuge 1</li>";}
	                            if($tipo == "Contrato2"){echo "<li>Contrato Cônjuge 2</li>";}
								
								if($tipo == "OutDocs"){echo "<li>".$dc['label']."</li>";}
	                        }
							echo "</ul>";
	                    }*/
	                    ?>
                    </div>

					<div class="clear"></div>

					<div class="main-info-payment">

						<div class="column column-large">
							
							<header>
								<h2>Pagamento PagSeguro</h2>
							</header>

							<p><strong class="aqua-green">Muito bom ter você como nosso cliente.</strong> Trabalhamos ao máximo para atender todas as suas expectativas, prestando um serviço ágil e de qualidade.</p>

							<p>Se você optou por Divórcio Consensual em Cartório ou Divórcio Judicial realize o pagamento através do botão <span><strong class="aqua-green">PagSeguro.</strong></span><br/> Para pagamentos via depósito bancário oferecemos <span><strong class="aqua-green">10% de desconto.</strong></span></p>

							<p class="payment-obs">Lembre-se ainda, que caso opte por favor em cartório é mais rápido, porém você terá que pagar a taxa do cartório.<br/> Caso opte por fazer judicialmente, será menos aneroso ou até mesmo, dependendo da sua situação financeira, poderá ser beneficiário da justiça gratuita.</p> 

							<a class="icon icon-pagseguro" alt="Pagar com PagSeguro" href="javascrip:void(0)" onclick="BtnPagamentoPagSeguro();"></a>

						</div>

						<div class="column column-large last">

							<header>
								<h2>Pagamento Depósito</h2>
							</header>

							<ul class="info-account-bank">
								<li>Banco Santander</li>
								<li>AG: 0228</li>
								<li>CC: 01027815-8</li>
								<li>CPF: 368.136.978-03 </li>
								<li>Bruno Freire Gallucci</li>
							</ul class="info-account-bank">

							<p class="payment-obs">Após realizar o depósito, enviar comprovante através do campo "Outros Documentos"</p>
						</div>

					</div>
                    
                    <div class="main-follow-process">

						<header>
							<h2>Acompanhe seu processo</h2>
						</header>

						<!--<p class="info-process info-process-send"><i class="icon icon-check"></i>Documentação Enviada</p>-->
						<p class="info-process info-process-waiting" style="color:#679c0e !important"><i class="icon icon-clock-pink"></i>
                        <?php
						if($status != NULL){
													
							foreach ($status as $st) {
								if($st["tipo"] == $clientes["cliente_status"]){
									echo $st["status"];
								}
							}
														
						}
						?></p>

					</div>

					<div class="clear"></div>
                    
                    
                    <div class="main-chat">

                        <div class="chat-header">

                            <p class="chat-title">Mensagens</p>
                        </div>

                        <div class="chat-body">
                            <div class="chat-messages" id="ListaMsg">
                                
                            </div>
                        </div>

                        <div class="chat-footer">
                            <div class="type-message">
                                <form id="formMensagem" onsubmit="return false;">
                                    <textarea name="MensagemCliente" id="MensagemCliente"  placeholder="Digite sua mensagem..."></textarea>
                                    <input type="hidden" name="clienteMensagemID" value="<?php echo $clientes["id"];?>" />
                                    <button class="btn btn-type-message" id="enviaMensagem" type="submit">Enviar Mensagem</button>
                                </form>
                            </div>
                        </div>

                    </div>
                    
                    
                    
		<?php }?>
					 

					
					</div>

				</div>
			</div>
		
			<div class="clear"></div>


			<a class="fixed-payment-widget" href="javascrip:void(0)" onclick="BtnPagamentoPagSeguro();"></a>

		</section>
		
	</main>
<script src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
