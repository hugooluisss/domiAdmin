TUsuario = function(){
	var self = this;
	
	this.add = function(id,	nombre, clave, pass, email, tipo, telefono, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('cusuarios', {
				"id": id,
				"nombre": nombre,
				"clave": clave,
				"email": email, 
				"pass": pass,
				"tipo": tipo,
				"telefono": telefono,
				"action": "add"
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	};
	
	this.savePersonales = function(nombre, apellidos, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('?mod=cusuarios&action=saveDatosPersonales', {
				"nombre": nombre,
				"app": apellidos
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	}
	
	this.savePass = function(pass, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('?mod=cusuarios&action=savePassword', {
				"pass": pass
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	}
	
	this.del = function(usuario, fn){
		$.post('cusuarios', {
			"usuario": usuario,
			"action": "del"
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			if (data.band == 'false'){
				alert("Ocurrió un error al eliminar al usuario");
			}
		}, "json");
	};
	
	this.login = function(usuario, pass, fn){
		if (fn.before !== undefined)
			fn.before();
			
		$.post('?mod=clogin&action=login', {
			"usuario": usuario,
			"pass": pass
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
				
			if (data.band == 'false'){
				console.log("Los datos del usuario no son válidos");
			}
		}, "json");
	}
};