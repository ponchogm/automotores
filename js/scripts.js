$(document).on('ready', function() {

	$("#contactoFinanciamiento").on('click', '#borrarConsulta', function(){
		$("#contactoFinanciamiento #nombres").val('');
        $("#contactoFinanciamiento #apellidos").val('');
        $("#contactoFinanciamiento #email").val('');
       	$("#contactoFinanciamiento #fono").val('');
        $("#contactoFinanciamiento #direccion").val('');
        $("#contactoFinanciamiento #dia").val('');
        $("#contactoFinanciamiento #hora").val('');
        $("#contactoFinanciamiento #comentario").val('');
	});
	

	$("#contactoFinanciamiento").on('click', '#enviarConsulta', function(){
        var nombres = $("#contactoFinanciamiento #nombres").val();
        var apellidos = $("#contactoFinanciamiento #apellidos").val();
        var email = $("#contactoFinanciamiento #email").val();
        var fono = $("#contactoFinanciamiento #fono").val();
        var direccion = $("#contactoFinanciamiento #direccion").val();
        var dia = $("#contactoFinanciamiento #dia").val();
        var hora = $("#contactoFinanciamiento #hora").val();
        var comentario = $("#contactoFinanciamiento #comentario").val();

        var error = false;

        if(nombres.length == 0){
            var error = true;
            $("#errorNombre").fadeIn(500);
        } else {
            $("#errorNombre").fadeOut(500);
        }

        if(apellidos.length == 0){
            var error = true;
            $("#errorApellido").fadeIn(500);
        } else {
            $("#errorApellido").fadeOut(500);
        }

        if(email.length == 0 || email.indexOf("@") == "-1" || email.indexOf(".") == "-1"){
           var error = true;
           $("#errorEmail").fadeIn(500);
        } else {
           $("#errorEmail").fadeOut(500);
        }
        
        if(comentario.length == 0){
            var error = true;
            $("#errorComentario").fadeIn(500);
        } else {
            $("#errorComentario").fadeOut(500);
        }
         
        if(error == false){
           $("#contactoFinanciamiento #enviarConsulta").attr({"disabled" : "true", "value" : "Enviando..." });
            
           $.ajax({
                type: "POST",
                url: "php/enviar.php", 
                format: 'json',
                data: ({
                    'nombres': nombres,
                    'apellidos': apellidos,
                    'email': email,
                    'fono': fono,
                    'direccion': direccion,
                    'dia': dia,
                    'hora': hora,
                    'comentario': direccion
                }),
                success: function(resp){    
                    if(resp == "ok"){
                        $("#contactoFinanciamiento").fadeOut(500, function(){
                        	$("#emailEnviado").fadeIn(500);
                        });

                    } else {
                        $("#emailFail").fadeIn(500);
                    }     
                }  
            });  
        } return false;                      
    });    	

});