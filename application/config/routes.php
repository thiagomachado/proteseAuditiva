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
|	http://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller']      = 'menu';
$route['404_override']            = '';
$route['translate_uri_dashes']    = FALSE;

//-------------------LOGIN------------------------------------------------------
$route['login']                   = 'login';
$route['sair']                    = 'login/logout';
$route['recuperarSenha']          = 'login/recuperarSenha';

//-------------------MENU-------------------------------------------------------
$route['menu']                    = 'menu';
$route['atendimento']             = 'menu/menuAtendimento';
$route['sistema']                 = 'menu/menuSistema';

//-------------------PACIENTE---------------------------------------------------
$route['consultaPaciente']        = 'paciente';
$route['cadastroPaciente']        = 'paciente/cadastroPaciente';
$route['excluirPaciente/(:num)']  = 'paciente/excluir/$1';
$route['edicaoPaciente/(:num)']   = 'paciente/edicaoPaciente/$1';
$route['editarPaciente']          = 'paciente/editar';
$route['cadastrarPaciente']       = 'paciente/cadastrar';
$route['municipios/(:any)']       = 'paciente/popularMunicipios/$1';

//-------------------ANAMNESE---------------------------------------------------
$route['cadastroAnamnese/(:num)']   = 'anamnese/cadastroAnamnese/$1';
$route['edicaoAnamnese/(:num)']     = 'anamnese/edicaoAnamnese/$1';
$route['editarAnamneseAdulta']      = 'anamnese/editarAdulta';
$route['cadastrarAnamneseAdulta']   = 'anamnese/cadastrarAdulta';
$route['editarAnamneseInfantil']    = 'anamnese/editarInfantil';
$route['cadastrarAnamneseInfantil'] = 'anamnese/cadastrarInfantil';

//-------------------CARACTERIZACAO PACIENTE------------------------------------
$route['cadastroCaracterizacaoPaciente']        = 'caracterizacaoPaciente/selecionarPaciente';
$route['cadastroCaracterizacaoPaciente/(:num)'] = 'caracterizacaoPaciente/cadastroCaracterizacao/$1';
$route['cadastrarCaracterizacaoPaciente']       = 'caracterizacaoPaciente/cadastrar';
$route['consultaCaracterizacao']                = 'caracterizacaoPaciente/consultaCaracterizacao';
$route['edicaoCaracterizacao/(:num)']           = 'caracterizacaoPaciente/edicaoCaracterizacao/$1';
$route['editarCaracterizacaoPaciente']          = 'caracterizacaoPaciente/editar';
$route['emitirLaudo/(:num)']                    = 'caracterizacaoPaciente/emitirLaudoPDF/$1';


//-------------------SOLICITAÇÃO------------------------------------
$route['cadastroSolicitacao']            = 'solicitacao/selecionarPaciente';
$route['cadastroSolicitacao/(:num)']     = 'solicitacao/cadastroSolicitacao/$1';
$route['cadastrarSolicitacao']           = 'solicitacao/cadastrar';
$route['emitirLaudoSolicitacao/(:num)']  = 'solicitacao/emitirLaudoPDF/$1';
$route['consultaSolicitacao']            = 'solicitacao/consultaSolicitacao';
$route['consultaSolicitacao/(:num)']     = 'solicitacao/consultaSolicitacaoPorPaciente/$1';
$route['edicaoSolicitacao/(:num)']       = 'solicitacao/edicaoSolicitacao/$1';
$route['editarSolicitacao']              = 'solicitacao/editarSolicitacao';
$route['emitirLaudoSolicitacao/(:num)']  = 'solicitacao/emitirLaudoPDF/$1';


//-------------------ANDAMENTO DE PACIENTES -------------------------------------------
$route['andamentoPaciente']          = 'andamentoPaciente/selecionarPaciente';
$route['andamentoPaciente/(:num)']   = 'andamentoPaciente/edicaoAndamentoPaciente/$1';
$route['atualizarAndamentoPaciente'] = 'andamentoPaciente/editar';
$route['excluirConsulta/(:num)']     = 'andamentoPaciente/excluirConsulta/$1';


//-------------------IMPLANTE-----------------------------------------------------------
$route['estoqueImplantes']        = 'implante';
$route['cadastroImplante']        = 'implante/cadastro';
$route['cadastrarImplante']       = 'implante/cadastrar';
$route['edicaoImplante/(:num)']   = 'implante/edicao/$1';
$route['editarImplante']          = 'implante/editar';

//-------------------PROTESE-----------------------------------------------------------
$route['estoqueProteses']        = 'protese';
$route['cadastroProtese']        = 'protese/cadastro';
$route['cadastrarProtese']       = 'protese/cadastrar';
$route['edicaoProtese/(:num)']   = 'protese/edicao/$1';
$route['editarProtese']          = 'protese/editar';

//-------------------PROCEDIMENTO-----------------------------------------------------------
$route['procedimento']                = 'procedimento';
$route['cadastroProcedimento']        = 'procedimento/cadastro';
$route['cadastrarProcedimento']       = 'procedimento/cadastrar';
$route['edicaoProcedimento/(:num)']   = 'procedimento/edicao/$1';
$route['editarProcedimento']          = 'procedimento/editar';

//------------------Usuarios-----------------------------------------------------------
$route['cadastroUsuario']     = 'usuario/cadastroUsuario';
$route['cadastrarUsuario']    = 'usuario/cadastrar';
$route['meusDados']           = 'usuario/edicaoUsuario';
$route['editarUsuario']       = 'usuario/editar';
