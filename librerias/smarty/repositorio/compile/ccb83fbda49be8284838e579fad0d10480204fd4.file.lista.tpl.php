<?php /* Smarty version Smarty-3.1.11, created on 2016-10-24 15:23:15
         compiled from "templates/plantillas/modulos/ordenes/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1697850505580e6797a43842-11272907%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ccb83fbda49be8284838e579fad0d10480204fd4' => 
    array (
      0 => 'templates/plantillas/modulos/ordenes/lista.tpl',
      1 => 1477340524,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1697850505580e6797a43842-11272907',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_580e6797b33962_58254691',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
    'PAGE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580e6797b33962_58254691')) {function content_580e6797b33962_58254691($_smarty_tpl) {?><div class="box">
	<div class="box-body">
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Código</th>
					<th>Descripción</th>
					<th>Observaciones</th>
					<th>Sucursal</th>
					<th>Fecha</th>
					<th>Estado</th>
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
						<td style="border-left: 3px solid <?php echo $_smarty_tpl->tpl_vars['row']->value['colorEstado'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['codigo'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['descripcion'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['observaciones'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['sucursal'];?>
</td>
						<td <?php if ($_smarty_tpl->tpl_vars['row']->value['actual']==1){?>class="text-danger"<?php }?>><?php echo $_smarty_tpl->tpl_vars['row']->value['registro'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['estado'];?>
</td>
						<td class="text-right">
							<?php if ($_smarty_tpl->tpl_vars['row']->value['archivo']!=''&&$_smarty_tpl->tpl_vars['PAGE']->value['usuario']->getIdTipo()==3){?>
								<a href="<?php echo $_smarty_tpl->tpl_vars['row']->value['archivo'];?>
" download class="btn btn-primary" action="setEstado" estado="2" title="Descargar archivo" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-download"></i></a>
							<?php }?>
						
							<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['usuario']->getIdTipo()==6&&$_smarty_tpl->tpl_vars['row']->value['idEstado']!=9){?>
								<button type="button" class="btn btn-warning" action="setEstado" estado="9" title="Pasar a En tránsito" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-arrow-circle-o-right"></i></button>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['usuario']->getIdTipo()==5){?>
								<button type="button" class="btn btn-warning" title="Historial de estados" action="historialEstados" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-certificate"></i></button>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['usuario']->getIdTipo()==4&&in_array($_smarty_tpl->tpl_vars['row']->value['idEstado'],array(10,11,9))!=true){?>
								<button type="button" class="btn btn-warning" action="setEstado" estado="10" title="Pasar a En Rack" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-list-alt"></i></button>
								<button type="button" class="btn btn-warning" action="setEstado" estado="11" title="Pasar a Perdido" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-lastfm"></i></button>
							<?php }?>
							<button type="button" class="btn btn-success" action="detalle" title="Detalle" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-search"></i></button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>