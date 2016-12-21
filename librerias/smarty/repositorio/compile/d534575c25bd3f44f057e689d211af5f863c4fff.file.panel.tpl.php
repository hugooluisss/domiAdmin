<?php /* Smarty version Smarty-3.1.11, created on 2016-12-20 22:29:43
         compiled from "templates/plantillas/modulos/preciokilometros/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26823638585a011d94a394-88438989%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd534575c25bd3f44f057e689d211af5f863c4fff' => 
    array (
      0 => 'templates/plantillas/modulos/preciokilometros/panel.tpl',
      1 => 1482294431,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26823638585a011d94a394-88438989',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_585a011d9b79c1_97970201',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_585a011d9b79c1_97970201')) {function content_585a011d9b79c1_97970201($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Precios por kilómetros recorridos</h1>
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
						<label for="txtLimite" class="col-lg-2">Límite <small class="text-warning">(km)</small></label>
						<div class="col-lg-2">
							<input class="form-control text-right" id="txtLimite" name="txtLimite" type="number">
						</div>
					</div>
				</div>
				<div class="box-body">
					<div class="form-group">
						<label for="txtPrecio" class="col-lg-2">Precio <small class="text-warning">(Por kilometro)</small></label>
						<div class="col-lg-2">
							<input class="form-control text-right" id="txtPrecio" name="txtPrecio" type="number">
						</div>
					</div>
				</div>
				<div class="box-footer">
					<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
					<button type="submit" class="btn btn-info pull-right">Guardar</button>
					<input type="hidden" value="" id="id" name="id" />
				</div>
			</div>
		</form>
	</div>
</div><?php }} ?>