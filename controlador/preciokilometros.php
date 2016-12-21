<?php
global $objModulo;
switch($objModulo->getId()){
	case 'listaKilometros':
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from preciokilometro");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
	break;
	case 'ckilometros':
		switch($objModulo->getAction()){
			case 'add':
				$db = TBase::conectaDB();
				$obj = new TPrecio($_POST['anterior']);
				
				$obj->setId($_POST['limite']);
				$obj->setPrecio($_POST['precio']);
				
				$smarty->assign("json", array("band" => $obj->guardar($_POST['anterior'])));
			break;
			case 'del':
				$obj = new TPrecio($_POST['identificador']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
		}
	break;
}
?>