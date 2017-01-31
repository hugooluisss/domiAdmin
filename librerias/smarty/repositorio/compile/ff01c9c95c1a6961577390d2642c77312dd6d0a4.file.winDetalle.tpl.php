<?php /* Smarty version Smarty-3.1.11, created on 2017-01-30 08:42:39
         compiled from "templates/plantillas/modulos/clientes/sitios/winDetalle.tpl" */ ?>
<?php /*%%SmartyHeaderCode:166371473758596948f32e13-02469617%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ff01c9c95c1a6961577390d2642c77312dd6d0a4' => 
    array (
      0 => 'templates/plantillas/modulos/clientes/sitios/winDetalle.tpl',
      1 => 1482381858,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '166371473758596948f32e13-02469617',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_58596948f349d5_81234901',
  'variables' => 
  array (
    'datos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58596948f349d5_81234901')) {function content_58596948f349d5_81234901($_smarty_tpl) {?><div class="modal fade" id="winDetalleSitio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3>Detalle</h3>
			</div>
			<div class="modal-body">
				<div class="input-group col-xs-12">
					<label for="txtTitulo">Título</label>
					<input type="text" class="form-control" id="txtTitulo" readonly="true" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['titulo'];?>
">
				</div>
				<br />
				<div class="input-group col-xs-12">
					<label for="txtDireccion">Dirección</label>
					<textarea rows="3" id="txtDireccion" readonly="true" class="form-control"><?php echo $_smarty_tpl->tpl_vars['datos']->value['direccion'];?>
</textarea>
				</div>
				<br />
				<div class="row">
					<div class="col-xs-12">
						<iframe height="400" frameborder="0" style="border:0; width: 100%" src="" id="mapa"></iframe>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><?php }} ?>