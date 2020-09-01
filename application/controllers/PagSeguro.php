<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PagSeguro extends CI_Controller {
	
	public function __construct() {
		
		parent::__construct ();
		$this->load->model( "clientes_model", "cliente" );
		$this->load->model( "Pagseguro_model", "PagM" );		
		$this->load->helper("pagseguro");
	}
	
	public function index() {
		
	}

	public function notification() {
		
		require_once FCPATH . "/application/libraries/PagSeguroLibrary/PagSeguroLibrary.php";
		$paymentRequest = new PagSeguroPaymentRequest();
		
		/* Tipo de notificaÃ§Ã£o recebida */  
		$type = $_POST['notificationType'];    
		/* CÃ³digo da notificaÃ§Ã£o recebida */  
		$code = $_POST['notificationCode'];  
		
		$Retorno = "";
		
		try {		 
			
			// $Retorno .= "00-" .$type;
			// seller authentication
			$credentials = PagSeguroConfig::getAccountCredentials();
			
			/* Verificando tipo de notificaÃ§Ã£o recebida */  
			if ($type == 'transaction') {  
				  
				/* Obtendo o objeto PagSeguroTransaction a partir do cÃ³digo de notificaÃ§Ã£o */  
				$transaction = PagSeguroNotificationService::checkTransaction(  
					$credentials,  
					$code // cÃ³digo de notificaÃ§Ã£o  
				);  
				$Retorno .= "01";
				
				$status = $transaction->getStatus(); 
				$reference = $transaction->getReference(); 
				$transaction_id = $transaction->getCode(); 
				
				if($reference){
					
					$Retorno .= "-L02-" . $reference;
					if(strstr($reference,"L02")){						
						
						$ID = explode("-", $reference);	
						
						$Retorno .= "-ID-" . $ID[1];					
						
						$transaction = PagSeguroTransactionSearchService::searchByCode($credentials, $transaction_id);
						DadosTransaction($transaction, $ID[1], $code);
						
						
						//$Retorn .= "ok-" . $status->getTypeFromValue() . "--" . $reference;
						
						
					}else{
						//echo "Não Passou!";
					}
					
				}
				
			}  
			 
			
		} catch (PagSeguroServiceException $e) {
			die($e->getMessage());
			$Retorno .= "Erro";
		}
		echo $Retorno;
		
		//return $Retorn;
		
		
	}
	
	
	public function pagamentoPagSeguro($Cod){
			
		require_once FCPATH . "/application/libraries/PagSeguroLibrary/PagSeguroLibrary.php";
			
		$paymentRequest = new PagSeguroPaymentRequest();
	
		$Retorno = "";
			
		// Set the currency
		$paymentRequest->setCurrency("BRL");
	
		$itens = $this->PagM->GetProduto($Cod);
		//print_r($i);
		//$itens = $this->ItemCarrinhoM->get ( array (
				//"ic.codcarrinho" => $Cod
		//) );
			
		//if (!$itens) {
			
			//$Retorno = "Erro";
			
		//} else {			
						
			//if ($itens) {
				foreach ( $itens as $i ) {
					//echo $i->id;
					$paymentRequest->addItem($i->id, $i->nome, 1, number_format($i->valor, 2, ".", "." ));
				}
			//}
						
		//}
		
			
		$paymentRequest->setReference('L02-' . $Cod);
	
		//$comprador = $this->session->userdata( 'UserDoeUmaCesta' );
		$this->load->helper('Funcoes');
		$CL = json_decode(getCookieCliente());
		$cliente_id = 0;
		if(!is_null($CL)){
			
			$cliente_id = $CL->{'id'};
			
			$infoComprador = $this->cliente->DadosCliente($cliente_id);
				//print_r($infoComprador);
			$Telefone = $infoComprador["cliente_telefone"];
				
			$Telefone = str_replace("(", "", $Telefone);
			$Telefone = str_replace(")", "", $Telefone);
			$Telefone = str_replace("-", "", $Telefone);
			$Telefone = str_replace(".", "", $Telefone);
			// Set your customer information.
			//echo $Telefone;
			$paymentRequest->setSender(
					$infoComprador["cliente_nome"] . ' ' . $infoComprador["cliente_sobrenome"],
					$infoComprador["cliente_email"],
					substr($Telefone, 0, 2),
					substr($Telefone, -8),
					'CPF',
					$infoComprador["cliente_cpf"]
			);
		}
			
		// Set the url used by PagSeguro to redirect user after checkout process ends
		$paymentRequest->setRedirectUrl(site_url('minha-conta'));
		//$paymentRequest->addParameter('shippingAddressPostalCode', '06626460');
		// Another way to set checkout parameters
		//$paymentRequest->addParameter('notificationURL', site_url('conta/resumo/' . $Cod));
	
	
		try {
	
			/*
			 * #### Credentials #####
			 * Replace the parameters below with your credentials
			 * You can also get your credentials from a config file. See an example:
			 * $credentials = PagSeguroConfig::getAccountCredentials();
			 */
	
			// seller authentication
			//$credentials = new PagSeguroAccountCredentials("rodrigo_dos_st@yahoo.com.br",
					//"086C65C281CC4595B01741AFF2BEF8F7");
	
			// application authentication
			$credentials = PagSeguroConfig::getAccountCredentials();
	
			//$credentials->setAuthorizationCode("E231B2C9BCC8474DA2E260B6C8CF60D3");
	
			// Register this payment request in PagSeguro to obtain the checkout code
			$onlyCheckoutCode = true;
			$code = $paymentRequest->register($credentials, $onlyCheckoutCode);	
			//$Cod = str_pad($Cod, 10, "0", STR_PAD_LEFT);
			
			$objeto = array (
					"cliente_id" => $cliente_id,
					"cod_pag" => $code
			);			
			$cod_carrinho = $this->PagM->post( $objeto );
			
	
			$Retorno = $code;						
		
			//echo $code;
			//self::printPaymentUrl($code);
		} catch (PagSeguroServiceException $e) {
			die($e->getMessage());
			$Retorno = "Erro";
		}
			
		echo $Retorno;
			
	}
	
		

}