{foreach from=$lista item="row"}
	<a href="#" class="list-group-item">
		<h4 class="list-group-item-heading" style="color">{$row.estado}</h4>
		<p class="list-group-item-text">
			<span class="text-success">{$row.fecha}</span> <small>{$row.usuario}</small><br />
			<br />
			{$row.comentario}
		</p>
	</a>
{/foreach}