var id_zone;
var id_projet;
    
$(document).ready(function(){
    $(".affectation").click(function(){
        $("#affectationModal").modal();
        $("#bodyPreview").html('<table class="table table-bordered jambo_table table-striped table-hover dataTable js-exportable" id="table_affectation" ><thead><tr><th style="width: 30%;">Agent</th><th style="width: 20%;">Formulaire</th><th style="width: 10%;">Géométrie</th><th style="width: 30%;">Zone détude</th><th style="width: 10%;">Action</th></tr> </thead><tbody></tbody></table>');
        id_projet = $(this).attr("id");
    });
    $("#affectationModal").on('shown.bs.modal', function () {
        recuperer_projet(id_projet);
    });
});
function delete_affect(id_affect){
    var el = this;
    swal({
        title: "Etes-vous sûr que vous voulez supprimer cette affectation?",
        text: "Vous ne pourrez pas le récupérer !",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Oui, supprimer",
        cancelButtonText: "Non, annuler",
        closeOnConfirm: false,
        closeOnCancel: false
    }, 
    function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: '../../php/delete_affectation.php',
                type: 'POST',
                data: { id_affect: id_affect },
                success: function(response) {
                    swal("C'est fait!", "Cette affectation a été supprimée", "success");
                    $(this).closest('tr').css('background', 'tomato');
                    $(this).closest('tr').fadeOut(800, function() {
                        $(this).remove();
                    });
                }
            });
        } 
        else {
            swal("Annulé!", "Vous n'avez pas continué cette opération", "error");
        }
    })
}
function recuperer_projet(id_projet){
    var url = "../../php/recupere_affectation_projet.php";
    $.getJSON(url, function(result) {           
        $.each(result, function(i, field) {

            var id_projet_affect = field.id_projet_affect;
            var nom_agent=field.nom_agent;
            var nom_form=field.nom_form;
            var id_geom_affect=field.id_geom_affect;
            var nom_zone=field.nom_zone;
            var id_affect=field.id_affect;
            var prenom_agent=field.prenom_agent;

            if (id_projet_affect == id_projet ) {
                if(id_geom_affect == 1){
                $("#table_affectation").append("<tr><td>"+prenom_agent+" "+nom_agent+"</td><td>"+nom_form+"</td><td>Point</td><td>"+nom_zone+"</td><td><center><button class='btn bg-red delete_projet' onclick=delete_affect("+id_affect+")><i class='fas fa-trash'></i></center></button></td></tr>");
                }else if(id_geom_affect == 2){
                $("#table_affectation").append("<tr><td>"+prenom_agent+" "+nom_agent+"</td><td>"+nom_form+"</td><td>Ligne</td><td>"+nom_zone+"</td><td><center><button class='btn bg-red delete_projet' onclick=delete_affect("+id_affect+")><i class='fas fa-trash'></i></center></button></td></tr>");
                }else{
                $("#table_affectation").append("<tr><td>"+prenom_agent+" "+nom_agent+"</td><td>"+nom_form+"</td><td>Polygone</td><td>"+nom_zone+"</td><td><center><button class='btn bg-red delete_projet' onclick=delete_affect("+id_affect+")><i class='fas fa-trash'></i></center></button></td></tr>");
                }
            }
        });
    });
}