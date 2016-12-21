<?php /* Smarty version Smarty-3.1.11, created on 2016-12-20 21:37:47
         compiled from "templates/plantillas/modulos/servicios/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2086885683585948df3dce45-88577776%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a18698e84101af65a03632bf734941111a639017' => 
    array (
      0 => 'templates/plantillas/modulos/servicios/panel.tpl',
      1 => 1482264380,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2086885683585948df3dce45-88577776',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_585948df3f66b4_87782434',
  'variables' => 
  array (
    'categorias' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_585948df3f66b4_87782434')) {function content_585948df3f66b4_87782434($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Servicios</h1>
	</div>
</div>

<ul id="panelTabs" class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#listas">Lista</a></li>
  <li><a data-toggle="tab" href="#add">Agregar o Modificar</a></li>
</ul>

<div class="tab-content">
	<div id="listas" class="tab-pane fade in active">
		<div id="dvLista">
			
		</div>
	</div>
	
	<div id="add" class="tab-pane fade">
		<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
			<div class="box">
				<div class="box-body">
					<div class="form-group">
						<label for="txtNombre" class="col-lg-2">Nombre</label>
						<div class="col-lg-6">
							<input class="form-control" id="txtNombre" name="txtNombre">
						</div>
					</div>
				</div>
				<div class="box-body">
					<div class="form-group">
						<label for="selCategoria" class="col-lg-2">Categoría</label>
						<div class="col-lg-4">
							<select id="selCategoria" name="selCategoria" class="form-control">
								<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categorias']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['idCategoria'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
				<div class="box-body">
					<div class="form-group">
						<label for="txtDescripcion" class="col-lg-2">Descripción</label>
						<div class="col-lg-6">
							<textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="3"></textarea>
						</div>
					</div>
				</div>
				<div class="box-body">
					<div class="form-group">
						<label for="txtPrecio" class="col-lg-2">Precio</label>
						<div class="col-lg-2">
							<input class="form-control text-right" type="number" id="txtPrecio" name="txtPrecio">
							<span class="help-block">Si es 0 el precio es tomado en base al kilometraje</span>
						</div>
					</div>
				</div>
				<div class="box-footer">
					<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
					<button type="submit" class="btn btn-info pull-right">Guardar</button>
					<input type="hidden" id="id"/>
				</div>
			</div>
		</form>
	</div>
</div><?php }} ?>