<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EnviaEmail extends CI_Controller {
    
	function __construct() {
        parent::__construct();
        $this->load->model( "enviaemail_model", "email" );		
    }
	
    public function contato(){		
        
        $this->email->enviarContato();
       // echo "OK";
		
    }
	
	public function formEsqueciSenha(){
		
        
        $this->email->enviarformEsqueciSenha();
       // echo "OK";
		
    }
}