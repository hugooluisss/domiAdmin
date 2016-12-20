<table id="tblDatos" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>Titulo</th>
			<th>Dirección</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		{foreach from=$lista item="row"}
			<tr>
				<td>{$row.idSitio}</td>
				<td>{$row.titulo}</td>
				<td>{$row.direccion}</td>
				<td style="text-align: right">
					<button type="button" class="btn btn-primary" action="detalleSitio" title="Detalle" datos='{$row.json}'><i class="fa fa-map-marker"></i></button>
				</td>
			</tr>
		{/foreach}
	</tbody>
</table>