<?php /* Smarty version Smarty-3.1.11, created on 2016-12-21 22:43:05
         compiled from "templates/plantillas/modulos/ordenes/detalle.tpl" */ ?>
<?php /*%%SmartyHeaderCode:827635306585b54ab00e554-53808724%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '87acf5e53b8029108c8ece6113b65e0a738d9318' => 
    array (
      0 => 'templates/plantillas/modulos/ordenes/detalle.tpl',
      1 => 1482381713,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '827635306585b54ab00e554-53808724',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_585b54ab011e61_41231748',
  'variables' => 
  array (
    'estados' => 0,
    'row' => 0,
    'usuarios' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_585b54ab011e61_41231748')) {function content_585b54ab011e61_41231748($_smarty_tpl) {?><div class="modal fade" id="winDetalle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h1>Detalle de la orden</h1>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-3"><b>Fecha</b></div>
							<div class="col-md-9" campo="fecha"></div>
						</div>
						<br />
						<div class="row">
							<div class="col-md-3"><b>Cliente</b></div>
							<div class="col-md-9" campo="nombreCliente"></div>
						</div>
						<br />
						<div class="row">
							<div class="col-md-3"><b>Estado</b></div>
							<div class="col-md-4">
								<select id="selEstado" name="selEstado" class="form-control">
									<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['estados']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['idEstado'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</option>
									<?php } ?>
								</select>
							</div>
						</div>
						<br />
						<div class="row">
							<div class="col-md-3"><b>Atiende</b></div>
							<div class="col-md-9">
								<select id="selAtiende" name="selAtiende" class="form-control">
									<option value="">Sin asignar</option>
									<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['usuarios']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['idEstado'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</option>
									<?php } ?>
								</select>
							</div>
						</div>
						<br />
						<div class="row">
							<div class="col-md-3"><b>Servicio</b></div>
							<div class="col-md-3" campo="nombreServicio"></div>
							<div class="col-md-3"><b>Categoría</b></div>
							<div class="col-md-3" campo="categoria"></div>
						</div>
						<br />
						<div class="row">
							<div class="col-md-3"><b>Monto</b></div>
							<div class="col-md-3" campo="monto"></div>
						</div>
						<div class="row">
							<div class="col-md-3"><b>Notas</b></div>
							<div class="col-md-9" campo="notas"></div>
						</div>
						<br />
					</div>
					<div class="col-md-6">
						<iframe height="400" frameborder="0" style="border:0; width: 100%" src="" id="mapa"></iframe>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><?php }} ?>