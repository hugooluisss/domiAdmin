<?php /* Smarty version Smarty-3.1.11, created on 2016-12-20 21:28:30
         compiled from "templates/plantillas/modulos/clientes/sitios/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:604305235859648d1e2a15-44618270%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fde4ad1fe1e5553b1b123aa34390e8ee29a19538' => 
    array (
      0 => 'templates/plantillas/modulos/clientes/sitios/lista.tpl',
      1 => 1482264380,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '604305235859648d1e2a15-44618270',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5859648d299183_99604330',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5859648d299183_99604330')) {function content_5859648d299183_99604330($_smarty_tpl) {?><table id="tblDatos" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>Titulo</th>
			<th>Dirección</th>
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
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['idSitio'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['titulo'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['direccion'];?>
</td>
				<td style="text-align: right">
					<button type="button" class="btn btn-primary" action="detalleSitio" title="Detalle" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-map-marker"></i></button>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table><?php }} ?>