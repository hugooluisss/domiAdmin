<?php
global $objModulo;
switch($objModulo->getId()){
	case 'clientes':
		$smarty->assign("cliente", new TCliente);
	break;
	case 'listaClientes': case 'clientesPedido':
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
					echo json_encode(array("band" => true, "cliente" => $obj->getid()));
				else
					echo json_encode(array("band" => false, "cliente" => $obj->getid()));
				
			break;
			case 'del':
				$obj = new TCliente($_POST['cliente']);
				echo json_encode(array("band" => $obj->eliminar()));
			break;
		}
	break;
}
?>