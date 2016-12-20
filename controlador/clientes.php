<?php
global $objModulo;

switch($objModulo->getId()){
	case 'clientes':
		$smarty->assign("cliente", new TCliente);
	break;
	case 'listaClientes':
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
	case 'listaSitios':
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from sitio where idCliente = ".$_POST['cliente']);
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
		$smarty->assign("json", $datos); #este va a imprimir los datos en el movil
	break;
	case 'cclientes':
		switch($objModulo->getAction()){
			case 'add':
				$db = TBase::conectaDB();
				$obj = new TCliente();
				
				$obj->setId($_POST['id']);
				$obj->setNombre($_POST['nombre']);
				$obj->setCorreo($_POST['correo']);
				$obj->setCelular($_POST['celular']);
				$obj->setSexo($_POST['sexo']);
				$obj->setNacimiento($_POST['nacimiento']);
				
				if ($obj->guardar())
					$smarty->assign("json", array("band" => true, "cliente" => $obj->getid()));
				else
					$smarty->assign("json", array("band" => false, "cliente" => $obj->getid()));
				
			break;
			case 'del':
				$obj = new TCliente($_POST['cliente']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
			case 'addSitio':
				$obj = new TSitio($_POST['id']);
				$obj->setTitulo($_POST['titulo']);
				$obj->setDireccion($_POST['direccion']);
				$obj->setLatitud($_POST['lat']);
				$obj->setLongitud($_POST['lng']);
				
				$smarty->assign("json", array("band" => $obj->guardar($_POST['cliente'])));
			break;
		}
	break;
}
?>