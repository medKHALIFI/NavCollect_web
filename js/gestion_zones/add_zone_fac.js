$(document).ready(function() {

    $('#form_add_zonefac').validate({
        rules: {
            nom_add: "required",
            source_add:"required",
            file_add: {
                required: true, 
                extension: "json|geojson|txt" 
            }
        },
        messages: { 
            file_add: "Champ obligatoire avec extension : .json, .geojson, ou .txt",
            nom_add:"Champ obligatoire",
            source_add:"Champ obligatoire"
           
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
            var geojson ;
            var file = document.getElementById('file_add');
            if (file.files.length) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    geojson = e.target.result;
                    
                      $.ajax({
                type :'POST',
                url  : '../../php/add_zone_fac.php',
                data : { 'geojson':geojson , 'nom_add':$("#nom_add").val(),'source_add':$("#source_add").val() },
               
                beforeSend: function(){
                    $("#submitButton_add").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Envoi...');
                    //alert("before send"+geojson + "nom"+$("#nom_add").val() );
                },
                success : function(response){
                    //alert("response php"+response);
                    if(response== 1){
                        swal("C'est fait! ", "Une nouvelle zone est ajouté avec succés", "success");
                        $("#form_add_zonefac").trigger("reset");
                        $("#submitButton_add").html('Sauvegarder');
                    } 
                    else if(response==0){
                        swal("Zone déjà existe", "Réessayer d'attribuer à votre zone un autre nom", "error");

                    }
                    else if(response==2){
                        swal("ERREUUUUUUR", "Something's not rightttt", "error");
                    }
                }

            });

                };
                reader.readAsBinaryString(file.files[0]);
            }
           
            return false;
        }
        
    });
});