<?php
global $objModulo;
switch($objModulo->getId()){
	case 'cpagos':
		switch($objModulo->getAction()){
			case 'cobroTarjeta':
				require('librerias/conekta/Conekta.php');
				
				$cliente = new TCliente($_POST['cliente']);
				try{
					Conekta::setApiKey("key_WsDzjVwXTg9UA5WsbY3E4g");
					Conekta::setLocale('es');
					
					$charge = Conekta_Charge::create(array(
							'description'=> 'Servicio de paquetería ' + $cliente->getNombre() + $_POST['amount'],
							'amount'=> $_POST['amount'] * 100,
							'currency'=> "MXN",
							'card'=> $_POST['token'],
							'details'=> array(
								'name'=> $cliente->getNombre(),
								'phone'=> '0105155555',
								'email'=> $cliente->getCorreo(),
								'line_items'=> array(
									array(
										'name'=> "Servicio de paquetería",
										'description'=> "Servicio de paquetería",
										'unit_price'=> $_POST['amount'],
										'quantity'=> 1,
										'sku'=> "1",
										'type'=> 'SERVICIO'
									)
								),
								'billing_address'=> array(
									'street1'=> $_POST['calle'],
									'street2'=> $_POST['colonia'],
									'street3'=> null,
									'city'=> $_POST['ciudad'],
									'state'=> $_POST['estado'],
									'zip'=> $_POST['codigoPostal'],
									'country'=> 'Mexico',
									'email'=> $cliente->getCorreo()
								),
								'shipment'=> array(
									'carrier'=> 'estafeta',
									'service'=> 'international',
									'price'=> 0.00,
									'address'=> array(
										'street1'=> '.',
										'street2'=> null,
										'street3'=> null,
										'city'=> '.',
										'state'=> '.',
										'zip'=> '.',
										'country'=> 'Mexico'
									)
								)
							)
						)
					);
					
					if ($charge->status == 'paid'){
						$smarty->assign("json", array("band" => true));
					}else
						$smarty->assign("json", array("band" => false, "status" => $charge->status, "mensaje" => "El pago fue rechazado"));
				}catch(Exception $e){
					$smarty->assign("json", array("band" => false, "mensaje" => $e->getMessage()));
				}
			break;
		}
	break;
}
?>