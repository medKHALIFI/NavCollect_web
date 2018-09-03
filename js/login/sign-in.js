$(document).ready(function() {

    $('#sign_in').validate({
        rules: {
            'username': {
                required: true
            },
            'password': {
                required:true
            }
        },
        messages: {
			'username': "Vous devez entrez votre pseudo",
			'password': "Vous devez entrez votre mot de passe",	
		},
        highlight: function (input) {
            console.log(input);
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.input-group').append(error);
        },
        
        submitHandler: function(form) {
        
        var data=$("#sign_in").serialize();
        $.ajax({
            type :'POST',
            url  : '../../php/login.php',
            data : data,
            beforeSend: function(){ 
                $("#error").fadeOut();
                $("#sumbitButton").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Envoi...');
                
            },
            success : function(response){ 

                if(response=="ok"){

                    location.replace("../index.php");

                   
                } else {                                    
                    $("#error").fadeIn(1000, function(){                        
                        $("#error").html('<div class="alert alert-danger"> &nbsp; &nbsp; <span class="glyphicon glyphicon-info-sign"></span> &nbsp; &nbsp; '+response+' !</div>');
                        $("#sumbitButton").html('Se connecter');
                        
                    });
                }
            }

        });
   return false;
    }
    });
    
});