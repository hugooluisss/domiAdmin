<?php /* Smarty version Smarty-3.1.11, created on 2017-01-30 08:57:10
         compiled from "templates/plantillas/modulos/servicios/upload.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1399167894588f52c73783a8-64480531%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a1f2b46ec9c17d33ee9bbec91885424dcbafc637' => 
    array (
      0 => 'templates/plantillas/modulos/servicios/upload.tpl',
      1 => 1485788178,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1399167894588f52c73783a8-64480531',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_588f52c737bb43_65470197',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_588f52c737bb43_65470197')) {function content_588f52c737bb43_65470197($_smarty_tpl) {?><div class="modal fade" id="winUpload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h1>Historia</h1>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-6 col-xs-offset-3">
						<center>
							<img src="" class="img-responsive">
						</center>
					</div>
				</div>
				<form id="upload" method="post" action="?mod=cservicios&action=uploadfile" enctype="multipart/form-data">
					<input type="hidden" id="servicio" name="servicio">
					<input type="file" name="upl" multiple />
					<ul class="elementos list-group">
					<!-- The file list will be shown here -->
					</ul>
				</form>
			</div>
		</div>
	</div>
</div><?php }} ?>