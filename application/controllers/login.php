<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
	function __construct() {
        parent::__construct();
        $this->load->model( "adm_model", "adm" );
		
		
    }
	
	public function Index()
	{
		$this->load->view('jcandidoadm/login');
		
	}
	
	public function logOut()
	{
		$this->load->helper('Funcoes');
		deleteCookie("US24hr");		
		redirect("jcandidoadm/login");
		
	}
	
	
	public function LoginAdmin()
	{
		$email = $this->input->post("username");
		$senha = $this->input->post("password");
		// Recupera os clientes através do model
		$return = $this->adm->LoginUsuario($email, $senha);
		if($return == "sucesso"){
			redirect("jcandidoadm");
		}
		else
		{
			redirect("jcandidoadm/login");
		}
		
	}
}
