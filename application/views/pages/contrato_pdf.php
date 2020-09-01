<?php 
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$data = strftime('%d de %B de %Y', strtotime('today'));
$text = '
<p align="center"><strong><u>CONTRATO DE PRESTAÇÃO DE SERVIÇOS</u></strong><strong> </strong></p>
<p><strong>&nbsp;</strong></p>
<div style="text-align:justify; padding:0 40px;">
  <p><strong>CONTRATANTE</strong><br>
    <strong>Nome:</strong> ' . $clientes["nome_conjuge1"] . '<br>
    <strong>CPF:</strong> ' . $clientes["cpf_conjuge1"] . '<br>
    <strong>RG:</strong> ' . $clientes["rg_conjuge1"] . '<br>
    <strong>Endereço:</strong>' . $clientes["endereco_conjuge1"] . '<br>
    <strong>Cidade:</strong>' . $clientes["cidade_conjuge1"] . '<br>
    <strong>CEP:</strong> ' . $clientes["cep_conjuge1"] . '<br>
    <strong>TELEFONE:</strong> ' . $clientesCompl["cliente_telefone"] . '<br>
    <strong>E-MAIL: ' . $clientesCompl["cliente_email"] . '</strong></p>
</div>
<div style="text-align:justify; padding:0 40px;">
  <p><strong>CONTRATADO</strong><br>
    <strong>GUIMARÃES GALLUCCI SOCIEDADE DE ADVOGADOS</strong><br>
    <strong>CNPJ: 19.371.909/0001-84</strong> <br>
    <strong>Rua Apeninos, 429 – Conj.1208 –  Paraíso SP, CEP: 01533-000</strong><br>
    <strong>Telefone:  (11)3271-3389 Site:  www.guimaraesgallucci.com.br</strong></p>
</div>
<div style="text-align:justify; padding:0 40px;">
<p>Por  este instrumento e mediante outorga do mandato respectivo, o abaixo assinado  autoriza o Contratado, através de seus advogados nomeados por procuração a  propor <strong>AÇÃO DE DIVORCIO CONSENSUAL</strong>,  como as cláusulas do presente contrato a seguir:</p>
<ol>
  <li>No ato da assinatura deste  instrumento o <strong>CONTRATANTE</strong> pagará a  título de honorários pelos serviços prestados o importe fixo de R$ 750,00  (Setecentos e cinquenta reais) em uma única parcela ao <strong>CONTRATADO</strong>. Em caso de parcela via PagSeguro os encargos serão  suportados pelo <strong>CONTRATANTE</strong>.</li>
  <li style="margin:15px 0;">Após a entrega de toda  documentação e assinatura da procuração &ldquo;ad judicia&rdquo; por parte do <strong>CONTRATANTE</strong>, o <strong>CONTRATADO</strong> terá um prazo de 20 dias para finalizar o procedimento  de divórcio extrajudicial. Sendo o divórcio judicial o prazo para finalizar é  indeterminado.</li>
  <li style="margin:15px 0;">As informações sobre o processo  serão disponibilizadas pelo <strong>CONTRATADO</strong> para o <strong>CONTRATANTE</strong> via internet,  telefone ou atendimento pelos estagiários do escritório, de segunda a sexta  feira das 09:00 as 18:00.</li>
  <li style="margin:15px 0;">Em caso de desistência após a  assinatura do contrato e envio, será devolvido apenas 70% do valor pago, sendo  o restante, a título de multa pela rescisão do contrato.</li>
  <li style="margin:15px 0;">O serviço prestado de divórcio  consensual tem garantia de êxito contratual, desde que, as partes <strong>CONTRATANTES</strong> cumpram exatamente o que  for exigido pelo <strong>CONTRATADO</strong>.</li>
  <li style="margin:15px 0;">Em caso de divórcio consensual  judicial, contratante tem ciência que poderá eventualmente, arcar com as custas  judiciais devidas ao estado, caso o tribunal entenda que não é carecedor do  benefício da justiça gratuita.&nbsp;</li>
  <li style="margin:10px 0;">Em se tratando de divórcio  consensual extrajudicial, ficará pré-estabelecido o pagamento da taxa devida ao  cartório no importe de R$ 250,00 + despesas de postagem via correios da  certidão original.</li>
  <li style="margin:15px 0;">Após o envio da certidão de  divórcio pelo <strong>CONTRATADO</strong>, deverá o <strong>CONTRATANTE</strong> comparecer no cartório onde  realizou o casamento para averbação.</li>
  <p><strong><u>DAS  DESPESAS EXTRAS</u></strong></p>
  <li style="margin:15px 0;">O <strong>CONTRATANTE</strong> concorda expressamente que <strong>caso necessário</strong>, poderá o <strong>CONTRATADO</strong> incorrer em despesas extras, tais como, recolher taxas judiciais, guias e  emolumentos, taxas dos correios, serviços cartorários, cópias e outros serviços  a fim de agilizar o trâmite do divórcio, sendo que, nesse caso deverá ser  reembolsado mediante justificativa fundamentada e envio dos recibos pela  CONTRATANTE.</li>
 
</ol>
</div>
<div style="text-align:center; padding:0 40px;">
<p><strong>São  Paulo, ' . $data . '.</strong></p>
<p><br><strong>________________________________________________</strong><br>
  <strong>' . $clientes["nome_conjuge1"] . '</strong><br>
  <strong>CPF:</strong> ' . $clientes["cpf_conjuge1"] . '</p>
<p><br>
  <img src="http://divorcio-online24hs.com.br/images/ass-bruno.png">
  <br>
  <strong>GUIMARÃES &amp; GALLUCCI ADVOGADOS<br>
  CNPJ: 19.371.909/0001-84</strong></p>
</div>';  
  include("mpdf60/mpdf.php");
  $mpdf = new mPDF('utf-8', 'Letter', 0, '', 0, 0, 50, 10, 0, 0); 
  //$mpdf->SetDisplayMode('fullpage');
  $mpdf->SetHeader('<img src="http://divorcio-online24hs.com.br/images/papelaria-timbrado-topo.png">');
  
  $mpdf->WriteHTML($text);
  $mpdf->Output();
  exit();
  ?>
