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

    <title>NAVCollect | Consultation des zones </title>

    <!-- Openlayers -->
    <link rel="stylesheet" href="../../plugins/ol/ol.css" />
    <script type="text/javascript" src="../../plugins/ol/ol.js"></script>
    <!-- ol-ext -->
    <link rel="stylesheet" href="../../plugins/ol-ext/ol-ext.css" />
    <script type="text/javascript" src="../../plugins/ol-ext/ol-ext.js"></script>
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
    <!-- Custom Theme Style -->
    <link href="../../css/custom.css" rel="stylesheet">
    <link href="../../css/map.css" rel="stylesheet">
  </head>

  <body class="nav-md ">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <center><a href="../index.php" class="site_title"><img src="../../images/logo.png"></a></center>
            </div>
            <div class="clearfix"></div>
            <br>
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
                      <li><a href="../profile.php">Profile</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Gestion des projets <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../gestion_projets/creation_projet.php">Créer un projet</a></li>
                      <li><a href="../gestion_projets/consulter_projets.php">Consulter les projets</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-map"></i> Gestion des zones <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="ajouter_zone.php">Ajouter une nouvelle zone</a></li>
                      <li><a href="consulter_zone.php">Consulter les zones</a></li>
                      <li><a href="zone_facultative.php">Zones facultatives</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-list-alt"></i> Gestion des formulaires <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../gestion_formulaire/creation_formulaire.php">Créer un nouveau formulaire</a></li>
                      <li><a href="../gestion_formulaire/consulter_formulaire.php">Consulter les formulaires</a></li>
                    </ul>
                  </li>
                  <li><a href="../gestion_agents/index.php"><i class="fa fa-users"></i> Gestion des agents</span></a></li>
                  <li><a href="../gestion_donnees/donnees_collectees.php"><i class="fa fa-database"></i>Les données collectées</a></li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
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
                    <li><a href="../profile.php"> Profile</a></li>
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
          <div class="">
            <div class="page-title">
              
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="col-xs-7 ">
                      <h2>Zones d'étude</h2>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <div class="table-responsive">
                      <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="table_zone_fac" >
                          <thead>
                            <tr>
                              <th style="width: 15%;">nom</th>
                              <th style="width: 70%;">contenu (GeoJson)</th>
                              <th style="width: 15%;">Fcts</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                            // Exécution de la requête SQL
                            $query = 'SELECT  * FROM zone_etude';
                            $result = pg_query($query) or die('Échec de la requête : ' . pg_last_error());
                            while ($row=pg_fetch_row($result)) { 
                                
                                ?>
                            <tr>
                              <td id="nom_zone"><?php  echo $row[2] ?></td>
                              <td id="geojson"><?php  echo $row[3] ?></td>
                              <td>
                                <center>
                                  <button name="preview" class="btn bg-blue-sky preview_zone" data-toggle="modal" id="<?php echo $row[0]; ?>">
                                      <i class="material-icons">map</i>
                                  </button>
                                  <button name="delete" class="btn bg-red delete_zone" id="<?php echo $id_zone_delete = $row[0]; ?>">
                                      <i class="material-icons">layers_clear</i>
                                  </button>
                                </center>
                              </td>
                            </tr>
                            <?php } 
                            ?>
                          </tbody>
                      </table>
                    </div>
          
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- Modals : ajouter une nouvelle zone -->
        <div class="modal fade" id="modalAdd" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Ajouter une zone facultative</h4>
                    </div>

                    <div class="modal-body">
                        <form id="form_add_zonefac" method="POST" role="form" class="form_add_zonefac" data-target="#modalAdd" action="../../php/add_zone_fac.php">

                          <div class="form-group form-float">
                            <div class="form-line">
                              <label class="form-label">Nom</label>
                              <input type="text" class="form-control nom_add" name="nom_add" id="nom_add"  autofocus>
                            </div>
                          </div>

                          <div class="form-group form-float">
                            <div class="form-line">
                              <label class="form-label">Source</label>
                              <input type="text" class="form-control source_add" id="source_add" name="source_add"    >
                            </div>
                          </div>

                          <div class="form-group form-float">
                            <div class="form-line">
                              <label class="form-label">Zone facultative (.json, .geojson, .txt)</label>
                              <div class="input-group">
                                <label class="input-group-btn">
                                  <span class="btn btn-primary">
                                  Browse&hellip; <input type="file" style="display: none;" accept=".json,.geojson,.txt" id="file_add" class="file_add" name="file_add"></span>
                                </label>
                                <input type="text" class="form-control" readonly>
                              </div>
                            </div>
                          </div>
                          <br>
                          <div class="modal-footer">
                            <button class="btn btn-primary waves-effect" id="submitButton_add" type="submit">Enregistrer</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Fermer</button>
                          </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>

        <!-- Modals : Prévisualiser la zone  -->
        <div class="modal fade" id="previewMap">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Visualiser la zone</h4>
                </div>
                <div class="modal-body" id="bodyPreview">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Fermer</button>
                </div>
            </div>
          </div>
        </div> 
      </div>
    </div>
    <!-- footer content -->
    <footer>
      <div class="pull-right">
        NAVCollect, NAVCities-Témara, Rabat. <br>
        &copy; 2018
      </div>
      <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/dist/jquery.min.js"></script>
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
    <!-- Jquery DataTable Plugin Js -->
    <script src="../../plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
    <!-- Bootgrid js -->
    <script src="../../plugins/bootgrid/jquery.bootgrid.min.js"></script>
    <!-- Sweet Alert Plugin Js -->
    <script src="../../plugins/sweetalert/sweetalert.min.js"></script>
    <!-- Jquery Validation Plugin Css -->
    <script src="../../plugins/jquery-validation/jquery.validate.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../../js/custom.js"></script>
    <script src="../../js/gestion_agents/jquery-datatable.js"></script>
    <script src="../../js/gestion_zones/delete_zone.js"></script>
    <!-- Waves Effect Plugin Js -->
    <script src="../../plugins/node-waves/waves.js"></script>
    <!-- Preview-->
    <script type="text/javascript">
      var id_zone;
      
      $(document).ready(function(){

        $(".preview_zone").click(function(){
          
          $("#previewMap").modal();
          $("#bodyPreview").html('<div id="map1" class="map1"></div>');
          id_zone = $(this).attr("id");
        });
        
        $("#previewMap").on('shown.bs.modal', function () {
          recuperer_zone(id_zone);
        });

      });

      function recuperer_zone(id_zone){
        
        var osm1 = new ol.layer.Tile({   
            title: "Open Streets Map",
            baseLayer: true,
            source: new ol.source.OSM(),
            visible: true
        });

        var bing1 = new ol.layer.Tile({   
            title: "Bing Sattelite",
            baseLayer: true,
            source: new ol.source.BingMaps({
                key: 'AuFUqJsfrG-Qgvg9sDChTNlHzN5_ybJA7LOknPz-Y1T6dNONDIIkQrPHvxjOe8To',
                imagerySet: 'Aerial'
            }),
            visible: false
        });

        var map1 = new ol.Map({
            layers: [osm1],
            target: 'map1',
            controls: ol.control.defaults({
              attribution : false,
              zoom : false
            }).extend([
                new ol.control.ScaleLine()
            ]),
            
            view: new ol.View({
                center: [0,0],
                zoom: 2                
            })

        });
        map1.updateSize();
           
        var url = "../../php/recupere_zone.php";
        $.getJSON(url, function(result) {
            console.log("resultat de php"+result);
           
            $.each(result, function(i, field) {

                var etendue = field.etendue;
                var id_zone1=field.id_zone;
                var nom_zone=field.nom;


                if (id_zone1 == id_zone ) {
                    
                    var geojson_zone  = new ol.layer.Vector({
                        
                        title: nom_zone,
                        timeInfo: null,
                        isSelectable: true,
                        source: new ol.source.Vector({
                            features: new ol.format.GeoJSON().readFeatures(etendue)
                        })
                    });
                    console.log(geojson_zone);
                    console.log(geojson_zone.getSource().getFeatures()[0].getGeometry().getType());

                map1.addLayer(geojson_zone);
                
                var extent = geojson_zone.getSource().getExtent();
                map1.getView().fit(extent, map1.getSize());

                }
            });
            });

        }
    </script>
  </body>
  <?php 
    pg_free_result($result);
    pg_close($dbconn);
  ?>
</html>