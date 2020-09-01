
	<footer role="contentinfo" class="main-footer container">
		<div class="content">
			
			<div role="navigator" class="column column-small">
				<ul class="footer-menu">
					<li><a href="/">Home</a></li>
					<li><a href="consensual-extrajudicial">Divórcio Consensual em Cartório (Extrajudicial) </a></li>
					<li><a href="consensual-judicial">Divórcio Consensual Judicial</a></li>
					<li><a href="litigioso-judicial">Divórcio Litigioso Judicial</a></li>
				</ul>
			</div>

			<div role="navigator" class="column column-small">
				<ul class="footer-menu">
					<li><a href="direito-familia-sucessoes">Direito de Família e Sucessões</a></li>
					<li><a href="perguntas-frequentes">Perguntas Frequentes</a></li>
					<li><a href="documentacao">Documentação</a></li>
					<li><a href="contato">Contato</a></li>
				</ul>
			</div>

			<div class="column column-small">
				<ul class="footer-info">
					<li><i aria-hidden="true" class="icon icon-clock-small"></i> Segunda a Sexta de <strong>8h às 18h</strong></li>
					<li><i class="icon icon-chat"></i><a href="mailto:contato@divorcioonline24hs.com.br">contato@divorcioonline24hs.com.br</a></li>
				</ul>
			</div>

			<div class="column column-small last">
				<address itemscope itemtype="http://schema.org/PostalAddress">
					<ul class="footer-info">
						<li itemprop="streetAddress">Rua Apeninos, 429 - Conj. 1208</li>
						<li>Aclimação - <span itemprop="addressLocality">São Paulo</span>/<span itemprop="addressRegion">SP</span> - Cep: <span itemprop="postalCode">01533-000</span></li>
						<li><strong><a href="tel:+551132713389">11 3271-3389 | </a> <a href="tel:+5511985205924"> 9 8520-5924</a></strong></li>
					</ul>
				</address>
			</div>

			<div class="clear"></div>

			<p class="main-copyright">Copyright <?= date('Y'); ?> - Divórcio 24h Online - Todos os direitos reservados | Desenvolvido por: <a title="JCandido Criação e Design" target="_blank" href="http://www.jcandido.com.br/">JCandido Criação e Design</a></p>
			
		</div>
	</footer>

	<div class="modal-dialog modal-dialog-password" role="dialog">
		<div class="modal-content">

			<a class="modal-close" href="" aria-label="close" >Fechar</a>

			<header class="modal-header">
				<h2>Recuperar minha senha</h2>
			</header>
			
			<div class="modal-body">
				
				<p>Para recuperar sua senha, favor informar o <strong>e-mail cadastrado.</strong></p>
				<p style="display:none" class="msgEsqueciSenha"></p>
				<form id="formRecuperaSenha" class="formRecuperaSenha" action="" method="POST">
					<ul>
						<li>
							<label>
								<input type="text" name="email_recuperacao" placeholder="digite o e-mail cadastrado...">
							</label>
						</li>

						<li class="form-item">
							<button class="btn btn-recover-password" id="EnviaRecuperaSenha" type="submit">Enviar</button>
						</li>
					</ul>
				</form>
				
			</div>

			<footer class="modal-footer"></footer>
		</div>
	</div>

	</div><!-- /pusher -->
	
	<script src="<?php echo base_url();?>js/vendor/scripts.min.js"></script>   
	<script src="<?php echo base_url();?>js/funcoes.js"></script>
	<script src="<?php echo base_url();?>js/ajaxForm.js"></script>
	<script>
		new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ), {
			type : 'cover'
		} );
	</script>     
    
</body>
</html>