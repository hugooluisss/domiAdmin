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

/**
 * Formula para sacar distancia entre dos puntos dada la latitud y longitud de dos puntos.
 * Esta distancia tiene que estar dada en notación DECIMAL y no en SEXADECIMAL (Grados, minutos... etc)
 * @param type $latitud 1
 * @param type $longitud 1
 * @param type $latitud 2
 * @param type $longitud 2
 * @return type, Distancia en Kms, con 1 decimal de precisión
 */
function harvestine($lat1, $long1, $lat2, $long2){ 
    //Distancia en kilometros en 1 grado distancia.
    //Distancia en millas nauticas en 1 grado distancia: $mn = 60.098;
    //Distancia en millas en 1 grado distancia: 69.174;
    //Solo aplicable a la tierra, es decir es una constante que cambiaria en la luna, marte... etc.
    $km = 111.302;
    
    //1 Grado = 0.01745329 Radianes    
    $degtorad = 0.01745329;
    
    //1 Radian = 57.29577951 Grados
    $radtodeg = 57.29577951; 
    //La formula que calcula la distancia en grados en una esfera, llamada formula de Harvestine. Para mas informacion hay que mirar en Wikipedia
    //http://es.wikipedia.org/wiki/F%C3%B3rmula_del_Haversine
    $dlong = ($long1 - $long2); 
    $dvalue = (sin($lat1 * $degtorad) * sin($lat2 * $degtorad)) + (cos($lat1 * $degtorad) * cos($lat2 * $degtorad) * cos($dlong * $degtorad)); 
    $dd = acos($dvalue) * $radtodeg; 
    return round(($dd * $km), 2);
}
?>