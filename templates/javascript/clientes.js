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
			txtNombre: "required",
			txtFechaNacimiento: "required",
			txtEmail: {
				required: true,
				
			},
			txtCelular: {
				required : true,
				minlength: 7,
				maxlength: 15,
				number: true
			}
		},
		wrapper: 'span', 
		messages: {
			txtNombre: "Este campo es necesario",
			txtTelefono: "Solo acepta número de entre 7 y 15 dígitos",
			txtCelular: "Solo acepta número de entre 7 y 15 dígitos"
		},
		submitHandler: function(form){
			var obj = new TCliente;
			obj.add(
				$("#id").val(), 
				$("#txtNombre").val(), 
				$("#txtFechaNacimiento").val(), 
				$("#txtEmail").val(),
				$("#selSexo").val(),
				$("#txtCelular").val(),
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
		$.get("listaClientes", function( data ) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TCliente;
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
				
				$("#id").val(el.idCliente);
				$("#txtNombre").val(el.nombre);
				$("#txtEmail").val(el.email);
				$("#selSexo").val(el.sexo);
				$("#txtNacimiento").val(el.nacimiento);
				
				$('#panelTabs a[href="#add"]').tab('show');
			});
			
			$("[action=sitios]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$("#winSitios").attr("cliente", el.idCliente).modal();
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
	
	$("#winSitios").on('shown.bs.modal', function (e) {
		var win = $("#winSitios");
		
		$.post("listaSitios", {
			"cliente": win.attr("cliente")
		}, function( data ) {
			win.find(".modal-body").html(data);
			
			win.find("[action=detalleSitio]").click(function(){
				var detalle = $("#winDetalleSitio");
				detalle.modal();
				var el = jQuery.parseJSON($(this).attr("datos"));
				detalle.find("#txtTitulo").val(el.titulo);
				detalle.find("#txtDireccion").val(el.direccion);
				//detalle.find("img").prop("src", "https://maps.googleapis.com/maps/api/staticmap?zoom=13&size=600x300&maptype=roadmap&markers=color:blue%7Clabel:A%7C" + el.lat + "," + el.lng + "&key=AIzaSyAI0j32qDb3KrIzHF1ejuK9XGILtsR1AL0");
				
				detalle.find("#mapa").prop("src", "https://www.google.com/maps/embed/v1/place?q=" + el.lat + "," + el.lng + "&key=AIzaSyAI0j32qDb3KrIzHF1ejuK9XGILtsR1AL0");
				/*
				$("#map").googleMap({
					zoom: 10, // Initial zoom level (optional)
					coords: [48.895651, 2.290569], // Map center (optional)
					type: "ROADMAP" // Map type (optional)
				});
				*/
			});
			
			win.find(".modal-body").find("#tblDatos").DataTable({
				"responsive": true,
				"language": espaniol,
				"paging": true,
				"lengthChange": false,
				"ordering": true,
				"info": true,
				"autoWidth": false
			});
		});
	});
	
	$("#winSitios").on('hidden.bs.modal', function (e) {
		win.find(".modal-body").html('<div class="text-center"><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>Cargando datos...</div>');
	});
	
	$("#winDetalleSitio").on('shown.bs.modal', function (e) {
		map = new google.maps.Map($("#winDetalleSitio").find('#map'), {
			center: {lat: -34.397, lng: 150.644},
			zoom: 8
		});
	});
	
	$("#winDetalleSitio").on('hidden.bs.modal', function (e) {
		$("#winDetalleSitio").find("input").val("");
		$("#winDetalleSitio").find("textarea").val("");
		$("#winDetalleSitio").find("img").prop("src", "");
	});
});