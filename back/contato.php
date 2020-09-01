<?php require('inc/main-header.php'); ?>
	
	<aside class="main-single-header container">

		<div class="content">
			<div class="column column-large">
				<i class="fl-left icon icon-call-center-inverse"></i>
				<p>Atendimento rápido, preço justo, orientação de  <br/> <strong>advogados especialistas no assunto.</strong></p>
			</div>
		
			<div class="column column-large last">
				<ul>
					<li><i class="icon icon-tel"></i></li>
					<li><small>11.</small> 3271-3389</li>
					<li>9 8520-5954</li>
				</ul>
			</div>
		</div>

		<div class="clear"></div>
	</aside>

	<main>
		<div class="main-breadcrumb container">
			<div class="content">
				
				<menu>
					<ul class="main-breadcrumb">
						<li><a href="">home</a></li>
						<li><a class="active" href="">contato</a></li>
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

					<form action="" name="" method="POST">
						
						<ul>
							<li>
								<label>Nome</label>
								<input type="text"  name="" placeholder="Digite seu nome...">
							</li>

							<li class="column column-large">
								<label>Telefone</label>
								<input type="tel"  name="" placeholder="(00) 0000-0000">
							</li>

							<li class="column column-large last">
								<label>E-mail</label>
								<input type="email"  name="" placeholder="Digite seu e-mail...">
							</li>

							<li>
								<label>Mensagem</label>
								<textarea name="" placeholder="Digite sua mensagem..." rows="10"></textarea>
							</li>

							<li>
								<p class="message message-error fl-left">Por favor, preencha todos os campos!</p>
								<button class="btn btn-form fl-right">Enviar Mensagem</button>
							</li>

						</ul>

					</form>

				</div>

				<div class="column column-large last">

					<header>
						<h2>Confira nossa localização</h2>

						<address>
							<p>Rua Apeninos, 429 - Conj, 1208 - Aclimação</p>
							<p>São Paulo/SP - Cep: 01533-000</p>
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

	<script> 
        function initMap(){

            var latitude  = -23.571316;
            var longitude = -46.638761;
            var marker = 'images/map-marker.png';

            var map = new google.maps.Map(document.getElementById('map-address'), {
                center: {lat: latitude, lng: longitude},
                scrollwheel: false,
                zoom: 17,
                styles: [
	                {
	                	stylers: [
	                		{ saturation: -80 },
	                		{ lightness: -5 }
	                	]
	                },
	                {
	                	featureType: 'road',
	                	elementType: 'geometry',
	                	stylers: [
	                		{ lightness: 100 }
	                	]
	                },
	                {
	                	featureType: 'transit',
	                	elementType: 'geometry',
	                	stylers: [
	                		{ visilibity: 'off' }
	                	]
	                },
	                {
	                	featureType: 'transit',
	                	elementType: 'labels',
	                	stylers: [
	                		{ visibility: 'off' }
	                  	]
	                },
	                {
	                	featureType: "poi.business",
					    elementType: "labels",
					    stylers: [
					      { visibility: "off" }
					    ]
	                },
	                {
	                	featureType: "poi.school",
					    elementType: "labels",
					    stylers: [
					      { visibility: "off" }
					    ]
	                }
                ]
            });

            var marker = new google.maps.Marker({
                map: map,
                position: {lat: latitude, lng: longitude},
                icon: marker
            });

            var contentString = '<address style="border-radius:20px;box-shadow:0 0 10px #666;" id="content">'+
				  '<div id="bodyContent">'+
				  '<p style="font-style:normal;line-height:1.4;font-size:14px;color:#909090;">Rua Apeninos, 429 - Conj, 1208 <br/>'
				  + 'Aclimação São Paulo/SP <br/>' +
				  'CEP: 01533-000 </p>'+
				  '</div>'+
				  '</address>';
			
			  var infowindow = new google.maps.InfoWindow({
				  content: contentString
			  });

			  google.maps.event.addListener(marker, 'click', function() {
				infowindow.open(map,marker);
			  });			  
			  var styledMapOptions = {
				name: 'Divórcio Online 24hs'
			  };


        }
    </script>


<?php require('inc/main-footer.php'); ?>