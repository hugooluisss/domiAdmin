<?php /* Smarty version Smarty-3.1.11, created on 2016-11-10 21:37:45
         compiled from "templates/plantillas/modulos/ordenes/orden.tpl" */ ?>
<?php /*%%SmartyHeaderCode:377579111580e67bf8cabc1-82742690%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ad22c36e315fd478176ee260b73945a2f61c17e' => 
    array (
      0 => 'templates/plantillas/modulos/ordenes/orden.tpl',
      1 => 1477978223,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '377579111580e67bf8cabc1-82742690',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_580e67bfe6a071_35433423',
  'variables' => 
  array (
    'orden' => 0,
    'perfil' => 0,
    'estados' => 0,
    'item' => 0,
    'row' => 0,
    'PAGE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580e67bfe6a071_35433423')) {function content_580e67bfe6a071_35433423($_smarty_tpl) {?><div class="row" style="margin-left: 10px;"> <!--style="border: 1px solid #3c8dbc; margin: 5px auto;" -->
	<div class="col-md-2 text-center" style="color: <?php echo $_smarty_tpl->tpl_vars['orden']->value->sucursal->getColor();?>
; background: #ecf0f5;">
		<i class="fa fa-tag fa-5x" aria-hidden="true"></i>
		<br />
		<?php echo $_smarty_tpl->tpl_vars['orden']->value->sucursal->getnombre();?>

	</div>
	<div class="col-md-6">
		<h1 style="color: #3c8dbc">Orden de servicio</h1>
	</div>
	<div class="col-md-4">
		<b>Estado</b><br /><br />
		<?php if (in_array($_smarty_tpl->tpl_vars['perfil']->value,array(4,2))){?>
			<?php if (in_array($_smarty_tpl->tpl_vars['orden']->value->estado->getId(),array(4,8))){?>
				<?php echo $_smarty_tpl->tpl_vars['orden']->value->estado->getNombre();?>

			<?php }else{ ?>
				<select id="selEstadoOrden" name="selEstadoOrden" class="form-control">
				<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['estados']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['idEstado'];?>
" <?php if ($_smarty_tpl->tpl_vars['orden']->value->estado->getId()==$_smarty_tpl->tpl_vars['item']->value['idEstado']){?>selected<?php }?> <?php if ($_smarty_tpl->tpl_vars['orden']->value->estado->getId()!=9&&in_array($_smarty_tpl->tpl_vars['item']->value['idEstado'],array(10,11))){?>disabled<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['nombre'];?>
</option>
				<?php } ?>
			<?php }?>
		</select>
		<?php }else{ ?>
		<select id="selEstadoOrden" name="selEstadoOrden" class="form-control">
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['estados']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['idEstado'];?>
" <?php if ($_smarty_tpl->tpl_vars['orden']->value->estado->getId()==$_smarty_tpl->tpl_vars['item']->value['idEstado']){?>selected<?php }?> <?php if ($_smarty_tpl->tpl_vars['item']->value['idEstado']==3){?>disabled<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['nombre'];?>
</option>
			<?php } ?>
		</select>
		<?php }?>
	</div>
</div>
<hr />
<br />
<div class="row">
	<div class="col-md-2">
		<b>Código</b>
	</div>
	<div class="col-md-2">
		<input class="form-control text-right" value="<?php echo $_smarty_tpl->tpl_vars['orden']->value->getCodigo();?>
" readonly disabled />
	</div>
	<div class="col-md-2 col-md-offset-3">
		<b>Fecha y hora</b>
	</div>
	<div class="col-md-3">
		<input class="form-control text-right" value="<?php echo $_smarty_tpl->tpl_vars['orden']->value->getRegistro();?>
" readonly disabled />
	</div>
</div>
<br />
<div class="row">
	<div class="col-md-2">
		<b>Vendedor</b>
	</div>
	<div class="col-md-2">
		<input class="form-control text-right" value="<?php echo $_smarty_tpl->tpl_vars['orden']->value->vendedor->getClave();?>
" readonly disabled />
	</div>
	<div class="col-md-2">
		<b>Nombre</b>
	</div>
	<div class="col-md-6">
		<input class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['orden']->value->vendedor->getNombre();?>
" readonly disabled />
	</div>
</div>
<br />
<div class="row">
	<div class="col-md-2">
		<b>Cliente</b>
	</div>
	<div class="col-md-10">
		<input class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['orden']->value->getCliente();?>
" readonly disabled />
	</div>
</div>
<br />
<div class="row">
	<div class="col-md-12">
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Clave</th>
					<th>Descripción</th>
					<th>Importe</th>
					<th>Archivo</th>
					<th>Fecha Carga</th>
					<?php if (in_array($_smarty_tpl->tpl_vars['perfil']->value,array(1,2))){?>
						<th>&nbsp;</th>
					<?php }?>
				</tr>
			</thead>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['orden']->value->movimientos; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
				<tr
					clave="<?php echo $_smarty_tpl->tpl_vars['row']->value->getClave();?>
"
					descripcion="<?php echo $_smarty_tpl->tpl_vars['row']->value->getDescripcion();?>
"
					importe="<?php echo $_smarty_tpl->tpl_vars['row']->value->getImporte();?>
"
					area="<?php echo $_smarty_tpl->tpl_vars['row']->value->area->getNombre();?>
"
					cantidad="<?php echo $_smarty_tpl->tpl_vars['row']->value->getCantidad();?>
"
					elaboracion="<?php echo $_smarty_tpl->tpl_vars['orden']->value->getElaboracion();?>
"
					observaciones="<?php echo $_smarty_tpl->tpl_vars['row']->value->getObservaciones();?>
"
					
					idArea="<?php echo $_smarty_tpl->tpl_vars['row']->value->area->getId();?>
"
					fecha="<?php echo $_smarty_tpl->tpl_vars['row']->value->getFecha();?>
"
					notasucursales="<?php echo $_smarty_tpl->tpl_vars['row']->value->getNotasSucursales();?>
"
					impresiondigital="<?php echo $_smarty_tpl->tpl_vars['row']->value->getImpresionDigital();?>
"
					disenador="<?php if ($_smarty_tpl->tpl_vars['row']->value->getDisenador()==''){?><?php echo $_smarty_tpl->tpl_vars['PAGE']->value['usuario']->getNombre();?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['row']->value->getDisenador();?>
<?php }?>"
					fechaimpresion="<?php echo $_smarty_tpl->tpl_vars['row']->value->getFechaImpresion();?>
"
					notasproduccion="<?php echo $_smarty_tpl->tpl_vars['row']->value->getNotasProduccion();?>
"
					claveimpresor="<?php if ($_smarty_tpl->tpl_vars['row']->value->getClaveImpresor()==''){?><?php echo $_smarty_tpl->tpl_vars['PAGE']->value['usuario']->getClave();?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['row']->value->getClaveImpresor();?>
<?php }?>"
					nombreimpresor="<?php if ($_smarty_tpl->tpl_vars['row']->value->getNombreImpresor()==''&&$_smarty_tpl->tpl_vars['PAGE']->value['usuario']->getIdTipo()==2){?><?php echo $_smarty_tpl->tpl_vars['PAGE']->value['usuario']->getNombre();?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['row']->value->getNombreImpresor();?>
<?php }?>"
					fechaenvio="<?php echo $_smarty_tpl->tpl_vars['row']->value->getFechaEnvio();?>
"
					horaenvio="<?php echo $_smarty_tpl->tpl_vars['row']->value->getHoraEnvio();?>
"
					envio="<?php echo $_smarty_tpl->tpl_vars['row']->value->getEnvio();?>
"
					fecharecepcion="<?php echo $_smarty_tpl->tpl_vars['row']->value->getFechaRecepcion();?>
"
					entregacliente="<?php echo $_smarty_tpl->tpl_vars['row']->value->getEntregaCliente();?>
"
					notas="<?php echo $_smarty_tpl->tpl_vars['row']->value->getNotas();?>
"
					notasadministrativas="<?php echo $_smarty_tpl->tpl_vars['row']->value->getNotasAdministrativas();?>
"
					administrativo="<?php echo $_smarty_tpl->tpl_vars['row']->value->getAdministrativo();?>
"
					ultimoArchivo="<?php echo $_smarty_tpl->tpl_vars['row']->value->getRutaArchivoUltimo();?>
"
					
				>
					<td><?php echo $_smarty_tpl->tpl_vars['row']->value->getClave();?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['row']->value->getDescripcion();?>
</td>
					<td class="text-center"><?php echo $_smarty_tpl->tpl_vars['row']->value->getImporte();?>
</td>
					<td class="text-right">
						<?php if ($_smarty_tpl->tpl_vars['perfil']->value==3&&$_smarty_tpl->tpl_vars['row']->value->getRutaArchivoUltimo()!=''){?>
							<a id="lnkUltimoArchivo" href="<?php echo $_smarty_tpl->tpl_vars['row']->value->getRutaArchivoUltimo();?>
" target="_blank" download="<?php echo $_smarty_tpl->tpl_vars['row']->value->getRutaArchivoUltimo(false);?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value->getRutaArchivoUltimo(false);?>
</a>
						<?php }else{ ?>
							<?php echo $_smarty_tpl->tpl_vars['row']->value->getRutaArchivoUltimo(false);?>

						<?php }?>
					</td>
					<td>
						<?php echo $_smarty_tpl->tpl_vars['row']->value->getFechaArchivo();?>

					</td>
					<?php if (in_array($_smarty_tpl->tpl_vars['perfil']->value,array(1,2,6))){?>
						<td class="text-center">
							<a href="index.php?mod=archivosorden&orden=<?php echo rawurlencode($_smarty_tpl->tpl_vars['row']->value->getOrden());?>
&clave=<?php echo rawurlencode($_smarty_tpl->tpl_vars['row']->value->getClave());?>
" target="_blank"><i class="fa fa-paperclip" aria-hidden="true"></i></a>
						</td>
					<?php }?>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<br />

<div class="row">
	<div class="col-md-2">
		<b>Área de producción</b>
	</div>
	<div class="col-md-2">
		<input class="form-control text-right" value="" readonly disabled campo="area"/>
	</div>
	<div class="col-md-2">
		<b>Clave del artículo</b>
	</div>
	<div class="col-md-2">
		<input class="form-control text-right" value="" readonly disabled campo="clave"/>
	</div>
	<!--
	<div class="col-md-2">
		<b>Fecha elaboración
	</div>
	<div class="col-md-2">
		<input class="form-control text-right" value="" readonly disabled campo="elaboracion"/>
	</div>
	-->
</div>
<br />
<div class="row">
	<div class="col-md-2">
		<b>Cantidad</b>
	</div>
	<div class="col-md-2">
		<input class="form-control text-right" value="" readonly disabled campo="cantidad"/>
	</div>
	<div class="col-md-2">
		<b>Descripción</b>
	</div>
	<div class="col-md-6">
		<input class="form-control" value="" readonly disabled campo="descripcion"/>
	</div>
</div>
<br />
<div class="row">
	<div class="col-md-2">
		<b>Observaciones</b>
	</div>
	<div class="col-md-6">
		<input class="form-control" value="" readonly disabled campo="observaciones"/>
	</div>
</div>

<hr />
<?php if (in_array($_smarty_tpl->tpl_vars['perfil']->value,array(1,2,4,5,6))){?>
	<div class="row">
		<div class="col-md-2">
			<b>Notas sucursales</b>
		</div>
		<div class="col-md-10">
			<textarea campo="notasSucursales" class="form-control" id="txtNotasSucursales" <?php if (in_array($_smarty_tpl->tpl_vars['perfil']->value,array(3,5))){?>readonly disabled<?php }?>></textarea>
		</div>
	</div>
	<br />
	<div class="row">
		<?php if (!in_array($_smarty_tpl->tpl_vars['perfil']->value,array(6))){?>
		<div class="col-md-2">
			<button id="btnImpresionDigital" class="btn btn-warning btn-xs">Impresión digital</button>
		</div>
		<div class="col-md-3">
			<input type="text" id="txtImpresionDigital" disabled="true" readonly="true" value="" class="form-control"/>
		</div>
		<?php }?>
		<div class="col-md-2">
			<b>Diseñador</b>
		</div>
		<div class="<?php if (in_array($_smarty_tpl->tpl_vars['perfil']->value,array(6))){?>col-md-10<?php }else{ ?>col-md-5<?php }?>">
			<input class="form-control" value="" id="txtDisenador" readonly disabled/>
		</div>
	</div>
	<hr />
<?php }?>
<?php if (in_array($_smarty_tpl->tpl_vars['perfil']->value,array(1,2,3,4,5,6))){?>
	<div class="row">
		<div class="<?php if (in_array($_smarty_tpl->tpl_vars['perfil']->value,array(2,4,5))){?>col-md-4<?php }else{ ?>col-md-6<?php }?>">
			<div class="row">
				<div class="<?php if (in_array($_smarty_tpl->tpl_vars['perfil']->value,array(2,4,5,6))){?>col-md-6<?php }else{ ?>col-md-3<?php }?>">
					<b>Observaciones</b>
				</div>
				<div class="<?php if (in_array($_smarty_tpl->tpl_vars['perfil']->value,array(2,4,5,6))){?>col-md-6<?php }else{ ?>col-md-4<?php }?>">
					<input class="form-control" value="" campo="notas" id="txtNotas" <?php if (in_array($_smarty_tpl->tpl_vars['perfil']->value,array(2,4,5))){?>disabled<?php }?>/>
				</div>
			</div>
			<br />
			<div class="row">
				<?php if (in_array($_smarty_tpl->tpl_vars['perfil']->value,array(1,3,5,6))){?>
				<div class="<?php if (in_array($_smarty_tpl->tpl_vars['perfil']->value,array(4,5,6))){?>col-md-6<?php }else{ ?>col-md-3<?php }?>">
					<button id="btnFechaImpresion" class="btn btn-warning btn-xs">Impresión terminada</button>
				</div>
				<div class="<?php if (in_array($_smarty_tpl->tpl_vars['perfil']->value,array(4,5,6))){?>col-md-6<?php }else{ ?>col-md-5<?php }?>">
					<input class="form-control" value="" placeholder="YYYY-MM-DD" <?php if (in_array($_smarty_tpl->tpl_vars['perfil']->value,array(5))){?>disabled<?php }?> readonly campo="fechaImpresion" id="txtFechaImpresion"/>
				</div>
				<?php }?>
			</div>
			<br />
			<?php if (in_array($_smarty_tpl->tpl_vars['perfil']->value,array(1))){?>
			<div class="row">
				<div class="col-md-2 col-md-offset-1">
					<input type="checkbox" id="chkEnvio" value="Si" <?php if (in_array($_smarty_tpl->tpl_vars['perfil']->value,array(5))){?>disabled<?php }?>> <b>Envío</b>
				</div>
				<div class="col-md-1">
					<b>Fecha</b>
				</div>
				<div class="col-md-4">
					<input class="form-control" value="" placeholder="YYYY-MM-DD" readonly <?php if (in_array($_smarty_tpl->tpl_vars['perfil']->value,array(5))){?>disabled<?php }?> campo="fechaenvio" id="txtFechaEnvio"/>
				</div>
				<div class="col-md-1">
					<b>Hora</b>
				</div>
				<div class="col-md-3">
					<select id="selHoraEnvio" class="form-control" <?php if (in_array($_smarty_tpl->tpl_vars['perfil']->value,array(5))){?>readonly disabled<?php }?>>
						<option value="11:30:00">11:30</option>
						<option value="17:30:00">17:30</option>
					</select>
				</div>
			</div>
			<?php }?>
		</div>
		<?php if (in_array($_smarty_tpl->tpl_vars['perfil']->value,array(1,2,3,4,5,6))){?>
		<div class="<?php if (in_array($_smarty_tpl->tpl_vars['perfil']->value,array(2,4,5))){?>col-md-8<?php }else{ ?>col-md-6<?php }?>">
			<b>Notas de produccion</b>
			<textarea campo="notasProduccion" class="form-control" rows="4" id="txtNotasProduccion" <?php if (in_array($_smarty_tpl->tpl_vars['perfil']->value,array(2,4,5))){?>readonly disabled<?php }?>></textarea>
		</div>
		<?php }?>
	</div>
	<br />
	<div class="row">
		<div class="col-md-2">
			<b>Impresor</b>
		</div>
		<!--
		<div class="col-md-2">
			<input class="form-control text-right" readonly disabled="true" id="txtClaveImpresor"/>
		</div>
		-->
		<div class="col-md-8">
			<input class="form-control" readonly disabled="true" value="" id="txtNombreImpresor" <?php if (in_array($_smarty_tpl->tpl_vars['perfil']->value,array(2))){?>disabled<?php }?>/>
		</div>
	</div>
	<hr />
<?php }?>
<?php if (in_array($_smarty_tpl->tpl_vars['perfil']->value,array(1,4,5))){?>
<div class="row">
	<div class="col-md-3">
		<button id="btnFechaRecepcion" class="btn btn-warning btn-xs">Fecha de recepción</button>
	</div>
	<div class="col-md-3">
		<input class="form-control text-right" value="" id="txtFechaRecepcion" disabled readonly/>
	</div>
	<div class="col-md-3">
		<button id="btnFechaEntregaCliente" class="btn btn-warning btn-xs">Fecha entrega al cliente</button>
	</div>
	<div class="col-md-3">
		<input class="form-control" value="" id="txtFechaEntregaCliente" disabled readonly/>
	</div>
</div>
<hr />
<?php }?>
<div class="row">
	<div class="col-md-3">
		<b>Notas administrativas</b>
	</div>
	<div class="col-md-9">
		<input class="form-control" value="" id="txtNotasAdministrativas" <?php if (!in_array($_smarty_tpl->tpl_vars['perfil']->value,array(5))){?>readonly disabled<?php }?>/>
	</div>
</div>
<?php if (!in_array($_smarty_tpl->tpl_vars['perfil']->value,array(2,3))){?>
<br />
<div class="row">
	<div class="col-md-3">
		<b>Usuario Administrativo</b>
	</div>
	<div class="col-md-9">
		<input class="form-control" value="" id="txtAdministrativo" <?php if (!in_array($_smarty_tpl->tpl_vars['perfil']->value,array(5))){?>readonly disabled<?php }?>/>
	</div>
</div>
<?php }?>
<hr />
<div class="row">
	<div class="col-md-12">
		<?php if (!in_array($_smarty_tpl->tpl_vars['perfil']->value,array())){?>
			<button class="btn btn-success pull-right" id="btnGuardar">Guardar</button>
		<?php }?>
	</div>
</div><?php }} ?>