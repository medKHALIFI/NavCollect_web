$(document).ready(function() {

    /******************   Etape 1 : Description de projet ***************************/
    // Déclaration des boutons "Finir" et "Annuler":
    var btnFinish = $('<button></button>').text('Finir')
        .addClass('btn bg-green waves-effect btn-finish')
        .on('click', function() {
            if (!$(this).hasClass('disabled')) {
                swal({
                    type: 'success',
                    title: 'Votre projet a bien été crée',
                    showConfirmButton: false,
                    timer: 2000
                });
                $('#smartwizard').smartWizard("reset");
                $('#form_projet').trigger("reset");
                $('#selectAgent').prop('selectedIndex', 0);
                $('#selectZone').prop('selectedIndex', 0);
                $('#selectForm').prop('selectedIndex', 0);
                $('#map').hide();
                $('#show_form').hide();
            }
        });

    var btnCancel = $('<button></button>').text('Annuler')
        .addClass('btn bg-red waves-effect')
        .on('click', function() {
            $('#smartwizard').smartWizard("reset");
            $('#form_projet').trigger("reset");
            $('#selectAgent').prop('selectedIndex', 0);
            $('#selectZone').prop('selectedIndex', 0);
            $('#selectForm').prop('selectedIndex', 0);
            $('#map').hide();
        });

    //Activation et désactivation des boutons du SmartWizard 4:
    $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
        //Pour la première étape, on désactive les boutons "Suivant" et "Finir":
        $("#prev-btn").addClass('disabled');
        if (stepPosition === 'first') {
            
            $(".btn-finish").addClass('disabled');
        }
        //Pour la dernière étape, on désactive les boutons "Précédent" et "Suivant" et on active le bouton "Finir"
        else if (stepPosition === 'final') {
            $("#next-btn").addClass('disabled');
            $(".btn-finish").removeClass('disabled');
        }
    });

    // Déclaration de formulaire de création de projet sous forme de Wizard : 
    //(Utilisation de plugin SmartWizard 4)
    $('#smartwizard').smartWizard({
        selected: 0,
        theme: 'arrows',
        transitionEffect: 'fade',
        enableFinishButton: false,
        showStepURLhash: true,
        toolbarSettings: {
            toolbarPosition: 'bottom',
            toolbarButtonPosition: 'end',
            showNextButton: true,
            showPreviousButton: false,
            toolbarExtraButtons: [btnCancel, btnFinish]
        }
    });

    // Etape 1 -> Etape 2 : 
    var res = false;
    $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
        var elmForm = $("#form_projet");
        //Vérification des champs en utilisant l'extention "Bootstrap js Validator":
        if (stepNumber == 0 && elmForm) {
            elmForm.validator('validate');
            var elmErr = elmForm.children('.form-line').addClass('error');
            if (elmErr && elmErr.length > 0) {
                return false;
            }
            var nom_projet = $("#nom_projet").val();
            var description_projet = $("#description_projet").val();
            $.ajax({
                url: '../../php/save_projet.php',
                type: 'POST',
                async: false,
                data: { 'nomProjet': nom_projet, 'descProjet': description_projet },
                success: function(response) {
                    if (response == 1) {
                        res = true;

                    } else if (response == 0) {
                        swal({
                            type: 'error',
                            title: 'Le nom que vous aves affecté à ce projet existe déja',
                            showConfirmButton: true

                        });
                        res = false;
                    }
                }
            });
        }
        return res;
    });

    /******************  Etape 2 : Affectation  ***************************/

    // Cacher les div de la prévisualisation des formulaires et des zones:
    $("#map").hide();
    $("#show_form").hide();

    //Désactivation de bouton "Affecter" :
    $("#affecter").prop('disabled', true);

    //Prévisualisation de la zone sélectionnée :
    $("#selectZone").change(function() {
        $("#show_form").hide();
        $("#map").show();

        map.getLayers().forEach(function(layer) {
            map.removeLayer(layer);
        });
        var osm = new ol.layer.Tile({ name: 'OSM', source: new ol.source.OSM() });

        map.addLayer(osm);

        var id = $(this).children(":selected").attr("id");
        var url = "../../php/recupere_zone.php";
        $.getJSON(url, function(result) {
            $.each(result, function(i, field) {
                var etendue = field.etendue;
                var id_zone1 = field.id_zone;
                var nom_zone = field.nom_zone;
                if (id_zone1 == id) {
                    geojson_zone = new ol.layer.Vector({
                        name: 'geojson_zone',
                        opacity: 1.0,
                        filters: [],
                        title: nom_zone,
                        timeInfo: null,
                        isSelectable: true,
                        source: new ol.source.Vector({
                            features: new ol.format.GeoJSON().readFeatures(etendue)
                        })
                    });
                    map.addLayer(geojson_zone);
                    var extent = geojson_zone.getSource().getExtent();
                    map.getView().fit(extent, map.getSize());
                }
            });
        });
    });

    //Prévisualisation du formulaire sélectionné :
    $("#selectForm").change(function() {
        $("#map").hide();
        $("#show_form").show();
        var id = $(this).children(":selected").attr("id");
        url = "../../php/recuperer_form.php";
        $.getJSON(url, function(result) {
            $.each(result, function(i, field) {
                if (field.id_formulaire == id) {
                    $("#show_form").html(field.champs);
                }
            });
        });
    });

    //Activation du bouton "Affecter"
    function updateButtonProp() {
        if (verifySelectedOptions()) {
            $('#affecter').prop('disabled', false);
        } else {
            $('#affecter').prop('disabled', true);
        }
    }

    function verifySelectedOptions() {
        if ($('#selectAgent').val() != '' || $('#selectZone').val() != '' || $('#selectForm').val() != '' || $('#selectGeometry').val() != '') {
            return true;
        } else {
            return false
        }
    }
    $('#selectAgent').change(updateButtonProp);
    $('#selectZone').change(updateButtonProp);
    $('#selectForm').change(updateButtonProp);
    $('#selectGeometry').change(updateButtonProp);

    //Affectation
    $("#affecter").on("click", function() {
        var selected_agent = $('#selectAgent').val();
        var selected_zone = $('#selectZone').val();
        var selected_form = $('#selectForm').val();
        var selected_geometry = $('#selectGeometry').val();

        $.ajax({
            url: '../../php/affectation.php',
            type: 'POST',
            async: false,
            data: { 'selected_agent': selected_agent, 'selected_zone': selected_zone, 'selected_form': selected_form, 'selected_geometry': selected_geometry },
            success: function(response) {
                if (response == 1) {
                    $("#affecter").prop('disabled', true);

                } else {
                    res = false;
                    $("#affecter").prop('disabled', true);
                }
            }
        });
    });
});