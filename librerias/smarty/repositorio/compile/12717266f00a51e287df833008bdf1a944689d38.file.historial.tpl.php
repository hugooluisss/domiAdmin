<?php /* Smarty version Smarty-3.1.11, created on 2016-10-24 16:03:59
         compiled from "templates/plantillas/modulos/ordenes/historial.tpl" */ ?>
<?php /*%%SmartyHeaderCode:979148836580e6fdad78364-42460915%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '12717266f00a51e287df833008bdf1a944689d38' => 
    array (
      0 => 'templates/plantillas/modulos/ordenes/historial.tpl',
      1 => 1477343037,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '979148836580e6fdad78364-42460915',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_580e6fdadf00e2_53786425',
  'variables' => 
  array (
    'orden' => 0,
    'tiempo' => 0,
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580e6fdadf00e2_53786425')) {function content_580e6fdadf00e2_53786425($_smarty_tpl) {?>La orden fue registrada el <b><?php echo $_smarty_tpl->tpl_vars['orden']->value->getRegistro();?>
</b> y se encuentra en estado <b><?php echo $_smarty_tpl->tpl_vars['orden']->value->estado->getNombre();?>
</b>. 
<b>
<?php if ($_smarty_tpl->tpl_vars['orden']->value->estado->getId()==3){?>
	Fue terminada hace <?php echo $_smarty_tpl->tpl_vars['tiempo']->value;?>

<?php }else{ ?>
	Desde su registro han pasado <?php echo $_smarty_tpl->tpl_vars['tiempo']->value;?>

<?php }?>
</b>
<table id="tblDatos" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Fecha</th>
			<th>Estado</th>
			<th>Usuario</th>
		</tr>
	</thead>
	<tbody>
		<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
			<tr>
				<td style="border-left: 3px solid <?php echo $_smarty_tpl->tpl_vars['row']->value['color'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['fecha'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['estado'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['usuario'];?>
</td>
			</tr>
		<?php } ?>
	</tbody>
</table><?php }} ?>