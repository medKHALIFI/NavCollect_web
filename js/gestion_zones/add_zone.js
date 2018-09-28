var intersection;
var intersection_test;
var layers1;
var layers2;
var layer1;
var layer2;

//La vue initiale de la carte (Vue globale au Maroc):
var view = new ol.View({
    zoom: 5,
    center: [-788691.20, 3736368.96]
});

worldImagery = new ol.layer.Tile({
    title: "World Imagery (ESRI)",
    type: 'base',
    source: new ol.source.XYZ({ url: 'http://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}' })
});

// Popup overlay with popupClass=anim
var popup = new ol.Overlay.Popup({
    popupClass: "default anim", //"tooltips", "warning" "black" "default", "tips", "shadow",
    closeBox: true,
    onclose: function() { console.log("You close the box"); },
    autoPan: true,
    autoPanAnimation: { duration: 100 }
});
// Initialisation de la carte par défaut
var map = new ol.Map({
    target: 'map',
    view: view,
    layers: [
        new ol.layer.Group({
            'title': 'Cartes de base',
            layers: [
                worldImagery,
                new ol.layer.Tile({
                    title: 'Bing',
                    type: 'base',
                    source: new ol.source.BingMaps({
                        key: 'AuFUqJsfrG-Qgvg9sDChTNlHzN5_ybJA7LOknPz-Y1T6dNONDIIkQrPHvxjOe8To',
                        imagerySet: 'AerialWithLabels'
                    })
                }),
                new ol.layer.Tile({
                    title: 'OSM',
                    type: 'base',
                    source: new ol.source.OSM()
                }),
                new ol.layer.Tile({
                    title: 'API NAVCities',
                    type: "base",
                    visible: true,
                    preload: Infinity,
                    source: new ol.source.XYZ({
                        attributions: [new ol.Attribution({
                            html: 'Tiles © <a href="https://www.navcities.com">Navcities</a>'
                        })],
                        url: "http://www.navcities.com/mapcache/tms/1.0.0/lintermediaire@NavG/{z}/{x}/{-y}.png",
                        crossOrigin: 'Anonymous'

                    })
                })
            ],
            overlays: [popup]
        })
    ],
    controls: ol.control.defaults({
        attribution: false,
        zoom: false
    })
});

//Couche qui va porter la digitalisation des zones :
var vector = new ol.layer.Vector({
    name: 'vector',
    source: new ol.source.Vector(),
    style: new ol.style.Style({
        fill: new ol.style.Fill({
            color: '#f4433657'
        }),
        stroke: new ol.style.Stroke({
            color: '#F44336',
            width: 2
        }),
        image: new ol.style.Circle({
            radius: 7,
            fill: new ol.style.Fill({
                color: '#F44336'
            })
        })
    })
});
map.addLayer(vector);

// Zoom Slider 
zoomslider = new ol.control.ZoomSlider({
    className: 'custom-zoomSlider'
});
map.addControl(zoomslider);

// Layer switcher (Plugin Opacity-LayerSwitcher)
var layerSwitcher = new ol.control.LayerSwitcher({
    enableOpacitySliders: true
});
map.addControl(layerSwitcher);

//  La barre d'échelle
var scaleLineControl = new ol.control.ScaleLine();
scaleLineControl.setUnits('metric');
map.addControl(scaleLineControl);

// Main control bar
var mainbar = new ol.control.Bar();
map.addControl(mainbar);

// Set the control grid reference
/*
var search = new ol.control.SearchPhoton({ //target: $(".options").get(0),
    lang: "fr", // Force preferred language
    position: true // Search, with priority to geo position
});
map.addControl(search);

// Select feature when click on the reference index
search.on('select', function(e) { // console.log(e);
    map.getView().animate({
        center: e.coordinate,
        zoom: Math.max(map.getView().getZoom(), 16)
    });
});
*/

// Menu d'édition et de digitalisation (Plugin Ol-ext3)
var editbar = new ol.control.Bar({
    toggleOne: true,
    group: false
});
mainbar.addControl(editbar);

//Position de la barre d'édition
pos = "left";
mainbar.setPosition(pos);

