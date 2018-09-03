$(document).ready(function(){
	//Remplissage des champs :
	var url ="../php/recuperer_admin.php";
	$.getJSON(url,function(result){
		$.each(result,function(i,field){
			
            $("#nom_update").val(field.nom_admin);
            $("#prenom_update").val(field.prenom_admin);
            $("#email_update").val(field.email_admin);
            $("#pseudo_update").val(field.pseudo_admin);
            $("#password_update").val(field.password_admin);
			
		});
	});
	// Validation des champs en utilisant jQuery Validate js:
	$('#form_update_admin').validate({
		rules: {
			nom_update: "required",
			prenom_update: "required",
			email_update: {
				required: true,
				email: true
			},
			password_update:{
				required:true,
			},
			password1_update:{
				required:true,
				equalTo: password_update
			},
			pseudo_update:{
				required: true,
			}
		},
		messages: {
			nom_update: "Ce champ est obligatoire",
			prenom_update: "Ce champ est obligatoire",
			email_update: {
				required: "Ce champ est obligatoire",
				email: "Entrez une adresse d'email valide (abc@def.gh)"
			},
			password_update:"Ce champ est obligatoire",
			password1_update:{
				required:"Ce champ est obligatoire",
				equalTo: "Entrez le même mot de passe"
			},
			pseudo_update: "Ce champ est obligatoire"
			
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
				url:'../php/update_admin.php',
				type:'POST',
				data:{'nom_update':$("#nom_update").val(),'prenom_update':$("#prenom_update").val(),'email_update':$("#email_update").val(),'pseudo_update':$("#pseudo_update").val(), 'password_update':$("#password_update").val() },
				beforeSend: function(){ 
					$("#submitButton_update").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Mise à jour...');
				},
				success: function(response){
					if(response== 1){
						location.replace("../index.php");
					} 
				}
			});
			return false;
		},
	});	
});
