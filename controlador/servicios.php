<?php
global $objModulo;
switch($objModulo->getId()){
	case 'servicios':
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from catservicio where visible = true");
		$datos = array();
		
		while (!$rs->EOF){
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("categorias", $datos);
	break;
	case 'listaServicios':
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from servicio where visible = true");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
	break;
	case 'cservicios':
		switch($objModulo->getAction()){
			case 'add':
				$db = TBase::conectaDB();
				$obj = new TServicio();
				
				$obj->setId($_POST['id']);
				$obj->setNombre($_POST['nombre']);
				$obj->setDescripcion($_POST['descripcion']);
				$obj->categoria->setId($_POST['categoria']);
				$obj->setPrecio($_POST['precio']);
				
				
				$smarty->assign("json", array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TServicio($_POST['identificador']);
				
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
		}
	break;
}
?>