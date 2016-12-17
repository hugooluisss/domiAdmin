<?php
Class TBase{
	public function conectaDB($fuente = 'conexion'){
		global $ini;
		$user = $ini[$fuente]['user'];
		$pass = $ini[$fuente]['pass'];
		$server = $ini[$fuente]['server'];
		$baseDatos = $ini[$fuente]['db'];
		
		$db = &NewADOConnection("mysql://".$user.":".$pass."@".$server."/".$baseDatos) or die ("No se pudo conectar con la base de datos");
		
		$db->SetFetchMode(ADODB_FETCH_ASSOC);
		$db->Execute("SET NAMES utf8");
		
		return $db;
	}
	
	function __destruct(){ 
		if ($this->db) $this->db->Close();
	}
}