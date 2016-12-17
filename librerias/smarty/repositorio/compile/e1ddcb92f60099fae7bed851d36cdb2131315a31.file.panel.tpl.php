<?php /* Smarty version Smarty-3.1.11, created on 2016-10-31 23:18:34
         compiled from "templates/plantillas/modulos/reportes/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:398932958581825aa49f099-02205917%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e1ddcb92f60099fae7bed851d36cdb2131315a31' => 
    array (
      0 => 'templates/plantillas/modulos/reportes/panel.tpl',
      1 => 1476298970,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '398932958581825aa49f099-02205917',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sucursales' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_581825aa52a912_40215164',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_581825aa52a912_40215164')) {function content_581825aa52a912_40215164($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Ordenes</h1>
	</div>
</div>

<div class="panel panel-default">
	<div class="panel-body">
		<form role="form" id="frmBuscar" class="form-horizontal" onsubmit="javascript: return false;">
			<div class="form-group">
				<label for="selSucursal" class="col-lg-2">Sucursal</label>
				<div class="col-lg-3">
					<select class="form-control" id="selSucursal" name="selSucursal">
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sucursales']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['idSucursal'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['nombre'];?>
</option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-info pull-right">Buscar</button>
				<input type="hidden" id="id"/>
			</div>
		</form>
	</div>
</div>

<div id="piechart" style="width: 100%; height: 500px;"></div>

<br />
<div class="well well-lg" id="listaOrdenes">
</div><?php }} ?>