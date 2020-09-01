$(function(){

	if($('.cpf-mask').length > 0 ){
		$('.cpf-mask').mask('000.000.00-00');
	}

	if($('.tel-mask').length > 0 ){
		$('.tel-mask').mask('(00) 0000-0000');

	}

	$('.btn-sign-in').on('click', function(event){
		event.preventDefault();
		$('.select-type').fadeToggle();
	});

	$('input[name="has_children"]').on('change', function(){
		var has_children = $(this).val();
		if(has_children == 'true' ){
			$('.obs-form').fadeIn(500).fadeOut(500).fadeIn(500).fadeOut(500).fadeIn(500);
			$('.extrajudicial-form').slideUp(500);
		}else{
			$('.obs-form').fadeOut(500);
			$('.extrajudicial-form').slideDown(500);
		}
	});

	$('.main-accordion').on('click', '.accordion-control', function(){
		$('.accordion-control').next('.accordion-panel').slideUp();
		$(this).toggleClass('active').next('.accordion-panel').not(':animated').slideToggle();
	});

	$('.main-login').on('focus','input[type="password"]', function(){

		$(this).val('');

	}).on('blur', 'input[type="password"]', function(){

		$(this).val('exemplo');

	});
});

function validaFormExtrajudicial(){
	var validaFormExtrajudicial = $('#formExtrajudicialCad').validate({
		rules: {

			'nome_conjuge_1': 'required',
			'telefone_conjuge_1': 'required',
			'profissao_conjuge_1': 'required',
			'rg_conjuge_1': 'required',
			'cpf_conjuge_1': 'required',

			'nome_conjuge_2': 'required',
			'telefone_conjuge_2': 'required',
			'profissao_conjuge_2': 'required',
			'rg_conjuge_2': 'required',
			'cpf_conjuge_2': 'required',

			'dia_casamento' : 'required',
			'mes_casamento' : 'required',
			'ano_casamento' : 'required'
		},

		messages: {

			'nome_conjuge_1': 'Preencha seu nome!',
			'telefone_conjuge_1': 'Preencha seu telefone!',
			'profissao_conjuge_1': 'Preencha sua profissão',
			'rg_conjuge_1': 'Preencha seu número de RG',
			'cpf_conjuge_1': 'Preencha seu número de CPF',

			'nome_conjuge_2': 'Preencha seu nome!',
			'telefone_conjuge_2': 'Preencha seu telefone!',
			'profissao_conjuge_2': 'Preencha sua profissão',
			'rg_conjuge_2': 'Preencha seu número de RG',
			'cpf_conjuge_2': 'Preencha seu número de CPF',

			'dia_casamento' : 'Preencha a data do casamento!',
			'mes_casamento' : 'Preencha a data do casamento!',
			'ano_casamento' : 'Preencha a data do casamento!'

		}
	}).form();

	return validaFormExtrajudicial;
}

function validaFormJudicial(){
	var validaFormJudicial = $('#formJudicialCad').validate({
		rules: {

			'nome_conjuge_1': 'required',
			'telefone_conjuge_1': 'required',
			'profissao_conjuge_1': 'required',
			'rg_conjuge_1': 'required',
			'cpf_conjuge_1': 'required',

			'nome_conjuge_2': 'required',
			'telefone_conjuge_2': 'required',
			'profissao_conjuge_2': 'required',
			'rg_conjuge_2': 'required',
			'cpf_conjuge_2': 'required',

			'dia_casamento' : 'required',
			'mes_casamento' : 'required',
			'ano_casamento' : 'required'
		},

		messages: {

			'nome_conjuge_1': 'Preencha seu nome!',
			'telefone_conjuge_1': 'Preencha seu telefone!',
			'profissao_conjuge_1': 'Preencha sua profissão',
			'rg_conjuge_1': 'Preencha seu número de RG',
			'cpf_conjuge_1': 'Preencha seu número de CPF',

			'nome_conjuge_2': 'Preencha seu nome!',
			'telefone_conjuge_2': 'Preencha seu telefone!',
			'profissao_conjuge_2': 'Preencha sua profissão',
			'rg_conjuge_2': 'Preencha seu número de RG',
			'cpf_conjuge_2': 'Preencha seu número de CPF',

			'dia_casamento' : 'Preencha a data do casamento!',
			'mes_casamento' : 'Preencha a data do casamento!',
			'ano_casamento' : 'Preencha a data do casamento!'

		}
	}).form();

	return validaFormJudicial;
}

function validaLoginUsuario(){

	var validaLoginUsuario = $('#FormFormCad').validate({
		rules: {
			'nomeCad': 'required',
			'sobrenomeCad': 'required',
			'emailCad': {
				required: true,
				email: true
			},
			'cpfCad': 'required',
			'telefoneCad': 'required',
			'senhaCad': 'required',
			'senhaCadConfirm': 'required'
		},

		messages: {
			'nomeCad': 'Preencha seu nome!',
			'sobrenomeCad': 'Preencha seu sobrenome!',
			'emailCad': {
				required: 'Preencha seu e-mail!',
				email: 'Preencha um e-mail válido!'
			},
			'cpfCad': 'Preencha seu número de CPF!',
			'telefoneCad': 'Preencha seu telefone!',
			'senhaCad': 'Preencha uma senha!',
			'senhaCadConfirm': 'Confirme a senha!'
		}

	}).form();

	return validaLoginUsuario;
}

function validaFormularioContato(){
	
	var validaFormularioContato = $('#Formcontato').validate({
		
		rules: {
			'Nome' : 'required',
			'Telefone' : 'required',
			'Email': {
				required: true,
				email: true
			},
			'Mensagem': 'required'
		},

		messages: {
			'Nome': 'Preencha seu nome!',
			'Telefone': 'Preencha seu telefone!',
			'Email': {
				required: 'Preencha um e-mail!',
				email: 'Preencha um e-mail válido!'
			},
			'Mensagem': 'Preencha este campo!'

		}
	}).form();

	return validaFormularioContato;
}

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

            var contentString = '<address id="content">'+
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