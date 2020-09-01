 $(function(){


 	$(window).load(function(){
 		$('.main-loading .clock-loading').fadeOut('400');
 		$('.main-loading').fadeOut('800');
 	});

 	$(document).ready(function(){
 		$('select').niceSelect();
 	});

	if($('.cpf-mask').length > 0 ){
		$('.cpf-mask').mask('000.000.000-00');
	}

	if($('.tel-mask').length > 0 ){
		$('.tel-mask').mask('(00) 00000-0000');

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

	$('.main-chat').on('click', '.chat-title', function(){
		$('.main-chat').toggleClass('is-open');
	});


	$('.forget-password').on('click', function(event){
		event.preventDefault();
		$('.modal-dialog-password').addClass('active');
	});

	$('.modal-close').on('click', function(event){
		event.preventDefault();
		$('.modal-dialog').removeClass('active');
	});

	$('#inputArquivo').change(function(ev) {
		
		if($("#tipoArquivo").val() == ""){
			alert('Por favor, selecione o tipo de arquivo');
			$("#inputArquivo").val("");
		}
		else
		{
			if($("#tipoArquivo").val() == "OutDocs" && $("#nomeArquivoOutros").val() == ""){
				alert('Por favor, preencha o campo identificação do arquivo');	
				$("#inputArquivo").val("");
			}
			else
			{
				UploadDoc("formArquivos");
				$('#formArquivos').submit();
			}
			
			
		}
		
		//alert('--');
	});
	
	
	$('#inputFileRg').change(function(ev) {
		
		UploadDoc("formUploadRg");
		$('#formUploadRg').submit();
		//alert('--');
	});
	
	$('#inputFileCpf').change(function(ev) {
		UploadDoc("formUploadCpf");
		$('#formUploadCpf').submit();
	});
	
	$('#inputFileCompEnd').change(function(ev) {
		
		UploadDoc("formUploadCompEnd");
		$('#formUploadCompEnd').submit();
    	
	});
	
	$('#inputFileCertCasam').change(function(ev) {
		
		UploadDoc("formUploadCertCasam");
		$('#formUploadCertCasam').submit();
    	
	});
	
	$('#inputFileOutDocs').change(function(ev) {
		
		UploadDoc("formUploadOutDocs");
		$('#formUploadOutDocs').submit();
    	
	});
	
	$("#tipoArquivo").change(function(){
		
		$("#nomeArquivoOutros").val("");
		$("#mostraIdentificacao").hide();	
		
    	if($("#tipoArquivo").val() == "OutDocs"){
			$("#mostraIdentificacao").show();
		}
		
	});
	
});

function UploadDoc(form){
	
	$("#loadformArquivo").hide();
	var tipoArquivo = $("#tipoArquivo").val();
	$('#' + form).ajaxForm({
		url: 'UploadAjax/fazUploadAjax/' + tipoArquivo,
		dataType: 'json',
		beforeSubmit: function () {
			/*$("#progressBar").removeClass('progress-bar-success progress-bar-danger');
			$(".help-block").fadeOut('slow', function() {
				$(".progress").fadeIn('slow');
			});*/
			$("#loadformArquivo").show();
		},
		/*uploadProgress: function (event, position, total, percentComplete) {
			$("#progressBar").css('width', percentComplete+'%');
			$("#progressBar").html(percentComplete+'%');
		},*/
		complete: function(response) {
			
			
				
			if (response.responseText == "ok") {
				getDocumentos();
				/*var link_img = response.responseJSON.file_name;
				$("#progressBar").addClass('progress-bar-success').html('Arquivo enviado com sucesso! <a href="'+link_img+'">Click para ver a Imagem</a>');*/
				//$("." + form).addClass("checked");
				$("#loadformArquivo").hide();   
			 
			}else{
				alert("ocorreu algum problema, por favor, tente novamente");
			}
				
				
			
			$('#' + form).resetForm();
		}
	}); 
	
}

function validaFormRecuperaSenha(){
	var validaFormRecuperaSenha = $('#formRecuperaSenha').validate({
		rules: {
			'email_recuperacao': {
				required: true,
				email: true
			}
		},

		messages: {
			'email_recuperacao': {
				required: 'Preencha o e-mail de recuperação!',
				email: 'Preencha um e-mail válido!'
			}
		}
	}).form();

	return validaFormRecuperaSenha;
}

function validaFormExtrajudicial(){
	var validaFormExtrajudicial = $('#formExtrajudicialCad').validate({
		rules: {

			'nome_conjuge_1': 'required',
			'telefone_conjuge_1': 'required',
			'profissao_conjuge_1': 'required',
			'rg_conjuge_1': 'required',
			'cpf_conjuge_1': 'required',
			'profissao_conjuge_1': 'required',
			'endereco_conjuge_1': 'required',
			'bairro_conjuge_1': 'required',
			'numero_conjuge_1': 'required',
			'cep_conjuge_1': 'required',
			'cidade_conjuge_1': 'required',
			'estado_conjuge_1': 'required',
			'nome_conjuge_2': 'required',
			'telefone_conjuge_2': 'required',
			'profissao_conjuge_2': 'required',
			'rg_conjuge_2': 'required',
			'cpf_conjuge_2': 'required',
			'profissao_conjuge_2': 'required',
			'endereco_conjuge_2': 'required',
			'bairro_conjuge_2': 'required',
			'numero_conjuge_2': 'required',
			'cep_conjuge_2': 'required',
			'cidade_conjuge_2': 'required',
			'estado_conjuge_2': { valueNotEquals: "" },

			'dia_casamento' : {
				required: true,
				number: true
			},
			'mes_casamento' : {
				required: true,
				number: true
			},
			'ano_casamento' : {
				required: true,
				number: true
			}
		},

		messages: {

			'nome_conjuge_1': 'Preencha seu nome',
			'telefone_conjuge_1': 'Preencha seu telefone',
			'profissao_conjuge_1': 'Preencha sua profissão',
			'rg_conjuge_1': 'Preencha seu RG',
			'cpf_conjuge_1': 'Preencha seu CPF',
			'profissao_conjuge_1': 'Preencha sua profissão',
			'endereco_conjuge_1': 'Preencha seu endereço',
			'bairro_conjuge_1': 'Preencha seu bairro',
			'numero_conjuge_1': 'Preencha o N°',
			'cep_conjuge_1': 'Preencha seu endereço',
			'cidade_conjuge_1': 'Preencha sua cidade',
			'estado_conjuge_1': 'Preencha seu estado',
			'nome_conjuge_2': 'Preencha seu nome!',
			'telefone_conjuge_2': 'Preencha seu telefone!',
			'profissao_conjuge_2': 'Preencha sua profissão',
			'rg_conjuge_2': 'Preencha seu RG',
			'cpf_conjuge_2': 'Preencha seu CPF',
			'profissao_conjuge_2': 'Preencha sua profissão',
			'endereco_conjuge_2': 'Preencha seu endereço',
			'bairro_conjuge_2': 'Preencha seu bairro',
			'numero_conjuge_2': 'Preencha o N°',
			'cep_conjuge_2': 'Preencha seu endereço',
			'cidade_conjuge_2': 'Preencha sua cidade',
			'estado_conjuge_2': 'Preencha seu estado',

			'dia_casamento' : {
				required: 'Preencha a data do casamento!',
				number: 'Apenas números são aceitos!'
			},

			'mes_casamento' : {
				required: 'Preencha a data do casamento!',
				number: 'Apenas números são aceitos!'
			},

			'ano_casamento' : {
				required: 'Preencha a data do casamento!',
				number: 'Apenas números são aceitos!'
			}

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
			'profissao_conjuge_1': 'required',
			'endereco_conjuge_1': 'required',
			'bairro_conjuge_1': 'required',
			'numero_conjuge_1': 'required',
			'cep_conjuge_1': 'required',
			'cidade_conjuge_1': 'required',
			'estado_conjuge_1': 'required',
			'nome_conjuge_2': 'required',
			'telefone_conjuge_2': 'required',
			'profissao_conjuge_2': 'required',
			'rg_conjuge_2': 'required',
			'cpf_conjuge_2': 'required',
			'profissao_conjuge_2': 'required',
			'endereco_conjuge_2': 'required',
			'bairro_conjuge_2': 'required',
			'numero_conjuge_2': 'required',
			'cep_conjuge_2': 'required',
			'cidade_conjuge_2': 'required',
			'estado_conjuge_2': 'required',

			'dia_casamento' : {
				required: true,
				number: true
			},
			'mes_casamento' : {
				required: true,
				number: true
			},
			'ano_casamento' : {
				required: true,
				number: true
			}
		},

		messages: {

			'nome_conjuge_1': 'Preencha seu nome',
			'telefone_conjuge_1': 'Preencha seu telefone',
			'profissao_conjuge_1': 'Preencha sua profissão',
			'rg_conjuge_1': 'Preencha seu RG',
			'cpf_conjuge_1': 'Preencha seu CPF',
			'profissao_conjuge_1': 'Preencha sua profissão',
			'endereco_conjuge_1': 'Preencha seu endereço',
			'bairro_conjuge_1': 'Preencha seu bairro',
			'numero_conjuge_1': 'Preencha o N°',
			'cep_conjuge_1': 'Preencha seu endereço',
			'cidade_conjuge_1': 'Preencha sua cidade',
			'estado_conjuge_1': 'Preencha seu estado',
			'nome_conjuge_2': 'Preencha seu nome!',
			'telefone_conjuge_2': 'Preencha seu telefone!',
			'profissao_conjuge_2': 'Preencha sua profissão',
			'rg_conjuge_2': 'Preencha seu RG',
			'cpf_conjuge_2': 'Preencha seu CPF',
			'profissao_conjuge_2': 'Preencha sua profissão',
			'endereco_conjuge_2': 'Preencha seu endereço',
			'bairro_conjuge_2': 'Preencha seu bairro',
			'numero_conjuge_2': 'Preencha o N°',
			'cep_conjuge_2': 'Preencha seu endereço',
			'cidade_conjuge_2': 'Preencha sua cidade',
			'estado_conjuge_2': 'Preencha seu estado',

			'dia_casamento' : {
				required: 'Preencha a data do casamento!',
				number: 'Apenas números são aceitos!'
			},

			'mes_casamento' : {
				required: 'Preencha a data do casamento!',
				number: 'Apenas números são aceitos!'
			},

			'ano_casamento' : {
				required: 'Preencha a data do casamento!',
				number: 'Apenas números são aceitos!'
			}

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
			'cpfCad': 'Preencha seu CPF!',
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

 $(document).ready(function(){

 	
	$("#enviaMensagem").on('click', function(){
		
		enviaMensagem();
		
	});
	
   
	$("#EnviaForm").on('click', function(){
		if(validaFormularioContato()){
			enviarContato();
		}
	});

	$('#enviaFormExtrajudicial').on('click', function(){
		
		if(validaFormExtrajudicial()){
			cadFormExtrajudicial();
		}
	});


	$('#enviaFormJudicial').on('click', function(){
		if(validaFormJudicial()){
			cadFormJudicial();
		}
		
	});
	
	$("#EnviaFormCad").on('click', function(){
		if(validaLoginUsuario()){
			cadCliente();
		}
	});
	
	$("#Btn_acessar").on('click', function(){
		loginCliente();
	});
	
	$("input[name='EmailCpf']").on('click', function(){
		if($(this).val() == "email"){
			$('#emailLogin').unmask();
			document.FormLogin.emailLogin.removeAttribute('maxLength');		
		}
		else if($(this).val() == "cpf"){
			
			$('#emailLogin').mask('000.000.000-00');			
		}
	});

	$("#EnviaRecuperaSenha").on('click', function(){
		if(validaFormRecuperaSenha()){
			loginEsqueciSenha();
		}
	});
	if($("#ListaMsg").length > 0){
		getMensagem();
	}
	
	if($("#Listadocs").length > 0){
		getDocumentos();
	}
	
	
	
});  
var urlBase = "http://divorcio-online24hs.com.br/";

function enviaMensagem(){	
	
	
	$("#enviaMensagem").attr("disabled", true);
	$("#enviaMensagem").html("...");
	$.ajax({
		url: urlBase + 'cliente_enviaMensagem',
		type: 'POST',
		data: $("#formMensagem").serialize(),
		success: function(msg){
			
			$("#enviaMensagem").html("Enviar Mensagem");
			$("#enviaMensagem").attr("disabled", false);
			
			if(msg == 'sucesso'){
				
				$("#MensagemCliente").val("");
				//alert('Mensagem Enviada com sucesso');
				getMensagem();
			}
			else
			{
				alert(msg);
			}
			
			
		}
	});	
	
}

function getDocumentos(){		
	
	var cod = $("#cod").val();
	$.ajax({
		url: urlBase + 'cliente_getDocumentos_' + cod,
		type: 'GET',
		contentType: 'application/json; charset=utf-8',
        dataType: 'json',
		success: function(retorno){						
			
			var html = '';
			$.each(retorno, function (c, item) {
				//console.log(item.title);
				html += '<li>' + item.title + '</li>';
				
			});
			$("#Listadocs").html(html);
		}
	});
}

function getMensagem(){		
	
	var cod = $("#cod").val();
	$.ajax({
		url: urlBase + 'cliente_getMensagem_' + cod,
		type: 'GET',
		contentType: 'application/json; charset=utf-8',
        dataType: 'json',
		success: function(retorno){						
			
			var html = '';
			$.each(retorno, function (c, item) {
				//console.log(item.mensagem);
				var data1 = item.data.split(" ");
				var data2 = data1[0].split("-");
				var data = data2[2] + "/" + data2[1] + "/" + data2[0];
				if(item.admin_id > 0){
					html += '<p class="my-messages">' + item.mensagem + '</p>';
				}
				else
				{
					html += '<p class="client-messages">' + item.mensagem + '</p>';
				}
				
			});
			$("#ListaMsg").html(html);
		}
	});
}



function cadFormExtrajudicial(){	
	
	$(".message-error").hide();
	
	$("#enviaFormExtrajudicial").html("<img width='30' height='30' src='" + urlBase + "images/loading.gif'>");
	$("#enviaFormExtrajudicial").attr("disabled", true);
	$.ajax({
		url: urlBase + 'cliente_formExtrajudicial',
		type: 'POST',
		data: $("#formExtrajudicialCad").serialize(),
		success: function(msg){
			
			$("#enviaFormExtrajudicial").html("Enviar Cadastro");
			$("#enviaFormExtrajudicial").attr("disabled", false);
			
			if(msg == 'sucesso'){
				
				if($("#form_id").val() == ""){
					
					alert('Cadastro efetuado com sucesso');
					window.location.href = urlBase + 'minha-conta';
					
				}else if($("#form_idadm").val() == "adm"){
					
					alert('Cadastro atualizado com sucesso');
					
				}
				else
				{
					alert('Cadastro atualizado com sucesso');
					window.location.href = urlBase + 'minha-conta';
				}
				
			}else{
				$(".message-error").show();	
				$(".message-error").html(msg);
			}
			
			
		}
	});
	
	
	
	
}

function cadFormJudicial(){	
	
	$(".message-error").hide();
	
	$("#enviaFormJudicial").html("<img width='30' height='30' src='" + urlBase + "images/loading.gif'>");
	$("#enviaFormJudicial").attr("disabled", true);
	$.ajax({
		url: urlBase + 'cliente_formJudicial',
		type: 'POST',
		data: $("#formJudicialCad").serialize(),
		success: function(msg){
			
			$("#enviaFormJudicial").html("Enviar Cadastro");
			$("#enviaFormJudicial").attr("disabled", false);
			
			if(msg == 'sucesso'){
				
				if($("#form_id").val() == ""){
					/*jQuery.fn.reset = function(){
						$(this).each(function(){ this.reset();});
					}
					$("#formJudicialCad").reset();*/
					alert('Cadastro efetuado com sucesso');
					window.location.href = urlBase + 'minha-conta';
					
				}else if($("#form_idadm").val() == "adm"){
					
					alert('Cadastro atualizado com sucesso');
					
				}else{
					alert('Cadastro atualizado com sucesso');
					window.location.href = urlBase + 'minha-conta';
				}
				
			}else{
				$(".message-error").show();	
				$(".message-error").html(msg);
			}	
		}
	});	
}

function enviarContato(){
	
	$(".message-error").hide();
	
	if($("#Email").val() == "" || $("#Nome").val() == ""){
		$(".message-error").show();
	}else{
		$("#EnviaForm").html("<img width='30' height='30' src='images/loading.gif'>");
		$("#EnviaForm").attr("disabled", true);

		$.ajax({
			url: urlBase + 'enviaemail/contato',
			type: 'POST',
			data: $("#Formcontato").serialize(),
			success: function(msg){
				
				if(msg == 'sucesso'){
					
					jQuery.fn.reset = function(){
						$(this).each(function(){ this.reset();});
					}
					$("#Formcontato").reset();
					$("#EnviaForm").html("Mensagem Enviada com sucesso!");
					window.setTimeout(function() {
						$("#EnviaForm").html("Enviar Mensagem");
					}, 3000);
					
				}else{
					$(".message-error").show();	
					$(".message-error").html(msg);
					$("#EnviaForm").html("Enviar Mensagem");
				}
				
				$("#EnviaForm").attr("disabled", false);
			}
		});		
	}	
}

function cadCliente(){	
	
	$(".errorCadastro").hide();
	if($("#emailCad").val() == "" || $("#nomeCad").val() == ""){
		$(".message-error").show();
	}else{
		$("#EnviaFormCad").html("<img width='30' height='30' src='" + urlBase + "images/loading.gif'>");
		$("#EnviaFormCad").attr("disabled", true);
		$.ajax({
			url: urlBase + 'cliente_salvarCliente',
			type: 'POST',
			data: $("#FormFormCad").serialize(),
			success: function(msg){
				
				$("#EnviaFormCad").html("Cadastrar");
				$("#EnviaFormCad").attr("disabled", false);
				
				if(msg == 'sucesso'){
					
					
					jQuery.fn.reset = function(){
						$(this).each(function(){ this.reset();});
					}
					$("#FormFormCad").reset();
					alert("Cadastro efetualdo com sucesso");
					window.location.href = location.href;
				}
				else
				{
					$(".errorCadastro").show();	
					$(".errorCadastro").html(msg);
				}				
			}
		});
	}
}

function loginCliente(){	
	
	$(".errorlogin").hide();
	if($("#senhaLogin").val() == "" || $("#emailLogin").val() == ""){
		$(".errorlogin").show();
	}else{

		$("#Btn_acessar").html("<img width='30' height='30' src='images/loading.gif'>");
		$("#Btn_acessar").attr("disabled", true);
		$.ajax({
			url: urlBase + 'cliente_loginCliente',
			type: 'POST',
			data: $("#FormLogin").serialize(),
			success: function(msg){
				
				$("#Btn_acessar").html("Acessar");
				$("#Btn_acessar").attr("disabled", false);
				
				if(msg == 'sucesso'){
					
					
					jQuery.fn.reset = function(){
						$(this).each(function(){ this.reset();});
					}
					$("#FormLogin").reset();
					window.location.href = urlBase + 'minha-conta';
					
				}
				else
				{
					$(".errorlogin").show();	
					$(".errorlogin").html(msg);
				}
			}
		});
	}	
}

function loginEsqueciSenha(){	
	
	$(".msgEsqueciSenha").hide();
	
	$("#EnviaRecuperaSenha").html("<img width='30' height='30' src='images/loading.gif'>");
	$("#EnviaRecuperaSenha").attr("disabled", true);
	$.ajax({
		url: urlBase + 'cliente_EsqueciSenha',
		type: 'POST',
		data: $("#formRecuperaSenha").serialize(),
		success: function(msg){
			
			$("#EnviaRecuperaSenha").html("Enviar");
			$("#EnviaRecuperaSenha").attr("disabled", false);
			$(".msgEsqueciSenha").show();	
			if(msg == 'sucesso'){
				
				
				jQuery.fn.reset = function(){
					$(this).each(function(){ this.reset();});
				}
				$("#formRecuperaSenha").reset();				
				$(".msgEsqueciSenha").html("<strong>Seus dados serão enviados para o email informado!</strong>");
				
			}
			else
			{				
				$(".msgEsqueciSenha").html(msg);
			}
			
			
		}
	});	
}

function BtnPagamentoPagSeguro(){
	
	var cod = "1";
	if($("#produto_id").val().length > 0 ){cod = $("#produto_id").val();}
	
   // $("#processandopagamento").modal('toggle');

	$.ajax({
		type: "POST",
		url: urlBase + "PagSeguro/pagamentoPagSeguro/" + cod,
		contentType: "Content-Type; application/x-www-form-urlencoded; charset=utf-8",
		success: function(response) {
		  
			//console.log(response);

			if(response.indexOf("senderCPF invalid") > 0){
				alert('CPF Inválido, favor verificar o cadastro do seu cpf.')
			}
			else
			{					
				
				PagSeguroLightbox(response);

				//$("#processandopagamento").modal('hide');
			}
							
		},
		failure: function(msg) {
			alert(msg);
		}
	});
}

    
   
   
     