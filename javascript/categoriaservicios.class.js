TCategoriaServicio = function(){
	var self = this;
	
	this.add = function(id,	nombre, descripcion, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('ccategoriaservicios', {
				"id": id,
				"nombre": nombre,
				"descripcion": descripcion,
				"action": "add"
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	};
	
	this.del = function(id, fn){
		$.post('ccategoriaservicios', {
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