// Add selection tool:
//  1- a toggle control with a select interaction
//  2- an option bar to delete / get information on the selected feature
var sbar = new ol.control.Bar();
sbar.addControl(new ol.control.Button({
    html: '<i class="fas fa-times"></i>',
    title: "Supprimer la zone sélectionnée !",
    handleClick: function() {
        var features = selectCtrl.getInteraction().getFeatures();

        for (var i = 0, f; f = features.item(i); i++) {
            vector.getSource().removeFeature(f);
        }
        selectCtrl.getInteraction().getFeatures().clear();
    }
}));
sbar.addControl(new ol.control.Button({
    html: '<i class="fas fa-info"></i>',
    title: "Afficher les informations concernant cette zone",
    handleClick: function() {
        switch (selectCtrl.getInteraction().getFeatures().getLength()) {

            case 0:
                info("Select an object first...");
                break;
            case 1:
                var feature = selectCtrl.getInteraction().getFeatures().getGeometry();
                var content = "hanoua";
                popup.show(feature.getCoordinates(), content);
                break;
            default:
                info(f.getInteraction().getFeatures().getLength() + " objects seleted.");
                break;
        }
    }
}));
var selectCtrl = new ol.control.Toggle({
    html: '<i class="fas fa-hand-pointer"></i>',
    title: "Sélectionner une zone",
    interaction: new ol.interaction.Select(),
    bar: sbar,
    autoActivate: true,
    active: true
});
editbar.addControl(selectCtrl);
// Add editing tools
//point
//Style draw: 
var style_draw = new ol.style.Style({
        fill: new ol.style.Fill({
            color: '#1abb9c54'
        }),
        stroke: new ol.style.Stroke({
            color: '#1ABB9C',
            width: 2
        }),
        image: new ol.style.Circle({
            radius: 7,
            fill: new ol.style.Fill({
                color: '#1ABB9C'
            })
        })
    })
    //Square
var pedit = new ol.control.Toggle({
    html: '<i class="fas fa-vector-square"></i>',
    title: 'Ajouter une carré',
    interaction: new ol.interaction.Draw({
        type: 'Circle',
        source: vector.getSource(),
        style: style_draw,
        geometryFunction: ol.interaction.Draw.createRegularPolygon(4)
    })
});
editbar.addControl(pedit);
//polygon
var fedit = new ol.control.Toggle({
    html: '<i class="fas fa-draw-polygon" ></i>',
    title: 'Ajouter un polygone',
    interaction: new ol.interaction.Draw({
        type: 'Polygon',
        source: vector.getSource(),
        style: style_draw,
        // Count inserted points
        geometryFunction: function(coordinates, geometry) {
            this.nbpts = coordinates[0].length;
            if (geometry) geometry.setCoordinates([coordinates[0].concat([coordinates[0][0]])]);
            else geometry = new ol.geom.Polygon(coordinates);
            return geometry;
        }
    }),

    bar: new ol.control.Bar({
        controls: [new ol.control.Button({
                html: '<i class="fas fa-minus"></i>', //'<i class="fa fa-mail-reply"></i>',
                title: "Annuler le dernier point",
                handleClick: function() {
                    if (fedit.getInteraction().nbpts > 1) fedit.getInteraction().removeLastPoint();
                }
            }),
            new ol.control.Button({
                html: '<i class="fas fa-check" ></i>',
                title: "Terminer",
                handleClick: function() {

                    if (fedit.getInteraction().nbpts > 3) fedit.getInteraction().finishDrawing();
                }
            })
        ]
    })
});
editbar.addControl(fedit);
//modify
var modify = new ol.control.Button({
    html: '<i class="fas fa-pencil-alt"></i>',
    title: "Modifier une zone",
    handleClick: function(e) {
        var Modify = {
            init: function() {
                this.select = new ol.interaction.Select();
                map.addInteraction(this.select);

                this.modify = new ol.interaction.Modify({
                    features: this.select.getFeatures()
                });
                map.addInteraction(this.modify);

                this.setEvents();
            },
            setEvents: function() {
                var selectedFeatures = this.select.getFeatures();

                this.select.on('change:active', function() {
                    selectedFeatures.forEach(selectedFeatures.remove, selectedFeatures);
                });
            },
            setActive: function(active) {
                this.select.setActive(active);
                this.modify.setActive(active);
            }
        };
        Modify.init();
    }
});
mainbar.addControl(modify);
//clear the map
var delete_all = new ol.control.Button({
    html: '<i class="fas fa-trash"></i>',
    title: "Effacer toutes les zones",
    handleClick: function(e) {
        vector.getSource().clear();
    }
});
mainbar.addControl(delete_all);

