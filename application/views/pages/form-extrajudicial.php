<?php
	///Verifica logado
	/*$this->load->helper('Funcoes');
	$CL = json_decode(getCookieCliente());
	//$cliente_id = $CL->{'id'};
	//echo $cliente_id;
	
	if(is_null($CL)){
		header( "HTTP/1.1 301 Moved Permanently" );
		header( "Location: /solicitar-cadastro?cad=extraJudicial" );
	}else{
		$cliente_id = $CL->{'id'};
	
		if($cliente_id == "" || is_null($cliente_id)){
			header( "HTTP/1.1 301 Moved Permanently" );
			header( "Location: /solicitar-cadastro?cad=extraJudicial" );
		}
	}*/
	//echo $CL->{'lastname'}; // 12345
?>
<main role="main">
		<div class="main-breadcrumb container">

			<div class="content">

				<menu itemscope itemtype="https://schema.org/BreadcrumbList">
					<ul class="main-breadcrumb">

						<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
							<a itemprop="item" href="/">home</a>
							<meta itemprop="position" content="1">
						</li>

						<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
							<a itemprop="item" class="active" href="<?php $_SERVER['PHP_SELF']; ?>">formulário consensual em cartório (extrajudicial)</a>
							<meta itemprop="position" content="2">
						</li>
						
					</ul>
				</menu>
				
			</div>

			<div class="clear"></div>
		</div>

		<section class="main-single container">
			
			<div class="content">
				
				<header>
					<h2>Preencha o Formulário <span class="required-fields">campos obrigatórios*</span> </h2>
				</header>
				<?php if($form["id"] == ""){?>
				<form name="formExtrajudicial" id="formExtrajudicial" role="form" action="" method="POST">
					<ul class="info-form main-form">
						<li class="column column-large">
							<label class="ds-inbl">O casal tem filhos menores ou incapazes?</label>
							<label class="ds-inbl"><input type="radio" value="true" name="has_children"> sim</label>
							<label class="ds-inbl"><input type="radio" value="false" name="has_children"> não</label>
						</li>

						<li class="column column-large last">
							<p class="obs-form">obs: Não é permitido realizar o divórcio em cartório quando o casal possuir filhos menores, sugerimos escolher a opção de <a href="form-consensual-judicial"><strong>Divórcio Consensual Judicial</strong></a>.</p>
						</li>
					</ul>
				</form>
                
				<?php 
				$display = "";
				}else{
					
					$display = "style='display:block'";
				 }?>
				<div class="clear"></div>

				<div class="extrajudicial-form" <?php echo $display; ?>>			
					<form class="main-form" action="" id="formExtrajudicialCad" name="formExtrajudicialCad" method="POST" onsubmit="return false;">

						<h3>1° Requerente (Cônjuge)</h3>
							
						<ul>
							<li class="column column-large">
								<label>Nome Completo*</label>
								<input type="text"  name="nome_conjuge_1" value="<?php echo $form["nome_conjuge1"]; ?>" placeholder="Digite seu nome...">
                                <input type="hidden" name="cliente_id" id="cliente_id" value="<?php echo $cliente_id; ?>">
                            	<input type="hidden" name="form_id" id="form_id" value="<?php echo $form["id"]; ?>">
                                <input type="hidden" name="form_idadm" id="form_idadm" value="<?php echo $tipoForm; ?>">
							</li>

							<li class="column column-large last">
							
                            
                            <label>Endereço</label>
							<input type="text"  name="endereco_conjuge_1" value="<?php echo $form["endereco_conjuge1"]; ?>" placeholder="Digite seu endereço...">
                            
						</li>

						<li class="column column-large">

							<div class="column column-large">
                                <label>RG</label>
                                <input type="tel" value="<?php echo $form["rg_conjuge1"]; ?>" name="rg_conjuge_1" placeholder="000.000.00-0">
                            </div>

                            <div class="column column-large last">

                                <label>CPF</label>
                                <input class="cpf-mask" type="tel" value="<?php echo $form["cpf_conjuge1"]; ?>" name="cpf_conjuge_1" placeholder="000.000.00-00">
                            </div>
							
						</li>

						<li class="column column-large last">

							<div class="column column-large">
								
                                <label>Número</label>
                            	<input type="text"  name="numero_conjuge_1" value="<?php echo $form["numero_conjuge1"]; ?>" placeholder="Digite o número...">
                                
							</div>

							<div class="column column-large last">							
								
                            	<label>Bairro</label>
								<input type="text"  name="bairro_conjuge_1" value="<?php echo $form["bairro_conjuge1"]; ?>" placeholder="Digite seu bairro...">							

							</div>

						</li>

						<li class="column column-large">
							<label>Cidade</label>
							<input type="text"  name="cidade_conjuge_1" value="<?php echo $form["cidade_conjuge1"]; ?>" placeholder="Digite sua cidade...">
						</li>

						<li class="column column-large last">
							
                            <label>Complemento</label>
							<input type="text"  name="complemento_conjuge_1" value="<?php echo $form["compl_conjuge1"]; ?>" placeholder="Digite o complemento...">
                            
						</li>

						<li class="column column-large">
							<label>Profissão</label>
							<input type="text"  name="profissao_conjuge_1" value="<?php echo $form["profissao_conjuge1"]; ?>" placeholder="Digite sua profissão...">
						</li>
							<li class="column column-large last">
                            	
                                <div class="column column-large">
                                	<label>Estado</label>
                                    <?php $estado1 = $form["estado_conjuge1"];?> 
									<select name="estado_conjuge_1" id="estado_conjuge_1">
                                    <option value="">Selecione</option>
                                    <option value="AC"<?php if($estado1 == "AC"){?> selected="selected" <?php }?>>Acre</option>
                                <option value="AL"<?php if($estado1 == "AL"){?> selected="selected" <?php }?>>Alagoas</option>
                                <option value="AM"<?php if($estado1 == "AM"){?> selected="selected" <?php }?>>Amazonas</option>
                                <option value="AP"<?php if($estado1 == "AP"){?> selected="selected" <?php }?>>Amapá</option>
                                <option value="BA"<?php if($estado1 == "BA"){?> selected="selected" <?php }?>>Bahia</option>
                                <option value="CE"<?php if($estado1 == "CE"){?> selected="selected" <?php }?>>Ceará</option>
                                <option value="DF"<?php if($estado1 == "DF"){?> selected="selected" <?php }?>>Distrito Federal</option>
                                <option value="ES"<?php if($estado1 == "ES"){?> selected="selected" <?php }?>>Espírito Santo</option>
                                <option value="GO"<?php if($estado1 == "GO"){?> selected="selected" <?php }?>>Goiás</option>
                                <option value="MA"<?php if($estado1 == "MA"){?> selected="selected" <?php }?>>Maranhão</option>
                                <option value="MG"<?php if($estado1 == "MG"){?> selected="selected" <?php }?>>Minas Gerais</option>
                                <option value="MS"<?php if($estado1 == "MS"){?> selected="selected" <?php }?>>Mato Grosso do Sul</option>
                                <option value="MT"<?php if($estado1 == "MT"){?> selected="selected" <?php }?>>Mato Grosso</option>
                                <option value="PA"<?php if($estado1 == "PA"){?> selected="selected" <?php }?>>Pará</option>
                                <option value="PB"<?php if($estado1 == "PB"){?> selected="selected" <?php }?>>Paraíba</option>
                                <option value="PE"<?php if($estado1 == "PE"){?> selected="selected" <?php }?>>Pernambuco</option>
                                <option value="PI"<?php if($estado1 == "PI"){?> selected="selected" <?php }?>>Piauí</option>
                                <option value="PR"<?php if($estado1 == "PR"){?> selected="selected" <?php }?>>Paraná</option>
                                <option value="RJ"<?php if($estado1 == "RJ"){?> selected="selected" <?php }?>>Rio de Janeiro</option>
                                <option value="RN"<?php if($estado1 == "RN"){?> selected="selected" <?php }?>>Rio Grande do Norte</option>
                                <option value="RO"<?php if($estado1 == "RO"){?> selected="selected" <?php }?>>Rondônia</option>
                                <option value="RR"<?php if($estado1 == "RR"){?> selected="selected" <?php }?>>Roraima</option>
                                <option value="RS"<?php if($estado1 == "RS"){?> selected="selected" <?php }?>>Rio Grande do Sul</option>
                                <option value="SC"<?php if($estado1 == "SC"){?> selected="selected" <?php }?>>Santa Catarina</option>
                                <option value="SE"<?php if($estado1 == "SE"){?> selected="selected" <?php }?>>Sergipe</option>
                                <option value="SP"<?php if($estado1 == "SP"){?> selected="selected" <?php }?>>São Paulo</option>
                                <option value="TO"<?php if($estado1 == "TO"){?> selected="selected" <?php }?>>Tocantis</option>
                                </select>
                                </div>
                                
                                <div class="column column-large last">
                            		<label>CEP</label>
									<input type="text"  name="cep_conjuge_1" value="<?php echo $form["cep_conjuge1"]; ?>" placeholder="Digite seu CEP...">
								</div>
								

							</li>

							<li class="column column-large">

								<p>Escolha uma das alternativas:</p>

								<input type="radio" value="1" <?php if($form["retorna_nome_solteiro_conjuge1"] == "1"){?>checked="checked"<?php }?>name="nome_casado_conjuge_1">Vai retornar o nome de solteiro?
								<input type="radio" value="0" <?php if($form["retorna_nome_solteiro_conjuge1"] == "0"){?>checked="checked"<?php }?>name="nome_casado_conjuge_1">Será mantido o nome de casado?
							</li>

							<li class="column column-large last">
								
								<span>Se for alterar o nome descrever como vai ficar.</span>

								<input class="input-insert-name" type="text" value="<?php echo $form["nome_solteiro_conjuge1"]; ?>" name="nome_solteiro_conjuge_1">
								
								<label class="input-insert-name-effect"></label>

							</li>

						</ul>

					<h3>2° Requerente (Cônjuge)</h3>
							
						<ul>
							<li class="column column-large">
								<label>Nome Completo</label>
								<input type="text" value="<?php echo $form["nome_conjuge2"]; ?>" name="nome_conjuge_2" placeholder="Digite seu nome...">
							</li>

							<li class="column column-large last">
							
                            
                            <label>Endereço</label>
							<input type="text"  name="endereco_conjuge_2" value="<?php echo $form["endereco_conjuge2"]; ?>" placeholder="Digite seu endereço...">
                            
						</li>

						<li class="column column-large">

							<div class="column column-large">
                                <label>RG</label>
                                <input type="tel" value="<?php echo $form["rg_conjuge2"]; ?>" name="rg_conjuge_2" placeholder="000.000.00-0">
                            </div>

                            <div class="column column-large last">

                                <label>CPF</label>
                                <input class="cpf-mask" type="tel" value="<?php echo $form["cpf_conjuge2"]; ?>" name="cpf_conjuge_2" placeholder="000.000.00-00">
                            </div>
							
						</li>

						<div class="column column-large last">

							<div class="column column-large">
                            
                            	<label>Número</label>
                                <input type="text"  name="numero_conjuge_2" value="<?php echo $form["numero_conjuge2"]; ?>" placeholder="Digite o número...">
								
							</div>

							<div class="column column-large last">                                
								
								<label>Bairro</label>
								<input type="text"  name="bairro_conjuge_2" value="<?php echo $form["bairro_conjuge2"]; ?>" placeholder="Digite seu bairro...">
							</div>

						</div>

						<li class="column column-large">
							<label>Cidade</label>
							<input type="text"  name="cidade_conjuge_2" value="<?php echo $form["cidade_conjuge2"]; ?>" placeholder="Digite sua cidade...">
						</li>

						<li class="column column-large last">
							
                            
                            <label>Complemento</label>
							<input type="text"  name="complemento_conjuge_2" value="<?php echo $form["compl_conjuge2"]; ?>" placeholder="Digite o complemento...">
                            
						</li>

						<li class="column column-large">
							<label>Profissão</label>
							<input type="text"  name="profissao_conjuge_2" value="<?php echo $form["profissao_conjuge2"]; ?>" placeholder="Digite sua profissão...">
						</li>

							<li class="column column-large last">
								
                                <div class="column column-large">
                                	<label>Estado</label>
                                    <?php $estado1 = $form["estado_conjuge2"];?> 
									<select name="estado_conjuge_2" id="estado_conjuge_2">
                                    <option value="">Selecione</option>
                                    <option value="AC"<?php if($estado1 == "AC"){?> selected="selected" <?php }?>>Acre</option>
                                <option value="AL"<?php if($estado1 == "AL"){?> selected="selected" <?php }?>>Alagoas</option>
                                <option value="AM"<?php if($estado1 == "AM"){?> selected="selected" <?php }?>>Amazonas</option>
                                <option value="AP"<?php if($estado1 == "AP"){?> selected="selected" <?php }?>>Amapá</option>
                                <option value="BA"<?php if($estado1 == "BA"){?> selected="selected" <?php }?>>Bahia</option>
                                <option value="CE"<?php if($estado1 == "CE"){?> selected="selected" <?php }?>>Ceará</option>
                                <option value="DF"<?php if($estado1 == "DF"){?> selected="selected" <?php }?>>Distrito Federal</option>
                                <option value="ES"<?php if($estado1 == "ES"){?> selected="selected" <?php }?>>Espírito Santo</option>
                                <option value="GO"<?php if($estado1 == "GO"){?> selected="selected" <?php }?>>Goiás</option>
                                <option value="MA"<?php if($estado1 == "MA"){?> selected="selected" <?php }?>>Maranhão</option>
                                <option value="MG"<?php if($estado1 == "MG"){?> selected="selected" <?php }?>>Minas Gerais</option>
                                <option value="MS"<?php if($estado1 == "MS"){?> selected="selected" <?php }?>>Mato Grosso do Sul</option>
                                <option value="MT"<?php if($estado1 == "MT"){?> selected="selected" <?php }?>>Mato Grosso</option>
                                <option value="PA"<?php if($estado1 == "PA"){?> selected="selected" <?php }?>>Pará</option>
                                <option value="PB"<?php if($estado1 == "PB"){?> selected="selected" <?php }?>>Paraíba</option>
                                <option value="PE"<?php if($estado1 == "PE"){?> selected="selected" <?php }?>>Pernambuco</option>
                                <option value="PI"<?php if($estado1 == "PI"){?> selected="selected" <?php }?>>Piauí</option>
                                <option value="PR"<?php if($estado1 == "PR"){?> selected="selected" <?php }?>>Paraná</option>
                                <option value="RJ"<?php if($estado1 == "RJ"){?> selected="selected" <?php }?>>Rio de Janeiro</option>
                                <option value="RN"<?php if($estado1 == "RN"){?> selected="selected" <?php }?>>Rio Grande do Norte</option>
                                <option value="RO"<?php if($estado1 == "RO"){?> selected="selected" <?php }?>>Rondônia</option>
                                <option value="RR"<?php if($estado1 == "RR"){?> selected="selected" <?php }?>>Roraima</option>
                                <option value="RS"<?php if($estado1 == "RS"){?> selected="selected" <?php }?>>Rio Grande do Sul</option>
                                <option value="SC"<?php if($estado1 == "SC"){?> selected="selected" <?php }?>>Santa Catarina</option>
                                <option value="SE"<?php if($estado1 == "SE"){?> selected="selected" <?php }?>>Sergipe</option>
                                <option value="SP"<?php if($estado1 == "SP"){?> selected="selected" <?php }?>>São Paulo</option>
                                <option value="TO"<?php if($estado1 == "TO"){?> selected="selected" <?php }?>>Tocantis</option>
                                </select>	
                                </div>
                                
                                <div class="column column-large last">
                                	<label>CEP</label>
									<input type="text"  name="cep_conjuge_2" value="<?php echo $form["cep_conjuge2"]; ?>" placeholder="Digite seu CEP...">
                                <div class="column column-large last">
								

							</li>

							<li class="column column-large">

								<p>Escolha uma das alternativas:</p>

								<label><input type="radio" <?php if($form["retorna_nome_solteiro_conjuge2"] == "1"){?>checked="checked"<?php }?> value="1" name="nome_casado_conjuge_2"> Vai retornar o nome de solteiro?</label>
								<label><input type="radio" <?php if($form["retorna_nome_solteiro_conjuge2"] == "0"){?>checked="checked"<?php }?> value="0" name="nome_casado_conjuge_2"> Será mantido o nome de casado?</label>
							</li>

							<li class="column column-large last">
								
								<span>Se for alterar o nome descrever como vai ficar.</span>

								<input class="input-insert-name" type="text" value="<?php echo $form["nome_solteiro_conjuge2"]; ?>" name="nome_solteiro_conjuge_2">

								<label class="input-insert-name-effect"></label>
							</li>

						</ul>

						<h3>Informações Comuns sobre os Cônjuges</h3>

						<ul class="general-info">
							
							<li class="column column-one">

								<label>Data de Casamento</label>
								<?php 
								$dia = date("d", strtotime($form["data_casamento"]));
								$mes = date("m", strtotime($form["data_casamento"]));
								$ano = date("Y", strtotime($form["data_casamento"]));
								if($ano == "1969"){
									$dia = "";
									$mes = "";
									$ano = "";
								}
							?>
								<div class="column column-medium">
									<input type="tel" value="<?php echo $dia; ?>" maxlength="2" name="dia_casamento" placeholder="00">
								</div>

								<div class="column column-medium">
									<input type="tel" maxlength="2" value="<?php echo $mes; ?>" name="mes_casamento" placeholder="00">
								</div>

								<div class="column column-medium last">
									<input type="tel" maxlength="4" value="<?php echo $ano; ?>" name="ano_casamento" placeholder="0000">
								</div>

								<div class="clear"></div>

								<p class="date-example">exemplo de preenchimento: 29/02/1990 </p>

							</li>

							<li class="column column-three">
								<label>Foi feito pacto antenupcial? Se sim, descrever o que foi contratado.</label>
								<textarea placeholder="Descreva..." name="pacto_antenupcial" rows="3"><?php echo $form["pacto_antenupcial"]; ?></textarea>
							</li>

							<div class="clear"></div>

							<li class="column column-large">
								<label>Há bens a dividir? Se sim, descrever quais bens, valores médios de mercado e localização dos imóveis</label>
								<textarea placeholder="Descreva..." name="bens_dividir" rows="3"><?php echo $form["bens_dividir"]; ?></textarea>
							</li>

							<li class="column column-large last">
								<label>Descrever como foi tratada consensualmente a partilha dos bens.</label>
								<textarea placeholder="Descreva..." name="partilha_bens" rows="3"><?php echo $form["partilha_bens"]; ?></textarea>
							</li>

							<li class="column column-large">
								<label>Descrever o valor da pensão alimentícia (caso o casal deseje estipular)</label>
								<textarea placeholder="Descreva..." name="pensao" rows="3"><?php echo $form["pensao_alimenticia"]; ?></textarea>
							</li>

							<li class="column column-large last">
								<label>Descrever o valor de contribuição para criar e educar os filhos menores ou maiores (caso o casal deseja estipular).</label>
								<textarea placeholder="Descreva..." name="contribuicao" rows="3"><?php echo $form["contribuicao_educacao"]; ?></textarea>
							</li>

							<li>
								<label>Descrever o valor de eventuais impostos ou dívidas devidas em decorrência dos conviventes ou da partilha de bens</label>
								<textarea placeholder="Descreva..." name="imposto" rows="3"><?php echo $form["impostos_dividas"]; ?></textarea>
							</li>
							
							<li class="column column-large last fl-right">
                            <p class="message message-error fl-left" style="display:none">Por favor, preencha todos os campos!</p>
								<button class="btn btn-register" id="enviaFormExtrajudicial">Enviar Cadastro</button>
							</li>

						</ul>

					</form>

					<div class="clear"></div>

					<section class="main-info-register container">

						<p><strong>Tudo pronto.</strong> Assim que seu acesso for confirmado, acesse o sistema, imprima a documentação gerada procuração, contrato de prestação de serviços, assine e anexe ao sistema.</p>
						
						<p><span><strong>Vamos agilizar, preparar a documentação e entraremos em contato.</strong></span> Pelo sistema você terá todo acesso ao <strong>andamento do seu processo.</strong></p>

					</section>

					<!-- <div class="clear border-top-light"></div> -->

				</div>

					<!--<section class="main-info-payment container">

						<header><h2>Pagamento</h2></header>

						<p><strong>Muito bom ter você como nosso cliente.</strong> Trabalhamos ao máximo para atender todas as suas expectativas, prestando um serviço ágil e de qualidade.</p>

						<p>Se você optou por <strong>Divórcio Consensual em Cartório ou Divórcio Judicial</strong> realize o pagamento através do botão <span><strong>PagSeguro.</strong></span><br/> Para pagamentos via depósito bancário oferecemos <span><strong>10% de desconto.</strong></span></p>

						<p class="payment-obs">Lembre-se ainda, que caso opte por favor em cartório é mais rápido, porém você terá que pagar a taxa do cartório.<br/> Caso opte por fazer judicialmente, será menos aneroso ou até mesmo, dependendo da sua situação financeira, poderá ser beneficiário da justiça gratuita.</p> 

						<a class="icon icon-pagseguro" alt="Pagar com PagSeguro" href=""></a>

					</section>
-->
				</div>


			<div class="clear"></div>
		</section>

	</main>

