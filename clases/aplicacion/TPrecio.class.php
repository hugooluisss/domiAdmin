<?php
/**
* TPrecio
* Precio por cantidad de kilómetros recorridos
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TPrecio{
	private $limite;
	private $precio;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TPrecio($id = ''){
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
		$rs = $db->Execute("select * from preciokilometro where limite = ".$id);
		
		foreach($rs->fields as $field => $val)
			$this->$field = $val;
		
		$this->limite = $id;
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
		return $this->limite;
	}
	
	/**
	* Establece el límite o identificador
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setLimite($val = ''){
		$this->setId($val);
		
		return true;
	}
	
	/**
	* Retorna el limite
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getLimite(){
		return $this->getId();
	}
	
	/**
	* Establece el precio
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setPrecio($val = 0){
		$this->precio = $val;
		return true;
	}
	
	/**
	* Retorna el precio
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getPrecio(){
		return $this->precio;
	}
		
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar($anterior = ''){
		if ($this->getId() == '') return false;
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select * from preciokilometro where limite = ".$this->getId());
		
		if ($rs->EOF){
			$rs = $db->Execute("INSERT INTO preciokilometro(limite) VALUES('".$this->getId()."');");
			if (!$rs) return false;
				
			#$this->limite = $db->Insert_ID();
		}		
		
		if ($this->getId() == '')
			return false;
		
		
		$anterior = $anterior == ''?$this->getId():$anterior;
		
		$rs = $db->Execute("UPDATE preciokilometro
			SET
				precio = ".$this->getPrecio().",
				limite = ".$this->getLimite()."
			WHERE limite = ".$anterior);
				
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
		$rs = $db->Execute("delete from preciokilometro where limite = ".$this->getId());
		
		return $rs?true:false;
	}
}
?>