$(document).ready(function(){

   
    $('.delete_zone').click(function(){
        var el = this;
        var id_zone = $(this).attr("id");

        swal({
        title: "Etes-vous sûr que vous voulez supprimer cette zone?",
        text: "Vous ne pourrez pas la récupérer !",
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
                url: '../../php/delete_zone.php',
                type: 'POST',
                data: { id_zone:id_zone },
                success: function(response){
                    
                    swal("Supprimé!", "Cette zone a été suppriméé avec succés", "success");
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

