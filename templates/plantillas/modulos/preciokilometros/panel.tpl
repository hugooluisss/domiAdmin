<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Precios por kilómetros recorridos</h1>
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
						<label for="txtLimite" class="col-lg-2">Límite <small class="text-warning">(km)</small></label>
						<div class="col-lg-2">
							<input class="form-control text-right" id="txtLimite" name="txtLimite" type="number">
						</div>
					</div>
				</div>
				<div class="box-body">
					<div class="form-group">
						<label for="txtPrecio" class="col-lg-2">Precio <small class="text-warning">(Por kilometro)</small></label>
						<div class="col-lg-2">
							<input class="form-control text-right" id="txtPrecio" name="txtPrecio" type="number">
						</div>
					</div>
				</div>
				<div class="box-footer">
					<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
					<button type="submit" class="btn btn-info pull-right">Guardar</button>
					<input type="hidden" value="" id="id" name="id" />
				</div>
			</div>
		</form>
	</div>
</div>