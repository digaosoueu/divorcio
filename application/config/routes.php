<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['cliente_EsqueciSenha'] = "enviaemail/formEsqueciSenha";
$route['admin_getMensagem_(:num)'] = "admin/getMensagensCliente/$1";
$route['admin_alteraStatus_(:any)_(:num)'] = "admin/alteraStatus/$1/$2";
$route['admin_enviaMensagem'] = "admin/MensagensCliente";
$route['uploadsdocs/(:num)/(:any)'] = 'admin/downloadDocs/$1/$2';
$route['jcandidoadm'] = 'admin/Index';

$route['jcandidoadm/cliente_edit_(:num)'] = 'admin/editarCliente/$1';
$route['jcandidoadm/cliente_add'] = 'admin/editarCliente/0';

$route['jcandidoadm/cliente_deletar_(:num)'] = 'admin/deletarCliente/$1';

$route['jcandidoadm/salvarCliente'] = 'admin/SalvarCliente';
$route['jcandidoadm/formCliente_(:num)_(:any)'] = 'admin/FormCliente/$1/$2';
$route['jcandidoadm/login'] = 'login/Index';
$route['jcandidoadm/logOut'] = 'login/logOut';
$route['jcandidoadm/logarUsuario'] = 'login/LoginAdmin';
$route['jcandidoadm/(:any)'] = 'admin/view/$1';

$route['editar-cliente/(:any)'] = "clientes/Index/$1";
$route['minha-conta'] = "clientes/Index";

$route['logout'] = "clientes/Logout";

$route['cliente_enviaMensagem'] = "clientes/MensagensCliente";
$route['cliente_getMensagem_(:num)'] = "clientes/getMensagensCliente/$1";

$route['cliente_getDocumentos_(:num)'] = "clientes/getDocumentosCliente/$1";

$route['cliente_salvarCliente'] = "clientes/Salvar";
$route['cliente_loginCliente'] = "clientes/Login";

$route['cliente_formJudicial'] = "clientes/FormJudicial";
$route['cliente_formJudicialPrint'] = "clientes/FormJudicialDadosPrint";
$route['form-consensual-judicial'] = "clientes/FormJudicialDados";

$route['cliente_formExtrajudicial'] = "clientes/FormExtrajudicial";
$route['form-extrajudicial'] = "clientes/FormExtrajudicialDados";
$route['cliente_formExtrajudicialPrint'] = "clientes/FormExtrajudicialDadosPrint";

$route['GerarHtmltoPdf/(:any)'] = "clientes/GerarHtmltoPdf/$1";

/////////////////////////////////////////////////
$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';
//$route['404_override'] = '';
//$route['translate_uri_dashes'] = FALSE;

