$(document).ready(function() {


    $('.delete_projet').click(function() {
        var el = this;
        var id_projet = $(this).attr("id");
        console.log("id du projet supprimer" + id_projet);

        swal({
            title: "Etes-vous sûr que vous voulez supprimer ce projet?",
            text: "Vous ne pourrez pas la récupérer !",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Oui, supprimer",
            cancelButtonText: "Non, annuler",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm) {
            if (isConfirm) {

                $.ajax({
                    url: '../../php/delete_projet.php',
                    type: 'POST',
                    data: { id_projet: id_projet },
                    success: function(response) {

                        swal("Supprimé!", "Ce projet a été suppriméé avec succés", "success");
                        $(el).closest('tr').css('background', 'tomato');
                        $(el).closest('tr').fadeOut(800, function() {
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