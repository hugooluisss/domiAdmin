$(document).ready(function(){
	if ($("#dvLista").length){
		getLista();
	
		$("#panelTabs li a[href=#add]").click(function(){
			$("#frmAdd").get(0).reset();
			$("#id").val("");
			$("form:not(.filter) :input:visible:enabled:first").focus();
		});
	}
	
	$("#btnReset").click(function(){
		$('#panelTabs a[href="#listas"]').tab('show');
	});
	
	$("#frmAdd").validate({
		debug: true,
		rules: {
			txtNombre: "required"
		},
		wrapper: 'span', 
		submitHandler: function(form){
			var obj = new TCategoriaServicio;
			obj.add(
				$("#id").val(), 
				$("#txtNombre").val(),
				$("#txtDescripcion").val(),
				{
					after: function(datos){
						if (datos.band){
							getLista();
							$("#frmAdd").get(0).reset();
							$('#panelTabs a[href="#listas"]').tab('show');
						}else{
							alert("Upps... No se guardaron los datos");
						}
					}
				}
			);
        }

    });
		
	function getLista(){
		$.get("listaCategoriaServicios", function( data ) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TCategoriaServicio;
					obj.del($(this).attr("identificador"), {
						after: function(data){
							if(!data.band)
								alert("No se pudo eliminar");
								
							getLista();
						}
					});
				}
			});
			
			$("[action=modificar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$("#id").val(el.idCategoria);
				$("#txtNombre").val(el.nombre);
				$("#txtDescripcion").val(el.descripcion);
				
				$('#panelTabs a[href="#add"]').tab('show');
			});
			
			$("#tblDatos").DataTable({
				"responsive": true,
				"language": espaniol,
				"paging": true,
				"lengthChange": false,
				"ordering": true,
				"info": true,
				"autoWidth": false
			});
		});
	}
});