var geojson_zone;
var bool = false;
$("#selectBox").change(function() {
    bool = true;
    var id = $(this).children(":selected").attr("id");
    if (id == '020202') {
        bool = false;
        map.removeLayer(geojson_zone);
        map.getView().setCenter([-788691.20, 3736368.96]);
        map.getView().setZoom(5);
        test_intersect.getSource().clear();
    } else {
        var url = "../../php/recupere_zone_fac.php";
        $.getJSON(url, function(result) {
            $.each(result, function(i, field) {

                var etendue = field.contenu_zone_fac;
                var id_zone1 = field.id_zone_fac;
                var nom_zone_geojson = field.nom_zone;
                if (id_zone1 == id) {
                    geojson_zone = new ol.layer.Vector({
                        name: 'geojson_zone',
                        opacity: 1.0,
                        filters: [],
                        title: nom_zone_geojson,
                        timeInfo: null,
                        isSelectable: true,
                        source: new ol.source.Vector({
                            features: new ol.format.GeoJSON().readFeatures(etendue)
                        })
                    });
                    //overlayGroup.getLayers().push(geojson_zone);
                    map.addLayer(geojson_zone);
                    var extent = geojson_zone.getSource().getExtent();
                    map.getView().fit(extent, map.getSize());
                }
            });
        });
    }
});
//Save zone
$('#nom_zone').click(function() {
    if (bool == false) {
        var geojson = new ol.format.GeoJSON().writeFeatures(vector.getSource().getFeatures());
        swal({
            title: "Nom de la zone que vous vouliez sauvegarder",
            text: "Entrez le nom de la zone",
            type: "input",
            showCancelButton: true,
            closeOnConfirm: false,
            confirmButtonText: "Ajouter",
            cancelButtonText: "Annuler",
            animation: "slide-from-top",
            inputPlaceholder: "nom..."
        }, function(inputValue) {
            if (inputValue === false) return false;
            if (inputValue === "") {
                swal.showInputError("Entrez le nom");
                return false;
            }
            $.ajax({
                url: '../../php/geojson_to_db.php',
                type: 'POST',
                data: { 'geojson': geojson, 'nom_zone': inputValue },
                success: function(response) {
                    if (response == 1) {
                        swal("C'est fait !", "Une nouvelle zone a bien été ajoutée", "success");
                    } else if (response == 0) {
                        swal.showInputError("Le nom que vous avez attribuez à cette zone existe déjà. Veuillez réessayer!");
                    } else if (response == 2) {
                        alert("Erreur serveur");
                    }
                }
            });
        });
    } else {
        intersection_test();
    }


});

_myStroke = new ol.style.Stroke({
    color: 'rgba(255,0,0,1.0)',
    width: 1
});
_myFill = new ol.style.Fill({
    color: 'rgba(255,0,0,1.0)'
});
myStyle = new ol.style.Style({
    stroke: _myStroke,
    fill: _myFill
});
var test_intersect = new ol.layer.Vector({
    name: 'test_intersect',
    opacity: 1.0,
    filters: [],
    style: myStyle,
    title: "Couche d'intersection",
    timeInfo: null,
    isSelectable: true,
    source: new ol.source.Vector({})
});
map.addLayer(test_intersect);
var test_intersect_geojson = new ol.format.GeoJSON();

function intersection_test() {
    layer1 = new ol.format.GeoJSON().writeFeatures(vector.getSource().getFeatures());
    layer2 = new ol.format.GeoJSON().writeFeatures(geojson_zone.getSource().getFeatures());
    $.ajax({
        type: 'POST',
        url: '../../php/intersection.php',
        data: {
            'layer1': layer1,
            'layer2': layer2
        },
        success: function(data) {
            var intersect_features = test_intersect_geojson.readFeatures(data);
            test_intersect.getSource().addFeatures(intersect_features);
        },
        complete: function() {
            var extent = test_intersect.getSource().getExtent();
            map.getView().fit(extent, map.getSize());
            var json = new ol.format.GeoJSON().writeFeatures(test_intersect.getSource().getFeatures());
            var geojson = new ol.format.GeoJSON().writeFeatures(test_intersect.getSource().getFeatures());
            swal({
                title: "Nom de la zone que vous vouliez sauvegarder",
                text: "Entrez le nom de la zone",
                type: "input",
                showCancelButton: true,
                closeOnConfirm: false,
                confirmButtonText: "Ajouter",
                cancelButtonText: "Annuler",
                animation: "slide-from-top",
                inputPlaceholder: "nom..."
            }, function(inputValue) {
                if (inputValue === false) return false;
                if (inputValue === "") {
                    swal.showInputError("Entrez le nom");
                    return false;
                }
                $.ajax({
                    url: '../../php/geojson_to_db.php',
                    type: 'POST',
                    data: { 'geojson': geojson, 'nom_zone': inputValue },

                    success: function(response) {
                        if (response == 1) {
                            swal("C'est fait !", "Une nouvelle zone a bien été ajoutée", "success");
                        } else if (response == 0) {
                            swal.showInputError("Le nom que vous avez attribuez à cette zone existe déjà. Veuillez réessayer!");
                        } else if (response == 2) {
                            alert("Erreur serveur");
                        }
                    }
                });
            });
        }
    });
}
/** menu de recherche**/
$(document).ready(function(){
    $(".form-control1").css('border-radius', '30px');
    $(".form-control1").css('border', '2px solid #1abb9c');
    $('#search').on("click",(function(e){
        $(".form-group1").addClass("sb-search-open");
        e.stopPropagation()
    }));
      
    $(document).on("click", function(e) {
        if ($(e.target).is("#search") === false && $(".form-control1").val().length == 0) {
            $(".form-group1").removeClass("sb-search-open");
        }
    });
        $(".form-control-submit").click(function(e){
        $(".form-control1").each(function(){
            if($(".form-control1").val().length == 0){
            e.preventDefault();
            $(this).css('border', '2px solid red');
            
            }
        })
    })
});

