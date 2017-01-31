<div class="box">
	<div class="box-body">
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th>Categoría</th>
					<th>Precio</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr>
						<td>{$row.idServicio}</td>
						<td>{$row.nombre}</td>
						<td>{$row.categoria}</td>
						<td class="text-right">{if $row.precio eq 0}por Km{else}{$row.precio}{/if}</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-default" action="upload" title="Subir archivo" datos='{$row.json}'><i class="fa fa-upload"></i></button>
							<button type="button" class="btn btn-success" action="modificar" title="Modificar" datos='{$row.json}'><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger" action="eliminar" title="Eliminar" identificador="{$row.idServicio}"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>