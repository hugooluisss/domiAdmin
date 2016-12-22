<?php
global $objModulo;
switch($objModulo->getId()){
	case 'ordenes':
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from usuario");
		$datos = array();
		while(!$rs->EOF){
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		$smarty->assign("usuarios", $datos);
		
		$rs = $db->Execute("select * from estado");
		$datos = array();
		while(!$rs->EOF){
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		$smarty->assign("estados", $datos);
	break;
	case 'listaOrdenes':
		$db = TBase::conectaDB();
		$rs = $db->Execute("select a.*, b.nombre as nombreCliente, c.nombre as nombreEstado, c.color, d.nombre as nombreServicio, e.nombre as categoria from orden a join cliente b using(idCliente) join estado c using(idEstado) join servicio d using(idServicio) join catservicio e using(idCategoria)");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
	break;
	case 'listaHistorial':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select a.*, b.nombre as usuario, c.nombre as estado from historial a join usuario b using(idUsuario) join estado c using(idEstado) where idOrden = ".$_POST['orden']." order by fecha desc");
		
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("lista", $datos);
		$smarty->assign("json", $datos);
	break;
	case 'cordenes':
		switch($objModulo->getAction()){
			case 'add':
				$db = TBase::conectaDB();
				$obj = new TOrden();
				
				$obj->setId($_POST['id']);
				$idEstado = $obj->estado->getId();
				$obj->cliente->setId($_POST['cliente']);
				$obj->servicio->setId($_POST['servicio']);
				
				$obj->setAtiende($_POST['atiende']);
				$obj->setLatitud($_POST['latitud']);
				$obj->setLongitud($_POST['longitud']);
				$obj->setNotas($_POST['notas']);
				
				#calculo del monto
				if ($obj->servicio->getPrecio() == 0){ #es decir, requiere calculo por kilometraje
					$km = harvestine($_POST['latitud'], $_POST['longitud'], 17.09187214812757, -96.70211629417575);
					$rs = $db->Execute("select * from preciokilometro where limite < ".$km." order by limite");
					
					$obj->setMonto($rs->fields["precio"] * $km);
				}else
					$obj->setMonto($obj->servicio->getPrecio());
				
				$smarty->assign("json", array("band" => $obj->guardar(), "distancia" => harvestine($_POST['latitud'], $_POST['longitud'], 17.09187214812757, -96.70211629417575)));
			break;
			case 'changeEstado':
				$obj = new TOrden();
				
				$obj->setId($_POST['id']);
				$obj->estado->setId($_POST['estado']);
				
				if ($obj->guardar()){
					$obj->addHistorial($_POST['comentarios']);
					$smarty->assign("json", array("band" => true));
				}else
					$smarty->assign("json", array("band" => false));
			break;
			case 'setAtiende':
				$obj = new TOrden();
				
				$obj->setId($_POST['id']);
				$obj->setAtiende($_POST['usuario']);
				
				$smarty->assign("json", array("band" => $obj->guardar()));
			break;
		}
	break;
}
?>