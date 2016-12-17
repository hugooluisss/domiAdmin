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
	break;
	case 'ccategoriaservicios':
		switch($objModulo->getAction()){
			case 'add':
				$db = TBase::conectaDB();
				$obj = new TCategoriaServicio();
				
				$obj->setId($_POST['id']);
				$obj->setNombre($_POST['nombre']);
				$obj->setDescripcion($_POST['descripcion']);
				
				if ($obj->guardar())
					echo json_encode(array("band" => true));
				else
					echo json_encode(array("band" => false));
				
			break;
			case 'del':
				$obj = new TCategoriaServicio($_POST['identificador']);
				echo json_encode(array("band" => $obj->eliminar()));
			break;
		}
	break;
}
?>