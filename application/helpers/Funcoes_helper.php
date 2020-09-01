<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

   function criarCookie($name, $value, $expire){		
	   $ci =& get_instance();
       $ci->load->helper('cookie'); 
       
       $cookie = array(
            'name'   => $name,
            'value'  => $value ,
        	'expire' => $expire
        );
       $ci->input->set_cookie($cookie);

    }

	function getCookie($name){
		
		$ci =& get_instance();
		$ci->load->helper('cookie');
		return $ci->input->cookie($name); 
		
	}
	
	function getCookieCliente(){		
		
		return getCookie("CLD24hr"); 
		
	}
	
	function deleteCookie($cookie){		
		
		$ci =& get_instance();
        $ci->load->helper('cookie'); 
		delete_cookie($cookie);
		
		return ""; 
		
	}
	
	function getDadosCliente($coluna){
		
		$CL = json_decode(getCookieCliente());
		if(!is_null($CL)){
			return $CL->{$coluna};
		}
		else
		{
			return false;	
		}
	}

?>