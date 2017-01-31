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
		$rs = $db->Execute("select * from sitio where idCliente = ".$_POST['cliente']." order by titulo");
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
				if ($_POST['pass'] <> '')
					$obj->setPass($_POST['pass']);
				
				if ($obj->guardar())
					$smarty->assign("json", array("band" => true, "cliente" => $obj->getId()));
				else
					$smarty->assign("json", array("band" => false, "cliente" => $obj->getId()));
				
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
			case 'delSitio':
				$obj = new TSitio($_POST['id']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
			case 'login':
				$db = TBase::conectaDB();
				$rs = $db->Execute("select idCliente, pass from cliente where upper(correo) = upper('".$_POST['usuario']."') and visible = true");
				
				$result = array('band' => false, 'mensaje' => 'Error al consultar los datos');
				if($rs->EOF)
					$result = array('band' => false, 'mensaje' => 'El usuario no existe'); 
				elseif(strtoupper($rs->fields['pass']) <> strtoupper($_POST['pass'])){
					$result = array('band' => false, 'mensaje' => 'Contraseña inválida');
				}else{
					$obj = new TCliente($rs->fields['idCliente']);
					if ($obj->getId() == '')
						$result = array('band' => false, 'mensaje' => 'Acceso denegado');
					else
						$result = array('band' => true, 'cliente' => $rs->fields['idCliente']);
				}
				
				$smarty->assign("json", $result);
			break;
			case 'validaEmail':
				$db = TBase::conectaDB();
				$rs = $db->Execute("select idCliente from cliente where upper(correo) = upper('".$_POST['txtUsuario']."')");
				
				echo $rs->EOF?"true":"false";
			break;
			case 'recuperarPass':
				$db = TBase::conectaDB();
				global $ini;
				$rs = $db->Execute("select idCliente from cliente where correo = '".$_POST['correo']."'");
				
				if (!$rs->EOF){
					$cliente = new TCliente($rs->fields['idCliente']);
					
					$datos = array();
					$datos['cliente.nombre'] = $cliente->getNombre();
					$datos['cliente.pass'] = $cliente->getPass();
					$datos['cliente.email'] = $cliente->getCorreo();
					
					$email = new TMail();
					$email->setTema("Recuperación de contraseña");
					#$email->setOrigen("Grupo Domi", $ini['mail']['user']);
					$email->addDestino($cliente->getCorreo(), utf8_decode($cliente->getNombre()));
					
					$email->setBodyHTML(utf8_decode($email->construyeMail(file_get_contents("repositorio/mail/recuperarPass.html"), $datos)));
					
					echo json_encode(array("band" => $email->send()));
				}else
					echo json_encode(array("band" => false));
			break;
			case 'uploadImagenPerfil':
				if (file_exists("repositorio/clientes/img_".$_POST['identificador'].".jpg"))
					unlink("repositorio/clientes/img_".$_POST['identificador'].".jpg");
					
				move_uploaded_file($_FILES["file"]["tmp_name"], "repositorio/clientes/img_".$_POST['identificador'].".jpg");
			break;
			case 'getData':
				$db = TBase::conectaDB();
				$rs = $db->Execute("select * from cliente where idCliente = ".$_POST['id']);
				
				$smarty->assign("json", $rs->fields);
			break;
		}
	break;
}
?>