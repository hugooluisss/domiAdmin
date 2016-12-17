<?php
/**
* TMail
* Interfaz que permite conectar a un servidor SMTP por medio de la libreria PHPMAILER
* Extrae los datos del servidor
* PHP 5
* @author     Hugo Luis Santiago Altamirano hugooluisss@gmail.com
* @license    openSource
* @version    1.0, 1/agosto/2008
**/

class TMail{
	private $phpMailer;
	private $permitir = false;
	
/**
* Metodo Constructor
* Llama al constructor padre para hacer las conexiones
*/
	public function TMail(){
		global $ini;
		$this->phpMailer = new PHPMailer();
		$datos = $rs->fields;
		#$this->phpMailer->CharSet("UTF8");
		
		$this->phpMailer->SMTPDebug  = 1;
		
		$this->empresa['nombreCorto'] = utf8_decode($ini['sistema']['nombreEmpresa']);
		#$this->phpMailer->IsSMTP();
		#$this->phpMailer->Port = 25;
		#$this->phpMailer->Host = $ini['mail']['server'];

		#$this->phpMailer->SMTPAuth = true;
		#$this->phpMailer->Username = $ini['mail']['user'];
		#$this->phpMailer->Password = $ini['mail']['pass'];
		$this->phpMailer->IsHTML(true);
		$this->phpMailer->FromName = utf8_decode($ini['sistema']['nombre']);
		$this->setDirOrigen($ini['mail']['user']);
		#$this->phpMailer->SMTPSecure = 'tls';
		if ($ini['mail']['contestarA'] <> '')
			$this->phpMailer->AddReplyTo($ini['mail']['contestarA']);
			
		$this->permitir = true;
	}
	
	public function setUser($val){
		$this->phpMailer->Username = $val;
	}
	
	public function setPassword($val){
		$this->phpMailer->Password = $val;
	}

/**
* Establece el cuerpo del mensaje
* @param string $msg Mensaje
*/	
	public function setBodyHTML($msg){
		$this->phpMailer->MsgHTML = $msg;
		$this->phpMailer->Body = $msg;
		$this->phpMailer->AltBody = $msg;
	}
	
	public function adjuntar($archivo){
		return $this->phpMailer->addAttachment($archivo);
	}

/**
* Establece el tema del correo
* @param string $tema Tema
*/		
	public function setTema($tema){
		$this->phpMailer->Subject = $this->empresa['nombreCorto'].': '.$tema;
	}

/**
* Agrega una direccion de correo (Detinatario)
* @param string $mail Direccion
* @param string $nombre Nombre de la persona
*/		
	public function setDestino($mail, $nombre = ""){
		$this->phpMailer->AddAddress($mail, $nombre);
	}
	
/**
* Agrega una direccion de correo para enviar de forma oculta
* @param string $mail Direccion
* @param string $nombre Nombre de la persona
*/		
	public function copiaOculta($mail, $nombre = ""){
		$this->phpMailer->AddCC($mail, $nombre);
	}

/**
* Envia el correo
* @return Boolean True si lo envio
*/		
	public function send(){
		if (!$this->permitir)
			return true;
		else{
			if ($this->phpMailer->Send())
				return true;
			else{
				ErrorSistema($this->phpMailer->ErrorInfo);			
				return false;
			}
		}
	}

/**
* Remplaza las etiquetas declaradas en el texto por etiquetas validas de los datos
* @param string $texto Cuerpo del texto/mensaje
* @param Object $datos Datos a cambiar
*/		
	public function construyeMail($texto, $datos){
		foreach($datos as $indice => $valor)
			$texto = str_replace('[*'.$indice.'*]', $datos[$indice], $texto);
			
		return $texto;
	}

/**
* Indica si se permite el envio de mails
*/
	
	public function allowed(){
		return $this->permitir;
	}
	
/**
* Establece la dirección de origen
* @param String $dir Direccion de origen
* @return boolean true Siempre
*/
	public function setDirOrigen($dir){
		$this->phpMailer->From = $dir;
		
		return true;
	}
}
?>