TPrecio = function(){
	var self = this;
	
	this.add = function(datos, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('ckilometros', {
				"limite": datos.limite,
				"precio": datos.precio,
				"id": datos.anterior,
				"action": "add"
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	};
	
	this.del = function(id, fn){
		$.post('ckilometros', {
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