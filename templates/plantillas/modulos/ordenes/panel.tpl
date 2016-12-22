<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Ordenes de servicio</h1>
	</div>
</div>

<div class="row" id="dvLista">
</div>

{include file=$PAGE.rutaModulos|cat:"modulos/ordenes/detalle.tpl"}
{include file=$PAGE.rutaModulos|cat:"modulos/ordenes/winHistorial.tpl"}

<input type="hidden" id="orden" name="orden" />