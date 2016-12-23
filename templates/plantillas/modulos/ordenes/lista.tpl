<div class="box">
	<div class="box-body">
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Fecha</th>
					<th>Cliente</th>
					<th>Estado</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr>
						<td style="border-left: 5px solid {$row.color}">{$row.fecha}</td>
						<td>{$row.nombreCliente}</td>
						<td style="color: {$row.color}">{$row.nombreEstado}</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-default" action="historial" title="Historial del servicio" datos='{$row.json}'>H</button>
							<button type="button" class="btn btn-success" action="detalle" title="Detalle de la orden" datos='{$row.json}'><i class="fa fa-info"></i></button>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>