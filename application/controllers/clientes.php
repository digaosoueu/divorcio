<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Clientes extends CI_Controller {
	/**
     * Carrega a home
     */
	 
	public function __construct() {
		
		parent::__construct ();
		$this->load->helper('Funcoes');
		
	}
	
	public function Index($pagina = 'index')
	{
		
		///Verifica logado
		$CL = json_decode(getCookieCliente());
		$data['title'] = "Minha pagina";
		$data['dadosCliente'] = $CL;
		
		$this->load->view('inc/main-header', $data);
		$this->load->view('inc/main-single-header', $data);
		$data['cad'] = "consensualJudicial";		
		$dados['passo'] = "0";
		
		if(is_null($CL)){
			//echo "oi";
			$this->load->view('pages/solicitar-cadastro', $data);
		}else{
			$cliente_id = $CL->{'id'};
		
			if($cliente_id == "" || is_null($cliente_id)){
				$this->load->view('pages/solicitar-cadastro', $data);
			}
			else
			{	
				
			
				$status = $this->clientes_model->VerificaFormPreenchido($cliente_id);				
				
				if($status == "erro"){
					$dados['passo'] = "1";
					
					if($CL->{'tipo_form'} == "consensualJudicial"){
						redirect('/form-consensual-judicial/', 'refresh');
					}else{
						redirect('/form-extrajudicial/', 'refresh');
					}
				}
				else
				{
					$dados['passo'] = "2";
				}
				
				
				//foreach ($dados2 as $v) {
					//$dados['docs'] = $valor['tipo'];
					//echo $v;
				//}
				//$dados['docs'] = "ghg";
				//$dados['docs'] = $dados2;
				$dados['clientes'] = $this->clientes_model->DadosCliente($cliente_id);	
				$dados['status'] = $this->clientes_model->GetStatus();
				//$dados['docs'] = $this->clientes_model->VerificaDocEnviado($cliente_id);
				
				if($pagina == 'editar'){
					$this->load->view('pages/editar-cliente', $dados);
				}
				else
				{
					$this->load->view('pages/minha-conta', $dados);
				}
				
				
			}
			
		}
		$this->load->view('inc/main-footer', $data);
		
		// Passa os clientes para o array que será enviado à home
		
	}
	
	
	public function getMensagensCliente($cliente_id)
	{
		
		if(!is_null($cliente_id)){
			
			$dados['mensagem'] = $this->clientes_model->getMensagensCliente($cliente_id);	
			echo json_encode($dados['mensagem']);
		}
		
		
	}
	
	public function getDocumentosCliente($cliente_id)
	{
		
		if(!is_null($cliente_id)){
			
			$dados['docs'] = $this->clientes_model->getDocumentosCliente($cliente_id);	
			echo json_encode($dados['docs']);
		}
		
		
	}
	
	public function MensagensCliente()
	{
		$cliente_id = $this->input->post("clienteMensagemID");
		$mensagem = $this->input->post("MensagemCliente");
		
		if(strlen($mensagem) < 2){
			echo 'Erro, mensagem muito curta';
		}
		else
		{
			$clientes = array('mensagem' => $mensagem, 'cliente_id' => $cliente_id);
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
		
		
		
	}
	
	public function Logout()
	{
		//$this->load->helper('Funcoes');
		deleteCookie("CLD24hr");
		redirect(base_url(), 'refresh');
	}
	
	public function GerarHtmltoPdf($pagina)
	{
		//$this->load->helper('Funcoes');
		$CL = json_decode(getCookieCliente());
		
		if(!is_null($CL)){
			$cliente_id = $CL->{'id'};
			$dados['clientesCompl'] = $this->clientes_model->DadosCliente($cliente_id);
			$dados['clientes'] = $this->clientes_model->DadosClienteFormPreenchido($cliente_id);			
			if($pagina == "procuracao"){
				$this->load->view('pages/procuracao_pdf', $dados);
			}
			if($pagina == "contrato"){
				$this->load->view('pages/contrato_pdf', $dados);
			}
			
		}
	}
	
	public function FormJudicialDadosPrint()
	{
		$idCliente = $this->input->get("id");
		if($idCliente != ""){
				
			$US = json_decode(getCookie("US24hr"));
			if(!is_null($US)){
				$cliente_id = $idCliente;
			}
			
		}
		
		if($cliente_id == "" || is_null($cliente_id)){
			redirect("jcandidoadm/clientes");
		}
		else
		{	
					//echo $cliente_id;	
			$dados['form'] = $this->clientes_model->DadosFormJudicial($cliente_id);	
			//var_dump($dados);
			
			$this->load->view('jcandidoadm/printConsensualJudicial', $dados);
			
		}
	}
	
	public function FormJudicialDados()
	{
		//$this->load->helper('Funcoes');
		
		$idCliente = $this->input->get("id");
		$tipoForm = $this->input->get("tipoForm");
		$cliente_id = "";
		$CL = json_decode(getCookieCliente());
		
		$data['cad'] = "consensualJudicial";		
		$data['title'] = "Minha pagina";
		$data['dadosCliente'] = $CL;
		$data['tipoForm'] = $tipoForm;
		
		if($idCliente != ""){
				
			$US = json_decode(getCookie("US24hr"));
			if(!is_null($US)){
				$cliente_id = $idCliente;
			}
			
		}
		
		if($cliente_id == "")
		{
			if(is_null($CL)){
			//echo "oi";
			
			
			
			}
			else{
				
				$cliente_id = $CL->{'id'};
				
			}
		}
		
		
		
		//
		$this->load->view('inc/main-header', $data);
		$this->load->view('inc/main-single-header', $data);	
		
		
		if($cliente_id == "" || is_null($cliente_id)){
			$this->load->view('pages/solicitar-cadastro', $data);
		}
		else
		{	
					//echo $cliente_id;	
			$dados['form'] = $this->clientes_model->DadosFormJudicial($cliente_id);	
			//var_dump($dados);
			$dados['cliente_id'] = $cliente_id;		
			$this->load->view('pages/form-consensual-judicial', $dados);
			
		}
			
		//}
		
					
		
		$this->load->view('inc/main-footer', $data);
		
	}
	
	public function FormExtrajudicialDadosPrint()
	{
		
		$idCliente = $this->input->get("id");		
		
		if($idCliente != ""){
				
			$US = json_decode(getCookie("US24hr"));
			if(!is_null($US)){
				$cliente_id = $idCliente;
			}
			
		}		
		
		if($cliente_id == "" || is_null($cliente_id)){
			redirect("jcandidoadm/clientes");
		}
		else
		{	
					//echo $cliente_id;	
			$dados['form'] = $this->clientes_model->DadosFormExtraJudicial($cliente_id);
			
			$this->load->view('jcandidoadm/printExtrajudicial', $dados);
			
		}		
		
		
		
	}
	
	public function FormExtrajudicialDados()
	{
		
		$idCliente = $this->input->get("id");
		$tipoForm = $this->input->get("tipoForm");
		
		$cliente_id = "";
		$CL = json_decode(getCookieCliente());		
		$data['dadosCliente'] = $CL;
		
		$data['title'] = "Minha pagina";
		$data['tipoForm'] = $tipoForm;
		
		$data['cad'] = "extraJudicial";
		
		if($idCliente != ""){
				
			$US = json_decode(getCookie("US24hr"));
			if(!is_null($US)){
				$cliente_id = $idCliente;
			}
			
		}
		
		if($cliente_id == "")
		{
			if(is_null($CL)){
			
			}
			else{
				$cliente_id = $CL->{'id'};				
			}
		}
		
		$this->load->view('inc/main-header', $data);
		$this->load->view('inc/main-single-header', $data);	
		
		if($cliente_id == "" || is_null($cliente_id)){
			$this->load->view('pages/solicitar-cadastro', $data);
		}
		else
		{	
					//echo $cliente_id;	
			$dados['form'] = $this->clientes_model->DadosFormExtraJudicial($cliente_id);	
			//var_dump($dados);
			$dados['cliente_id'] = $cliente_id;		
			$this->load->view('pages/form-extrajudicial', $dados);
			
		}		
		
		$this->load->view('inc/main-footer', $data);
		
	}
	
	public function FormExtrajudicial(){
		
		$validacao = self::Validar('formjudicial');
		
		if($validacao){
			// Recupera os dados do formulário
			$nome_conjuge_1 = $this->input->post("nome_conjuge_1");
			$endereco_conjuge_1 = $this->input->post("endereco_conjuge_1");	
			$compl_conjuge_1 = $this->input->post("complemento_conjuge_1");
			$numero_conjuge_1 = $this->input->post("numero_conjuge_1");
			$bairro_conjuge_1 = $this->input->post("bairro_conjuge_1");
			$cidade_conjuge_1 = $this->input->post("cidade_conjuge_1");
			$estado_conjuge_1 = $this->input->post("estado_conjuge_1");
			$cep_conjuge_1 = $this->input->post("cep_conjuge_1");
			
			$profissao_conjuge_1 = $this->input->post("profissao_conjuge_1");
			$rg_conjuge_1 = $this->input->post("rg_conjuge_1");
			$cpf_conjuge_1 = $this->input->post("cpf_conjuge_1");
			$nome_casado_conjuge_1 = $this->input->post("nome_casado_conjuge_1");
			$nome_solteiro_conjuge_1 = $this->input->post("nome_solteiro_conjuge_1");
			
			$nome_conjuge_2 = $this->input->post("nome_conjuge_2");
			$endereco_conjuge_2 = $this->input->post("endereco_conjuge_2");
			$compl_conjuge_2 = $this->input->post("complemento_conjuge_2");
			$numero_conjuge_2 = $this->input->post("numero_conjuge_2");
			$bairro_conjuge_2 = $this->input->post("bairro_conjuge_2");
			$cidade_conjuge_2 = $this->input->post("cidade_conjuge_2");
			$estado_conjuge_2 = $this->input->post("estado_conjuge_2");
			$cep_conjuge_2 = $this->input->post("cep_conjuge_2");
			
			
			$profissao_conjuge_2 = $this->input->post("profissao_conjuge_2");
			$rg_conjuge_2 = $this->input->post("rg_conjuge_2");
			$cpf_conjuge_2 = $this->input->post("cpf_conjuge_2");
			$nome_casado_conjuge_2 = $this->input->post("nome_casado_conjuge_2");
			$nome_solteiro_conjuge_2 = $this->input->post("nome_solteiro_conjuge_2");
			
			
			$dia_casamento = $this->input->post("dia_casamento");
			$mes_casamento = $this->input->post("mes_casamento");
			$ano_casamento = $this->input->post("ano_casamento");
			$renda_media = $this->input->post("renda_media");
			$bens_dividir = $this->input->post("bens_dividir");
			$pacto_antenupcial = $this->input->post("pacto_antenupcial");
			$partilha_bens = $this->input->post("partilha_bens");
			
			$pensao = $this->input->post("pensao");
			$guarda = $this->input->post("guarda");
			$contribuicao = $this->input->post("contribuicao");
			$imposto = $this->input->post("imposto");
			
			$cliente_id = $this->input->post("cliente_id");
			$form_id = $this->input->post("form_id");
			
			$diacasamento = $ano_casamento . "-" . $mes_casamento . "-" . $dia_casamento;
			
			if($cliente_id != ""){
				
				$this->clientes_model->Atualizar($cliente_id, array('cliente_tipo_form' => 'extraJudicial'));
				
				$formExtraJudicial = array('nome_conjuge1' => $nome_conjuge_1, 'profissao_conjuge1' => $profissao_conjuge_1, 'endereco_conjuge1' => $endereco_conjuge_1, 'rg_conjuge1' => $rg_conjuge_1, 'cpf_conjuge1' => $cpf_conjuge_1, 'retorna_nome_solteiro_conjuge1' => $nome_casado_conjuge_1, 'nome_solteiro_conjuge1' => $nome_solteiro_conjuge_1, 'retorna_nome_solteiro_conjuge2' => $nome_casado_conjuge_2, 'nome_conjuge2' => $nome_conjuge_2, 'profissao_conjuge2' => $profissao_conjuge_2, 'endereco_conjuge2' => $endereco_conjuge_2, 'rg_conjuge2' => $rg_conjuge_2, 'cpf_conjuge2' => $cpf_conjuge_2, 'nome_solteiro_conjuge2' => $nome_solteiro_conjuge_2, 'data_casamento' => $diacasamento, 'renda_mensal' => $renda_media, 'bens_dividir' => $bens_dividir, 'pacto_antenupcial' => $pacto_antenupcial, 'partilha_bens' => $partilha_bens, 'pensao_alimenticia' => $pensao, 'contribuicao_educacao' => $contribuicao, 'guarda_filho' => $guarda, 'impostos_dividas' => $imposto, 'cliente_id' => $cliente_id, 'compl_conjuge1' => $compl_conjuge_1, 'numero_conjuge1' => $numero_conjuge_1, 'bairro_conjuge1' => $bairro_conjuge_1, 'cidade_conjuge1' => $cidade_conjuge_1, 'estado_conjuge1' => $estado_conjuge_1, 'cep_conjuge1' => $cep_conjuge_1, 'compl_conjuge2' => $compl_conjuge_2, 'numero_conjuge2' => $numero_conjuge_2, 'bairro_conjuge2' => $bairro_conjuge_2, 'cidade_conjuge2' => $cidade_conjuge_2, 'estado_conjuge2' => $estado_conjuge_2, 'cep_conjuge2' => $cep_conjuge_2);
				
				
				
				if($form_id != "" && $form_id != "0"){
					
					$status = $this->clientes_model->FormExtraJudicialAtualizar($form_id, $formExtraJudicial);
					
				}
				else{
					$status = $this->clientes_model->FormExtraJudicial($formExtraJudicial);
				}
				
			}
			
			
			
			// Insere os dados no banco recuperando o status dessa operação
			
			// Checa o status da operação gravando a mensagem na seção
			if($status <= 0){
				//$this->session->set_flashdata('error', 'Não foi possível inserir o contato.');
				echo 'Não foi possível inserir o cadastro.';
			}else{
				//$this->session->set_flashdata('success', 'Contato inserido com sucesso.');
				// Redireciona o usuário para a home
				//redirect();
				echo 'sucesso';
				
			}
		}else{
			//$this->session->set_flashdata('error', validation_errors('<p>','</p>'));
			echo validation_errors('<p>','</p>');
		}
		//redirect("solicitar-cadastro?cad=consensualJudicial");
		// Carrega a home
		//$this->load->view('home',$dados);
	}
	
	public function FormJudicial(){
		
		$validacao = self::Validar('formjudicial');
		
		if($validacao){
			// Recupera os dados do formulário
			$nome_conjuge_1 = $this->input->post("nome_conjuge_1");
			$endereco_conjuge_1 = $this->input->post("endereco_conjuge_1");
			$compl_conjuge_1 = $this->input->post("complemento_conjuge_1");
			$numero_conjuge_1 = $this->input->post("numero_conjuge_1");
			$bairro_conjuge_1 = $this->input->post("bairro_conjuge_1");
			$cidade_conjuge_1 = $this->input->post("cidade_conjuge_1");
			$estado_conjuge_1 = $this->input->post("estado_conjuge_1");
			$cep_conjuge_1 = $this->input->post("cep_conjuge_1");
			$profissao_conjuge_1 = $this->input->post("profissao_conjuge_1");
			$rg_conjuge_1 = $this->input->post("rg_conjuge_1");
			$cpf_conjuge_1 = $this->input->post("cpf_conjuge_1");
			$nome_casado_conjuge_1 = $this->input->post("nome_casado_conjuge_1");
			$nome_solteiro_conjuge_1 = $this->input->post("nome_solteiro_conjuge_1");
			
			$nome_conjuge_2 = $this->input->post("nome_conjuge_2");
			$endereco_conjuge_2 = $this->input->post("endereco_conjuge_2");
			$compl_conjuge_2 = $this->input->post("complemento_conjuge_2");
			$numero_conjuge_2 = $this->input->post("numero_conjuge_2");
			$bairro_conjuge_2 = $this->input->post("bairro_conjuge_2");
			$cidade_conjuge_2 = $this->input->post("cidade_conjuge_2");
			$estado_conjuge_2 = $this->input->post("estado_conjuge_2");
			$cep_conjuge_2 = $this->input->post("cep_conjuge_2");
			$profissao_conjuge_2 = $this->input->post("profissao_conjuge_2");
			$rg_conjuge_2 = $this->input->post("rg_conjuge_2");
			$cpf_conjuge_2 = $this->input->post("cpf_conjuge_2");
			$nome_casado_conjuge_2 = $this->input->post("nome_casado_conjuge_2");
			$nome_solteiro_conjuge_2 = $this->input->post("nome_solteiro_conjuge_2");
			
			
			$dia_casamento = $this->input->post("dia_casamento");
			$mes_casamento = $this->input->post("mes_casamento");
			$ano_casamento = $this->input->post("ano_casamento");
			$renda_media = $this->input->post("renda_media");
			$bens_dividir = $this->input->post("bens_dividir");
			$pacto_antenupcial = $this->input->post("pacto_antenupcial");
			$partilha_bens = $this->input->post("partilha_bens");
			
			$pensao = $this->input->post("pensao");
			$guarda = $this->input->post("guarda");
			$contribuicao = $this->input->post("contribuicao");
			$imposto = $this->input->post("imposto");
			
			$cliente_id = $this->input->post("cliente_id");
			$form_id = $this->input->post("form_id");
			
			$diacasamento = $ano_casamento . "-" . $mes_casamento . "-" . $dia_casamento;
			
			if($cliente_id != ""){
				
				$this->clientes_model->Atualizar($cliente_id, array('cliente_tipo_form' => 'consensualJudicial'));
				
				$formJudicial = array('nome_conjuge1' => $nome_conjuge_1, 'profissao_conjuge1' => $profissao_conjuge_1, 'endereco_conjuge1' => $endereco_conjuge_1, 'rg_conjuge1' => $rg_conjuge_1, 'cpf_conjuge1' => $cpf_conjuge_1, 'retorna_nome_solteiro_conjuge1' => $nome_casado_conjuge_1, 'nome_solteiro_conjuge1' => $nome_solteiro_conjuge_1, 'retorna_nome_solteiro_conjuge2' => $nome_casado_conjuge_2, 'nome_conjuge2' => $nome_conjuge_2, 'profissao_conjuge2' => $profissao_conjuge_2, 'endereco_conjuge2' => $endereco_conjuge_2, 'rg_conjuge2' => $rg_conjuge_2, 'cpf_conjuge2' => $cpf_conjuge_2, 'nome_solteiro_conjuge2' => $nome_solteiro_conjuge_2, 'data_casamento' => $diacasamento, 'renda_mensal' => $renda_media, 'bens_dividir' => $bens_dividir, 'pacto_antenupcial' => $pacto_antenupcial, 'partilha_bens' => $partilha_bens, 'pensao_alimenticia' => $pensao, 'contribuicao_educacao' => $contribuicao, 'guarda_filho' => $guarda, 'impostos_dividas' => $imposto, 'cliente_id' => $cliente_id, 'compl_conjuge1' => $compl_conjuge_1, 'numero_conjuge1' => $numero_conjuge_1, 'bairro_conjuge1' => $bairro_conjuge_1, 'cidade_conjuge1' => $cidade_conjuge_1, 'estado_conjuge1' => $estado_conjuge_1, 'cep_conjuge1' => $cep_conjuge_1, 'compl_conjuge2' => $compl_conjuge_2, 'numero_conjuge2' => $numero_conjuge_2, 'bairro_conjuge2' => $bairro_conjuge_2, 'cidade_conjuge2' => $cidade_conjuge_2, 'estado_conjuge2' => $estado_conjuge_2, 'cep_conjuge2' => $cep_conjuge_2);
				
				if($form_id != "" && $form_id != "0"){
					
					$status = $this->clientes_model->FormJudicialAtualizar($form_id, $formJudicial);
					
				}
				else{
					$status = $this->clientes_model->FormJudicial($formJudicial);
				}
				
			}
			
			
			
			// Insere os dados no banco recuperando o status dessa operação
			
			// Checa o status da operação gravando a mensagem na seção
			if($status <= 0){
				//$this->session->set_flashdata('error', 'Não foi possível inserir o contato.');
				echo 'Não foi possível inserir o cadastro.';
			}else{
				//$this->session->set_flashdata('success', 'Contato inserido com sucesso.');
				// Redireciona o usuário para a home
				//redirect();
				echo 'sucesso';
				
			}
		}else{
			//$this->session->set_flashdata('error', validation_errors('<p>','</p>'));
			echo validation_errors('<p>','</p>');
		}
		//redirect("solicitar-cadastro?cad=consensualJudicial");
		// Carrega a home
		//$this->load->view('home',$dados);
	}
	
	public function Login()
	{
		$email = $this->input->post("emailLogin");
		$senha = $this->input->post("senhaLogin");
		// Recupera os clientes através do model
		$clientes = $this->clientes_model->Login($email, $senha);
		echo $clientes;
		// Passa os clientes para o array que será enviado à home
		//$dados['clientes'] = $this->clientes_model->Formatar($clientes);
		// Chama a home enviando um array de dados a serem exibidos
		//$this->load->view('home', $dados);
	}
	
	/**
     * Processa o formulário para salvar os dados
     */
	public function Salvar(){
		// Recupera os clientes através do model
		//$clientes = $this->clientes_model->GetAll();
		// Passa os contatos para o array que será enviado à home
		//$dados['clientes'] = $this->clientes_model->Formatar($clientes);
		// Executa o processo de validação do formulário
		$id = $this->input->post("id");
		//echo $id;
		if(is_numeric($id)){
			$validacao = true;
		}
		else
		{
			$validacao = self::Validar();			
		}
		// Verifica o status da validação do formulário
		// Se não houverem erros, então insere no banco e informa ao usuário
		// caso contrário informa ao usuários os erros de validação
		if($validacao){
			// Recupera os dados do formulário
			$nome = $this->input->post("nomeCad");
			$email = $this->input->post("emailCad");
			$sobrenome = $this->input->post("sobrenomeCad");
			$cpf = $this->input->post("cpfCad");
			$telefone = $this->input->post("telefoneCad");
			$senha = $this->input->post("senhaCad");
			$tipo_form = $this->input->post("tipo_form");
			
			
			$clientes = array('cliente_nome' => $nome, 'cliente_sobrenome' => $sobrenome, 'cliente_email' => $email, 'cliente_telefone' => $telefone, 'cliente_cpf' => $cpf, 'cliente_tipo_form' => $tipo_form, 'cliente_senha' => $senha);
			
			
			if(is_numeric($id)){
				$status = $this->clientes_model->Atualizar($id, $clientes);
			}
			else
			{
				$status = $this->clientes_model->Inserir($clientes);
			}
			
			// Insere os dados no banco recuperando o status dessa operação
			
			// Checa o status da operação gravando a mensagem na seção
			if($status <= 0){
				//$this->session->set_flashdata('error', 'Não foi possível inserir o contato.');
				echo 'Não foi possível inserir o cliente.';
			}else{
				//$this->session->set_flashdata('success', 'Contato inserido com sucesso.');
				// Redireciona o usuário para a home
				//redirect();
				echo 'sucesso';
				
				$this->load->helper('Funcoes');
				
				$value = array('id' => $status,
				'nome' => $nome,
				'sobrenome' => $sobrenome,
				'email' => $email,
				'tipo_form' => $tipo_form
					) ;
				criarCookie("CLD24hr", json_encode($value), "86500");
			}
		}else{
			//$this->session->set_flashdata('error', validation_errors('<p>','</p>'));
			
			echo validation_errors('<p>','</p>');
		}
		//redirect("solicitar-cadastro?cad=consensualJudicial");
		// Carrega a home
		//$this->load->view('home',$dados);
	}
	/**
     * Carrega a view para edição dos dados
     */
	public function Editar(){
		// Recupera o ID do registro - através da URL - a ser editado
		$id = $this->uri->segment(2);
		// Se não foi passado um ID, então redireciona para a home
		if(is_null($id))
			redirect();
		// Recupera os dados do registro a ser editado
		$dados['contato'] = $this->contatos_model->GetById($id);
		// Carrega a view passando os dados do registro
		$this->load->view('editar',$dados);
	}
	/**
     * Processa o formulário para atualizar os dados
     */
	public function Atualizar(){
		// Realiza o processo de validação dos dados
		$validacao = self::Validar('update');
		// Verifica o status da validação do formulário
		// Se não houverem erros, então insere no banco e informa ao usuário
		// caso contrário informa ao usuários os erros de validação
		if($validacao){
			// Recupera os dados do formulário
			$contato = $this->input->post();
			// Atualiza os dados no banco recuperando o status dessa operação
			$status = $this->contatos_model->Atualizar($contato['id'],$contato);
			// Checa o status da operação gravando a mensagem na seção
			if(!$status){
				$dados['contato'] = $this->contatos_model->GetById($contato['id']);
				$this->session->set_flashdata('error', 'Não foi possível atualizar o contato.');
			}else{
				$this->session->set_flashdata('success', 'Contato atualizado com sucesso.');
				// Redireciona o usuário para a home
				redirect();
			}
		}else{
			$this->session->set_flashdata('error', validation_errors());
		}
		// Carrega a view para edição
		$this->load->view('editar',$dados);
	}
	/**
     * Realiza o processo de exclusão dos dados
     */
	public function Excluir(){
		// Recupera o ID do registro - através da URL - a ser editado
		$id = $this->uri->segment(2);
		// Se não foi passado um ID, então redireciona para a home
		if(is_null($id))
			redirect();
		// Remove o registro do banco de dados recuperando o status dessa operação
		$status = $this->contatos_model->Excluir($id);
		// Checa o status da operação gravando a mensagem na seção
		if($status){
			$this->session->set_flashdata('success', '<p>Contato excluído com sucesso.</p>');
		}else{
			$this->session->set_flashdata('error', '<p>Não foi possível excluir o contato.</p>');
		}
		// Redirecionao o usuário para a home
		redirect();
	}
	/**
	* Valida os dados do formulário
	*
	* @param string $operacao Operação realizada no formulário: insert ou update
	*
	* @return boolean
	*/
	private function Validar($operacao = 'insert'){
		// Com base no parâmetro passado
		// determina as regras de validação
		switch($operacao){
			case 'insert':
				$rules['nomeCad'] = array('trim', 'required', 'min_length[3]');
				$rules['emailCad'] = array('trim', 'required', 'valid_email', 'is_unique[clientes.cliente_email]');
				$this->form_validation->set_rules('nomeCad', 'Nome', $rules['nomeCad']);
				$this->form_validation->set_rules('emailCad', 'Email', $rules['emailCad']);
				break;
			case 'update':
				$rules['nomeCad'] = array('trim', 'required', 'min_length[3]');
				$rules['emailCad'] = array('trim', 'required', 'valid_email');
				break;
			case 'formjudicial':
				$rules['nome_conjuge_1'] = array('trim', 'required', 'min_length[3]');
				$this->form_validation->set_rules('nome_conjuge_1', 'nome_conjuge_1', $rules['nome_conjuge_1']);
				break;
			default:
				$rules['nomeCad'] = array('trim', 'required', 'min_length[3]');
				$rules['emailCad'] = array('trim', 'required', 'valid_email', 'is_unique[clientes.cliente_email]');
				break;
		}
		
		// Executa a validação e retorna o status
		$this->form_validation->set_message('required', 'Favor preencher todos os campos!');
		$this->form_validation->set_message('is_unique', 'Este email já possui um cadastro!');
		$this->form_validation->set_message('valid_email', 'Email inválido!');
		return $this->form_validation->run();
	}
}
?>