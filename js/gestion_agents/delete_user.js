$(document).ready(function(){
    $('.delete_agent').click(function(){
        var el = this;
        var id_agent = $(this).attr("id");
        swal({
        title: "Êtes-vous sûr que vous vouliez supprimer cet agent?",
        text: "Vous ne pourrez pas récupérer ce compte!",
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
                url: '../../php/delete_user.php',
                type: 'POST',
                data: { id_agent:id_agent },
                success: function(response){
                    
                    swal({
                      type: 'success',
                      title: 'Cet agent a bien été supprimé',
                      showConfirmButton: false,
                      timer: 1500
                    });
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

