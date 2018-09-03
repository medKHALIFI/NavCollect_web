// create a vector layer used for editing
var vector_layer = new ol.layer.Vector({
    name: 'my_vectorlayer',
    source: new ol.source.Vector(),
    style: new ol.style.Style({
        fill: new ol.style.Fill({
            color: 'rgba(255, 255, 255, 0.2)'
        }),
        stroke: new ol.style.Stroke({
            color: '#ffcc33',
            width: 2
        }),
        image: new ol.style.Circle({
            radius: 7,
            fill: new ol.style.Fill({
                color: '#ffcc33'
            })
        })
    })
});

// Create a map
var map = new ol.Map({
    target: 'map',
    layers: [
        new ol.layer.Tile({
            source: new ol.source.OSM()
        }),
        vector_layer
    ],
    view: new ol.View({
        //projection: 'EPSG:4326',
        zoom: 2,
        center: [0, 0]
    })
});

// make interactions global so they can later be removed
var select_interaction,
    draw_interaction,
    modify_interaction;
var dataGeojson;

// get the interaction type
var $interaction_type = $('[name="interaction_type"]');
// rebuild interaction when changed
$interaction_type.on('click', function(e) {
    // add new interaction
    if (this.value === 'draw') {
        addDrawInteraction();
    } else {
        addModifyInteraction();
    }
});

// get geometry type
var $geom_type = $('#geom_type');
// rebuild interaction when the geometry type is changed
$geom_type.on('change', function(e) {
    map.removeInteraction(draw_interaction);
    addDrawInteraction();
});

// get data type to save in
// $data_type = $('#data_type');
// clear map and rebuild interaction when changed
//  $data_type.onchange = function() {
// clearMap();
// map.removeInteraction(draw_interaction);
// addDrawInteraction();
//  };

// build up modify interaction
// needs a select and a modify interaction working together
function addModifyInteraction() {
    // remove draw interaction
    map.removeInteraction(draw_interaction);
    // create select interaction
    select_interaction = new ol.interaction.Select({
        // make sure only the desired layer can be selected
        layers: function(vector_layer) {
            return vector_layer.get('name') === 'my_vectorlayer';
        }
    });
    map.addInteraction(select_interaction);

    // grab the features from the select interaction to use in the modify interaction
    var selected_features = select_interaction.getFeatures();
    // when a feature is selected...
    selected_features.on('add', function(event) {
        // grab the feature
        var feature = event.element;
        // ...listen for changes and save them
        // feature.on('change', saveData);
        // listen to pressing of delete key, then delete selected features
        $(document).on('keyup', function(event) {
            if (event.keyCode == 46) {
                // remove all selected features from select_interaction and my_vectorlayer
                selected_features.forEach(function(selected_feature) {
                    var selected_feature_id = selected_feature.getId();
                    // remove from select_interaction
                    selected_features.remove(selected_feature);
                    // features aus vectorlayer entfernen
                    var vectorlayer_features = vector_layer.getSource().getFeatures();
                    vectorlayer_features.forEach(function(source_feature) {
                        var source_feature_id = source_feature.getId();
                        if (source_feature_id === selected_feature_id) {
                            // remove from my_vectorlayer
                            vector_layer.getSource().removeFeature(source_feature);
                            // save the changed data

                        }
                    });
                });
                // remove listener
                $(document).off('keyup');
            }
        });
    });
    // create the modify interaction
    modify_interaction = new ol.interaction.Modify({
        features: selected_features,
        // delete vertices by pressing the SHIFT key
        deleteCondition: function(event) {
            return ol.events.condition.shiftKeyOnly(event) &&
                ol.events.condition.singleClick(event);
        }
    });
    // add it to the map
    map.addInteraction(modify_interaction);
}

// creates a draw interaction
function addDrawInteraction() {
    // remove other interactions
    map.removeInteraction(select_interaction);
    map.removeInteraction(modify_interaction);

    // create the interaction
    draw_interaction = new ol.interaction.Draw({
        source: vector_layer.getSource(),
        type: /** @type {ol.geom.GeometryType} */ ($geom_type.val())
    });
    // add it to the map
    map.addInteraction(draw_interaction);

    // when a new feature has been drawn...
    draw_interaction.on('drawend', function(event) {
        // create a unique id
        // it is later needed to delete features
        var id = uid();
        // give the feature this id
        event.feature.setId(id);
        // save the changed data

    });
}

// add the draw interaction when the page is first shown
addDrawInteraction();

// shows data in textarea
// replace this function by what you need
function saveData() {
    // get the format the user has chosen
    var data_type = "GeoJSON",
        // define a format the data shall be converted to
        format = new ol.format[data_type](),
        // this will be the data in the chosen format
        data;
    try {
        // convert the data of the vector_layer into the chosen format
        data = format.writeFeatures(vector_layer.getSource().getFeatures());
    } catch (e) {
        // at time of creation there is an error in the GPX format (18.7.2014)
        $('#data').val(e.name + ": " + e.message);
        return;
    }

    // format is JSON
    // $('#data').val(JSON.stringify(data, null, 4));
    alert("voici le geojson de votre collection" + JSON.stringify(data, null, 4));
    dataGeojson = JSON.stringify(data, null, 4);

    $.ajax({
        type: 'POST',
        //url: 'http://zaponi.22web.org/test.php',
        url: 'http://localhost/test_admin/AdminBSBMaterialDesign-master/php/save_zone_geojson.php',
        //  data: "userID=" + userID,
        data: "geojson=" + dataGeojson,
        beforeSend: function() {
            $("#errori").fadeOut();
            $("#buttom_submit").html('sending...');
        },
        success: function(data) {

            alert("bien joué");
            alert(data);

        }
    });
}




// clear map when user clicks on 'Delete all features'
$("#delete").click(function() {
    clearMap();
});

// clears the map and the output of the data
function clearMap() {
    vector_layer.getSource().clear();
    if (select_interaction) {
        select_interaction.getFeatures().clear();
    }
    //$('#data').val('');
}

// creates unique id's
function uid() {
    var id = 0;
    return function() {
        if (arguments[0] === 0) {
            id = 0;
        }
        return id++;
    }
}

var Style_Limite = new ol.style.Style({
    stroke: new ol.style.Stroke({
        color: 'red',
        width: 4
    }),
});
/* 
var layers = [
    new ol.layer.Vector({
        opacity: 1.0,
        style: Style_Limite,
        filters: [],
        title: "  Limite   ",
        timeInfo: null,
        isSelectable: true,

        source: new ol.source.Vector({
            features: new ol.format.GeoJSON().readFeatures(dataGeojson)
        })
    })
]*/