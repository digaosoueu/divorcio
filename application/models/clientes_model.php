<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Clientes_model extends My_Model {
    function __construct() {
        parent::__construct();
        $this->table = 'clientes';
    }
    /**
    
    *
    * @return array
    */
    function DadosCliente($cliente_id){
      if($cliente_id){
        $clientes = $this->GetById($cliente_id);
        return $clientes;
      } else {
        return "Cliente não encontrado";
      }
    }
	
	function DadosClienteFormPreenchido($id){
      if($id){
		  
		$cliente = $this->GetById($id);
		$tipo = "";
		if(!empty($cliente)){
			//echo $cliente["cliente_tipo_form"];
			//foreach($cliente as $row){
				$tipo = $cliente["cliente_tipo_form"];
			//}
		}		  
		 // echo $tipo . "ewq";
		if($tipo == "consensualJudicial")
			$this->table = 'form_consensualJudicial';
			
		if($tipo == "extraJudicial")
			$this->table = 'form_extrajudicial';
		
		if($tipo != ""){
			return $this->GetByArray(array("cliente_id" => $id, "ativo" => "1"));
		}
		
		        
       // return $form;
		
      } else {
        return "erro";
      }
    }
	
	function VerificaFormPreenchido($id){
      if($id){
		  
		$cliente = $this->GetById($id);
		$tipo = "";
		if(!empty($cliente)){
			//echo $cliente["cliente_tipo_form"];
			//foreach($cliente as $row){
				$tipo = $cliente["cliente_tipo_form"];
			//}
		}		  
		 // echo $tipo . "ewq";
		if($tipo == "consensualJudicial")
			$this->table = 'form_consensualJudicial';
			
		if($tipo == "extraJudicial")
			$this->table = 'form_extrajudicial';
		
		if($tipo != ""){
			$form2 = $this->GetByArray(array("cliente_id" => $id, "ativo" => "1"));
		}
		$this->table = 'clientes';
		if(!empty($form2)){
			//foreach($form as $row2){
				
				if($form2["nome_conjuge1"] == "" || is_null($form2["nome_conjuge1"])){ return "erro";}
				if($form2["profissao_conjuge1"] ==  "" || is_null($form2["profissao_conjuge1"])){ return "erro";}
				if($form2["endereco_conjuge1"] ==  "" || is_null($form2["endereco_conjuge1"])){ return "erro";}
				if($form2["rg_conjuge1"] ==  "" || is_null($form2["rg_conjuge1"])){ return "erro";}
				if($form2["cpf_conjuge1"] ==  "" || is_null($form2["cpf_conjuge1"])){ return "erro";}
				if($form2["nome_conjuge2"] ==  "" || is_null($form2["nome_conjuge2"])){ return "erro";}
				if($form2["profissao_conjuge2"] ==  "" || is_null($form2["profissao_conjuge2"])){ return "erro";}
				if($form2["endereco_conjuge2"] ==  "" || is_null($form2["endereco_conjuge2"])){ return "erro";}
				if($form2["rg_conjuge2"] ==  "" || is_null($form2["rg_conjuge2"])){ return "erro";}
				if($form2["cpf_conjuge2"] ==  "" || is_null($form2["cpf_conjuge2"])){ return "erro";}
				if($form2["data_casamento"] ==  "" || is_null($form2["data_casamento"])){ return "erro";}
				
			//}
		}	
		else
		{
			return "erro";
		}
        
       // return $form;
		
      } else {
        return "erro";
      }
    }
	
	function DadosFormJudicial($id){
      if($id){
		$this->table = 'form_consensualJudicial';
        $form = $this->GetByArray(array("cliente_id" => $id));
        return $form;
      } else {
        return "Cliente não encontrado";
      }
    }
	
	
	function DadosFormExtraJudicial($id){
      if($id){
		$this->table = 'form_extrajudicial';
        $form = $this->GetByArray(array("cliente_id" => $id, "ativo" => "1"));
        return $form;
      } else {
        return "Cliente não encontrado";
      }
    }
	
	function Login($login, $senha){
		
		if(is_null($login) || is_null($senha))
      	return false;
	
		$where = "(cliente_email='" .$login . "' OR REPLACE(REPLACE(cliente_cpf,'.',''),'-','') = '" . str_replace('-','',str_replace('.','',$login)) . "') AND cliente_senha='" .$senha . "'";
		//echo $where;
        $dados = $this->GetByArray($where);
		//var_dump($dados);
		if(!empty($dados)){
			$this->load->helper('Funcoes');
			//foreach($dados as $row){				
			
				$value = array('id' => $dados["id"],
				'nome' => $dados["cliente_nome"],
				'sobrenome' => $dados["cliente_sobrenome"],
				'email' => $dados["cliente_email"],
				'tipo_form' => $dados["cliente_tipo_form"]
					) ;
				
			//}
			criarCookie("CLD24hr", json_encode($value), "86500");
			return "sucesso";
		}
		else
		{
			return "Usuário ou senha incorretos!";
		}
		// Carrega a view passando os dados do registro
		//$this->load->view('minha-conta',$dados);
    }
	
	function FormExtraJudicial($formExtraJudicial){
      $this->table = 'form_extrajudicial';
	  return $this->Inserir($formExtraJudicial);
    }
	
	function FormExtraJudicialAtualizar($form_id, $formJudicial){
      $this->table = 'form_extrajudicial';
	  return $this->Atualizar($form_id, $formJudicial);
    }
	
	function FormJudicial($formJudicial){
      $this->table = 'form_consensualJudicial';
	  return $this->Inserir($formJudicial);
    }
	
	function FormJudicialAtualizar($form_id, $formJudicial){
      $this->table = 'form_consensualJudicial';
	  return $this->Atualizar($form_id, $formJudicial);
    }
	
	function VerificaDoc($id, $pasta, $file, $label){
      if($id){
		  
		$this->table = 'documentos';
        $form = $this->GetByArray(array("cliente_id" => $id, 'tipo' => $pasta));
		$ifDoc = 0;
		$doc = array('cliente_id' => $id, 'tipo' => $pasta, 'nome' => $file, 'label' => $label);
		if(!empty($form)){
			$ifDoc = $form["id"];
		}
		
		
		if($ifDoc <= 0 || $pasta == "OutDocs"){
			$this->Inserir($doc);
		}
		else
		{
			$this->Atualizar($ifDoc, $doc);
		}
		
        return "ok";
      } else {
        return "Cliente não encontrado";
      }
    }
	
	function VerificaDocEnviado($id){
		
		if($id){
			$this->table = 'documentos';
			$form = $this->GetAllArray(array("cliente_id" => $id));
			return $form;
		  } else {
			return "Documento não encontrado";
		  }
		
	}
	
	function InserirMensagem($form){
      $this->table = 'mensagens';
	  return $this->Inserir($form);
    }
	
	function getMensagensCliente($id){
		
		if($id){
			$this->table = 'mensagens';
			$form = $this->GetAllArray(array("cliente_id" => $id), "data", "desc");
			return $form;
		  } else {
			return "Cliente não encontrado";
		  }
		
	}
	
	function GetStatus(){
     
		$this->table = 'status';
        $status = $this->GetAllArray(array("1"=>"1"));
        return $status;
      
    }
	
	function getDocumentosCliente($id){
		
		if($id){
			$this->table = 'documentos';
			$form = $this->GetAllArray(array("cliente_id" => $id), "tipo", "desc");
			$doc = array();
			if(!empty($form)){
				foreach ($form as $dc) {
					
					$tipo = $dc['tipo']; 
					$title = $tipo;
                    if($tipo == "RG1"){$title = "RG Cônjuge 1";}
					if($tipo == "RG2"){$title = "RG Cônjuge 2";}
					if($tipo == "CPF1"){$title = "CPF Cônjuge 1";}
					if($tipo == "CPF2"){$title = "CPF Cônjuge 2";}
					
					if($tipo == "CompEnd"){$title = "Comprovande de Endereço Cônjuge";}
					
					if($tipo == "CertCasam"){$title = "Certidão de Casamento";}
					
					if($tipo == "Procuracao"){$title = "Procuração";}
					
					if($tipo == "Contrato"){$title = "Contrato";}
					
					if($tipo == "OutDocs"){$title = $dc['label'];}
					
					$doc[] = array('title'=>$title);
					 
					
				}
			}
			
			return $doc;
		  } else {
			return "nenhum documento encontrado";
		  }
		
	}
	
	
}
?>