/** Les adresses en utilisant l'api de NavCities **/

  $("#search-input").on('keyup', function (event) {
      var addrVal = $("#search-input").val();
      if ($("#search-input").val().length) {
          $("#address-bar").show();
          getAddressList(addrVal, 'address-bar', "http://www.navcities.com/api/geocoding/?user=demo&maxNumberOfPois=5&find=");

            if (event.keyCode === 13) {
                $( $("#address-list").children(":first") ).click();
            }
        } else {
            $("#address-bar").hide();
        }
  });

  function getAddressList(string, id, url) {
      var res = '';
      $.ajax({
          url: url + string,
          data: {
          },
          type: 'GET',
          dataType: 'JSON',
          async: true,
          cache: false,
          timeout: 5000,
          success: function (result) {
              var features = result.features;
              if (features.length > 0) {
                  res += '<div id="address-list" class="list-group" style="max-height: 200px; overflow-y: auto;">';
                  for (var i = 0; i < features.length; i++) {

                      var name = features[i].properties.nom;
                      name = name.replace(/[']/g, "|");
                      if (features[i].properties.typedata == 'POI') {
                          res += '<a href="javascript:void(0)" onclick="getSelectedAddress(\'' + name + '\', ' + features[i].geometry.coordinates[0] + ', ' + features[i].geometry.coordinates[1] + ',\'' + id + '\');" class="list-group-item list-group-item-action"><i class="fas fa-map-pin"></i> ' + features[i].properties.nom + ' ' + features[i].properties.adresse + '</a>';

                      } else if (features[i].properties.typedata == 'Localite') {
                          res += '<a href="javascript:void(0)" onclick="getSelectedAddress(\'' + name + '\', ' + features[i].geometry.coordinates[0] + ', ' + features[i].geometry.coordinates[1] + ',\'' + id + '\');" class="list-group-item list-group-item-action"><i class="fas fa-city"></i> ' + features[i].properties.adresse + '</a>';
                      } else {
                          res += '<a href="javascript:void(0)" onclick="getSelectedAddress(\'' + name + '\', ' + features[i].geometry.coordinates[0] + ', ' + features[i].geometry.coordinates[1] + ',\'' + id + '\');" class="list-group-item list-group-item-action"><i class="fas fa-road"></i> ' + features[i].properties.nom + '</a>';
                      }

                  }
                  res += '</div>';
                  $("#" + id).empty();
                  $("#" + id).append(res);
              }
          },
          error: function () {
            swal("Attention", "Veuillez vérifier votre connexion internet et réessayez","error");
          },
          complete: function () {

          }
      });
  }

  var mapAdvancedSearch_AddressStyle = new ol.style.Style({
      image: new ol.style.Icon({
          anchor: [0.5, 0.5],
          anchorXUnits: 'fraction',
          anchorYUnits: 'fraction',
          src: '../../images/pinMap.png'
      })
  });

  var mapAdvancedSearch_AddressGeometryVector = new ol.layer.Vector(
      {
          name: 'MapAdvancedSearch_Address',
          source: new ol.source.Vector(),
          style: mapAdvancedSearch_AddressStyle
      });

  function getSelectedAddress(name, longitude, latitude, id) {
      $("#address-bar").hide();

      mapAdvancedSearch_AddressGeometryVector.getSource().clear();
      name = name.replace(/[|]/g, "'");

      var point_pos_search_inp = new ol.geom.Point(
          ol.proj.transform([longitude, latitude], 'EPSG:4326', 'EPSG:3857')
      );
      
      var point_position_search_inp = new ol.Feature(point_pos_search_inp);
      mapAdvancedSearch_AddressGeometryVector.getSource().addFeature(point_position_search_inp);
      var defaultCenter = ol.proj.transform([longitude, latitude], 'EPSG:4326', 'EPSG:3857');
      
      view.animate({
          center: defaultCenter,
          duration: 2000,
          zoom: 17
      });

  }

map.addLayer(mapAdvancedSearch_AddressGeometryVector);