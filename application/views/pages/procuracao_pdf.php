<?php 
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$data = strftime('%d de %B de %Y', strtotime('today'));
$text = '
<p align="center"><u>PROCURAÇÃO</u></p>
<p align="center">&nbsp;</p>
<p align="justify">Pelo  presente instrumento particular de procuração <em><strong>' . $clientes["nome_conjuge1"] . '</strong>, </em> RG nº. ' . $clientes["rg_conjuge1"] . ', inscrito no  CPF/MF nº. ' . $clientes["cpf_conjuge1"] . ', residente na ' . $clientes["endereco_conjuge1"] . ' - BAIRRO: ' . $clientes["bairro_conjuge1"] . ' - CEP: ' . $clientes["cep_conjuge1"] . ' e <em><strong>' . $clientes["nome_conjuge2"] . '</strong>, </em> RG nº. ' . $clientes["cpf_conjuge2"] . ', inscrito no CPF/MF nº.  ' . $clientes["cpf_conjuge2"] . ', residente na ' . $clientes["endereco_conjuge2"] . ' - BAIRRO: ' . $clientes["bairro_conjuge2"] . ' - CEP: ' . $clientes["cep_conjuge2"] . ' , nomeia  e constitui sua bastante procuradora a advogada <em><u>ANNITA  GUIMARÃES GALLUCCI</u></em>, inscrita  na OAB/SP sob o nº 327.950 e  <em><u><strong>BRUNO .F.GALLUCCI</strong></u></em>  inscrito na OAB-SP  sob o número 340.98 ambos com escritório profissional à Rua Apeninos, 429  –Conj.1208 –Aclimação-SP, CEP: 01533-000 a quem conferem os mais amplos, gerais e ilimitados poderes  para o fim especial de nomear e constituir advogado(a)(os)(as) para propor Ação  de Separação Judicial ou Divórcio, Consensual ou Litigioso dos outorgantes, no  foro em geral, com a cláusula &ldquo;Ad Judicia et Extra&rdquo;, em qualquer Juízo,  Instância ou Tribunal, podendo propor contra quem de direito as ações  competentes e defendê-lo(a) nas contrárias, seguindo umas e outras, até final  decisão, usando os recursos legais e acompanhando-os, representá-lo(a) perante  Cartório do Registro Civil e Repartições Públicas em geral, conferindo-lhe(s)  ainda poderes especiais para transigir, confessar, acordar, desistir, firmar  compromissos ou acordos, receber quantias, dar e receber quitação, firmar  recibos, interpor recursos, assinar termos, requerer medidas preventivas e  preparatórias, prestar declarações, fazer provas, anuir, concordar, acompanhar  qualquer processo em todos os termos e instâncias, podendo substabelecer, no  todo ou em parte, com ou sem reservas de poderes, agindo em conjunto ou  separadamente, dando tudo por bom, firme e valioso; enfim, praticar, promover,  requerer e assinar o que se fizer necessário ao firme e fiel cumprimento do  presente mandato. </p>
<p>&nbsp;</p>
<p align="center">São Paulo, ' . $data . '.</p>

<p align="center"><br><strong>________________________________________________</strong><br>
  <strong>' . $clientes["nome_conjuge1"] . '</strong><br>
  <strong>RG nº.</strong> ' . $clientes["rg_conjuge1"] . '</p>

<p align="center"><br><strong>________________________________________________</strong><br>
  <strong>' . $clientes["nome_conjuge2"] . '</strong><br>
  <strong>RG nº.</strong> ' . $clientes["rg_conjuge2"] . '</p>
<p>';

  
  include("mpdf60/mpdf.php");
  $mpdf = new mPDF(); 
  $mpdf->WriteHTML($text);
  $mpdf->Output();
  exit();
  //echo $text;
  ?>