<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	
	function __construct() {
        parent::__construct();
        $this->load->model( "adm_model", "adm" );
		$this->load->helper('Funcoes');
		$US = json_decode(getCookie("US24hr"));
		if(is_null($US)){
			redirect("jcandidoadm/login");
		}
		
    }
	
	public function index()
	{
		redirect("jcandidoadm/clientes");
		/*$data['title'] = "admin";
		$this->load->view('incadm/header', $data);
		$this->load->view('jcandidoadm/index');
		$this->load->view('incadm/footer', $data);*/
	}
	
	public function getMensagensCliente($cliente_id)
	{
		
		$dados['mensagem'] = $this->clientes_model->getMensagensCliente($cliente_id);	
		echo json_encode($dados['mensagem']);		
		
	}
	
	public function MensagensCliente()
	{		
			
		$cliente_id = $this->input->post("id");
		$mensagem = $this->input->post("mensagem");
		$clientes = array('mensagem' => $mensagem, 'cliente_id' => $cliente_id, 'admin_id' => '1');
		// Insere os dados no banco recuperando o status dessa operação
		$status = $this->clientes_model->InserirMensagem($clientes);
		if($status <= 0){
				//$this->session->set_flashdata('error', 'Não foi possível inserir o contato.');
				echo 'Não foi possível enviar Mensagem.';
		}else{
			//$this->session->set_flashdata('success', 'Contato inserido com sucesso.');
			// Redireciona o usuário para a home
			//redirect();
			echo 'sucesso';
			
		}
		
	}
	
	public function alteraStatus($status, $cliente_id)
	{	
		
		
		//$status = "Aguardando Pagamento";
		//if($statusPg == "Sim"){$status = "Pago";}
		
		$pagamento = array('cliente_status' => $status);
		$cliente = array('id' => $cliente_id);
		
		$statusRet = $this->adm->alteraStatus($cliente, $pagamento);
		
		if($statusRet <= 0){
				//$this->session->set_flashdata('error', 'Não foi possível inserir o contato.');
				echo 'Não foi possível enviar Mensagem.';
		}else{
			//$this->session->set_flashdata('success', 'Contato inserido com sucesso.');
			// Redireciona o usuário para a home
			//redirect();
			echo 'sucesso';
			
		}
		
	}
	
	public function FormCliente($id, $form)
	{
		if($form == "consensualJudicial"){
			redirect("form-consensual-judicial?id=" . $id . "&tipoForm=adm");
		}
		
		if($form == "extraJudicial"){
			redirect("form-extrajudicial?id=" . $id . "&tipoForm=adm");
		}
	}
	
	public function downloadDocs($id, $doc)
	{
		$data['id'] = $id;
		$data['aquivoNome'] = $doc;
		$this->load->view('jcandidoadm/downloadDocs', $data);
	}
	
	public function deletarCliente($id)
	{
		if($id != "" && $id != "0"){
			$status = $this->adm->DeletarCliente($id);
			if($status){
				echo "<script>alert('Cliente deletado com sucesso'); location.href='/jcandidoadm/clientes'</script>";
			}
			else
			{
				echo "<script>alert('Não foi possivel deletar o cliente'); location.href='/jcandidoadm/clientes'</script>";
			}
		}
		else
		{
			echo "<script>alert('Não foi possivel deletar o cliente'); location.href='/jcandidoadm/clientes'</script>";
		}
		
	}
	
	public function editarCliente($id)
	{
		$data['title'] = "admin";
		$this->load->view('incadm/header', $data);	
		
		if($id != "" && $id != "0"){
			$data['cliente'] = $this->adm->DadosCliente($id);
			$data['docs'] = $this->adm->DocCliente(array("cliente_id" => $id));
		
			//$data['pagamento'] = $this->adm->PagamentoCliente(array("cliente_id" => $id, "status" => 'Pago'));
			$data['status'] = $this->adm->GetStatus();
			$this->load->view('jcandidoadm/editarCliente', $data);
		}
		else
		{
			$this->load->view('jcandidoadm/insereCliente', $data);
		}
		
		
		$this->load->view('incadm/footer', $data);
	}
	
	
	public function SalvarCliente()
	{
		$nome = $this->input->post("nome");
		$id = $this->input->post("id");
		$sobreNome = $this->input->post("sobreNome");
		$email = $this->input->post("email");
		$telefone = $this->input->post("telefone");
		$cpf = $this->input->post("cpf");
		$senha = $this->input->post("senha");
		
		$erro = "";
		
		if($nome == "" || $sobreNome == "" || $email == "" || $telefone == "" || $cpf == "" || $senha == ""){
			$erro = "Favor preencher todos os dados";
		}
		
		if($erro == ""){
			
			if($senha != ""){
				$form = array('cliente_nome' => $nome, 'cliente_sobrenome' => $sobreNome, 'cliente_email' => $email, 'cliente_telefone' => $telefone, 'cliente_cpf' => $cpf, 'cliente_senha' => $senha);
			}
			else
			{
				$form = array('cliente_nome' => $nome, 'cliente_sobrenome' => $sobreNome, 'cliente_email' => $email, 'cliente_telefone' => $telefone, 'cliente_cpf' => $cpf);
			}
			
			
			if($id != ""){
				$status = $this->adm->FormAtualizaCliente($id, $form);
				if($status){
					echo "<script>alert('Cliente atualizado com sucesso'); location.href='/jcandidoadm/cliente_edit_" . $id . "';</script>";
				}
				else
				{
					echo "<script>alert('Erro');</script>";
				}
			}
			else
			{
				$status = $this->adm->FormInserirCliente($form);
				if($status > 0){
					echo "<script>alert('Cliente inserido com sucesso'); location.href='/jcandidoadm/clientes'</script>";
				}
				else
				{
					echo "<script>alert('Erro');</script>";
				}
			}
			
		}
		else
		{
			echo "<script>alert('".$erro."');</script>";
			if($id != ""){
				echo "<script>location.href='/jcandidoadm/cliente_edit_" . $id . "';</script>";
			}
			else
			{
				echo "<script>location.href='/jcandidoadm/cliente_add'</script>";
			}
		}
		
		
		
	}
	
	public function view($page = 'index')
    {
	 // Se o arquivo correspondente não existir no diretório, erro
	 //echo $page;
		if ( ! file_exists(APPPATH . 'views/jcandidoadm/' . $page . '.php'))
		{
			show_404();
		}
	 
		// Título da página é o próprio nome com a primeira letra em maiúsculo
		
	 	
		$this->load->helper('Funcoes');
		$data['title'] = "Minha pagina";		
			
			
		$data['dadosCliente'] = "";
		
		// "Monta" a apresentação usando as views
		$this->load->view('incadm/header', $data);
		
		
		if($page == 'clientes'){
			
			$AE = $this->input->get("AE");
			$data['AE'] = $AE;
			if(!empty($AE) && $AE != "todos"){
				
				if($AE == "ativos"){
					$dados = "(cliente_status != 'encerrado')";
				}
				else
				{
					$dados = "(cliente_status = 'encerrado')";
				}
				$data['clientes'] = $this->adm->DadosClienteFiltro($dados);
				
			}
			else
			{
				$data['clientes'] = $this->adm->DadosClienteTodos();
			}
			
			
			
		}		
				
		$this->load->view('jcandidoadm/' . $page, $data);
		$this->load->view('incadm/footer', $data);
			
		
		
		
    }
	
	
}
