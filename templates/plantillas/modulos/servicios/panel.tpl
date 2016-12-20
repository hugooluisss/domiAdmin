<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Servicios</h1>
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
						<label for="txtNombre" class="col-lg-2">Nombre</label>
						<div class="col-lg-6">
							<input class="form-control" id="txtNombre" name="txtNombre">
						</div>
					</div>
				</div>
				<div class="box-body">
					<div class="form-group">
						<label for="selCategoria" class="col-lg-2">Categoría</label>
						<div class="col-lg-4">
							<select id="selCategoria" name="selCategoria" class="form-control">
								{foreach from=$categorias item="row"}
									<option value="{$row.idCategoria}">{$row.nombre}</option>
								{/foreach}
							</select>
						</div>
					</div>
				</div>
				<div class="box-body">
					<div class="form-group">
						<label for="txtDescripcion" class="col-lg-2">Descripción</label>
						<div class="col-lg-6">
							<textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="3"></textarea>
						</div>
					</div>
				</div>
				<div class="box-body">
					<div class="form-group">
						<label for="txtPrecio" class="col-lg-2">Precio</label>
						<div class="col-lg-2">
							<input class="form-control text-right" type="number" id="txtPrecio" name="txtPrecio">
							<span class="help-block">Si es 0 el precio es tomado en base al kilometraje</span>
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