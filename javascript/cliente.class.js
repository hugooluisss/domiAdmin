TCliente = function(){
	var self = this;
	
	this.add = function(id,	nombre, nacimiento, correo, sexo, celular, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('cclientes', {
				"id": id,
				"nombre": nombre,
				"nacimiento": nacimiento,
				"correo": correo, 
				"sexo": sexo,
				"celular": celular,
				"action": "add"
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	};
	
	this.del = function(id, fn){
		$.post('cclientes', {
			"cliente": id,
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