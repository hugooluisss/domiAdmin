<?php
/**
* TError
* Para la gestion de errores. Genera un archivo html con el nombre la lista de errores generados, en que archivo, linea, dia y hora
* PHP 5
* @author     Hugo Luis Santiago Altamirano hugooluisss@gmail.com
* @license    openSource
* @version    1.0, 12/jul/2008
**/

class TError{
	var $archivo;
	
/**
* Metodo Constructor
* Llama al constructor padre para hacer las conexiones
*/
	function TError($archivo){
		$this->archivo = $archivo;
	}

/**
* Escribe el error en el archivo especificado en el archivo aplicacion.php
* @param string $numerror Numero/Tipo del error generado
* @param string $cadena 
* @param string $archivo Nombre del archivo donde se genero el error 
* @param string $linea Linea del archivo donde se genero el error
*/		
	function escribeError($numerror, $cadena, $archivo, $linea){
		if ($this->validar($numerror)){
			$texto = $this->tiposError($numerror);
		
			$texto .= '<strong> Error en la linea <span style="color:BLUE">'.$linea.'</span> del archivo <span style="color:BLUE">'.$archivo.' - MOD: '.$_REQUEST['mod'].',</span> el dia <span style="color:BLUE">'.date('d/m/Y H:m').',</span><br /></strong>';
			$texto .= '<strong><p>El mensaje Mandado es :</p></strong>';
			$texto .= $cadena.'<br />';
			$texto .= '<hr>';
		
			$this->escribeArchivo($texto);
		}
		
		
	}

/**
* Retorna un mensaje segun el tipo de error
* @param string $numero Numero/Tipo del error generado
* @return string Mensaje de error
*/	
	function tiposError($numero){
		switch ($numero){
			case E_USER_ERROR: //error del usuario
				return '<b style="color:RED;">Error del Usuario</b>';
			break;
			case E_USER_WARNING: case E_USER_NOTICE:
				return '<b style="color:BLUE;">Precaucion Usuario</b>';
			break;
			
			case E_ERROR:
				return '<b style="color:RED;">Error en tiempo de Ejecucion</b>';
			break;
			
			case 257:
				return '<b style="color:GREEN;">ERROR DEL SISTEMA</b>';
			break;
			case E_COMPILE_ERROR:
				return '<b style="color:YELLOW;">Error en tiempo de compilacion</b>';
			break;
			case E_COMPILE_WARNING:
				return '<b style="color:YELLOW;">Advertencia en tiempo de compilacion</b>';
			break;
			case E_PARSE:
				return '<b style="color:RED;">Error de Compilacion</b>';
			break;
			default:
				return '<b style="color:ORANGE">Error desconocido</b>';
			break;	
		}
	}

/**
* Lista de errores que se van a mostrar en el archivo
* @param string $numero Numero del error
* @return boolean Retorna true si esta dentro de la lista
*/	
	function validar($numero){
		switch ($numero){
			case E_USER_ERROR: case E_USER_WARNING: case E_ERROR: case 257:
			case E_PARSE: case E_COMPILE_ERROR: case E_COMPILE_WARNING: case E_USER_NOTICE:
				return true;
			break;
			default:
				return false;
			break;			
		}
	}

/**
* Escribe el mensaje en el archivo
* @param string $texto Mensaje a escribir
* @return boolean True si si se pudo escribir
*/	
	function escribeArchivo($texto) {
		if(($fp = fopen($this->archivo, "a+")) == true) {
        	flock($fp, LOCK_EX);
        	fwrite($fp, $texto);
        	flock($fp,LOCK_UN);
            fclose($fp);
            $retval = true;
		} else 
        	$retval = false;
		return($retval);
	}
}

function gestorErrores($numerror, $cadena, $archivo, $linea, $contexto){
	$obj = new TError('logs/log.'.date('d.m.y').'.html');
	
	$obj->escribeError($numerror, $cadena, $archivo, $linea);
}

function ErrorSistema($texto){
	gestorErrores(257, $texto, 'Desconocido', 0, 'asdf');
}

set_error_handler("gestorErrores");
?>