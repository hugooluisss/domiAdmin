<?php
header("Access-Control-Allow-Origin: *");

#variables
$ini = array();
$ini = parse_ini_file('aplicacion.ini', true);

ini_set('display_errors', '0');

include_once("config.php");
define("MODULO_DEFECTO", 'inicio');
define("MODULO_SESION_INICIADA", 'panelPrincipal');
#define("SISTEMA", $ini['sistema']['acronimoEmpresa']);

session_start();
session_name(SISTEMA);
$sesion = $_SESSION[SISTEMA];
$modulo = $_GET['mod'] == ''?(isset($sesion['usuario'])?MODULO_SESION_INICIADA:MODULO_DEFECTO):$_GET['mod'];

header('Content-Type: text/html; charset=UTF-8');
setlocale(LC_CTYPE, "es_ES");
date_default_timezone_set("America/Mexico_City");

#librerias
define('ADODB_ERROR_LOG_DEST','errors.log');
define('ADODB_ERROR_LOG_TYPE',2);
include('librerias/adodb/adodb-errorhandler.inc.php');
include('librerias/adodb/adodb.inc.php');
require_once('librerias/phpMailer/PHPMailerAutoload.php');
include('librerias/funciones.php');
#require('librerias/fpdf/fpdf.php');
#require('librerias/fpdf/tfpdf.php');
#require('librerias/upload/uploadHandler.php');
#require('librerias/bmptojpg.php');
#require('librerias/excelRead/reader.php');

ini_set("include_path", ini_get("include_path").PATH_SEPARATOR.dirname(__FILE__)."/librerias/pear/");
includeDir("clases/framework/");
includeDir("clases/aplicacion/");

$objModulo = new TModulo($modulo);
$bandSesion = true;
if ($objModulo->requiereSeguridad()){
	if (!isset($sesion['usuario']) or $sesion['usuario'] == ''){
		#echo $sesion['usuario'];
		$bandSesion = false;
		$modulo = MODULO_DEFECTO;
		unset($objModulo);
		$objModulo = new TModulo($modulo);
	}
}else
	$bandSesion = isset($sesion['usuario']);
	
$pageSesion = new TUsuario($sesion['usuario']);
if (!$objModulo->userCanSee($pageSesion->getIdTipo())){
	$bandSesion = false;
	unset($objModulo);
	
	$objModulo = new TModulo(MODULO_DEFECTO);
}

define("DIR_PLANTILLAS", 'templates');
define('TEMPLATE', DIR_PLANTILLAS.'/plantillas/');
define('CONFIG', 'librerias/smarty/repositorio/configs/');
define('CACHE', 'librerias/smarty/repositorio/cache/');
define('COMPILE', 'librerias/smarty/repositorio/compile/');

require_once('librerias/smarty/Smarty.class.php');
$smarty = new Smarty;
$smarty->debugging = (strtoupper($ini['sistema']['debug']) == 'ON');
$smarty->debugging = false;
$smarty->caching = (strtoupper($ini['sistema']['caching']) == 'ON');
$smarty->cache_lifetime = 120;

$smarty->template_dir = TEMPLATE;
$smarty->config_dir = CONFIG;
$smarty->cache_dir = CACHE;
$smarty->compile_dir = COMPILE;
$pageSesion = new TUsuario($sesion['usuario']);
$userSesion = $pageSesion;
$datosPlantilla = array(
	"ruta" => DIR_PLANTILLAS."/",
	"css" => DIR_PLANTILLAS."/css/",
	"iconos" => DIR_PLANTILLAS."/iconos/",
	"sesion" => $_SESSION[SISTEMA],
	"debug" => strtoupper($ini['sistema']['debug']) == "ON",
	"sesionIniciada" => $bandSesion?'1':'0',
	"vista" => $objModulo->getRutaVista(),
	"nombreAplicacion" => SISTEMA,
	"empresa" => $ini['sistema']['nombreEmpresa'],
	"empresaAcronimo" => $ini['sistema']['acronimoEmpresa'],
	"action" => $_GET['action'],
	"POST" => $_POST,
	"GET" => $_GET,
	"version" => "1.0",
	"alias" => "",
	"rutaModulos" => TEMPLATE,
	"modulo" => $modulo,
	"scriptsJS" => $objModulo->getScriptsJS(),
	"usuario" => $pageSesion);

foreach($_GET as $indice => $valor){
	$_GET[$indice] = ereg_replace('\\"', "",$_GET[$indice]);
	$_GET[$indice] = stripslashes($_GET[$indice]);
	$_GET[$indice] = ereg_replace("'", "''", $_GET[$indice]);
}
	
foreach($_POST as $indice => $valor){
	if ($objModulo->getDebugSeguridad())
		$_POST[$indice] = addslashes($_POST[$indice]);
}

define('TAMPAG', $ini['config']['TAMPAG']);
define('NUMPAG', $ini['config']['NUMPAG']);

if ($objModulo->getRutaControlador() <> '')
	require('controlador/'.$objModulo->getRutaControlador());

$smarty->assign("PAGE", $datosPlantilla);

if($objModulo->getRutaCapa() <> '')
	$smarty->display($objModulo->getRutaCapa());
?>