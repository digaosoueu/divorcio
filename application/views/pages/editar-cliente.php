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
							<a itemprop="item" class="active" href="<?php $_SERVER['PHP_SELF']; ?>">minha conta</a>
							<meta itemprop="position" content="2">
						</li>
						
					</ul>
				</menu>

			</div>
			<div class="clear"></div>
		</div>

		<section class="main-single main-login-form container">

			<div class="content">

				<article>

					<header>
						<h2>Editar cadastro <span class="required-fields">campos obrigatórios*</span> </h2>
					</header>					

					
                    
                    	
						<h3 class="aqua-green">Editar</h3>

						<form class="main-login" role="form" method="POST" class="FormFormCad" id="FormFormCad" action="" onsubmit="return false">
							<ul>
                            	<li class="column column-large">
									<label>Nome*</label>
									<input type="text" name="nomeCad" id="nomeCad" placeholder="Digite seu Nome" value="<?php echo $clientes["cliente_nome"]?>">
                                    <input type="hidden" name="id" value="<?php echo $clientes["id"]?>">
                                    <input type="hidden" name="tipo_form" value="<?php echo $clientes["cliente_tipo_form"] ?>">
								</li>
                                <li class="column column-large last">
									<label>Sobrenome*</label>
									<input type="text" name="sobrenomeCad" placeholder="Digite seu Sobrenome" value="<?php echo $clientes["cliente_sobrenome"]?>">
								</li>
								<li>
									<label>E-mail*</label>
									<input type="email" name="emailCad" id="emailCad" placeholder="Digite seu e-mail" value="<?php echo $clientes["cliente_email"]?>">
								</li>
                                <li class="column column-large">
									<label>CPF*</label>
									<input class="cpf-mask" type="text" name="cpfCad" placeholder="Digite seu CPF" value="<?php echo $clientes["cliente_cpf"]?>">
								</li>
                                <li class="column column-large last">
									<label>Telefone*</label>
									<input class="tel-mask" type="text" name="telefoneCad" placeholder="Digite seu Telefone" value="<?php echo $clientes["cliente_telefone"]?>">
								</li>
								<li class="column column-large"> 
									<label>Senha*</label>
									<input placeholder="Digite sua senha" type="password" name="senhaCad" value="<?php echo $clientes["cliente_senha"]?>">
								</li>

								<li class="column column-large last"> 
									<label>Confirmar senha*</label>
									<input placeholder="Confirme sua senha" type="password" name="senhaCadConfirm" value="<?php echo $clientes["cliente_senha"]?>">
								</li>

								<li class="column column-large">
									<p class="message message-error errorCadastro fl-left" style="display:none">Por favor, preencha todos os campos!</p>
								</li>

								<li class="column column-large last">
                                	
									<button class="btn btn-register" id="EnviaFormCad">Editar</button>
								</li>

							</ul>
						</form>

					
                   


				</article>

			</div>
		
			<div class="clear"></div>
		</section>
		
	</main>

