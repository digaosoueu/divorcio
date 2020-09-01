<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IT=edge,chrome=IE8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Divórcio 24H Online</title>

	<link href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url();?>css/aplication.css">

	<link rel="canonical" href="http://www.divorcio-online24hs.com.br"/>
	
	<link rel="icon" href="<?php echo base_url();?>images/favicon/favicon.png" />
	<link rel="shortcut icon" href="<?php echo base_url();?>images/favicon/favicon.png" />
	<link rel="apple-touch-icon" href="<?php echo base_url();?>images/favicon/favicon.png"/>

	<!--[if IE]><link rel="shortcut icon" href="images/favicon/favicon.png"><![endif]-->
	
	<!--[if IE 8]><script src="js/vendor/html5shiv.min.js"></script><![endif]-->
	<!--[if IE 8]><script src="js/vendor/selectivizr-min.js"></script><![endif]-->

	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo base_url();?>images/favicon/ms-icon-144x144.png">

	<meta name="theme-color" content="#ffffff">

	<meta name="msapplication-navbutton-color" content="#fff"/>
	<meta name="apple-mobile-web-app-status-bar-style" content="#fff"/>
	
	<meta name="description" content="Faça seu divórcio com profissionais especializados de forma 100% garantida"/>
	<meta name="author" content="JCandido Criação e Design"/>
	
	<meta name="robots" content="index/follow"/>
	<meta name="googlebot" content="index/follow"/>

	<meta property="og:type" content="website"/>
	<meta property="og:title" content="Divórcio Online 24 horas"/>
	<meta property="og:url" content="<?php echo base_url();?>"/>
	<meta property="og:site_name" content="Divórcio Online 24 horas"/>
	<meta property="og:image" content="<?php echo base_url();?>images/social.png"/>
	<meta property="og:description" content="Faça seu divórcio com profissionais especializados de forma 100% garantida"/>
	<meta property="og:locale" content="pt_BR"/>

	<meta name="twitter:card" content="summary"/>
	<meta name="twitter:title" content="Divórcio Online 24 horas"/>
	<meta name="twitter:description" content="Faça seu divórcio com profissionais especializados de forma 100% garantida"/>
	<meta name="twitter:creator" content="JCandido Criação e Design"/>
	<meta name="twitter:image" content="<?php echo base_url();?>images/social.png"/>

</head>
<body>

	<div class="main-loading">
		<div class="clock-loading">
			<div class="minutes"></div>
			<div class="hours"></div>
		</div>
	</div>

	<div class="mp-pusher" id="mp-pusher">

		<!-- mp-menu -->

		<nav id="mp-menu" class="mp-menu">
			<div class="mp-level">
				<h2 class="">Emerson Candido</h2>
				<ul>
					<li>
						<a class="splay" href="#">Home</a>
					</li>
					<li>
						<a href="#">Serviços</a>
						<div class="mp-level">
							<h2>Serviços</h2>
							<a class="mp-back" href="#">Voltar</a>
							<ul>
								<li>
									<a href="consensual-extrajudicial" title="Divórcio Consensual em Cartório (Extrajudicial)" href="#">Divórcio Consensual em Cartório (Extrajudicial)</a>									
								</li>
								<li>
									<a href="consensual-judicial" title="Divórcio Consensual Judicial" >Divórcio Consensual Judicial</a>
								</li>
								<li>
									<a href="direito-familia-sucessoes" title="Direito de Família e Sucessões" >Direito de Família e Sucessões</a>
								</li>
								<li>
									<a href="perguntas-frequentes" title="Perguntas Frequentes">Perguntas Frequentes</a>
								</li>
							</ul>
						</div>
					</li>
					<li><a href="documentacao">Documentação</a></li>
					<li><a href="contato">Contato</a></li>
					<li><a href="logout">Sair</a></li>
				</ul>
					
			</div>
		</nav>

		<!-- /mp-menu -->
	
	<header class="main-header container">
		<div class="content">
			
			<h1 class="no-font"><a class="icon icon-logo" role="logo" href="/" title="Divórcio 24H Online">Divórcio 24H Online</a></h1>

			<nav role="navigation">
				<ul class="main-menu">
					<li><a href="/" title="{Página Inicial}">Home</a></li>
					<li><a href="javascript:void(0)" title="{Página Serviços}">Serviços <i aria-hidden="true" class="icon icon-arrow-down"></i> </a>
						<ul class="main-submenu">
							<li><a href="consensual-extrajudicial" title="Divórcio Consensual em Cartório (Extrajudicial)">Divórcio Consensual em Cartório (Extrajudicial)</a></li>
							<li><a href="consensual-judicial" title=">Divórcio Consensual Judicial">Divórcio Consensual Judicial</a></li>
							<li><a href="litigioso-judicial" title="Divórcio Litigioso Judicial">Divórcio Litigioso Judicial</a></li>
							<li><a href="direito-familia-sucessoes" title="Direito de Família e Sucessões">Direito de Família e Sucessões</a></li>
							<li><a href="perguntas-frequentes" title="Perguntas Frequentes">Perguntas Frequentes</a></li>
						</ul>
					</li>
					<li><a href="documentacao" title="{Página Documentação }">Documentação</a></li>
					<li><a href="contato" title="{Página Contato }">Contato</a></li>
				</ul>
			</nav>

			<a href="#" id="trigger" class="menu-trigger"></a>

			<?php

			//echo $dadosCliente->{'id'};

			if(!is_null($dadosCliente)){
				$idCliente = $dadosCliente->{'id'};
				
				if($idCliente!= ""){
					echo '<div class="user-logged">
							<p><a title="Minha Conta" href="' . base_url() . 'minha-conta">'.$dadosCliente->{'nome'}.'</a> <a href="' . base_url() . 'logout">Sair</a></p>
						</div>';
					}
				else
				{
					echo '<a class="btn btn-login" href="' . base_url() . 'minha-conta">Login</a>';
				}
			}
			else
			{
				echo '<a class="btn btn-login" href="' . base_url() . 'minha-conta">Login</a>';
			}
			
			?>
			

		</div>
		<div class="clear"></div>
	</header>
	