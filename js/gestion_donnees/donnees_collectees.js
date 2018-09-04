var id_zone;
$(document).ready(function() {

    $(".preview_zone").click(function() {
        $("#previewMap").modal();
        $("#bodyPreview").html('<div id="map1" class="map1"></div>');
        id_zone = $(this).attr("id");
    });


    // afficher les donner json

    $(".preview_form").click(function() {
        $("#previewForm").modal();
        $("#bodyPreviewform").html('<table class="testTable table table-hover"></table>');
        id_zone = $(this).attr("id");
        console.log("id zone" + id_zone);
    });

    $("#previewMap").on('shown.bs.modal', function() {
        recuperer_zone(id_zone);
    });

    $("#previewForm").on('shown.bs.modal', function() {
        recuperer_form(id_zone);
    });

});

function recuperer_zone(id_zone) {

    var osm1 = new ol.layer.Tile({
        title: "Open Streets Map",
        baseLayer: true,
        source: new ol.source.OSM(),
        visible: true
    });

    var map1 = new ol.Map({
        layers: [osm1],
        target: 'map1',
        controls: ol.control.defaults({
            attribution: false,
            zoom: false
        }).extend([
            new ol.control.ScaleLine()
        ]),
        view: new ol.View({
            center: [0, 0],
            zoom: 2
        })
    });
    map1.updateSize();

    var url = "../../php/recupere_zone_data.php";
    $.getJSON(url, function(result) {

        $.each(result, function(i, field) {

            var zone_form = field.zone_form;
            var id_data = field.id_data;
            if (id_data == id_zone) {

                var geojson_zone = new ol.layer.Vector({

                    title: 'zone',
                    timeInfo: null,
                    isSelectable: true,
                    source: new ol.source.Vector({
                        features: new ol.format.GeoJSON().readFeatures(zone_form)
                    })
                });
                map1.addLayer(geojson_zone);
                var extent = geojson_zone.getSource().getExtent();
                map1.getView().fit(extent, map1.getSize());

            }
        });
    });
}

function recuperer_form(id_zone) {

    console.log("recuperer_form");




    var url = "../../php/recupere_zone_data.php";
    $.getJSON(url, function(result) {

        $.each(result, function(i, field) {

            var data_form = field.data_form;
            var id_data = field.id_data;
            if (id_data == id_zone) {

                console.log("data form : " + data_form);
                //  var json = JSON.stringify(data_form);
                // console.log("data json " + json);

                var data = JSON.parse(data_form);

                trans(data);

                /* var data = [{ "name": "textarea-1535974156304", "value": "" }, { "name": "select-1535974154455", "value": "option-1" }, { "name": "number-1535974190489", "value": "" }];
                 var json = JSON.stringify(data);
                 trans(data);*/


            }
        });
    });
}

function trans(resp) {
    console.log("trans resp : " + resp);
    //var data = JSON.parse(resp);
    //console.log("trans data : " + data);


    $('.testTable').htmlson({ //the magic
        data: resp,
        debug: true
    });
}