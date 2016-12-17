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