<?php
global $objModulo;
switch($objModulo->getId()){
	case 'categoriaservicios':
		$smarty->assign("cliente", new TCliente);
	break;
	case 'listaCategoriaServicios':
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from catservicio where visible = true");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
		$smarty->assign("json", $datos);
	break;
	case 'ccategoriaservicios':
		switch($objModulo->getAction()){
			case 'add':
				$db = TBase::conectaDB();
				$obj = new TCategoriaServicio();
				
				$obj->setId($_POST['id']);
				$obj->setNombre($_POST['nombre']);
				$obj->setDescripcion($_POST['descripcion']);
				
				$smarty->assign("json", array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TCategoriaServicio($_POST['identificador']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
		}
	break;
}
?>