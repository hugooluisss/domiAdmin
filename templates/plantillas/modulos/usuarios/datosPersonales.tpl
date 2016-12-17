<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Datos personales</h1>
	</div>
</div>

<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
	<div class="box">
		<div class="box-body">
			<div class="form-group">
				<label for="txtNombre" class="col-lg-2">Nombre completo</label>
				<div class="col-lg-3">
					<input class="form-control" id="txtNombre" name="txtNombre" value="{$nombre}">
					<span class="help-block">Nombre(s)</span>
				</div>
				<div class="col-lg-3">
					<input class="form-control" id="txtApellidos" name="txtApp" value="{$apellidos}">
					<span class="help-block">Apellidos</span>
				</div>
			</div>
		</div>
		<div class="box-footer">
			<button type="submit" class="btn btn-info pull-right">Guardar</button>
			<input type="hidden" id="id"/>
		</div>
	</div>
</form>