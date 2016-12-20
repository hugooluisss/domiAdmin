TServicio = function(){
	var self = this;
	
	this.add = function(data, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('cservicios', {
				"id": data.id,
				"nombre": data.nombre,
				"descripcion": data.descripcion,
				"precio": data.precio,
				"categoria": data.categoria,
				"action": "add"
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	};
	
	this.del = function(id, fn){
		$.post('cservicios', {
			"identificador": id,
			"action": "del"
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
				
			if (data.band == false){
				console.info("No se pudo eliminar");
			}
		}, "json");
	};
};