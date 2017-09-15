/**
 * Created by walid on 27/07/2017.
 */
 
$(document).ready(function(){
	
$("#boBuscarUsuarioN" ).click(function(event){

	var valor= $("#usuarioNombre").val();
	var characters = /^[a-z," "]+$/i;
	
	if (!characters.test(valor)) {
			  $("#messageTipoN").html("El nombre solo debe contener letras");
			   return false
		   }else{
			   //$("#messageTipo").html("");
		   }

});

$("#boBuscarUsuarioT" ).click(function(event){

	var valor= $("#telefono").val();
	var filter1 = /^[0-9-+]+$/;
		var filter2 = /^(6|7)[0-9-+]+$/;
		if (!filter1.test(valor)) {
			//return true;
			
			$("#messageTipoT").html("El telefono solo debe contener numeros");
			return false
		}else if (!filter2.test(valor)) {
			//return true;
			
			$("#messageTipoT").html("El telefono debe empezar por 6 o 7");
			return false
		}else if(valor.length!=9){
			
			$("#messageTipoT").html("El numero debe contener 9 cifras");
			return false
		}
		else {
			$("#messageTipoT").html("");
		}

});

$(".telUser" ).blur(function(){

	var valor= $(".telUser").val();
	var filter1 = /^[0-9-+]+$/;
		var filter2 = /^(6|7)[0-9-+]+$/;
		if (!filter1.test(valor)) {
			//return true;
			
			$(".messageR").html("El telefono solo debe contener numeros");
			$('form input[id="boUsuarioReg"]').prop("disabled", true);
		}else if (!filter2.test(valor)) {
			//return true;
			
			$(".messageR").html("El telefono debe empezar por 6 o 7");
			$('form input[id="boUsuarioReg"]').prop("disabled", true);
			//return false
		}else if(valor.length!=9){
			
			$(".messageR").html("El numero debe contener 9 cifras");
			$('form input[id="boUsuarioReg"]').prop("disabled", true);
			//return false
		}
		else {
			$(".messageR").html("");
			$('form input[id="boUsuarioReg"]').prop("disabled", false);
		}

});


$("#boBuscarUsuarioO" ).click(function(event){

	var valor= $("#origenUsuario").val();
	var characters = /^[a-z," "]+$/i;
	
	if (!characters.test(valor)) {
			  $("#messageTipoO").html("El origen solo debe contener letras");
			   return false
		   }else{
			   //$("#messageTipo").html("");
		   }

});

});