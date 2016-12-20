<?php
/**
* TSitio
* Sitios de entrega del cliente
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TSitio{
	private $idSitio;
	private $idCliente;
	private $titulo;
	private $direccion;
	private $lng;
	private $lat;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TSitio($id = ''){
		$this->setId($id);		
		return true;
	}
	
	/**
	* Carga los datos del objeto
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setId($id = ''){
		if ($id == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from sitio where idSitio = ".$id);
		
		foreach($rs->fields as $field => $val)
			$this->$field = $val;
		
		return true;
	}
	
	/**
	* Retorna el identificador del objeto
	*
	* @autor Hugo
	* @access public
	* @return integer identificador
	*/
	
	public function getId(){
		return $this->idSitio;
	}
	
	/**
	* Retorna el identificador del cliente al cual pertenece
	*
	* @autor Hugo
	* @access public
	* @return integer identificador
	*/
	
	public function getIdCliente(){
		return $this->idCliente;
	}
	
	/**
	* Establece el titulo
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setTitulo($val = ''){
		$this->titulo = $val;
		return true;
	}
	
	/**
	* Retorna el nombre
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getTitulo(){
		return $this->titulo;
	}
	
	/**
	* Establece la direccion
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setDireccion($val = ''){
		$this->direccion = $val;
		return true;
	}
	
	/**
	* Retorna la direccion
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getDireccion(){
		return $this->direccion;
	}
	
	/**
	* Establece la latitud
	*
	* @autor Hugo
	* @access public
	* @param float $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setLatitud($val = 0){
		$this->lat = $val;
		return true;
	}
	
	/**
	* Retorna la latitud
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getLatitud(){
		return $this->lat;
	}
	
	/**
	* Establece la longitud
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setLongitud($val = ''){
		$this->lng = $val;
		return true;
	}
	
	/**
	* Retorna la longitud
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getLongitud(){
		return $this->lng;
	}
	
	/**
	* Retorna las coordenadas
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return string Texto
	*/
	
	public function getCoordenadas(){
		return array("lng" => $this->getLongitud(), "lat" => $this->getLatitud());
	}
		
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar($cliente = ''){
		if ($cliente == '') return false;
		
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$rs = $db->Execute("INSERT INTO sitio(idCliente) VALUES('".$cliente."');");
			if (!$rs) return false;
				
			$this->idSitio = $db->Insert_ID();
		}		
		
		if ($this->getId() == '')
			return false;
			
		$rs = $db->Execute("UPDATE sitio
			SET
				titulo = '".$this->getTitulo()."',
				direccion = '".$this->getDireccion()."',
				lat = ".$this->getLatitud().",
				lng = ".$this->getLongitud()."
			WHERE idSitio = ".$this->getId());
			
		return $rs?true:false;
	}
	
	/**
	* Elimina el objeto de la base de datos
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function eliminar(){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("delete from sitio where idServicio = ".$this->getId());
		
		return $rs?true:false;
	}
}
?>