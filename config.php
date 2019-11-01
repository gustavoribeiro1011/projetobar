<?php

// @Criação 28/10/2019 

$app_name= 'PROJETO';

$app_directory= 'projetobar';


$app_token= 'appbar1';


/**
 *
 *	CAMINHO NO SERVER PARA O SISTEMA
 *
 */ 
if ( !defined('BASEURL') )
	define('BASEURL', '/'.$app_directory .'/');

if ( !defined('URLSERVER') )
	define('URLSERVER', $_SERVER['HTTP_HOST']);


/**
 *
 *	CONEXÃO INTERNA
 *
 */ 
define('DB_NAME', 'projetobar');
define('DB_USER', 'root');
define('DB_PASS', 'usbw');
define('DB_HOST', 'localhost');

$conecta = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die("Não foi possível estabelecer a conexão com o BD.");
$conecta->set_charset("utf8");


/**
 *
 *  LOCALIZACAO
 *
 */ 
setlocale(LC_TIME, 'portuguese'); 
date_default_timezone_set('America/Sao_Paulo');


/**
 *
 *  ROTAS
 *
 */ 

//Sidebar
$ControllerSidebar = $_SERVER['DOCUMENT_ROOT'];
$ControllerSidebar .= BASEURL . "controllers/sidebar/ControllerSidebar.php";

$ControllerSidebarToggle = $_SERVER['DOCUMENT_ROOT'];
$ControllerSidebarToggle .= BASEURL . "controllers/sidebar/ControllerSidebarToggle.php";

// Produtos
$AlertasProduto = $_SERVER['DOCUMENT_ROOT'];
$AlertasProduto .= BASEURL . "views/produtos/templates/Alertas.php";

$ControllerCadastrarProduto = $_SERVER['DOCUMENT_ROOT'];
$ControllerCadastrarProduto .= BASEURL . "controllers/produtos/ControllerCadastrar.php";

$ControllerEditarProduto = $_SERVER['DOCUMENT_ROOT'];
$ControllerEditarProduto .= BASEURL . "controllers/produtos/ControllerEditar.php";

$ControllerExcluirProduto = $_SERVER['DOCUMENT_ROOT'];
$ControllerExcluirProduto .= BASEURL . "controllers/produtos/ControllerExcluir.php";


