<?php
// Define o tempo máximo de execução em 0 para as conexões lentas
set_time_limit(0);
// Arqui você faz as validações e/ou pega os dados do banco de dados
//$aquivoNome = 'imagem.jpg'; // nome do arquivo que será enviado p/ download
$arquivoLocal = '\\\WINDOWS-PD-0001.FS.LOCAWEB.COM.BR\WNFS-0001\divorcio-online24hs\web\uploadsdocs/' . $id . "/" .$aquivoNome; // caminho absoluto do arquivo
// Verifica se o arquivo não existe
if (!file_exists($arquivoLocal)) {
// Exiba uma mensagem de erro caso ele não exista
//echo dirname(dirname(__FILE__));
echo $arquivoLocal;
exit;
}
// Aqui você pode aumentar o contador de downloads
// Definimos o novo nome do arquivo
//$novoNome = $aquivoNome;
// Configuramos os headers que serão enviados para o browser
header('Content-Description: File Transfer');
header('Content-Disposition: attachment; filename="'.$aquivoNome.'"');
header('Content-Type: application/octet-stream');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($aquivoNome));
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
header('Expires: 0');
ob_end_clean(); //essas duas linhas antes do readfile
flush();
// Envia o arquivo para o cliente
readfile($arquivoLocal);
?>