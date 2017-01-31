<div class="modal fade" id="winDetalle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h1>Detalle de la orden</h1>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-3"><b>Fecha</b></div>
							<div class="col-md-9" campo="fecha"></div>
						</div>
						<br />
						<div class="row">
							<div class="col-md-3"><b>Cliente</b></div>
							<div class="col-md-9" campo="nombreCliente"></div>
						</div>
						<br />
						<div class="row">
							<div class="col-md-3"><b>Estado</b></div>
							<div class="col-md-4">
								<select id="selEstado" name="selEstado" class="form-control">
									{foreach from=$estados item="row"}
										<option value="{$row.idEstado}">{$row.nombre}</option>
									{/foreach}
								</select>
							</div>
						</div>
						<br />
						<div class="row">
							<div class="col-md-3"><b>Atiende</b></div>
							<div class="col-md-9">
								<select id="selAtiende" name="selAtiende" class="form-control">
									<option value="">Sin asignar</option>
									{foreach from=$usuarios item="row"}
										<option value="{$row.idUsuario}">{$row.nombre}</option>
									{/foreach}
								</select>
							</div>
						</div>
						<br />
						<div class="row">
							<div class="col-md-3"><b>Servicio</b></div>
							<div class="col-md-3" campo="nombreServicio"></div>
							<div class="col-md-3"><b>Categoría</b></div>
							<div class="col-md-3" campo="categoria"></div>
						</div>
						<br />
						<div class="row">
							<div class="col-md-3"><b>Monto</b></div>
							<div class="col-md-3" campo="monto"></div>
						</div>
						<div class="row">
							<div class="col-md-3"><b>Notas</b></div>
							<div class="col-md-9" campo="notas"></div>
						</div>
						<br />
					</div>
					<div class="col-md-6">
						<iframe height="400" frameborder="0" style="border:0; width: 100%" src="" id="mapa"></iframe>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>