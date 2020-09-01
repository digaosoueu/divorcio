<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class adm_model extends My_Model {
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
	
	function DocCliente($dados){
      if(!empty($dados)){
		$this->table = 'documentos';
        $docs = $this->GetAllArray($dados);
        return $docs;
      } else {
        return "nada";
      }
    }
	
	function GetStatus(){
     
		$this->table = 'status';
        $status = $this->GetAllArray(array("1"=>"1"));
        return $status;
      
    }
	
	function PagamentoCliente($dados){
      if(!empty($dados)){
		$this->table = 'pagseguro';
        $docs = $this->GetByArray($dados);
        return $docs;
      } else {
        return "nada";
      }
    }
	
	function DadosClienteTodos(){
      
        $clientes = $this->GetAll();
        return $clientes;
      
    }
	
	function DeletarCliente($id){
      
        $clientes = $this->Excluir($id);
        return $clientes;
      
    }
	
	function DadosClienteFiltro($dados){
      
        $clientes = $this->GetAllArray($dados);
        return $clientes;
      
    }
	
	function alteraStatus($id, $pagamento){
     // $this->table = 'pagseguro';
	  return $this->AtualizarArray($id, $pagamento);
    }
	
	
	function FormInserirCliente($form){
      //$this->table = 'form_extrajudicial';
	  return $this->Inserir($form);
    }
	
	function FormAtualizaCliente($id, $form){
      //$this->table = 'form_extrajudicial';
	  return $this->Atualizar($id, $form);
    }
	
	function LoginUsuario($login, $senha){
		$this->table = 'usuarios';
        $dados = $this->GetByArray(array("usuario" => $login, "senha" => $senha));
		//var_dump($dados);
		if(!empty($dados)){
			$this->load->helper('Funcoes');
			//foreach($dados as $row){				
			
				$value = array('id' => $dados["id"],
				'usuario' => $dados["usuario"]);
				
			//}
			criarCookie("US24hr", json_encode($value), "86500");
			return "sucesso";
		}
		else
		{
			return "Usuario não encontrado";
		}
		// Carrega a view passando os dados do registro
		//$this->load->view('minha-conta',$dados);
    }
	
	
}
?>