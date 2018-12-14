$(function(){
	var nombre = $("#nombre");
	var correo = $("#correo");
	var mensaje = $("#mensaje");
	var labelNombre = $("#nombre-label");
	var labelCorreo = $("#correo-label");
	var labelMensaje = $("#mensaje-label");
	
	
	$(nombre).blur(function(){
		if(this.value == ""){
			$(labelNombre).fadeIn(1000);
		}else{
			$(labelNombre).hide();
		}
	});
	$(correo).blur(function(){
		if(this.value == ""){
			$(labelCorreo).fadeIn(1000);
		}else{
			$(labelCorreo).hide();
		}
	});
	$(mensaje).blur(function(){
		if(this.value == ""){
			$(labelMensaje).fadeIn(1000);
		}else{
			$(labelMensaje).hide();
		}
	});
	

});