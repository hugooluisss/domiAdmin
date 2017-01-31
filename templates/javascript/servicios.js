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
			txtPrecio: {
				min: 0,
				number: true,
				required: true
			},
			selCategoria: "required"
		},
		wrapper: 'span', 
		submitHandler: function(form){
			var obj = new TServicio;
			obj.add({
					id: $("#id").val(), 
					categoria: $("#selCategoria").val(), 
					nombre: $("#txtNombre").val(),
					descripcion: $("#txtDescripcion").val(),
					precio: $("#txtPrecio").val()
				},
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
		$.get("listaServicios", function( data ) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TServicio;
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
				
				$("#id").val(el.idServicio);
				$("#selCategoria").val(el.idCategoria);
				$("#txtNombre").val(el.nombre);
				$("#txtDescripcion").val(el.descripcion);
				$("#txtPrecio").val(el.precio);
				
				$('#panelTabs a[href="#add"]').tab('show');
			});
			
			$("[action=upload]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				var win = $("#winUpload");
				win.find("#servicio").val(el.idServicio);
				
				win.modal();
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
	
	$("#winUpload").on("hidden.bs.modal", function(){
		$("#winUpload").find("#servicio").val("");
	});
	
	$("#winUpload").on("show.bs.modal", function(){
		$("#winUpload").find(".modal-body").find("img").prop("src", "repositorio/servicios/img" + $("#winUpload").find("#servicio").val() + ".jpg");
	});
	
	$('#upload').fileupload({
		dataType: 'json',
		progressall: function (e, data) {
			var progress = parseInt(data.loaded / data.total * 100, 10);
			$(".progress .progress-bar").css('width', progress + '%');
			
			if (progress < 100)
				$(".alert-danger").show();
			else
				$(".alert-danger").hide();
		},
		add: function (e, data) {
			console.log(data);
			var archivos = '';
			
			data.context = $('<p/>', {"class": "text-warning"}).html('<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i> Subiendo <b>' + data.files[0].name + '</b> al servidor... <i class="fa fa-upload" aria-hidden="true"></i>').appendTo($("#historial"));
			
			data.submit();
        },
		fail: function(){
			alert("Ocurrió un problema en el servidor, contacta al administrador del sistema");
			
			console.log("Error en el servidor al subir el archivo, checa permisos de la carpeta repositorio");
		},
		done: function (e, data) {
            $.each(data.files, function (index, file) {
            	data.context.html('<i class="fa fa-2x fa-check-circle" aria-hidden="true"></i> ' + file.name + ' 100% arriba');
            	data.context.removeClass("text-warning");
            	data.context.addClass("text-success");
            });
            $("#winUpload").find(".modal-body").find("img").prop("src", "repositorio/servicios/img" + $("#winUpload").find("#servicio").val() + ".jpg");
        },
        complete: function(result, textStatus, jqXHR) {
        	//console.log(result);
        	result = jQuery.parseJSON(result.responseText);
        	
        	//result.status == 'success')
        }
	});
});