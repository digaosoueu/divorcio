<?php
	$tipoForm = $cad;
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
						<h2>Efetue seu Login <span class="required-fields">campos obrigatórios*</span> </h2>
					</header>
                    
					<div class="column column-large">

						<h3 class="aqua-green">Login</h3>

						<form class="main-login" role="form" method="POST" name="FormLogin" id="FormLogin" onsubmit="return false;">
							<ul>
								<li>
									<label>
                                    <input type="radio" name="EmailCpf" value="email" checked="checked" /> E-mail
                                     ou 
                                     <input type="radio" name="EmailCpf" value="cpf" />CPF*</label>
                                    
									<input type="email" name="emailLogin" id="emailLogin" placeholder="Digite seu e-mail ou CPF">
                                    
                                    
                                    
								</li>
								<li>
									<label>Senha*</label>
									<input type="password" name="senhaLogin" id="senhaLogin" value="">
								</li>

								<li class="column column-large">
									<p class="message message-error errorlogin fl-left" style="display:none">Por favor, preencha todos os campos!</p>
								</li>

								<li class="column column-large last">
									<button class="btn btn-register" id="Btn_acessar">Acessar</button>
								</li>

								<li>
									<!--<p class="column column-large"><label><input type="checkbox" name="" value="1">Me manter logado</label></p>-->
									<p class="align-right"><a class="forget-password" href="">esqueci minha senha</a></p>
								</li>
							</ul>
						</form>

					</div>

					<div class="column column-large last">
                    
                    	
						<h3 class="aqua-green">Cadastre-se</h3>

						<form class="main-login" role="form" method="POST" class="FormFormCad" id="FormFormCad" action="" onsubmit="return false">
							<ul>
                            	<li>
									<label>Nome*</label>
									<input type="text" name="nomeCad" id="nomeCad" placeholder="Digite seu Nome" value="">
                                    <input type="hidden" name="tipo_form" value="<?php echo $tipoForm ?>">
								</li>
                                <li>
									<label>Sobrenome*</label>
									<input type="text" name="sobrenomeCad" placeholder="Digite seu Sobrenome">
								</li>
								<li>
									<label>E-mail*</label>
									<input type="email" name="emailCad" id="emailCad" placeholder="Digite seu e-mail">
								</li>
                                <li>
									<label>CPF*</label>
									<input class="cpf-mask" type="text" name="cpfCad" placeholder="Digite seu CPF">
								</li>
                                <li>
									<label>Telefone*</label>
									<input class="tel-mask" type="text" name="telefoneCad" placeholder="Digite seu Telefone">
								</li>
								<li class="column column-large"> 
									<label>Senha*</label>
									<input placeholder="Digite sua senha" type="password" name="senhaCad">
								</li>

								<li class="column column-large last"> 
									<label>Confirmar senha*</label>
									<input placeholder="Confirme sua senha" type="password" name="senhaCadConfirm">
								</li>

								<li class="column column-large">
									<p class="message message-error errorCadastro fl-left" style="display:none">Por favor, preencha todos os campos!</p>
								</li>

								<li class="column column-large last">
                                	
									<button class="btn btn-register" id="EnviaFormCad">Cadastrar</button>
								</li>

							</ul>
						</form>

					</div>
 


				</article>

			</div>
		
			<div class="clear"></div>
		</section>
		
	</main>

