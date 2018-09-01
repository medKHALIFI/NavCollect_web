function recuper_form(id_button){
    
    var url = "../../php/recuperer_form.php";
    $.getJSON(url, function(result) {

       
        $.each(result, function(i, field) {
            var id = field.id_formulaire;
            var html = field.champs;
         
            if (id_button == id) {
                
                $("#form_user").html(html);
            }
            
        });
    });
}