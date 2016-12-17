<?php /* Smarty version Smarty-3.1.11, created on 2016-12-16 19:47:53
         compiled from "templates/plantillas/modulos/categoriaservicios/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:82292793058549949a37d79-17716886%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa018a20e005583e182feb8d63b23dec4b508c18' => 
    array (
      0 => 'templates/plantillas/modulos/categoriaservicios/lista.tpl',
      1 => 1481939175,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '82292793058549949a37d79-17716886',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_58549949aeaf45_19508261',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58549949aeaf45_19508261')) {function content_58549949aeaf45_19508261($_smarty_tpl) {?><div class="box">
	<div class="box-body">
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
					<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['idCategoria'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-success" action="modificar" title="Modificar" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger" action="eliminar" title="Eliminar" identificador="<?php echo $_smarty_tpl->tpl_vars['row']->value['idCategoria'];?>
"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>