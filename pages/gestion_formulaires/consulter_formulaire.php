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

    <title>NAVCollect | Gestion des formulaires </title>

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
    <!-- Custom Theme Style -->
    <link href="../../css/custom.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <center><a href="index.php" class="site_title"><i></i> <img src="../../images/logo.png"> <span></span></a></center>
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
                      <li><a href="../gestion_zones/ajouter_zone.php">Ajouter une nouvelle zone</a></li>
                      <li><a href="../gestion_zones/consulter_zone.php">Consulter les zones</a></li>
                      <li><a href="../gestion_zones/zone_facultative.php">Zones facultatives</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-list-alt"></i> Gestion des formulaires <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="creation_formulaire.php">Créer un nouveau formulaire</a></li>
                      <li><a href="consulter_formulaire.php">Consulter les formulaires</a></li>
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
                      <h2>Gérer vos formulaires</h2>
                    </div>
                    <div class="col-xs-5 align-right">
                      <button class="btn bg-blue-sky affectation pull right" onclick="ref()" ><i class="fas fa-redo-alt"></i></button>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <div class="table-responsive">
                      <table class="table table-bordered table-striped jambo_table table-hover dataTable js-exportable" id="table_form" >
                          <thead>
                              <tr>
                                  <th>Nom</th>
                                  <th>Date de création</th>
                                  <th>Date de modification</th>
                                  <th>Fcts</th>
                              </tr>
                          </thead>
                          <tbody id="table_body">
                              <?php 
                              $query = 'SELECT  * FROM formulaire';
                              $result = pg_query($query) or die('Échec de la requête : ' . pg_last_error());
                              while ($row=pg_fetch_row($result)) { 
                                  $preview_form=$row[0];
                                  $update_form=$row[0];
                                  ?>
                              <tr>
                                <td id="nom" style="width=28%"><?php  echo $row[5] ?></td>
                                <td id="date_creation"style="width=26%"><?php  echo $row[3] ?></td>
                                <td id="date_modif" style="width=26%"><?php  echo $row[4] ?></td>
                                <td style="width=20%"> 
                                  <center>
                                    <button onclick="recuper_form(<?php echo $preview_form; ?>)" type="button" name="edit" class="btn bg-blue-sky preview_form" data-toggle="modal" data-target="#modalPreview" id="<?php echo $preview_form; ?>" >
                                        <i class="fa fa-eye"></i> Visualiser
                                    </button>
                                    <button onclick="recuper_form_text(<?php echo $update_form; ?>)" type="button" name="edit" class="btn bg-orange update_agent" data-toggle="modal" data-target="#modalEdit" id="<?php echo $update_form; ?>"  >
                                        <i class="fa fa-edit"></i> Modifier
                                    </button>
                                    <button type="button" name="delete" class="btn bg-red delete_form" id="<?php echo $id_form = $row[0]; ?>">
                                        <i class="fa fa-trash"></i>Supprimer
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

        <!-- Modals : ajouter un nouveau formulaire -->
        <div class="modal fade" id="modalPreview" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Visualiser votre formulaire</h4>
                    </div>

                    <div class="modal-body" style="background: #ededec; margin: 30px; padding:30px">
                        <div>
                          <div id="form_user" ></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modals : Modifier un formulaire -->
        <div class="modal fade" id="modalEdit">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Modifier le formulaire</h4>
                    </div>
                    <div class="modal-body">
                      <div>
                          <div id="form_update" class="contaire"></div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-primary waves-effect" id="submitButton_update"  name="submitButton_update" onclick="update_form()">Enregistrer</button>
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
        NAVCollect, NAVCities-Témara, Rabat.<br>
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
    <script src="../../js/gestion_formulaires/delete_form.js"></script>
    <script src="../../js/gestion_formulaires/preview_form.js"></script>
    <script src="../../js/gestion_formulaires/update_form.js"></script>
    <!-- Waves Effect Plugin Js -->
    <script src="../../plugins/node-waves/waves.js"></script>
    <!--Refresh table JS -->
    <script>
      function ref(){
        location.replace("consulter_formulaire.php");
      }
    </script>
  </body>
  <?php 
    pg_free_result($result);
    pg_close($dbconn);
  ?>
</html>