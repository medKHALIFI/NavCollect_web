$(document).ready(function() {

    $('#form_add_user').validate({
        rules: {
            nom_add: "required",
            prenom_add: "required",
            email_add: {
                required: true,
                email: true
            },
            tele_add: "required",
            imei_add: "required"
        },
        messages: {
            nom_add: "Ce champ est obligatoire",
            prenom_add: "Ce champ est obligatoire",
            email_add: {
                required: "Ce champ est obligatoire",
                email: "Entrez une adresse d'email valide (abc@def.gh)"
            },
            tele_add: "Ce champ est obligatoire",
            imei_add: "Entrez le code IMEI de l'agent que vous vouliez ajouter"
        },
        highlight: function(input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function(input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function(error, element) {
            $(element).parents('.form-group').append(error);
        },
        submitHandler: function(form) {

            $.ajax({
                type: 'POST',
                url: '../../php/add_user.php',
                data: { 'nom_add': $("#nom_add").val(), 'prenom_add': $("#prenom_add").val(), 'email_add': $("#email_add").val(), 'tele_add': $("#tele_add").val(), 'imei_add': $("#imei_add").val() },
                beforeSend: function() {
                    $("#submitButton_add").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Envoi...');

                },
                success: function(response) {

                    if (response == 2) {
                        swal("C'est fait !", "Un nouveau agent a bien été ajouté", "success");
                        $("#form_add_user").trigger("reset");
                        $("#submitButton_add").html('Ajouter un autre');
                        $("#agent").html('Ajouter un autre agent');
                        setTimeout(function() {

                            // similar behavior as an HTTP redirect
                            //pour actualiser la table avec les nouvelle enregistrement apres 2 second
                            url = "index.php";
                            location.replace(url);
                        }, 2000);


                    } else if (response == 1) {
                        swal("Cet agent existe déjà", "Ajouter un autre agent", "error");
                        $("#submitButton_add").html('Ajouter un autre');
                    } else {
                        swal("ERREUUUUUUR", "Ajouter un autre agent", "error");
                        $("#submitButton_add").html('Enregistrer');
                    }
                }

            });
            return false;
        },
    });
});