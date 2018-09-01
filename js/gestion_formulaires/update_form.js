// variable that contains the id of the form
var id_form ;

//display form fields in a text area so the user can modify
function recuper_form_text(id_button){

    id_form=id_button ;
                
    var url = "../../php/recuperer_form.php";
    $.getJSON(url, function(result) {

        $.each(result, function(i, field) {
            var id = field.id_formulaire;
            var html = field.champs;
         
            if (id_button == id) {
                
               $("#form_update").html(' <textarea id="textarea" style="width: 98%;" rows="15"></textarea>');
               $("#textarea").text(html);
            }
            
        });
    });

}    

// submitting the update to the database
function update_form(){


    $.ajax({
        url:'../../php/update_form.php',
        type:'POST',
        data:{'id_formulaire':id_form,'champs':$("#textarea").val()},
        dataType:"json",
        beforeSend: function(){ 
            $("#submitButton_update").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Mise à jour...');
        },
        success: function(response){
           
            if(response== 1){
                swal("C'est fait!", "Ce formulaire cet a été mis à jour", "success");
                $("#submitButton_update").html('Enregistrer');
                $('#modalEdit').modal('hide');
               
            } 
            else{
                swal("ERREUUUUUUR", "", "error");
                $("#submitButton_update").html('Enregistrer');
            }

        }

    });


}   