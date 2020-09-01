 

 $(document).ready(function(){

 	
	$("#enviaMensagem").on('click', function(){
		
		enviaMensagem();
		
	});   
	
	$('#filtroClienteAE').change(function() {
	   var varURL = $("option:selected", this).val();
	   window.location.href='clientes?AE=' + varURL;
	});
	
	$("#btnExportExcel").click(function () {
		$("#sample_1").btechco_excelexport({
			containerid: "sample_1"
		   , datatype: $datatype.Table
		   , filename: 'clientes'
		});
	});


	
	/*$(".bootstrap-switch-id-checkCadAprovado, .bootstrap-switch-handle-off, .bootstrap-switch-handle-on").on('click', function(){
		console.log(this);
		var status = "CadAprovado";
		if($(".bootstrap-switch-on").length > 0){
			status = "CadReprovado";
		}
		alteraStatus(status);
	}); */
	
	if($("#ListaMsg").length > 0){
		getMensagem();
	}
	
});  
var urlBase = "http://divorcio-online24hs.com.br/";

function alteraStatus(){		
	
	var id = $("#id").val();
	var status = $("#Status").val();
	$.ajax({
		url: urlBase + 'admin_alteraStatus_' + status + '_' + id,
		type: 'GET',
		success: function(msg){
						
			
		}
	});	
	
}

function enviaMensagem(){	
	
	
	$("#enviaMensagem").attr("disabled", true);
	$("#enviaMensagem").html("...");
	$.ajax({
		url: urlBase + 'admin_enviaMensagem',
		type: 'POST',
		data: $("#formMensagem").serialize(),
		success: function(msg){
			
			$("#enviaMensagem").html("Enviar Mensagem");
			$("#enviaMensagem").attr("disabled", false);
			
			if(msg == 'sucesso'){
				
				$("#mensagem").val("");
				alert('Mensagem Enviada com sucesso');
				getMensagem();
			}
			else
			{
				
			}
			
			
		}
	});	
	
}

function getMensagem(){		
	
	var id = $("#id").val();
	$.ajax({
		url: urlBase + 'admin_getMensagem_' + id,
		type: 'GET',
		contentType: 'application/json; charset=utf-8',
        dataType: 'json',
		success: function(retorno){						
			
			var html = '<h4 class="block">Conversa</h4>';
			$.each(retorno, function (c, item) {
				//console.log(item.mensagem);
				var data1 = item.data.split(" ");
				var data2 = data1[0].split("-");
				var data = data2[2] + "/" + data2[1] + "/" + data2[0];
				if(item.admin_id > 0){
					html += '<div class="alert alert-warning" style="width:95%">' + item.mensagem + ' <strong style="float:right">' + data + '</strong></div>';
				}
				else
				{
					html += '<div class="alert alert-info" style="width:95%; margin-left:45px">' + item.mensagem + '  <strong style="float:right">' + data + '</strong></div>';
				}
				
			});
			$("#ListaMsg").html(html);
		}
	});
	
	
	
	
}


    
   
   
     