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

    <title>NAVCollect | Gestion des agents </title>
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
  </head>
  <body class="nav-md ">
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
                      <li><a href="../gestion_formulaires/creation_formulaire.php">Créer un nouveau formulaire</a></li>
                      <li><a href="../gestion_formulaires/consulter_formulaire.php">Consulter les formulaires</a></li>
                    </ul>
                  </li>
                  <li><a href="index.php"><i class="fa fa-users"></i> Gestion des agents</span></a></li>
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
                      <h2>Gestion des agents</h2>
                    </div>
                    <div class="col-xs-5 align-right">
                      <button type="button" class="btn bg-green waves-float m-r-20" data-toggle="modal" data-target="#modalUser"> <i class="fa fa-plus"></i> &nbsp; Ajouter un agent</button>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <div class="table-responsive">
                      <table class="table table-bordered table-striped jambo_table table-hover dataTable js-exportable" id="table_agent" >
                          <thead>
                              <tr>
                                  
                                  <th>Nom</th>
                                  <th>Prénom</th>
                                  <th>Email</th>
                                  <th>Téléphone</th>
                                  <th>Date de création</th>
                                  <th>Date de modification</th>
                                  <th>Code IMEI</th>
                                  <th>Actions</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php 
                              $query = 'SELECT  * FROM agent';
                              $result = pg_query($query) or die('Échec de la requête : ' . pg_last_error());
                              while ($row=pg_fetch_row($result)) { 
                                  $update_agent = $row[0];
                                  ?>
                              <tr>
                                <td id="nom" style="width: 10%"><?php  echo $row[2] ?></td>
                                <td id="prenom" style="width: 10%"><?php  echo $row[3] ?></td>
                                <td id="email" style="width: 10%"><?php  echo $row[4] ?></td>
                                <td id="tele" style="width: 10%"><?php  echo $row[5] ?></td>
                                <td id="date_creation" style="width: 15%"><?php  echo $row[6] ?></td>
                                <td id="date_modif" style="width: 15%"><?php  echo $row[7] ?></td>
                                <td id="imei" style="width: 15%"><?php  echo $row[8] ?></td>
                                <td style="width: 15%">
                                    <button type="button" name="edit" class="btn bg-orange waves-float update_agent" data-toggle="modal" data-target="#modalEdit"  id="<?php echo $update_agent; ?>">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" name="delete" class="btn bg-red waves-float delete_agent" id="<?php echo $id_agent = $row[0]; ?>">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                              </tr>
                              <?php } ?>
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

        <!-- Modals : ajouter un nouveau agent -->
        <div class="modal fade" id="modalUser" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Ajouter un agent</h4>
                    </div>

                    <div class="modal-body">
                        <form id="form_add_user" method="POST" role="form" data-target="#modalUser">

                          <div class="form-group form-float">
                            <div class="form-line">
                              <label class="form-label">Nom</label>
                              <input type="text" class="form-control nom_add" name="nom_add" id="nom_add" required autofocus>
                            </div>
                          </div>

                          <div class="form-group form-float">
                            <div class="form-line">
                              <label class="form-label">Prenom</label>
                              <input type="text" class="form-control prenom_add" id="prenom_add" name="prenom_add"  required  >
                            </div>
                          </div>

                          <div class="form-group form-float">
                            <div class="form-line">
                              <label class="form-label">Email</label>
                              <input type="text" class="form-control email_add" id="email_add" name="email_add" required>
                            </div>
                          </div>

                          <div class="form-group form-float">
                            <div class="form-line">
                              <label class="form-label">Numéro du téléphone</label>
                              <input type="number" class="form-control tele_add" id="tele_add" name="tele_add" required>
                            </div>
                          </div>

                          <div class="form-group form-float">
                            <div class="form-line">
                              <label class="form-label">Code IMEI</label>
                              <input type="text" class="form-control imei_add" id="imei_add" name="imei_add" required>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn bg-green waves-effect" id="submitButton_add" >Enregistrer</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Fermer</button>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modals : Modifier un agent -->
        <div class="modal fade" id="modalEdit">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Modifier un agent</h4>
                    </div>
                    <div class="modal-body">
                        <form id="form_update_user" method="POST" role="form">
                          <label for="nom_update">Nom</label>
                          <div class="form-group form-float">
                              <div class="form-line">
                                <input type="text" class="form-control nom_update" name="nom_update" id="nom_update" required autofocus>
                              </div>
                          </div>

                          <label for="prenom_update">Prenom</label>
                          <div class="form-group form-float">
                              <div class="form-line">
                                <input type="text" class="form-control prenom_update" id="prenom_update" name="prenom_update"  required >
                              </div>
                          </div>

                          <label for="email_update">Email</label>
                          <div class="form-group form-float">
                              <div class="form-line">
                                <input type="text" class="form-control email_update" id="email_update" name="email_update" required>
                              </div>
                          </div>

                          <label for="tele_update">Numéro du téléphone</label>
                          <div class="form-group form-float">
                              <div class="form-line">
                                <input type="number" class="form-control tele_update" id="tele_update" name="tele_update" required>
                              </div>
                          </div>

                          <label for="tele_update">Code IMEI</label>
                          <div class="form-group form-float">
                              <div class="form-line">
                                <input type="text" class="form-control imei_update" id="imei_update" name="imei_update" required>
                              </div>
                          </div>

                          <div class="modal-footer">
                            <button type="submit" class="btn bg-green waves-effect" id="submitButton_update"  name="submitButton_update">Enregistrer</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Fermer</button>
                          </div>

                        </form>
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
      </div>
    </div>

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
    <script src="../../js/gestion_agents/add_user.js"></script>
    <script src="../../js/gestion_agents/delete_user.js"></script>
    <script src="../../js/gestion_agents/update_user.js"></script>
    <!-- Waves Effect Plugin Js -->
    <script src="../../plugins/node-waves/waves.js"></script>

  </body>
  <?php pg_close($dbconn); ?>
</html>