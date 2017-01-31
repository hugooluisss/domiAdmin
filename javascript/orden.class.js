TOrden = function(){
	var self = this;
	
	this.actualizarEstado = function(orden, estado, comentario, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('cordenes', {
				"id": orden,
				"estado": estado,
				"comentarios": comentario,
				"action": "changeEstado"
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");

	}
	
	this.setAtiende = function(orden, usuario, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('cordenes', {
				"id": orden,
				"usuario": usuario,
				"action": "setAtiende"
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");

	}
};