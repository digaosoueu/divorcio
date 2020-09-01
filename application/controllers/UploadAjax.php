<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UploadAjax extends CI_Controller {

    public function index()
    {
        $this->load->view('minha-conta');
    }
    
    public function fazUploadAjax($tipoArquivo)
    {
		
		$this->load->helper('Funcoes');		
		$id = getDadosCliente('id');
		//echo $id;
		if($id != false){
			
			//$tipoArquivo = $this->input->post("tipoArquivo");
			$tipoFile = $this->input->post("tipoFile");
			$label = $this->input->post("nomeArquivoOutros");
			
			if(is_dir("./uploadsdocs/" . $id)){
				
			}
			else
			{
				mkdir ("./uploadsdocs/" . $id, 0755 );
			}
			
			
			$config['upload_path']          = './uploadsdocs/' . $id . '/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|zip';
			$config['max_size']             = 800;
			//$config['file_name']            = "teste.jpg";
			$config['file_ext_tolower']     = true;
			$config['remove_spaces']     	= true;
		   // $config['encrypt_name']         = true;
	
			$this->load->library('upload', $config);
	
			if (!$this->upload->do_upload($tipoFile)) {
				echo "erro";//$this->upload->display_errors('', '');
			} else {
				
				$dados[] = $this->upload->data();
				//var_dump($dados);
				$file_name = "";
				foreach ($dados as $valor) {
					//var_dump($indice, $valor);
					//echo $valor['file_ext'];
					$file_name = $valor['file_name'];
				}
				
				if($file_name != ""){
					
					$status = $this->clientes_model->VerificaDoc($id, $tipoArquivo, $file_name, $label);
					echo $status;
				}
				// "erro1";
			}
			
			
		}
		else
		{
			echo "erro";	
		}
    }
}