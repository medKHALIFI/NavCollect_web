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
                  <li><a><i class="fa fa-home"></i> Acceuil <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../index.php">Général</a></li>
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
                      <div class=" col-md-12">
                          <select id="selectBox" class="selectpicker show-tick" data-live-search="true">
                            <option selected disabled value="" style="align-content: center"> Choisissez une zone facultative </option>
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
                     
                      </br></br></br></br>
                      <div id="map" class="map"></div>
                      </br>
                      <button type="button" class="btn bg-light-blue waves-effect m-r-20" data-type="prompt" id="nom_zone">Ajouter</button>
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
        NAVCollect, NAVCities-Témara, Rabat. <br>
        &copy; 2018
      </div>
      <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->
      
    <script type="text/javascript">
      var intersection;
      var intersection_test;
      var layers1;
      var layers2;
      var layer1;
      var layer2;

      //Couche qui va porter la digitalisation des zones :
      var vector = new ol.layer.Vector({
        name: 'vector',
        source: new ol.source.Vector()
      });

      //Initialisation des groupes des couches 
      var overLayGroup = new ol.layer.Group({
        title : 'Couches',
        layers: [vector]
      });

      //La vue initiale de la carte (Vue globale au Maroc):
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
        controls : ol.control.defaults({
          attribution : false,
          zoom : false
        }),
      });

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
     
      // Main control bar
      var mainbar = new ol.control.Bar();
      map.addControl(mainbar);
      
      // Menu d'édition et de digitalisation (Plugin Ol-ext3)
      var editbar = new ol.control.Bar({   
         toggleOne: true,    
         group:false         
      });
      mainbar.addControl(editbar);

      //Position de la barre d'édition
      pos="left";
      mainbar.setPosition(pos);

      // Add selection tool:
      //  1- a toggle control with a select interaction
      //  2- an option bar to delete / get information on the selected feature
      var sbar = new ol.control.Bar();
      sbar.addControl (new ol.control.Button({   
          html: '<i class="fa fa-times"></i>',
          title: "Supprimer l'entité sélectionnée",
          handleClick: function(){   
              var features = selectCtrl.getInteraction().getFeatures();
              if (!features.getLength()) info("Séléctionnez une entité...");
              else info(features.getLength()+" entité(s) sont supprimées.");
              for (var i=0, f; f=features.item(i); i++){
                 vector.getSource().removeFeature(f);
              }
              selectCtrl.getInteraction().getFeatures().clear();
          }
      }));
      sbar.addControl (new ol.control.Button({   
          html: '<i class="fa fa-info"></i>',
          title: "Affcher les informations",
          handleClick: function(){   
              switch (selectCtrl.getInteraction().getFeatures().getLength()){
                  
                  case 0: info("Select an object first...");
                          break;
                  case 1:var f = selectCtrl.getInteraction().getFeatures().item(0);
                         info("Selection is a "+f.getGeometry().getType());
                         break;
                  default:
                         info(selectCtrl.getInteraction().getFeatures().getLength()+ " objects seleted.");
                         break;
              }
          }
      }));
      var selectCtrl = new ol.control.Toggle({   
          html: '<i class="fa fa-hand-pointer-o"></i>',
          title: "Select",
          interaction: new ol.interaction.Select (),
          bar: sbar,
          autoActivate:true,
          active:false
      });
      editbar.addControl ( selectCtrl);

      // Add editing tools
      //point
      var pedit = new ol.control.Toggle({   
          html: '<i class="fa fa-map-marker" ></i>',
          title: 'Point',
          interaction: new ol.interaction.Draw({  
              type: 'Point',
              source: vector.getSource()
          })
      });
      editbar.addControl ( pedit );


      //linestring
      var ledit = new ol.control.Toggle({   
          html: '<i class="fa fa-share-alt" ></i>',
          title: 'LineString',
          interaction: new ol.interaction.Draw({  
              type: 'Ligne',
              source: vector.getSource(),
              // Count inserted points
              geometryFunction: function(coordinates, geometry){   
                  if (geometry) geometry.setCoordinates(coordinates);
                  else geometry = new ol.geom.LineString(coordinates);
                  this.nbpts = geometry.getCoordinates().length;
                  return geometry;
              }
          }),
          // Options bar associated with the control
          bar: new ol.control.Bar({   
              controls:[ new ol.control.Button({   
                  html: '<i class="fas fa-minus"></i>',
                  title: 'Supprimer le dernier point',
                  handleClick: function(){   
                      if (ledit.getInteraction().nbpts>1) ledit.getInteraction().removeLastPoint();
                  }}),
                  new ol.control.Button({
                      html: '<i class="fas fa-check"></i>',
                      title: "Terminer la digitalisation",
                      handleClick: function(){
                      // Prevent null objects on finishDrawing
                         if (ledit.getInteraction().nbpts>2) ledit.getInteraction().finishDrawing();
                      }
                  })
              ]
          })
      });
      editbar.addControl ( ledit );

      //polygon
      var fedit = new ol.control.Toggle({   
          html: '<i class="fa fa-bookmark-o fa-rotate-270" ></i>',
          title: 'Polygon',
          interaction: new ol.interaction.Draw({  
              type: 'Polygon',
              source: vector.getSource(),
              // Count inserted points
              geometryFunction: function(coordinates, geometry){   
                  this.nbpts = coordinates[0].length;
                  if (geometry) geometry.setCoordinates([coordinates[0].concat([coordinates[0][0]])]);
                  else geometry = new ol.geom.Polygon(coordinates);
                  return geometry;
              }
          }),
          
          bar: new ol.control.Bar({
            controls:[new ol.control.Button
              ({
                  html: '<i class="fas fa-minus"></i>',//'<i class="fa fa-mail-reply"></i>',
                  title: 'Supprimer le dernier point',
                  handleClick: function(){   
                      if (fedit.getInteraction().nbpts>1) fedit.getInteraction().removeLastPoint();
                  }
              }),
              new ol.control.Button({   
                  html:'<i class="fa fa-check"></i>', 
                  title: "Terminer la digitalisation",
                  handleClick: function(){  
                      if (fedit.getInteraction().nbpts>3) fedit.getInteraction().finishDrawing();
                  }
              })
            ]
          })
      });
      editbar.addControl ( fedit );

      //Arrêter l'interation
      var stop_interaction = new ol.control.Button({
          html: '<i class="fa fa-pointer"></i>',
          title: "Arrêter l'interaction",
          handleClick: function(e){   
              map.removeInteraction(vector);
          }
      });
      mainbar.addControl(stop_interaction);

      //Supprimer toutes les entités
      var delete_all = new ol.control.Button({
          html: '<i class="fa fa-trash"></i>',
          title: "Supprimez toutes les entités",
          handleClick: function(e){   
              vector.getSource().clear();
          }
      });
      mainbar.addControl(delete_all);
      $('#nom_zone').click(function(){
        if(bool == false){
          var geojson= new ol.format.GeoJSON().writeFeatures(vector.getSource().getFeatures());
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
          }, function (inputValue) {
            if (inputValue === false) return false;
            if (inputValue === "") {
              swal.showInputError("Entrez le nom"); 
              return false;
            }
            $.ajax({
              url: '../../php/geojson_to_db.php',
              type: 'POST',
              data: { 'geojson':geojson , 'nom_zone': inputValue },
              beforeSend: function() {
                alert("sending...");
              },
              success: function(response) {
                if (response==1) {
                  alert("bien joué");
                } else {
                  alert("errooooooooooooor");
                }
              } 
            });
          }
          );
        }else{
          //bool=true
          intersection_test();
        }
      });
    </script>
    <script>
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
      var test_intersect  = new ol.layer.Vector({
        name: 'test_intersect',
        opacity: 1.0,
        filters: [],
        style : myStyle ,
        title: "  intersection   ",
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
          complete :function(){
            var extent = test_intersect.getSource().getExtent();
            map.getView().fit(extent, map.getSize());
            var json = new ol.format.GeoJSON().writeFeatures(test_intersect.getSource().getFeatures());
            var geojson= new ol.format.GeoJSON().writeFeatures(test_intersect.getSource().getFeatures());
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
            }, function (inputValue) {
              if (inputValue === false) return false;
              if (inputValue === "") {
                swal.showInputError("Entrez le nom"); 
                return false;
              }
              $.ajax({
                url: '../../php/geojson_to_db.php',
                type: 'POST',
                data: { 'geojson':geojson , 'nom_zone': inputValue },
                
                beforeSend: function() {
                  alert("sending...");
                },
                success: function(response) {
                  if (response==1) {
                    alert("bien joué");
                  } else {
                    alert("errooooooooooooor");
                  }
                } 
              });
            });
          }
        });
      }
    </script>

    <script>
      var geojson_zone ;
      var bool = false;
      $("#selectBox").change(function() {
        bool = true;
        var id =$(this).children(":selected").attr("id");
        if(id == '020202'){
          bool = false;
          map.removeLayer(geojson_zone);
          map.getView().setCenter([-788691.20, 3736368.96]);
          map.getView().setZoom(5);
        }else{
          var url = "../../php/recupere_zone_fac.php";
          $.getJSON(url, function(result) {
            $.each(result, function(i, field) {
              
              var etendue = field.contenu_zone_fac;
              var id_zone1=field.id_zone_fac;
              if (id_zone1 == id ) {
                geojson_zone  = new ol.layer.Vector({
                  name: 'geojson_zone',
                  opacity: 1.0,
                  filters: [],
                  title: "  point   ",
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