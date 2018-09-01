$(document).ready(function(){
    $('.delete_form').click(function(){
        var el = this;
        var id_form = $(this).attr("id");
        swal({
        title: "Etes-vous sûr que vous voulez supprimer ce formulaire?",
        text: "Vous ne pourrez pas le récupérer !",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Oui, supprimer",
        cancelButtonText: "Non, annuler",
        closeOnConfirm: false,
        closeOnCancel: false
    }, function (isConfirm) {
        if (isConfirm) {
            
            $.ajax({
                url: '../../php/delete_form.php',
                type: 'POST',
                data: { id_form:id_form },
                success: function(response){
                    
                    swal("Supprimé!", "Ce formulaire a été supprimé avec succés","success");
                    $(el).closest('tr').css('background','tomato');
                    $(el).closest('tr').fadeOut(800, function(){      
                        $(this).remove();
                    });
                }
            });
        } else {
            swal("Annulé", "Vous n'avez pas continué cette opération", "error");
        }
    })
});

});

