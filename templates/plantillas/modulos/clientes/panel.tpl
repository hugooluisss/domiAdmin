<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Clientes</h1>
	</div>
</div>

<ul id="panelTabs" class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#listas">Lista</a></li>
  <li><a data-toggle="tab" href="#add">Agregar o Modificar</a></li>
</ul>

<div class="tab-content">
	<div id="listas" class="tab-pane fade in active">
		<div id="dvLista">
			
		</div>
	</div>
	
	<div id="add" class="tab-pane fade">
		<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
			<div class="box">
				<div class="box-body">
					<div class="form-group">
						<label for="txtNombre" class="col-lg-2">Nombre completo</label>
						<div class="col-lg-6">
							<input class="form-control" id="txtNombre" name="txtNombre">
						</div>
					</div>
					<div class="form-group">
						<label for="selSexo" class="col-lg-2">Sexo</label>
						<div class="col-lg-2">
							<select class="form-control" id="selSexo" name="selSexo">
								<option value="H">Hombre</option>
								<option value="M">Mujer</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="txtFechaNacimiento" class="col-lg-2">Nacimiento</label>
						<div class="col-lg-2">
							<input class="form-control" id="txtFechaNacimiento" name="txtFechaNacimiento" type="text" placeholder="yyyy-mm-dd">
						</div>
					</div>
					<div class="form-group">
						<label for="txtEmail" class="col-lg-2">Correo electrónico</label>
						<div class="col-lg-3">
							<input class="form-control" id="txtEmail" name="txtEmail" type="email">
						</div>
					</div>
					<div class="form-group">
						<label for="txtCelular" class="col-lg-2">Celular</label>
						<div class="col-lg-3">
							<input class="form-control" id="txtCelular" name="txtCelular" type="text">
						</div>
					</div>
				</div>
				<div class="box-footer">
					<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
					<button type="submit" class="btn btn-info pull-right">Guardar</button>
					<input type="hidden" id="id"/>
				</div>
			</div>
		</form>
	</div>
</div>

{include file=$PAGE.rutaModulos|cat:"modulos/clientes/sitios/panel.tpl"}
{include file=$PAGE.rutaModulos|cat:"modulos/clientes/sitios/winDetalle.tpl"}