<div class="modal fade" id="winDetalleSitio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h1>Detalle</h1>
			</div>
			<div class="modal-body">
				<div class="input-group col-xs-12">
					<label for="txtTitulo">Título</label>
					<input type="text" class="form-control" id="txtTitulo" readonly="true" value="{$datos.titulo}">
				</div>
				<br />
				<div class="input-group col-xs-12">
					<label for="txtDireccion">Dirección</label>
					<textarea rows="3" id="txtDireccion" readonly="true" class="form-control">{$datos.direccion}</textarea>
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
</div>