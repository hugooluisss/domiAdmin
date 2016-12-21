<?php
global $objModulo;

switch($objModulo->getId()){
	case 'listaOrdenes':
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from cliente where visible = true");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
	break;
	case 'cordenes':
		switch($objModulo->getAction()){
			case 'add':
				$obj = new TOrden();
				
				$obj->setId($_POST['id']);
				$idEstado = $obj->estado->getId();
				$obj->cliente->setId($_POST['cliente']);
				$obj->servicio->setId($_POST['servicio']);
				
				$obj->setAtiende($_POST['atiende']);
				$obj->setLatitud($_POST['latitud']);
				$obj->setLongitud($_POST['longitud']);
				$obj->setNotas($_POST['notas']);
				
				$smarty->assign("json", array("band" => $obj->guardar()));
			break;
			case 'changeEstado':
				$obj = new TOrden();
				
				$obj->setId($_POST['id']);
				$obj->estado->setId($_POST['estado']);
				
				if ($obj->guardar()){
					$this->addHistorial($_POST['comentarios']);
					$smarty->assign("json", array("band" => true));
				}else
					$smarty->assign("json", array("band" => false));
			break;
		}
	break;
}
?>