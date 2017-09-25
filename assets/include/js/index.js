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
//$("#boUsuarioReg").blur(function(){
$("#passwordReg").blur(function(){
     var regExp = /[#&/()_=?¿^*+\-!\"@;,.:]/;
	 var filter1 = /^[0-9-+]+$/;
	 var valor = $('#passwordReg').val();
     /*if(!regExp.test(valor){
         
		 $(".passwordRegc").html("El origen solo debe contener letras");
     } else if (!filter1.test(valor)){
         *carry on()*;
     }*/

	 if(valor.length < 8){
		 $(".passwordRegc").html("La contraseña debe contener mas de 7 caracteres");
            $('form input[id="boUsuarioReg"]').prop("disabled", true);		
	 }
        else if(!/\d/.test(valor)){
			$(".passwordRegc").html("La contraseña debe contener al menos un digito");
            $('form input[id="boUsuarioReg"]').prop("disabled", true);	
		}
        else if(!/[a-z]/.test(valor)){
			$(".passwordRegc").html("La contraseña debe contener al menos una letra miniscula");
           $('form input[id="boUsuarioReg"]').prop("disabled", true);	
		}
       else if(!/[A-Z]/.test(valor)){
			$(".passwordRegc").html("La contraseña debe contener al menos una letra mayuscula");
            $('form input[id="boUsuarioReg"]').prop("disabled", true);	
		}
        else if(/[^0-9a-zA-Z]/.test(valor)){
			$(".passwordRegc").html("La contraseña debe tener 8 caracteres, digito, letra miniscula, letra mayuscyla, ");
            $('form input[id="boUsuarioReg"]').prop("disabled", true);	
		}else{
		    $(".passwordRegc").html("");
		    $('form input[id="boUsuarioReg"]').prop("disabled", false);	
		}
});


$(".passNew").blur(function(event){
	
	
	 var id = event.target.id;
	 //alert($("#"+id).val())
	 var valor = $("#"+id).val();
	 var idMessage = "";
	  switch(id){
		case "password2" :
		    idMessage = "newPassword";		
		  break;	
		case "password3" :	 
		    idMessage = "confNewPassword";
		  break;
		case "password4" :
		     idMessage = "newRecoverPassword";
		   break;		
		case "password5" : 
		     idMessage = "confRecoverNewPassword";
		  break;
		 
	 }

	 if(valor.length < 8){
		 $("#" +idMessage).html("La contraseña debe contener mas de 7 caracteres");
            //$('form input[id="boUpdatePass"]').prop("disabled", true);
            $("input.boUsuarioX").attr("disabled", true);			
	 }
        else if(!/\d/.test(valor)){
			$("#" +idMessage).html("La contraseña debe contener al menos un digito");
            //$('form input[id="boUpdatePass"]').prop("disabled", true);
            $("input.boUsuarioX").attr("disabled", true);			
			
		}
        else if(!/[a-z]/.test(valor)){
			$("#" +idMessage).html("La contraseña debe contener al menos una letra miniscula");
           //$('form input[id="boUpdatePass"]').prop("disabled", true);	
		   $("input.boUsuarioX").attr("disabled", true);
		}
       else if(!/[A-Z]/.test(valor)){
			$("#" +idMessage).html("La contraseña debe contener al menos una letra mayuscula");
            //$('form input[id="boUpdatePass"]').prop("disabled", true);	
			$("input.boUsuarioX").attr("disabled", true);
		}
        else if(/[^0-9a-zA-Z]/.test(valor)){
			$("#" +idMessage).html("La contraseña debe tener 8 caracteres, digito, letra miniscula, letra mayuscyla, ");
            //$('form input[id="boUpdatePass"]').prop("disabled", true);
            $("input.boUsuarioX").attr("disabled", true);			
		}else{
		    $("#"+idMessage).html("");
			$("#boRecoverPass").html("");
		    //$('form input[id="boUpdatePass"]').prop("disabled", false);	
			$("input.boUsuarioX").attr("disabled", false);
		}
		
});

$("#boUpdatePass" ).click(function(event){

	var valor1= $("#password2").val();
	var valor2= $("#password3").val();
	
	if (valor1 != valor2) {
			  $("#boRecoverPass").html("El valor de la nueva contraseña y el confirmar nueva contraseña no coinciden");
			   return false
    }
	$("#boRecoverPass").html("");
	return true;

});
$("#boUpdateRecoverPass" ).click(function(event){
	var valor3= $("#password4").val();
	var valor4= $("#password5").val();
	
	if (valor3 != valor4) {
			  $("#boRecoverPass").html("El valor de la nueva contraseña y el confirmar nueva contraseña no coinciden");
			   return false
    }
	$("#boRecoverPass").html("");
	return true;

});

});