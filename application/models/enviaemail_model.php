<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require("phpmailer/class.phpmailer.php");

class EnviaEmail_Model extends My_Model {
	
     
    public function enviarContato(){

	 
		$nome = $this->input->post('Nome', TRUE);
		$email = $this->input->post('Email', TRUE);
		$telefone = $this->input->post('Telefone', TRUE);
        $mensagem = $this->input->post('Mensagem', TRUE); 		
		

		$emaildestinatario = 'contato@divorcio-online24hs.com.br'; // Digite seu e-mail aqui, lembrando que o e-mail deve estar em seu servidor web		
		$assunto = "Contato Site";			
		
		$mail = new PHPMailer();
		 
		// Define os dados do servidor e tipo de conexão
		// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		$mail->IsSMTP(); // Define que a mensagem será SMTP
		$mail->Port = 587;
		$mail->Host = 'smtp.divorcio-online24hs.com.br';
		$mail->SMTPAuth = true; // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
		$mail->Username = UsuarioEmail; // Usuário do servidor SMTP (endereço de email)
		$mail->Password = SenhaEmail; // Senha do servidor SMTP (senha do email usado)
		 
		// Define o remetente
		// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		$mail->From = "noreply@divorcio-online24hs.com.br"; // Seu e-mail
		//$mail->Sender = "contato@unitdetetives.com.br"; // Seu e-mail
		$mail->FromName = $nome; // Seu nome
		 
		// Define os destinatário(s)
		// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		$mail->AddAddress($emaildestinatario);
		//$mail->AddAddress('e-mail@destino2.com.br');
		//$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
		//$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta
		 
		// Define os dados técnicos da Mensagem
		// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
		//$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)
		 
		/* Montando a mensagem a ser enviada no corpo do e-mail. */
		$mensagemHTML = '<P>FORMULARIO PREENCHIDO NO SITE divorcio-online24hs.com.br</P>
		<p><b>Nome:</b> '.$nome.'
		<p><b>E-Mail:</b> '.$email.'
		<p><b>Telefone:</b> '.$telefone.'
		<p><b>Assunto:</b> '.$assunto.'
		<p><b>Mensagem:</b> '.$mensagem.'</p>
		<hr>';
		
		
		 
		$mail->Subject  = $assunto; // Assunto da mensagem
		$mail->Body = $mensagemHTML;
		
		$enviado = $mail->Send();
		 
		// Limpa os destinatários e os anexos
		$mail->ClearAllRecipients();
		$mail->ClearAttachments();
		 
		// Exibe uma mensagem de resultado
		if ($enviado) {
		echo "sucesso";
		} else {
			echo "Não foi possível enviar o e-mail.";
			echo "Informações do erro: " . $mail->ErrorInfo;
		}
		    
       
    }
	
	
	public function enviarformEsqueciSenha(){

	 
		$email_recuperacao = $this->input->post('email_recuperacao', TRUE);	
		
		$this->table = 'clientes';
		$form = $this->GetByArray(array("cliente_email" => $email_recuperacao));
		if(!empty($form)){
			
			$emaildestinatario = $email_recuperacao; // Digite seu e-mail aqui, lembrando que o e-mail deve estar em seu servidor web		
			$assunto = "Esqueci minha Senha - divorcio-online24hs.com.br";			
			
			$mail = new PHPMailer();
			 
			// Define os dados do servidor e tipo de conexão
			// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
			$mail->IsSMTP(); // Define que a mensagem será SMTP
			$mail->Port = 587;
			$mail->Host = 'smtp.divorcio-online24hs.com.br';
			$mail->SMTPAuth = true; // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
			$mail->Username = UsuarioEmail; // Usuário do servidor SMTP (endereço de email)
			$mail->Password = SenhaEmail; // Senha do servidor SMTP (senha do email usado)
			 
			// Define o remetente
			// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
			$mail->From = "noreply@divorcio-online24hs.com.br"; // Seu e-mail
			//$mail->Sender = "contato@unitdetetives.com.br"; // Seu e-mail
			$mail->FromName = "noreply"; // Seu nome
			 
			// Define os destinatário(s)
			// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
			$mail->AddAddress($emaildestinatario);
			//$mail->AddAddress('e-mail@destino2.com.br');
			//$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
			//$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta
			 
			// Define os dados técnicos da Mensagem
			// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
			$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
			//$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)
			 
			/* Montando a mensagem a ser enviada no corpo do e-mail. */
			$mensagemHTML = '<P>Divórcio Online 24 horas:</P>
			<p><b>Email:</b> '.$email_recuperacao.'
			<p><b>Senha:</b> '.$form["cliente_senha"].'
			<p><b>Acesse: <a href="http://divorcio-online24hs.com.br/minha-conta">Login</a></b><hr>';
			
			
			 
			$mail->Subject  = $assunto; // Assunto da mensagem
			$mail->Body = $mensagemHTML;
			
			$enviado = $mail->Send();
			 
			// Limpa os destinatários e os anexos
			$mail->ClearAllRecipients();
			$mail->ClearAttachments();
			 
			// Exibe uma mensagem de resultado
			if ($enviado) {
			echo "sucesso";
			} else {
				echo "Não foi possível enviar o e-mail.";
				echo "Informações do erro: " . $mail->ErrorInfo;
			}
			
			
		}
		else
		{
			echo "sucesso";
		}
		
		    
       
    }
}