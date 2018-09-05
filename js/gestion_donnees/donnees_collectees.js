var id_affect;
$(document).ready(function() {

    $(".preview_zone").click(function() {
        $("#previewMap").modal();
        $("#bodyPreview").html('<div id="map1" class="map1"></div>');
        id_affect = $(this).attr("id");
    });

    $(".preview_form").click(function() {
        $("#previewForm").modal();
        id_affect = $(this).attr("id");
    });

    $("#previewMap").on('shown.bs.modal', function() {
        get_zone(id_affect);
    });

    $("#previewForm").on('shown.bs.modal', function() {
        get_data(id_affect);

    });

});

function get_zone(id_affect) {

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
            if (id_data == id_affect) {

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

function get_data(id_affect) {

    var url = "../../php/recupere_zone_data.php";
    $.getJSON(url, function(result) {

        $.each(result, function(i, field) {

            var data_form = field.data_form;
            var id_data = field.id_data;
            if (id_data == id_affect) {

                var data = JSON.parse(data_form);

                // CODE DE JSON 2 HTML TABLE:
                document.getElementById('table_donnee').innerHTML = json2table(data, 'table table-bordered table-striped jambo_table table-hover dataTable data');
                ExportTable();

            }
        });
    });
}
// JSON DATA 2 HTML TABLE
function json2table(json, classes) {
    var cols = Object.keys(json[0]);
    
    var headerRow = '';
    var bodyRows = '';
    
    classes = classes || '';
  
    function capitalizeFirstLetter(string) {
      return string.charAt(0).toUpperCase() + string.slice(1);
    }
  
    cols.map(function(col) {
      headerRow += '<th>' + capitalizeFirstLetter(col) + '</th>';
    });
  
    json.map(function(row) {
      bodyRows += '<tr>';
  
      cols.map(function(colName) {
        bodyRows += '<td>' + row[colName] + '</td>';
      })
  
      bodyRows += '</tr>';
    });
  
    return '<table class="' +
           classes +
           '"><thead><tr>' +
           headerRow +
           '</tr></thead><tbody>' +
           bodyRows +
           '</tbody></table>';
}

// EXPORT
function ExportTable(){
    $(".data").tableExport({
        headings: true,                    
        footers: true,                     
        formats: ["xls", "csv", "txt"],    
        fileName: "id",                    
        bootstrap: true,                   
        position: "well" ,                
        ignoreRows: null,                  
        ignoreCols: null,                 
        ignoreCSS: ".tableexport-ignore"   
    });
}
// Refresh
function ref(){
    location.replace("donnees_collectees.php");
}
