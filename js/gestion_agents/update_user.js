$(document).ready(function(){

	$('.update_agent').click(function(){
		
		var id_agent = $(this).attr("id");
		fillInput(id_agent);

		$('#form_update_user').validate({
		    rules: {
		        nom_update: "required",
		        prenom_update: "required",
		        email_update: {
		            required: true,
		            email: true
		        },
		        tele_update:"required",
		        imei_update:"required"
		    },
		    messages: {
		        nom_update: "Ce champ est obligatoire",
		        prenom_update: "Ce champ est obligatoire",
		        email_update: {
		            required: "Ce champ est obligatoire",
		            email: "Entrez une adresse d'email valide (abc@def.gh)"
		        },
		        tele_update:"Ce champ est obligatoire",
		        imei_update:"Entrez le code IMEI de l'agent que vous vouliez ajouter"
		    },
		    highlight: function (input) {
		        $(input).parents('.form-line').addClass('error');
		    },
		    unhighlight: function (input) {
		        $(input).parents('.form-line').removeClass('error');
		    },
		    errorPlacement: function (error, element) {
		        $(element).parents('.form-group').append(error);
		    },
		    submitHandler: function(form) {
		        $.ajax({
					url:'../../php/update_user.php',
					type:'POST',
					data:{'id_agent':id_agent,'nom_update':$("#nom_update").val(),'prenom_update':$("#prenom_update").val(),'email_update':$("#email_update").val(),'tele_update':$("#tele_update").val(), 'imei_update':$("#imei_update").val() },
					beforeSend: function(){ 
						$("#submitButton_update").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Mise à jour...');
					},
					success: function(response){

						if(response== 1){
			                swal("C'est fait!", "Ce formulaire a été bien mis à jour", "success");
			                $("#submitButton_update").html('Enregistrer');
			                $('#modalEdit').modal('hide');
			               
			               
			            } else if(response==2){                                    
			                swal("Un agent existe déjà", "Changer le code IMEI ", "error");
			                $("#submitButton_update").html('Enregistrer');
			            }
			            else{
			                swal("ERREUUUUUUR", "", "error");
			                $("#submitButton_update").html('Enregistrer');
			            }

					}

				});
		        
		        return false;
		    },
		});
	
	});

	function fillInput(id_agent){

		var url ="../../php/recuperer_user.php";
		$.getJSON(url,function(result){
			$.each(result,function(i,field){
				var id =field.id_agent;
				if (id_agent == id){
					$("#nom_update").val(field.nom_agent);
					$("#prenom_update").val(field.prenom_agent);
					$("#email_update").val(field.email_agent);
					$("#tele_update").val(field.tele_agent);
					$("#imei_update").val(field.imei);
				}
			});
		});
	}
});







