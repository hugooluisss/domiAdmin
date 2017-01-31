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
		$rs = $db->Execute("select a.*, b.nombre as categoria from servicio a join catservicio b using(idCategoria) where a.visible = true".($_POST['categoria'] == ''?"":(" and idCategoria = ".$_POST['categoria'])));
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
		$smarty->assign("json", $datos);
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
			case 'uploadfile':
				if(isset($_FILES['upl']) and $_FILES['upl']['error'] == 0 and $_POST['servicio'] <> ''){
					$carpeta = "repositorio/servicios/";
					mkdir($carpeta, 0777, true);
					chmod($carpeta, 0755);
					
					if(move_uploaded_file($_FILES['upl']['tmp_name'], $carpeta."img".$_POST['servicio'].".jpg")){
						chmod($carpeta."img".$_POST['servicio'].".jpg", 0755);
						
						echo '{"status":"success"}';
						exit;
					}
				}
				
				echo '{"status":"error"}';
			break;

		}
	break;
}
?>