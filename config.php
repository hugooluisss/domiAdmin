<?php
define('SISTEMA', 'Domi');
define('VERSION', 'v 1.0');
define('ALIAS', '');
define('AUTOR', 'Hugo Luis Santiago Altamirano');
define('EMAIL', 'hugooluisss@gmail.com');
define('EMAILSOPORTE', 'hugooluisss@gmail.com');
define('STATUS', 'En desarrollo');

define('LAYOUT_DEFECTO', 'layout/default.tpl');
define('LAYOUT_AJAX', 'layout/update.tpl');
define('LAYOUT_JSON', 'layout/json.tpl');

#Login y su controlador
$conf['inicio'] = array(
	'descripcion' => '',
	'seguridad' => false,
	'js' => array('usuario.class.js'),
	'jsTemplate' => array('login.js'),
	'capa' => 'layout/login.tpl');

$conf['logout'] = array(
	'controlador' => 'login.php',
	#'vista' => 'usuarios/panel.tpl',
	'descripcion' => 'Salir del sistema',
	'seguridad' => false,
	'js' => array(),
	'capa' => LAYOUT_DEFECTO);
	
$conf['clogin'] = array(
	'controlador' => 'login.php',
	'descripcion' => 'Inicio de sesion',
	'seguridad' => false,
	'capa' => LAYOUT_JSON);
	
$conf['bienvenida'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/bienvenida.tpl',
	'descripcion' => 'Bienvenida al sistema',
	'seguridad' => true,
	'capa' => LAYOUT_DEFECTO);

$conf['admonUsuarios'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/panel.tpl',
	'descripcion' => 'Administración de usuarios',
	'seguridad' => true,
	'js' => array('usuario.class.js'),
	'jsTemplate' => array('usuarios.js'),
	'perfiles' => array(1),
	'capa' => LAYOUT_DEFECTO);

$conf['listaUsuarios'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/lista.tpl',
	'descripcion' => 'Lista de usuarios',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['cusuarios'] = array(
	'controlador' => 'usuarios.php',
	'descripcion' => 'Controlador de usuarios',
	'seguridad' => true,
	'capa' => LAYOUT_JSON);
	
/*Datos de usuario desde el panel*/
$conf['usuarioDatosPersonales'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/datosPersonales.tpl',
	'descripcion' => 'Cambiar datos personales',
	'seguridad' => true,
	'js' => array('usuario.class.js'),
	'jsTemplate' => array('datosUsuario.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['admonUsuarios'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/panel.tpl',
	'descripcion' => 'Administración de usuarios',
	'seguridad' => true,
	'js' => array('usuario.class.js'),
	'jsTemplate' => array('usuarios.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['panelPrincipal'] = array(
	#'controlador' => 'index.php',
	'vista' => 'inicio.tpl',
	'descripcion' => 'Vista del panel',
	'seguridad' => true,
	'js' => array(),
	'capa' => LAYOUT_DEFECTO);

/*Clientes*/
$conf['clientes'] = array(
	'controlador' => 'clientes.php',
	'vista' => 'clientes/panel.tpl',
	'descripcion' => 'Administración de clientes',
	'js' => array('cliente.class.js'),
	'jsTemplate' => array('clientes.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['listaClientes'] = array(
	'controlador' => 'clientes.php',
	'vista' => 'clientes/lista.tpl',
	'descripcion' => 'Lista de clientes',
	'capa' => LAYOUT_AJAX);

$conf['cclientes'] = array(
	'controlador' => 'clientes.php',
	'descripcion' => 'Controlador de clientes',
	'capa' => LAYOUT_JSON);
	
$conf['listaSitios'] = array(
	'controlador' => 'clientes.php',
	'vista' => 'clientes/sitios/lista.tpl',
	'descripcion' => 'Lista de sitios agregados por el cliente',
	'capa' => LAYOUT_AJAX);

/*Categoria de servicios*/
$conf['categoriaservicios'] = array(
	'controlador' => 'categoriaservicios.php',
	'vista' => 'categoriaservicios/panel.tpl',
	'descripcion' => 'Administración de categoria de servicios',
	'js' => array('categoriaservicios.class.js'),
	'jsTemplate' => array('categoriaservicios.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['listaCategoriaServicios'] = array(
	'controlador' => 'categoriaservicios.php',
	'vista' => 'categoriaservicios/lista.tpl',
	'descripcion' => 'Lista de categoria de servicios',
	'capa' => LAYOUT_AJAX);

$conf['ccategoriaservicios'] = array(
	'controlador' => 'categoriaservicios.php',
	'descripcion' => 'Controlador de Categoria de servicios',
	'capa' => LAYOUT_JSON);

/*Servicios*/
$conf['servicios'] = array(
	'controlador' => 'servicios.php',
	'vista' => 'servicios/panel.tpl',
	'descripcion' => 'Administración de servicios',
	'js' => array('servicios.class.js'),
	'jsTemplate' => array('servicios.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['listaServicios'] = array(
	'controlador' => 'servicios.php',
	'vista' => 'servicios/lista.tpl',
	'descripcion' => 'Lista de servicios',
	'capa' => LAYOUT_AJAX);

$conf['cservicios'] = array(
	'controlador' => 'servicios.php',
	'descripcion' => 'Controlador de servicios',
	'capa' => LAYOUT_JSON);

/*Preciokilometro*/
$conf['kilometros'] = array(
	'controlador' => 'preciokilometros.php',
	'vista' => 'preciokilometros/panel.tpl',
	'descripcion' => 'Administración de los precios por kilómetro',
	'js' => array('precio.class.js'),
	'jsTemplate' => array('preciokilometros.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['listaKilometros'] = array(
	'controlador' => 'preciokilometros.php',
	'vista' => 'preciokilometros/lista.tpl',
	'descripcion' => 'Lista de precios por kilómetro',
	'capa' => LAYOUT_AJAX);

$conf['ckilometros'] = array(
	'controlador' => 'preciokilometros.php',
	'descripcion' => 'Controlador de precios por kilómetro',
	'capa' => LAYOUT_JSON);
?>