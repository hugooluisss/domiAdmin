<?php /* Smarty version Smarty-3.1.11, created on 2016-12-21 23:59:22
         compiled from "templates/plantillas/modulos/ordenes/listaHistorial.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1797452386585b69a1b0a540-64388704%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2656846b473fed5450e72a4aa955d4b376d1eab4' => 
    array (
      0 => 'templates/plantillas/modulos/ordenes/listaHistorial.tpl',
      1 => 1482386358,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1797452386585b69a1b0a540-64388704',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_585b69a1bf2ef4_49980368',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_585b69a1bf2ef4_49980368')) {function content_585b69a1bf2ef4_49980368($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
	<a href="#" class="list-group-item">
		<h4 class="list-group-item-heading" style="color"><?php echo $_smarty_tpl->tpl_vars['row']->value['estado'];?>
</h4>
		<p class="list-group-item-text">
			<span class="text-success"><?php echo $_smarty_tpl->tpl_vars['row']->value['fecha'];?>
</span> <small><?php echo $_smarty_tpl->tpl_vars['row']->value['usuario'];?>
</small><br />
			<br />
			<?php echo $_smarty_tpl->tpl_vars['row']->value['comentario'];?>

		</p>
	</a>
<?php } ?><?php }} ?>