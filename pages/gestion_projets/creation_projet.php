<?php
session_start(); 
include '../../php/db_connect.php';
if(!isset($_SESSION["username"]))
{
 header("location:../login/sign-in.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title>NAVCollect | Créer un projet </title>
    <!-- jQuery -->
    <script src="../../plugins/jquery/dist/jquery.min.js"></script>
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <!-- NProgress -->
    <link href="../../plugins/nprogress/nprogress.css" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="../../plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>
    <!-- Bootstrap Select Css -->
    <link href="../../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <!-- Sweet Alert Css -->
    <link href="../../plugins/sweetalert/sweetalert.css" rel="stylesheet" />
    <!-- Waves Effect Css -->
    <link href="../../plugins/node-waves/waves.css" rel="stylesheet" />
    <!-- Animation Css -->
    <link href="../../plugins/animate-css/animate.css" rel="stylesheet" />
    <!-- Custom Theme Style -->
    <link href="../../css/custom.css" rel="stylesheet">
    <link href="../../css/map.css" rel="stylesheet">
    <!--  SmartWizard CSS -->
    <link href="../../plugins/SmartWizard4/dist/css/smart_wizard.css" rel="stylesheet" type="text/css" />
    <link href="../../plugins/SmartWizard4/dist/css/smart_wizard_theme_arrows.css" rel="stylesheet" type="text/css"/>
    <style>
    	.col-half-offset{
    		margin-left:4.166666667%
    	}
    </style>
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
            <br/>
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
                      <li><a href="creation_projet.php">Créer un projet</a></li>
                      <li><a href="consulter_projets.php">Consulter les projets</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-map"></i> Gestion des zones <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../gestion_zones/ajouter_zone.php">Ajouter une nouvelle zone</a></li>
                      <li><a href="../gestion_zones/consulter_zone.php">Consulter les zones</a></li>
                      <li><a href="../gestion_zones/zone_facultative.php">Zones facultatives</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-list-alt"></i>Gestion des formulaires <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../gestion_formulaires/creation_formulaire.php">Créer un formulaire</a></li>
                      <li><a href="../gestion_formulaires/consulter_formulaire.php">Consulter les formulaires</a></li>
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
                    <li><a href="../../php/logout.php"><i class="fas fa-sign-out-alt pull-righ"></i> Se déconnecter</a></li>
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
            <div class="clearfix"></div>
            <div class="row">
              <br> 
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Créer un nouveau projet</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  	<br>
                    <!-- SmartWizard Content -->
                    <div id="smartwizard">
                      <ul>
                        <li></li>
                        <li></li>
                        <li><a href="#step-1">Étape 1<br /><small>Décrivez votre projet</small></a></li>
                        <li><a href="#step-2">Étape 2<br /><small>Affectation (Agent-Zone-Formulaire-Géométrie)</small></a></li>
                      </ul>

                      <div>
                        <!--Décrivez votre projet-->
                        <div id="step-1" class="" >
                          <form class="form-horizontal form-label-left" id="form_projet">
                            <div class="form-group form-float">
                                  <div class="form-line form_float">
                                    <input type="text" class="form-control" name="name" id="nom_projet" oninvalid="this.setCustomValidity('Ce champ est obligatoire')" oninput="setCustomValidity('')"  required>
                                    <label class="form-label">Nom de projet <span style="color: red;">*</span></label>
                                    <div class="help-block with-errors"></div>
                                  </div>
                              </div>
                              <br> <br>
                              <div class="form-group form-float">
                                  <div class="form-line">
                                    <textarea name="description_projet" cols="30" rows="5" class="form-control no-resize" id="description_projet"></textarea>
                                    <label class="form-label">Description de projet</label>
                                  </div>
                              </div>
                          </form>
                        </div>

                        <!--Affectation-->
                        <div id="step-2" class="">
                          <br> 
                          <p class="text-center">Vous devez affecter à chaque agent, un ou plusieurs zones/formulaires/types de géométrie ! </p>
                          <br>
                          <div class="row">
                            <div class="col-md-2" align="center">
                              <select id="selectAgent" class="selectpicker show-tick" data-live-search="true" >
                                <option selected disabled value="">  Agent  </option>
                                <?php 
                                $query = 'SELECT  * FROM agent';
                                $result = pg_query($query) or die('Échec de la requête : ' . pg_last_error());
                                while ($row=pg_fetch_row($result)) {
                                ?>
                                <option id="<?php  echo $row[0] ?>" value="<?php  echo $row[0] ?>"><?php  echo $row[3] ?></option>
                                <?php } ?>
                              </select> 
                            </div>

                            <div class="col-md-2 col-half-offset" align="center">
                              <select id="selectZone" class="selectpicker show-tick" data-live-search="true" >
                                <option selected disabled value=""> Zone d'étude  </option>
                                <?php 
                                $query = 'SELECT  * FROM zone_etude';
                                $result = pg_query($query) or die('Échec de la requête : ' . pg_last_error());
                                while ($row=pg_fetch_row($result)) {
                                ?>
                                <option id="<?php  echo $row[0] ?>" value="<?php  echo $row[0] ?>"><?php  echo $row[2] ?></option>
                                <?php } ?>
                              </select>
                            </div>

                            <div class="col-md-2 col-half-offset" align="center">
                              <select id="selectForm" class="selectpicker show-tick" data-live-search="true" >
                                <option selected disabled value=""> Formulaire  </option>
                                <?php
                                $query = 'SELECT  * FROM formulaire';
                                $result = pg_query($query) or die('Échec de la requête : ' . pg_last_error());
                                while ($row=pg_fetch_row($result)) {
                                ?>
                                <option id="<?php  echo $row[0] ?>" value="<?php  echo $row[0] ?>"><?php  echo $row[5] ?></option>
                                <?php } ?>
                              </select> 
                            </div>

                            <div class="col-md-2 col-half-offset" align="center">
                            <select id="selectGeometry" class="selectpicker show-tick" data-live-search="true" >
                                <option selected disabled value=""> Géométrie  </option>
                                <option id="point" value="1">Point</option>
                                <option id="linestring" value="2">Ligne</option>
                                <option id="polygon" value="3">Polyone</option>
                              </select>
                              </div>
                            <div class="col-md-2 col-half-offset" align="center">
                              <button id="affecter" class="btn bg-green waves-effect" type="button"> Affecter</button>
                            </div>
                          </div>                          
                          <br>
                          <div class="row">
                            <div id="map" class="map"></div>
                            <div id="show_form" style="margin: 30px"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                   <!-- End SmartWizard Content -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
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

    <!-- Bootstrap -->
    <script src="../../plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../plugins/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../plugins/nprogress/nprogress.js"></script>
    <!-- jQuery custom content scroller -->
    <script src="../../plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- SmartWizard JavaScript source -->
    <script type="text/javascript" src="../../plugins/SmartWizard4/dist/js/jquery.smartWizard.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../../js/custom.js"></script>
    <script src="../../js/gestion_projets/creation_projet.js"></script>
    <!-- Select Plugin Js -->
    <script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <!-- JQuery Steps Plugin Js -->
    <script src="../../plugins/jquery-steps/jquery.steps.js"></script>
    <!-- Waves Effect Plugin Js -->
    <script src="../../plugins/node-waves/waves.js"></script>
    <!-- Sweet Alert Plugin Js -->
    <script src="../../plugins/sweetalert/sweetalert.min.js"></script>
    <!-- Include jQuery Validator plugin -->
    <script src="../../plugins/bootstrap-form-validator/validator.min.js"></script>

    <script type="text/javascript">
      var map = new ol.Map({
        target: 'map',
        view: new ol.View({
          zoom: 2,
          center: [0, 0]
        }),
        layers: [new ol.layer.Tile({
          name: 'OSM',
          source: new ol.source.OSM()
        })],
        controls: ol.control.defaults({
          attribution : false,
          zoom : false
        }).extend([
          new ol.control.ScaleLine()
        ]),
      });
    </script>
  </body>
  <?php 
    pg_free_result($result);
    pg_close($dbconn);
  ?>
</html>