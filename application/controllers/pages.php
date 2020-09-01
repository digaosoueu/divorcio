<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	
	public function view($page = 'index')
    {
	 // Se o arquivo correspondente não existir no diretório, erro
		if ( ! file_exists(APPPATH . 'views/pages/' . $page . '.php'))
		{
			show_404();
		}
	 
		// Título da página é o próprio nome com a primeira letra em maiúsculo
		$data['title'] = ucfirst($page);
	 	
		$this->load->helper('Funcoes');
		$CL = json_decode(getCookieCliente());
		$data['title'] = "Minha pagina";
		$data['dadosCliente'] = $CL;
		
		// "Monta" a apresentação usando as views
		$this->load->view('inc/main-header', $data);
		//if($page == "consensual-extrajudicial" || $page == "consensual-judicial" || $page == "litigioso-judicial"  || $page == "direito-familia-sucessoes" || $page == "perguntas-frequentes" || $page == "documentacao" ||  $page == "contato"){
		if($page != "index"){
			$this->load->view('inc/main-single-header', $data);
		}
		$this->load->view('pages/' . $page, $data);
		$this->load->view('inc/main-footer', $data);
    }
}
