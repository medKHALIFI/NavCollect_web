<?php
session_start(); 
include '../../php/db_connect.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title>NAVCollect | Ajouter une zone </title>

    <!-- jQuery -->
    <script src="../../plugins/jquery/dist/jquery.min.js"></script>
    <!-- Openlayers -->
    <link rel="stylesheet" href="../../plugins/ol-3.15.1/ol.css" />
    <script type="text/javascript" src="../../plugins/ol-3.15.1/ol.js"></script>
    <!-- ol-ext -->
    <link rel="stylesheet" href="../../plugins/ol-ext/ol-ext.css" />
    <script type="text/javascript" src="../../plugins/ol-ext/ol-ext.js"></script>
    <!-- Opacity LayerSwitcher OL3 -->
    <link rel="stylesheet" href="../../plugins/Opacity-slider/ol3-layerswitcher.css" />
    <script type="text/javascript" src="../../plugins/Opacity-slider/ol3-layerswitcher.js"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <!-- Icon -->
    <link rel="icon" href="../../images/icon.png">
    <!-- Bootstrap -->
    <link href="../../plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <!-- NProgress -->
    <link href="../../plugins/nprogress/nprogress.css" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="../../plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>
    <!-- JQuery DataTable Css -->
    <link href="../../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <!-- Bootgrid css -->
    <link rel="stylesheet" type="text/css" href="../../plugins/bootgrid/jquery.bootgrid.css">
    <!-- Sweet Alert Css -->
    <link href="../../plugins/sweetalert/sweetalert.css" rel="stylesheet" />
    <!-- Bootstrap Select Css -->
    <link href="../../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Custom Theme Style -->
    <link href="../../css/custom.css" rel="stylesheet">
    <link href="../../css/map.css" rel="stylesheet">

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title">&nbsp; <img src="../../images/icon1.png"> <span>NAVCollect</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../../images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bonjour</span>
                <h2><?php echo $_SESSION['prenom'] ."&nbsp;".$_SESSION['nom'] ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->
            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Général <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../index.php">Acceuil</a></li>
                      <li><a href="index2.html">Profil</a></li>
                      <li><a href="index3.html">Statistiques</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Gestion des projets <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../gestion_projets/creation_projet.php">Créer un projet</a></li>
                      <li><a href="../gestion_projets/consulter_projet.php">Consulter les projets</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-map"></i> Gestion des zones <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="ajouter_zone.php">Ajouter une nouvelle zone</a></li>
                      <li><a href="consulter_zone.php">Consulter les zones</a></li>
                      <li><a href="zone_facultative.php">Zones facultatives</a></li>
                    </ul>
                  </li>
                  <li><a href="../gestion_agents/index.php"><i class="fa fa-users"></i> Gestion des agents</span></a></li>
                  <li><a><i class="fa fa-list-alt"></i>Gestion des formulaires <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../gestion_formulaires/creation_formulaire.php">Créer un formulaire</a></li>
                      <li><a href="../gestion_formulaires/consulter_formulaire.php">Consulter les formulaires</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Se déconnecter" href="../../php/logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="../../images/img.jpg" alt=""><?php echo $_SESSION['prenom'] ."&nbsp;".$_SESSION['nom'] ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li><a href="../../php/logout.php"><i class="fa fa-sign-out pull-right"></i> Se déconnecter</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>

        </div>
        <!-- /top navigation -->
        <!-- page content -->
        <div class="right_col" role="main">
          
          <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Ajouter une zone d'étude</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="body">
                      <div class="row">      
                        <div class="col-md-8" align="center">
                          <div class="btn-toolbar">  
                            <div class="btn-group">   
                              <button type="button" class="btn bg-cyan" onclick="drawPolygon()"><i class="fas fa-draw-polygon"></i></button>    
                              <button type="button" class="btn bg-cyan" onclick="drawSquare()"><i class="fas fa-vector-square"></i></button>
                              <button type="button" class="btn bg-cyan" onclick="drawCircle()"><i class="far fa-circle"></i></button>
                            </div> 
                            <div class="btn-group">
                              <button type="button" class="btn bg-cyan" onclick="stopInteraction()"><i class="fas fa-hand-rock"></i></button>   
                              <button type="button" class="btn bg-cyan" id="full-screen"><i class="fas fa-arrows-alt"></i></button>    
                              <button type="button" class="btn bg-cyan" onclick="gotoMorocco()"><i class="fas fa-home"></i></button>
                              <button type="button" class="btn bg-cyan" onclick="zoomIn()"><i class="fas fa-search-plus"></i></button>
                              <button type="button" class="btn bg-cyan" onclick="zoomOut()"><i class="fas fa-search-minus"></i></button>
                            </div> 
                            <div class="btn-group">    
                              <button type="button" class="btn bg-orange" onclick="modifyFeature()"><i class="fa fa-edit"></i></button>    
                              <button type="button" class="btn bg-green"><i class="fas fa-ruler"></i></button>    
                              <button type="button" class="btn bg-red" onclick="deleteInteractions()"><i class="fas fa-trash"></i></button> 
                              <button type="button" class="btn bg-green"><i class="far fa-save"></i></button> 
                            </div> 
                          </div>
                        </div>

                        <div class="col-md-4" align="center">
                          <select id="selectBox" class="selectpicker show-tick" data-live-search="true">
                            <option selected disabled value="">Sélectionnez </option>
                            <option id="020202" value="">Nouvelle </option>
                            <?php 
                              $query = 'SELECT  * FROM zone_facultative';
                              $result = pg_query($query) or die('Échec de la requête : ' . pg_last_error());
                              while ($row=pg_fetch_row($result)) {
                            ?>
                            <option id="<?php  echo $row[0] ?>" value="<?php  echo $row[1] ?>"><?php  echo $row[1] ?></option>
                            <?php } ?>
                          </select>
                          
                        </div>

                      </div>
                            
                      </br></br>
                      <div id="map" class="map" tabindex="0"></div>
                      <div id="popup" class="ol-popup">
                        <a href="#" id="popup-closer" class="ol-popup-closer"></a>
                        <div id="popup-content"></div>
                      </div>
                      <br>
                      <!-- /page content 
                      <button type="button" class="btn bg-light-blue waves-effect m-r-20" data-type="prompt" id="nom_zone">Ajouter</button>-->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /page content -->

    <!-- footer content -->
    <footer>
      <div class="pull-right">
        NAVCollect, NAVCities-Témara, Rabat.
      </div>
      <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->
      
    <script type="text/javascript">

      //Initialisation des groupes des couches 
      var overLayGroup = new ol.layer.Group({
        title : 'Couches',
        layers: [
          vector = new ol.layer.Vector({
                    name: 'vector',
                    source: new ol.source.Vector()
                  })
        ]
      });

      var view = new ol.View({
        zoom: 5,
        center: [-788691.20, 3736368.96]
      });

      // Initialisation de la carte par défaut
      var map = new ol.Map({
        target: 'map',
        view: view,
        layers: [
          new ol.layer.Group({
            'title': 'Cartes de base',
            layers: [
              new ol.layer.Tile({
                title: 'OSM',
                type: 'base',
                source: new ol.source.OSM()
              }),
              new ol.layer.Tile({
                title: 'Bing',
                type: 'base',
                source: new ol.source.BingMaps({
                  key: 'AuFUqJsfrG-Qgvg9sDChTNlHzN5_ybJA7LOknPz-Y1T6dNONDIIkQrPHvxjOe8To',
                  imagerySet: 'AerialWithLabels'
                })
              })

            ]
          }),
          overLayGroup],
        controls: ol.control.defaults().extend([
            new ol.control.FullScreen(),
            new ol.control.ScaleLine()
        ]),
      });

      // Ajout pan zoom
      zoomslider = new ol.control.ZoomSlider();
      map.addControl(zoomslider);

     
      var features = new ol.Collection();
      var featureOverlay = new ol.layer.Vector({
        source: new ol.source.Vector({features: features}),
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
      featureOverlay.setMap(map);

      // Ajout de layer switcher
      var layerSwitcher = new ol.control.LayerSwitcher({
        enableOpacitySliders: true
      });
      map.addControl(layerSwitcher);

      // Ajout de la barre d'échelle
      var scaleLineControl = new ol.control.ScaleLine();
      scaleLineControl.setUnits('metric');

      var draw; // global so we can remove it later
      // Draw polygon
      function drawPolygon(){
        map.removeInteraction(draw);
        draw = new ol.interaction.Draw({
          type: 'Polygon',
          source: vector.getSource(),
          geometryFunction: function(coordinates, geometry){
            this.nbpts = coordinates[0].length;
            if (geometry) geometry.setCoordinates([coordinates[0].concat([coordinates[0][0]])]);
            else geometry = new ol.geom.Polygon(coordinates);
            return geometry;
          }
        });
        map.addInteraction(draw);

      }
      // draw a square
      function drawSquare(){
        map.removeInteraction(draw);
        draw = new ol.interaction.Draw({
          type: 'Circle',
          source: vector.getSource(),
          geometryFunction: ol.interaction.Draw.createRegularPolygon(4)
        });

        map.addInteraction(draw);
      }

      // Draw a circle 
      function drawCircle(){
        map.removeInteraction(draw);
        draw = new ol.interaction.Draw({
          type: 'Circle',
          source: vector.getSource(),
        });

        map.addInteraction(draw);
      }
      // stop interaction
      function stopInteraction(){
        map.removeInteraction(draw);
      }
      // delete interactions
      function deleteInteractions(){
        vector.getSource().clear();
      }
      // modify drawn feature
      function modifyFeature(){
        map.removeInteraction(draw);
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
      // Zoom in
      function zoomIn(){
        var zoom = ol.animation.zoom({
          resolution: map.getView().getResolution()
        });
        map.beforeRender(zoom);
        map.getView().setZoom(map.getView().getZoom()+1);  

      }
      //Zomm out
      function zoomOut(){
        var zoom = ol.animation.zoom({
          resolution: map.getView().getResolution()
        });
        map.beforeRender(zoom);
        map.getView().setZoom(map.getView().getZoom()-1);
      }
      // zoom to morocco
      var morocco = ol.proj.fromLonLat([-7.0849336, 31.794525]);

      function gotoMorocco() {
        var duration = 2000;
        var start = +new Date();
        var pan = ol.animation.pan({
          duration: duration,
          source: /** @type {ol.Coordinate} */ (view.getCenter()),
          start: start
        });
        var bounce = ol.animation.bounce({
          duration: duration,
          resolution: 4 * view.getResolution(),
          start: start
        });
        map.beforeRender(pan, bounce);
        view.setCenter(morocco);
      }

      //Popup for proprieties
      var container = document.getElementById('popup'),
      content_element = document.getElementById('popup-content'),
      closer = document.getElementById('popup-closer');

      closer.onclick = function() {
        overlay.setPosition(undefined);
        closer.blur();
        return false;
      };

      var overlay = new ol.Overlay({
        element: container,
        autoPan: true,
        offset: [0, -10]
      });
      map.addOverlay(overlay);

      map.on('click', function(evt){
        var feature = map.forEachFeatureAtPixel(evt.pixel,
          function(feature, layer) {
            return feature;
          });
        if (feature) {
          var geometry = feature.getGeometry();
          var coord = geometry.getCoordinates();
          
          var content = '<h3>' + feature.get('name') + '</h3>';
          content += '<h5>' + feature.get('description') + '</h5>';
          
          content_element.innerHTML = content;
          overlay.setPosition(coord);
          
          console.info(feature.getProperties());
        }
      });
/*
      map.on('pointermove', function(e) {
        if (e.dragging) return;
           
        var pixel = map.getEventPixel(e.originalEvent);
        var hit = map.hasFeatureAtPixel(pixel);
        
        map.getTarget().style.cursor = hit ? 'pointer' : '';
      });
*/

     
    </script>
    <!-- Bootstrap -->
    <script src="../../plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../plugins/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../plugins/nprogress/nprogress.js"></script>
    <!-- jQuery custom content scroller -->
    <script src="../../plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Select Plugin Js -->
    <script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <!-- Slimscroll Plugin Js -->
    <script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- Sweet Alert Plugin Js -->
    <script src="../../plugins/sweetalert/sweetalert.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../../js/custom.js"></script>
    <!-- Waves Effect Plugin Js -->
    <script src="../../plugins/node-waves/waves.js"></script>

  </body>
</html>