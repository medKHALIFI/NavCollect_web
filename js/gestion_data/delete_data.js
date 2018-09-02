$(document).ready(function() {
    $('.delete_data').click(function() {
        var el = this;
        var id_data = $(this).attr("id");
        console.log("id data " + id_data);
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
        }, function(isConfirm) {
            if (isConfirm) {

                $.ajax({
                    url: '../../php/delete_data.php',
                    type: 'POST',
                    data: { id_data: id_data },
                    success: function(response) {
                        console.log("resultat php" + response);

                        swal({
                            type: 'success',
                            title: 'Ces données sont bien été supprimé',
                            showConfirmButton: false,
                            timer: 1500
                        });
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