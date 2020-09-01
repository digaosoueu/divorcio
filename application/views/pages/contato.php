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
                            <a itemprop="item" class="active" href="<?php $_SERVER['PHP_SELF']; ?>">contato</a>
                            <meta itemprop="position" content="2">
                        </li>
                        
                    </ul>
                </menu>

			</div>
			<div class="clear"></div>
		</div>

		<section class="main-single container">
			
			<div class="content">
				
				<div class="column column-large">

					<header>
						<h2>Preencha o Formulário</h2>
						<p>Ficou com alguma dúvida sobre nossos serviços?</p>
						<p><strong>Preencha o formulário e entraremos em contato.</strong></p>
					</header>

					<form action="" name="Formcontato" method="POST" id="Formcontato" onsubmit="return false;">
						
						<ul>
							<li>
								<label>Nome</label>
								<input type="text"  name="Nome" id="Nome" placeholder="Digite seu nome...">
							</li>

							<li class="column column-large">
								<label>Telefone</label>
								<input type="tel"  name="Telefone" id="Telefone" placeholder="(00) 0000-0000">
							</li>

							<li class="column column-large last">
								<label>E-mail</label>
								<input type="email"  name="Email" id="Email" placeholder="Digite seu e-mail...">
							</li>

							<li>
								<label>Mensagem</label>
								<textarea name="Mensagem" id="Mensagem" placeholder="Digite sua mensagem..." rows="10"></textarea>
							</li>

							<li>
								<p class="message message-error fl-left" style="display:none">Por favor, preencha todos os campos!</p>
								<button class="btn btn-form fl-right" id="EnviaForm">Enviar Mensagem</button>
							</li>

						</ul>

					</form>

				</div>

				<div class="column column-large last">

					<header>
						<h2>Confira nossa localização</h2>

						<address itemscope itemtype="http://schema.org/PostalAddress">
							<p itemprop="streetAddress">Rua Apeninos, 429 - Conj, 1208 - Aclimação</p>
							<p><span itemprop="addressLocality">São Paulo</span>/<span itemprop="addressRegion">SP</span> - <span itemprop="postalCode">Cep: 01533-000</span></p>
						</address>

						<div id="map-address"></div>

					</header>
				
				</div>

			</div>

			<div class="clear"></div>
		</section>

		<section class="main-call-video container">
			
			<div class="content">
				<div class="fl-right">
					<p>O que está esperando? <strong>Faça seu divórcio</strong></p>
					<a class="btn btn-sign-in" href="">Cadastre agora mesmo</a>
					<ul class="select-type">
						<li><a href="">Divórcio Consensual em Cartório (Extrajudicial)</a></li>
						<li><a href="">Divórcio Consensual Judicial</a></li>
					</ul>
				</div>
			</div>

			<div class="clear"></div>
		</section>
	</main>

	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbPwLXc8oADQl56SYbQJJTsUFuuMRcGOM&callback=initMap"></script>

<?php
//$this->load->helper('Funcoes');
	/*
	$value = array('id' => '1',
    'firstname' => 'Rodrigo',
    'lastname' => 'Santos',
    'email' => 'teste@teste.com'
        ) ;
	criarCookie("CLD24hr", json_encode($value), "86500");*/
	//$obj = json_decode(getCookie("CLD24hr"));
	//print $obj->{'lastname'}; // 12345
?>
