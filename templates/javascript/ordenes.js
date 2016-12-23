var keyMaps = "AIzaSyAI0j32qDb3KrIzHF1ejuK9XGILtsR1AL0";
$(document).ready(function(){
	getLista();
	
	$("#selEstado").change(function(){
		var el = $(this);
		var obj = new TOrden;
		
		var comentario = prompt("Escribe un comentario", "");
		obj.actualizarEstado($("#orden").val(), el.val(), comentario, {
			before: function(){
				el.prop("disabled", true);
			}, after: function(resp){
				el.prop("disabled", false);
				
				if (!resp.band)
					alert("El cambio de estado no se realizó");
				else
					getLista();
			}
		});
	});
	
	$("#selAtiende").change(function(){
		var el = $(this);
		var obj = new TOrden;
		
		obj.setAtiende($("#orden").val(), el.val(), {
			before: function(){
				el.prop("disabled", true);
			}, after: function(resp){
				el.prop("disabled", false);
				
				if (!resp.band)
					alert("El usuario no pudo ser asignado");
			}
		});
	});

	
	function getLista(){
		$.get("listaOrdenes", function( data ) {
			$("#dvLista").html(data);
			
			$("[action=detalle]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				$.each(el, function(i, valor){
					$("#winDetalle").find("[campo=" + i + "]").html(valor);
				});
				
				$("#winDetalle").find("#selAtiende").val(el.atiende);
				$("#winDetalle").find("#selEstado").val(el.idEstado);
				
				if (el.lat2 == null && el.lng2 == null)
					$("#winDetalle").find("#mapa").prop("src", "https://www.google.com/maps/embed/v1/place?q=" + el.lat + "," + el.lng + "&key=" + keyMaps);
				else	
					$("#winDetalle").find("#mapa").prop("src", "https://www.google.com/maps/embed/v1/directions?key=" + keyMaps + "&origin=" + el.lat + "," + el.lng + "&destination=" + el.lat2 + "," + el.lng2);
				
				$("#orden").val(el.idOrden);
				
				$("#winDetalle").modal();
			});
			
			$("[action=historial]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				$("#winHistorial").modal();
				
				$.post("listaHistorial", {
					"orden": el.idOrden
				}, function(resp){
					$("#winHistorial").find(".list-group").html(resp);
				});
			});
			
			$("#tblDatos").DataTable({
				"responsive": true,
				"language": espaniol,
				"paging": true,
				"lengthChange": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
				"order": [[ 0, "desc" ]]
			});
		});
	}
});