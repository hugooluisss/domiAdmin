<?php /* Smarty version Smarty-3.1.11, created on 2016-12-13 22:12:26
         compiled from "templates/plantillas/modulos/estados/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17177630125850c6aa2fe153-70723852%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '283ab36ed022f8de806ba5eba9c046cd5bc45491' => 
    array (
      0 => 'templates/plantillas/modulos/estados/lista.tpl',
      1 => 1475035250,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17177630125850c6aa2fe153-70723852',
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
  'unifunc' => 'content_5850c6aa44d3d9_32963186',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5850c6aa44d3d9_32963186')) {function content_5850c6aa44d3d9_32963186($_smarty_tpl) {?><div class="box">
	<div class="box-body">
		<table id="tblEstados" class="table table-bordered table-hover">
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
						<td style="border-left: 2px solid <?php echo $_smarty_tpl->tpl_vars['row']->value['color'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['idEstado'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-success btn-circle" action="modificar" title="Modificar" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-pencil"></i></button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>