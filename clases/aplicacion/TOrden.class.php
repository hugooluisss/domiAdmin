<?php
/**
* TOrden
* Ordenes de servicio
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TOrden{
	private $idOrden;
	public $estado;
	public $cliente;
	public $servicio;
	private $atiende;
	private $fecha;
	private $lat;
	private $lng;
	private $notas;
	private $monto;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TOrden($id = ''){
		$this->estado = new TEstado(1);
		$this->cliente = new TCliente;
		$this->servicio = new TServicio;
		
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
		$rs = $db->Execute("select * from orden where idOrden = ".$id);
		
		foreach($rs->fields as $field => $val){
			switch($field){
				case 'idEstado':
					$this->estado = new TEstado($val);
				break;
				case 'idCliente':
					$this->cliente = new TCliente($val);
				break;
				case 'idServicio':
					$this->servicio = new TServicio($val);
				break;
				default:
					$this->$field = $val;
			}
		}
		
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
		return $this->idOrden;
	}
	
	/**
	* Establece el nombre de quien atiende la orden
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setAtiende($val = ''){
		$this->atiende = $val;
		return true;
	}
	
	/**
	* Retorna el nombre
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getAtiende($band = false){
		if ($band)
			return $this->atiende == ''?"null":$this->atiende;
			
		return $this->atiende;
	}
	
	/**
	* Establece la fecha
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setFecha($val = ''){
		$this->fecha = $val;
		return true;
	}
	
	/**
	* Retorna la fecha
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getFecha(){
		return $this->fecha;
	}
	
	/**
	* Establece la latitud
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setLatitud($val = ''){
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
	* Establece las notas
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setNotas($val = ''){
		$this->notas = $val;
		return true;
	}
	
	/**
	* Retorna las notas
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getNotas(){
		return $this->notas;
	}
	
	/**
	* Establece el monto
	*
	* @autor Hugo
	* @access public
	* @param integer $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setMonto($val = 0){
		$this->monto = $val;
		return true;
	}
	
	/**
	* Retorna el monto
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getMonto(){
		return $this->monto == ''?0:$this->monto;
	}
		
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar(){
		if ($this->estado->getId() == '') return false;
		if ($this->cliente->getId() == '') return false;
		if ($this->servicio->getId() == '') return false;
		
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$rs = $db->Execute("INSERT INTO orden(idEstado, idCliente, idServicio, fecha) VALUES(".$this->estado->getId().", ".$this->cliente->getId().", ".$this->servicio->getId().", now());");
			if (!$rs) return false;
				
			$this->idOrden = $db->Insert_ID();
			$this->addHistorial("Inicio del proceso, registrada");
		}		
		
		if ($this->getId() == '')
			return false;
			
		$rs = $db->Execute("UPDATE orden
			SET
				idEstado = ".$this->estado->getId().",
				idServicio = ".$this->servicio->getId().",
				atiende = ".$this->getAtiende(true).",
				lat = ".$this->getLatitud().",
				lng = ".$this->getLongitud().",
				notas = '".$this->getNotas()."',
				monto = ".$this->getMonto()."
			WHERE idOrden = ".$this->getId());
			
		return $rs?true:false;
	}
	
	/**
	* Establece un nuevo estado para la orden
	*
	* @autor Hugo
	* @access public
	* @param string $comentario Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function addHistorial($comentario = ''){
		if ($this->getId() == '') return false;
		
		global $userSesion;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("insert into historial(fecha, idOrden, idEstado, idUsuario, comentario) values(now(), ".$this->getId().", ".$this->estado->getId().", ".$userSesion->getId().", '".$comentario."')");
		
		return $rs?true:false;
	}
}
?>