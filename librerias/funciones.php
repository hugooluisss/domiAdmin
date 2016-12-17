<?php
function includeDir($dir){
    $directorio = scandir($dir);
    foreach($directorio as $archivo){
            $separado = explode(".", $archivo);
            $ext = strtolower($separado[count($separado)-1]);
            if ($ext == "php")
                    include_once($dir.$archivo);
    }
}

function get_data($url) {
	$ch = curl_init();
	$timeout = 5;
	curl_setopt($ch, CURLOPT_URL, $url);
	//curl_setopt($ch, CURLOPT_POST, TRUE);             // Use POST method
	//curl_setopt($ch, CURLOPT_POSTFIELDS, "var1=1&var2=2&var3=3");  // Define POST values
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
	curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}

function getMiniatura($url, $miniatura_ancho_maximo = 80, $miniatura_alto_maximo = 80){
	$im = imagecreatefromstring(get_data($url));
	list($imagen_ancho, $imagen_alto) = getimagesize($url);
	
	$proporcion_imagen = $imagen_ancho / $imagen_alto;
	$proporcion_miniatura = $miniatura_ancho_maximo / $miniatura_alto_maximo;
	
	if ( $proporcion_imagen > $proporcion_miniatura ){
		$miniatura_ancho = $miniatura_ancho_maximo;
		$miniatura_alto = $miniatura_ancho_maximo / $proporcion_imagen;
	} else if ( $proporcion_imagen < $proporcion_miniatura ){
		$miniatura_ancho = $miniatura_ancho_maximo * $proporcion_imagen;
		$miniatura_alto = $miniatura_alto_maximo;
	} else {
		$miniatura_ancho = $miniatura_ancho_maximo;
		$miniatura_alto = $miniatura_alto_maximo;
	}
	
	$thumb = imagecreatetruecolor($miniatura_ancho, $miniatura_alto);
	imagecopyresized($thumb, $im, 0, 0, 0, 0, $miniatura_ancho, $miniatura_alto, $imagen_ancho, $imagen_alto);
	
	#header('Content-Type: image/jpeg');
	return $thumb;
}

function formatBytes($bytes, $precision = 3) { 
    if ($bytes >= 1073741824)
		$bytes = number_format($bytes / 1073741824, 2) . ' GB';
	elseif ($bytes >= 1048576)
		$bytes = number_format($bytes / 1048576, 2) . ' MB';
	elseif ($bytes >= 1024)
		$bytes = number_format($bytes / 1024, 2) . ' KB';
	elseif ($bytes > 1)
		$bytes = $bytes . ' bytes';
	elseif ($bytes == 1)
		$bytes = $bytes . ' byte';
	else
		$bytes = '0 bytes';

	return $bytes;        
} 
?>